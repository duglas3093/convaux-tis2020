<?php

namespace ConvAux\Http\Controllers;

use ConvAux\Announcement;
use ConvAux\AnnouncementDates;
use ConvAux\AnnouncementRequest;
use ConvAux\ConvocatoriaTipo;
use ConvAux\Gestion;
use Illuminate\Http\Request;
use DB;

use ConvAux\Http\Requests;
use ConvAux\Knowledge;
use ConvAux\KnowledgeDetail;
use ConvAux\Merit;
use ConvAux\MeritDetail;
use ConvAux\Requirement;

class AnnouncementsController extends Controller
{
    public function announcementsList() {
        $announcements = Announcement::all();
        $data = [];
        foreach ($announcements as $announcement) {
            $dates = AnnouncementDates::where('announcement_id', '=', $announcement->id)->first();
            $currentData = [
                'announcement' => $announcement,
                'management' => Gestion::find($announcement->management_id)->name,
                'announcementType' => ConvocatoriaTipo::find($announcement->announcement_type_id)->name,
                'dates' => $dates
            ];
            array_push($data, $currentData);
        }
        return view('announcements.announcements-list')->with('data', $data);
    }

    public function announcementsForm() {
        $gestiones = Gestion::all();
        $tiposConvocatoria = ConvocatoriaTipo::all();
        $data = [
            'gestiones' => $gestiones,
            'tiposConvocatoria' => $tiposConvocatoria
        ];
        return view('announcements.announcements-create')->with('data', $data);
    }

    public function createAnnouncement(Request $request) {
        $this->validateData($request);
        $gestion = $this->parseToJson($request->gestion);
        $tipoConvocatoria = $this->parseToJson($request->tipoconv);
        $announcement = new Announcement();
        $announcement->name = $request->name;
        $announcement->title = $request->title;
        $announcement->management_id = $gestion->id;
        $announcement->announcement_type_id = $tipoConvocatoria->id;
        $announcement->description = $request->description;
        $announcement->status = 'CREADO';
        $announcement->save();
        return redirect()->route('announcementsList')->with('exito_crear_conv', 'Se creó correctamente la convocatoria.');
    }

    public function goToAnnouncementView($id) {
        $isReady = false;
        $announcement = Announcement::find($id);
        $dates = AnnouncementDates::where('announcement_id', '=', $id)->first();
        $requirements = Requirement::where('announcement_id', '=', $id)->get();
        $requests = AnnouncementRequest::where('announcement_id', '=', $id)->get();
        $knowledge = ' ';
        $knowledgeDetails = ' ';
        $merit = ' ';
        $meritDetails = ' ';
        if ($announcement->knowledge_id != null) {
            $knowledge = Knowledge::find($announcement->knowledge_id);
            $knowledgeDetails = KnowledgeDetail::where('knowledge_id', '=', $announcement->knowledge_id)->get();
        }
        if ($announcement->merit_id != null) {
            $merit = Merit::find($announcement->merit_id);
            $meritDetails = MeritDetail::where('merit_id', '=', $announcement->merit_id)->get();
        }
        $isReady = $this->isAnnouncementReady($dates, $requirements, $requests, $knowledge, $knowledgeDetails, $merit, $meritDetails);
        $currentAnnouncement = [
            'announcement' => $announcement,
            'management' => Gestion::find($announcement->management_id),
            'announcementType' => ConvocatoriaTipo::find($announcement->announcement_type_id),
            'dates' => $dates,
            'requirements' => $requirements,
            'requests' => $requests,
            'knowledge' => $knowledge,
            'knowledgeDetails' => $knowledgeDetails,
            'merit' => $merit,
            'meritDetails' => $meritDetails,
            'isReady' => $isReady
        ];
        return view('announcements.announcement-single')->with('announcement', $currentAnnouncement);
    }

    private function parseToJson($value) {
        return json_decode($value);
    }

    private function messagesForForm() {
        return ['required' => 'El campo es requerido'];
    }

