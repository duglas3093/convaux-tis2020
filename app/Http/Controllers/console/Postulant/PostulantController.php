<?php

namespace ConvAux\Http\Controllers\console\Postulant;

use Illuminate\Http\Request;
use ConvAux\User;
use ConvAux\Http\Requests;
use ConvAux\Http\Controllers\Controller;

class PostulantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request->user()->authorizeRoles('user');
        return view('console.postulant.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $postulant = User::where('id','=',$id)->firstOrFail();
        return view('console.postulant.user.show', compact('postulant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postulant = User::where('id','=',$id)->firstOrFail();
        return view('console.postulant.user.edit', compact('postulant'));
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
        $postulant = User::where('id','=',$id)->firstOrFail();
        // $trainer->fill($request->all());
        $postulant->fill($request->except('avatar'));//Aqui decimos que nos cargue todo menos el avatar
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $postulant->avatar = $name;
            $file->move(public_path().'/images/', $name);
        }
        $postulant->save();
        // return 'update';
        return redirect()->route('postulant.show', [$postulant])->with('status','El Perfil a sido actualizado correctamente');
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
