<?php

namespace ConvAux\Http\Controllers;

use ConvAux\Gestion;
use DB;
use Illuminate\Http\Request;

class GestionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $gestiones = Gestion::all();
        return view('gestiones.index')->with('gestiones', $gestiones);
    }

    public function createForm() {
        return view('gestiones.create');
    }

    public function create(Request $request) {
        $mensajesParFormulario = [
            'required' => 'El campo es requerido',
            'fechaFin.after' => 'La fecha de finalización debe ser mayor a la fecha de inicio.'
        ];
        $this->validate($request, [
            'gestion' => 'required',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after:fechaInicio'
        ], $mensajesParFormulario);

        $gestionExistente = Gestion::where('name', $request['gestion'])->first();
        echo $gestionExistente;
        if ($gestionExistente) {
            return redirect()->route('gestionesForm')->with('error_existe_gestion', 'La Gestión ya existe, intente con otro nombre.');
        }
        $gestionActual = new Gestion();
        $gestionActual->name = $request['gestion'];
        $gestionActual->start_date = $request['fechaInicio'];
        $gestionActual->end_date = $request['fechaFin'];
        $gestionActual->description = $request['descripcion'];
        $gestionActual->save();
        return redirect()->route('gestiones')->with('exito_crear_gestion', 'Se creó correctamente la gestión.');
    }
}


