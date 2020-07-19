<?php

namespace ConvAux\Http\Controllers;

use ConvAux\AllowedStudents;
use Illuminate\Http\Request;

use ConvAux\Http\Requests;
use ConvAux\Announcement;
use ConvAux\AnnouncementRequest;
use ConvAux\ConvocatoriaTipo;
use ConvAux\Postulation;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function postulationForm($id, $requestId)
    {
        $announcement = Announcement::find($id);
        $announcementType = ConvocatoriaTipo::find($announcement->announcement_type_id);
        $request = AnnouncementRequest::find($requestId);
        $data = [
            'announcement' => $announcement,
            'announcementType' => $announcementType,
            'request' => $request
        ];
        return view('student.postulation-form')->with('data', $data);
    }

    public function postulate(Request $request, $id, $requestId)
    {
        $user = Auth::user();
        $postulationCode = $request->postulationCode;
        if (!$this->isValidCode($postulationCode)) {
            return redirect()->back()->with('error_code', 'El código no existe.');
        }
        if (!$this->isUserCode($postulationCode, $user->id)) {
            return redirect()->back()->with('error_user_code', 'El código no te pertence.');
        }
        $allowedStudent = AllowedStudents::where([['postulation_code', '=', $postulationCode], ['user_id', '=', $user->id]])->first();
        if ($this->isUserCodeUsed($allowedStudent->id)) {
            return redirect()->back()->with('error_user_code_used', 'Ya te postulaste con este código, solicita uno nuevo.');
        }
        $saved = $this->savePostulation($allowedStudent->id, $requestId);
        if ($saved) {
            return redirect()->route('uploadFilesForm', ['id' => $id, 'requestId' => $requestId, 'code' => $postulationCode])->with('postulation_successful', 'Te postulaste correctamente a la convocatoria, sube los requisitos obligatorios');
        } else {
            return redirect()->route('announcementsList')->with('postulation_error', 'Hubo un problema, intenta nuevamente mas tarde.');
        }
    }

    private function isValidCode($postulationCode)
    {
        $validCode = AllowedStudents::where('postulation_code', '=', $postulationCode)->first();
        if (!$validCode) {
            return false;
        }
        return true;
    }

    private function isUserCode($postulationCode, $userId)
    {
        $userCode = AllowedStudents::where([['postulation_code', '=', $postulationCode], ['user_id', '=', $userId]])->first();
        if (!$userCode) {
            return false;
        }
        return true;
    }

    private function isUserCodeUsed($allowedStudentId) {
        $postulation = Postulation::where('allowed_student_id', '=', $allowedStudentId)->first();
        if ($postulation) {
            return true;
        }
        return false;
    }

    private function savePostulation($allowedStudentId, $requestId) {
        $postulation = new Postulation();
        $postulation->postulation_status = 'EN REVISION';
        $postulation->allowed_student_id = $allowedStudentId;
        $postulation->request_id = $requestId;
        $saved = $postulation->save();
        if (!$saved) {
            return false;
        }
        return true;
    }
}
