<?php

namespace ConvAux\Http\Controllers;

use Carbon\Carbon;
use ConvAux\AllowedStudents;
use Illuminate\Http\Request;

use ConvAux\Http\Requests;
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
            return redirect()->route('homepage')->with('error_successful_allowed', 'Se habilitó la postulación del estudiante y se envió correctamente un correo con su código.');
        } else {
            return redirect()->route('homepage')->with('error_error_allowed', 'Algo salió mal, intente nuevamente.');
        }
    }
}
