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

        $this->validateData($request);
        if ($this->existManagement(trim($request->gestion))) {
            return redirect()->route('gestionesForm')->with('error_existe_gestion', 'La Gestión ya existe, intente con otro nombre.');
        }
        $gestionActual = new Gestion();
        $gestionActual->name = trim($request->gestion);
        $gestionActual->start_date = $request->fechaInicio;
        $gestionActual->end_date = $request->fechaFin;
        $gestionActual->description = $request->descripcion;
        $gestionActual->save();
        return redirect()->route('gestiones')->with('exito_crear_gestion', 'Se creó correctamente la gestión.');
    }

    private function messagesForForm() {
        return [
            'required' => 'El campo es requerido',
            'fechaFin.after' => 'La fecha de finalización debe ser mayor a la fecha de inicio.'
        ];
    }

    private function validateData(Request $request) {
        $this->validate($request, [
            'gestion' => 'required',
            'fechaInicio' => 'required|date',
            'fechaFin' => 'required|date|after:fechaInicio'
        ], $this->messagesForForm());
    }

    private function existManagement($management) {
        if (Gestion::where('name', $management)->first()) {
            return true;
        }
        return false;
    }
}


