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
use ConvAux\Requirement;

class AnnouncementsController extends Controller
{
    public function announcementsList() {
        $announcements = Announcement::all();
        $data = [];
        foreach ($announcements as $announcement) {
            $currentData = [
                'announcement' => $announcement,
                'management' => Gestion::find($announcement->management_id)->name,
                'announcementType' => ConvocatoriaTipo::find($announcement->announcement_type_id)->name,
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
        $announcement = Announcement::find($id);
        $dates = AnnouncementDates::where('announcement_id', '=', $id)->first();
        $requirements = Requirement::where('announcement_id', '=', $id)->get();
        $requests = AnnouncementRequest::where('announcement_id', '=', $id)->get();
        $knowledge = ' ';
        $knowledgeDetails = ' ';
        if ($announcement->knowledge_id != null) {
            $knowledge = Knowledge::find($announcement->knowledge_id);
            $knowledgeDetails = KnowledgeDetail::where('knowledge_id', '=', $announcement->knowledge_id)->get();
        }
        $currentAnnouncement = [
            'announcement' => $announcement,
            'management' => Gestion::find($announcement->management_id),
            'announcementType' => ConvocatoriaTipo::find($announcement->announcement_type_id),
            'dates' => $dates,
            'requirements' => $requirements,
            'requests' => $requests,
            'knowledge' => $knowledge,
            'knowledgeDetails' => $knowledgeDetails
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
        $announcementRequirement->description = $request->requisitoDescripcion;
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
}
