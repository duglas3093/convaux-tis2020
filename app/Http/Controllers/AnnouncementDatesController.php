<?php

namespace ConvAux\Http\Controllers;

use ConvAux\Announcement;
use ConvAux\AnnouncementDates;
use Illuminate\Http\Request;

use ConvAux\Http\Requests;

class AnnouncementDatesController extends Controller
{

    public function goDatesForm($id) {
        $announcement = Announcement::find($id);
        return view('announcements.announcement-dates')->with('announcement', $announcement);
    }

    public function setDates(Request $request, $id) {
        $this->validateData($request);
        $announcementDates = $this->buildObject($request, $id);
        $saved = $announcementDates->save();
        if ($saved) {
            return redirect()->route('announcementView', $id)->with('set_dates_successful', 'Se fijaron las fechas correctamente.');
        }
        return redirect()->route('announcementDates')->with('set_dates_error', 'No se pudo fijar las fechas, algo salió mal.');
    }

    private function messagesForForm() {
        return ['required' => 'Este campo es obligatorio',
                'date' => 'Debe seleccionar una fecha'];
    }

    private function validateData(Request $request) {
        $this->validate($request, [
            'pubconv' => 'required|date',
            'presdocs' => 'required|date',
            'presdocsubi' => 'required',
            'pubhabilitados' => 'required|date',
            'reclamos' => 'required|date',
            'reclamosubi' => 'required',
            'pruebas' => 'required|date',
            'pubresul' => 'required|date',
        ], $this->messagesForForm());
    }

    private function buildObject(Request $request, $id) {
        $announcementDates = new AnnouncementDates();
        $announcementDates->publication_date = $request->pubconv;
        $announcementDates->docs_presentation = $request->presdocs;
        $announcementDates->docs_location = $request->presdocsubi;
        $announcementDates->publication_of_enabled = $request->pubhabilitados;
        $announcementDates->claims_presentation = $request->reclamos;
        $announcementDates->claims_location = $request->reclamosubi;
        $announcementDates->phase_tests = $request->pruebas;
        $announcementDates->publication_results = $request->pubresul;
        $announcementDates->announcement_id = $id;
        return $announcementDates;
    }
}