    private function validateData(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'gestion' => 'required',
            'tipoconv' => 'required',
            'description' => 'required',
        ], $this->messagesForForm());
    }

    public function setRequirement(Request $request, $id) {
        $announcementRequirement = new Requirement();
        $announcementRequirement->requirement = $request->currentRequirement;
        $announcementRequirement->doc = 'NO';
        if ($request->presentDoc == 'SI') {
            $announcementRequirement->doc = 'SI';
            $announcementRequirement->title = $request->docTitle;
            $announcementRequirement->description = $request->docDescription;
        }
        $announcementRequirement->announcement_id = $id;
        $saved = $announcementRequirement->save();
        if ($saved) {
            return redirect()->route('announcementView', $id)->with('set_requirement_successful', 'Se añadió el requisíto correctamente.');
        }
        return redirect()->route('announcementView')->with('set_requirement_error', 'No se pudo añadir el requisíto, algo salió mal.');
    }

    public function setKnowledgeDescription(Request $request, $id) {
        $knowledge = new Knowledge();
        $knowledge->description = $request->descripcionConocimiento;
        $saved = $knowledge->save();
        Announcement::where('id', '=', $id)->update(['knowledge_id' => $knowledge->id]);
        if ($saved) {
            return redirect()->route('announcementView', $id)->with('set_knowledge_successful', 'Se añadió una descripción a la tabla de conocimientos');
        }
        return redirect()->route('announcementView')->with('set_knowledge_error', 'No se pudo añadir la descripción, algo salió mal.');
    }

    public function setKnowledgeDetail(Request $request, $id) {
        $announcement = Announcement::find($id);
        $knowledgeDetail = new KnowledgeDetail();
        $knowledgeDetail->criteria = $request->criterioConocimiento;
        $knowledgeDetail->score = $request->puntajeConocimiento;
        $knowledgeDetail->knowledge_id = $announcement->knowledge_id;
        $saved = $knowledgeDetail->save();
        if ($saved) {
            return redirect()->route('announcementView', $id)->with('set_knowledge_detail_successful', 'Se añadió un criterio a la tabla de conocimientos');
        }
        return redirect()->route('announcementView')->with('set_knowledge_detail_error', 'No se pudo añadir la descripción, algo salió mal.');
    }

    public function setMeritDescription(Request $request, $id) {
        $merit = new Merit();
        $merit->description = $request->meritDescription;
        $saved = $merit->save();
        Announcement::where('id', '=', $id)->update(['merit_id' => $merit->id]);
        if ($saved) {
            return redirect()->route('announcementView', $id)->with('set_merit_successful', 'Se añadió una descripción a la tabla de meritos');
        }
        return redirect()->route('announcementView')->with('set_merit_error', 'No se pudo añadir la descripción, algo salió mal.');
    }

    public function setMeritDetail(Request $request, $id) {
        $announcement = Announcement::find($id);
        $meritDetail = new MeritDetail();
        $meritDetail->category = $request->meritCategory;
        $meritDetail->criteria = $request->meritCriteria;
        $meritDetail->score = $request->meritScore;
        $meritDetail->merit_id = $announcement->merit_id;
        $saved = false;
        if ($request->meritCategory == 'RENDIMIENTO ACADEMICO') {
            $saved = $meritDetail->save();
        } else {
            $meritDetail->sub_category = $request->meritSubcategory;
            $saved = $meritDetail->save();
        }
        if ($saved) {
            return redirect()->route('announcementView', $id)->with('set_merit_successful', 'Se añadió una descripción a la tabla de meritos');
        }
        return redirect()->route('announcementView')->with('set_merit_error', 'No se pudo añadir la descripción, algo salió mal.');
    }

    public function publishAnnouncement($id) {
        $updated = Announcement::where('id', '=', $id)->update(['status' => 'PUBLICADO']);
        if ($updated) {
            return redirect()->route('announcementsList')->with('published_conv_successful', 'Se publicó la convocatoria!');
        }
        return redirect()->route('announcementsList')->with('set_merit_error', 'No se pudo publicar la convocatoria, algo salió mal.');
    }
    
    private function isAnnouncementReady($dates, $requirements, $request, $knowledge, $knowledgeDetail, $merit, $meritDetail) {
        if ($dates != null && count($requirements) > 0 && count($request) > 0 && $knowledge != ' ' && $merit != ' ' && count($knowledgeDetail) > 0 && count($meritDetail) > 0) {
            return true;
        }
        return false;
    }
}
