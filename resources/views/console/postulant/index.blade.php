@extends('layouts.main')
@section('title' , 'Console')
@section('content')
<div class="container">
    
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1 class="text-center mt-3">Bienvenido {{Auth::user()->name}}</h1>
                <p class="text-center mt-5" style="font-size: 20pt">Es posible recuperarse de una derrota, pero cuesta más perdonarse a uno mismo por no haberlo intentado <br>(George Edward Woodberry)</p>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
@endsection