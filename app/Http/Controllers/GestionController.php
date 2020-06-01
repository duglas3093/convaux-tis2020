<?php

namespace ConvAux\Http\Controllers;

use Illuminate\Http\Request;

use ConvAux\Http\Requests;

class GestionController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('gestiones.index');
    }

    public function createForm() {
        return view('gestiones.create');
    }

    public function create(Request $request) {
        echo $request;
    }
}


