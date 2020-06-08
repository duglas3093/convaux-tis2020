<?php

namespace ConvAux\Http\Controllers;

use ConvAux\Announcement;
use ConvAux\ConvocatoriaTipo;
use ConvAux\Gestion;
use Illuminate\Http\Request;
use DB;

use ConvAux\Http\Requests;

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
        $currentAnnouncement = [
            'announcement' => $announcement,
            'management' => Gestion::find($announcement->management_id),
            'announcementType' => ConvocatoriaTipo::find($announcement->announcement_type_id)
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
}
