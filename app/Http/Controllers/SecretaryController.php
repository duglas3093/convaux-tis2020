<?php

namespace ConvAux\Http\Controllers;

use Carbon\Carbon;
use ConvAux\AllowedStudents;
use ConvAux\Announcement;
use ConvAux\AnnouncementRequest;
use Illuminate\Http\Request;

use ConvAux\Http\Requests;
use ConvAux\Postulation;
use ConvAux\Requirement;
use ConvAux\RequirementDocument;
use ConvAux\User;
use Illuminate\Support\Facades\Mail;

class SecretaryController extends Controller
{
    public function allowStudentsForm()
    {
        return view('secretary.allow-students-form');
    }

    public function allowStudent(Request $request)
    {
        $email = $request->studentEmail;
        $student = User::where('email', '=', $email)->first();
        $code = AllowedStudents::where('postulation_code', '=', $request->code)->first();
        if (!$student) {
            return redirect()->route('allowStudentsForm')->with('error_invalid_student', 'No se encontró nigún estudiante con este correo.');
        }
        if ($code) {
            return redirect()->route('allowStudentsForm')->with('error_existing_code', 'Este código ya está registrado.');
        }
        $allowedStudent = new AllowedStudents();
        $allowedStudent->postulation_code = $request->code;
        $allowedStudent->user_id = $student->id;
        $allowedStudent->sent_code_date = date("Y-m-d");
        $saved = $allowedStudent->save();
        if ($saved) {
            $allowedStudent->student = $student;
            Mail::send('secretary.email-template', ['allowedStudent' => $allowedStudent], function ($message) use ($allowedStudent) {
                $message->sender('convaux@gmail.com', 'Convocatoria a Auxiliares');
                $message->to($allowedStudent['student']->email, $allowedStudent['student']->name);
                $message->subject('Habilitación para postulación a una convocatoria');
            });
            return redirect()->route('/')->with('error_successful_allowed', 'Se habilitó la postulación del estudiante y se envió correctamente un correo con su código.');
        } else {
            return redirect()->route('/')->with('error_error_allowed', 'Algo salió mal, intente nuevamente.');
        }
    }

    public function goPostulantsList($id)
    {
        $announcement = Announcement::find($id);
        $requests = AnnouncementRequest::where('announcement_id', '=', $id)->get();
        $postulations = [];
        foreach ($requests as $request) {
            $postulation = Postulation::where('request_id', '=', $request->id)->first();
            if ($postulation) {
                $allowedStudent = AllowedStudents::find($postulation->allowed_student_id);
                $postulant = User::find($allowedStudent->user_id);
                $currentPostulant = [
                    'announcement' => $announcement,
                    'postulant' => $postulant,
                    'postulation' => $postulation,
                    'request' => $request
                ];
                array_push($postulations, $currentPostulant);
            }
        }
        return view('secretary.postulants-list')->with('postulations', $postulations);
    }

    public function goPostulantViewForm($id, $userId, $requestId)
    {
        $requirementDocuemts = RequirementDocument::where('postulant_id', '=', $userId)->get();
        $requirements = Requirement::where([['announcement_id', '=', $id], ['doc', '=', 'SI']])->get();
        $postulant = User::find($userId);
        $request = AnnouncementRequest::find($requestId);
        $postulantDocuments = [];
        foreach ($requirements as $index => $requirement) {
            $filePath = $requirementDocuemts[$index]->document_path;
            $data = [
                'requirement' => $requirement,
                'filePath' => $filePath,
                'postulant' => $postulant,
                'request' => $request
            ];
            array_push($postulantDocuments, $data);
        }
        return view('secretary.postulant-view-form')->with('postulantDocuments', $postulantDocuments);
    }

    public function openDocument($id, $userId, $path)
    {
        $filePath = storage_path('app') . '/files' . '/' . $path;
        $file = \File::get($filePath);
        $type = \File::mimeType($filePath);
        return \Response::make($file, 200)->header("Content-Type", $type);
    }

    public function allowPostulation($id, $userId, $requestId)
    {
        $allowedStudentList = AllowedStudents::where('user_id', '=', $userId)->get();
        $postulation = null;
        $updated = null;
        foreach ($allowedStudentList as $allowedStudent) {
            $postulation = Postulation::where([['allowed_student_id', $allowedStudent->id], ['request_id', '=', $requestId]])->first();
        }
        if ($postulation != null) {
            $updated = Postulation::find($postulation->id)->update(['postulation_status' => 'HABILITADO']);
        }
        if ($updated != null) {
            return redirect()->route('homepage')->with('successful_allowed_postulation', 'El postulante fue aprobado con existo.');
        }
        return redirect()->route('homepage')->with('error_allowed_postulation', 'Algo salio mal, intente nuevamente mas tarde');
    }

    public function rejectPostulation(Request $request, $id, $userId, $requestId)
    {
        $allowedStudetList = AllowedStudents::where('user_id', '=', $userId)->get();
        $postulation = null;
        $updated = null;
        $rejectedDescription = $request->rejectDescription;
        foreach ($allowedStudetList as $allowedStudent) {
            $postulation = Postulation::where([['allowed_student_id', $allowedStudent->id], ['request_id', '=', $requestId]])->first();
        }
        if ($postulation != null) {
            $updated = Postulation::find($postulation->id)->update(['postulation_status' => 'RECHAZADO']);
            $updated = Postulation::where('id', $postulation->id)->update(array('rejected_description' => $rejectedDescription));
            
        }
        if ($updated) {
            return redirect()->route('homepage')->with('successful_rejected_postulation', 'El postulante fue rechazado con existo.');
        }
        return redirect()->route('homepage')->with('error_allowed_postulation', 'Algo salio mal, intente nuevamente mas tarde');
    }
}
