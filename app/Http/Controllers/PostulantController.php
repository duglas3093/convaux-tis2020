<?php

namespace ConvAux\Http\Controllers;

use ConvAux\Announcement;
use Illuminate\Http\Request;

use ConvAux\Http\Requests;
use ConvAux\Requirement;
use ConvAux\RequirementDocument;
use Illuminate\Support\Facades\Auth;
use Validator;

class PostulantController extends Controller
{
    public function uploadFilesForm($id, $requestId, $postulationCode)
    {
        $requirements = Requirement::where([['announcement_id', '=', $id], ['doc', '=', 'SI']])->get();
        $announcement = Announcement::find($id);
        $data = [
            'requirements' => $requirements,
            'announcement' => $announcement
        ];
        return view('postulant.requirement-form')->with('data', $data);
    }

    public function uploadFiles(Request $request, $id) {
        $user = Auth::user();
        $files = $request->file('files');
        $validator = Validator::make($request->all('files'), [
            'files.*' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->with('required_missing', 'Debe seleccionar todos los archivos, Suba todos sus archivos nuevamente');
        }
        foreach ($files as $file) {
            $fileName = $file->getClientOriginalName();
            \Storage::disk('local')->put($fileName, \File::get($file));
            $requirementDocument = new RequirementDocument();
            $requirementDocument->document_path = $fileName;
            $requirementDocument->postulant_id = $user->id;
            $requirementDocument->save();
        }
        return redirect()->route('announcementsList')->with('uploaded_requirements_seccesful', 'Tus archivos fueron enviados correctamente, tu postulacion se encuentra en revision.');
    }
}
