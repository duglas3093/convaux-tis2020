<?php

namespace ConvAux\Http\Controllers\console\Postulant;

use Illuminate\Http\Request;
use ConvAux\Document;
use ConvAux\User;
use ConvAux\Http\Requests;
use ConvAux\Http\Requests\AuthcodeRequest;
use ConvAux\Http\Controllers\Controller;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_cod(){
        return view('console.postulant.document.index');
    }
    /**
     * Show the form for creating a new resource.
     *
    * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if($request->allowedStudents()->user_id == $request->user()->id){
        //     if($request->allowedstudents()->postulation_code == $code){
        //         return view('console.postulant.document.create');
        //     }
        // }
        // return view('console');
        // $request->user()->authorizeRoles(['suadmin','admin']);
        return view('console.postulant.document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('carta_aux')){
            $file_carta_aux = $request->file('carta_aux');
            $name_carta_aux = time().$file_carta_aux->getClientOriginalName();
            \Storage::disk('local')->put($name_carta_aux, \File::get($file_carta_aux));
        }
        if($request->hasFile('kardex')){
            $file_kardex = $request->file('kardex');
            $name_kardex = time().$file_kardex->getClientOriginalName();
            \Storage::disk('local')->put($name_kardex, \File::get($file_kardex));
        }
        if($request->hasFile('certificado_estudiante')){
            $file_cer_est = $request->file('certificado_estudiante');
            $name_cer_est = time().$file_cer_est->getClientOriginalName();
            \Storage::disk('local')->put($name_cer_est, \File::get($file_cer_est));
        }
        if($request->hasFile('ci')){
            $file_ci = $request->file('ci');
            $name_ci = time().$file_ci->getClientOriginalName();
            \Storage::disk('local')->put($name_ci, \File::get($file_ci));
        }
        if($request->hasFile('certificado_biblioteca')){
            $file_cer_bibli = $request->file('certificado_biblioteca');
            $name_cer_bibli = time().$file_cer_bibli->getClientOriginalName();
            \Storage::disk('local')->put($name_cer_bibli, \File::get($file_cer_bibli));
        }
        if($request->hasFile('curriculum')){
            $file_curriculum = $request->file('curriculum');
            $name_curriculum = time().$file_curriculum->getClientOriginalName();
            \Storage::disk('local')->put($name_curriculum, \File::get($file_curriculum));
        }
        if($request->hasFile('doc_resp_curriculum')){
            $file_doc_curri = $request->file('doc_resp_curriculum');
            $name_doc_curri = time().$file_doc_curri->getClientOriginalName();
            \Storage::disk('local')->put($name_doc_curri, \File::get($file_doc_curri));
        }
        $document = new Document();
        $document->carta_aux = $name_carta_aux;
        $document->kardex = $name_kardex;
        $document->certificado_estudiante = $name_cer_est;
        $document->ci =$name_ci;
        $document->certificado_biblioteca = $name_cer_bibli ;
        $document->curriculum = $name_curriculum;
        $document->curriculum = $name_curriculum;
        $document->save();
        return redirect()->route('console.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
