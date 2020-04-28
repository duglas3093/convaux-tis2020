<?php

namespace ConvAux\Http\Controllers;

use Illuminate\Http\Request;

use ConvAux\Http\Requests;

class FrontController extends Controller
{
    public function getIndex(){
        return view('main.index');
    }
    public function getCalls(){
        return view('main.calls');
    }
    public function getNotices(){
        return view('main.notices');
    }
    public function getcontact(){
        return view('main.contact');
    }
    public function getShowNotice(){
        return view('main.showNotice');
    }
}
