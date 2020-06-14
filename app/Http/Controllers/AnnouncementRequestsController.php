<?php

namespace ConvAux\Http\Controllers;

use ConvAux\Announcement;
use ConvAux\AnnouncementRequest;
use ConvAux\ConvocatoriaTipo;
use Illuminate\Http\Request;

use ConvAux\Http\Requests;

class AnnouncementRequestsController extends Controller
{
    public function goRequestsForm($id) {
        $announcement = Announcement::find($id);
        $announcementTpye = ConvocatoriaTipo::find($announcement->announcement_type_id);
        $data = [
            'announcement' => $announcement,
            'announcementTpye' =>  $announcementTpye
        ];
        return view('announcements.announcement-requests')->with('data', $data);
    }

    public function addRequest(Request $request, $id) {
        $this->validateDate($request);
        $annoucementRequest = $this->buildObject($request, $id);
        $saved = $annoucementRequest->save();
        if ($saved) {
            return redirect()->route('announcementView', $id)->with('add_request_successful', 'Se añadió un requerimieto a la convocatoria.');
        }
        return redirect()->route('announcementView', $id)->with('add_request_error', 'Algo salió mal, intente nuevamente.');
    }

    private function messagesForForm() {
        return [
            'required' => 'Debe llenar este campo, es obligatorio.'
        ];
    }

    private function validateDate(Request $request) {
        $this->validate($request, [
            'codconv' => 'required',
            'cantaux' => 'required|numeric|min:1',
            'horacad' => 'required|numeric|min:1',
            'nombaux' => 'required',
        ], $this->messagesForForm());
    }

    private function buildObject(Request $request, $id) {
        $aRequest = new AnnouncementRequest();
        $aRequest->auxiliary_code = $request->codconv;
        $aRequest->assistant_amount = $request->cantaux;
        $aRequest->academic_hours = $request->horacad;
        $aRequest->auxiliary_name = $request->nombaux;
        $aRequest->announcement_id = $id;
        return $aRequest;
    }
}
