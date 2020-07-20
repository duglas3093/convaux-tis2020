<?php

namespace ConvAux\Http\Controllers;

use Carbon\Carbon;
use ConvAux\AllowedStudents;
use ConvAux\Announcement;
use ConvAux\AnnouncementRequest;
use Illuminate\Http\Request;

use ConvAux\Http\Requests;
use ConvAux\Postulation;
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
            return redirect()->route('homepage')->with('error_successful_allowed', 'Se habilitó al estudiante para que pueda postularse y se envió correctamente un correo con su código.');
        } else {
            return redirect()->route('homepage')->with('error_error_allowed', 'Algo salió mal, intente nuevamente.');
        }
    }

    public function goPostulantsList($id) {
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

    public function goPostulantViewForm($id, $userId) {
        return view('secretary.postulant-view-form');
        // $requirementDocuemts = RequirementDocument::where('postulant_id' ,'=', $userId)->get();
        // $path = storage_path('app').'/files'.'/'.$requirementDocuemts[0]->document_path; 
        // $file = \File::get($path); 
        // $type = \File::mimeType($path);
    }
}
