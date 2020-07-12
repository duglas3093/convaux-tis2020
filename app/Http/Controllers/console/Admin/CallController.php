<?php

namespace ConvAux\Http\Controllers\console\Admin;

use Illuminate\Http\Request;

use ConvAux\Http\Requests;
use ConvAux\Http\Controllers\Controller;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['suadmin','admin','admin_comision_revision','admin_comision_calificacion','admin_revision']);
        return view('admin.calls.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // metodo para autentificar roles
        $request->user()->authorizeRoles(['suadmin','admin']);
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
        // metodo para autentificar roles
        $request->user()->authorizeRoles(['suadmin','admin']);
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
        // metodo para autentificar roles
        $request->user()->authorizeRoles(['suadmin','admin']);
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
        // metodo para autentificar roles
        $request->user()->authorizeRoles(['suadmin','admin']);
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
        // metodo para autentificar roles
        $request->user()->authorizeRoles(['suadmin','admin']);
        //
    }
}
