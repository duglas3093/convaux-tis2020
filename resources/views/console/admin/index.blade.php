@extends('layouts.admin')
@section('title' , 'Console')
@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <h1 class="text-center">Bienvenid@ {{Auth::user()->name}}</h1>
            <h3 class="text-center">Tiene el Rol de:
                @if(!Auth::guest() && Auth::user()->roles[0]->name == 'suadmin')
                    Administrador Superior
                @endif
                @if(!Auth::guest() && Auth::user()->roles[0]->name == 'Admin')
                    Administrador
                @endif
                @if(!Auth::guest() && Auth::user()->roles[0]->name == 'User_secretary')
                    Secretaria
                @endif
                @if(!Auth::guest() && Auth::user()->roles[0]->name == 'User_secretary')
                <small class="text-center p-0 m-0">secretaria</small>
                @endif
            </h3>
        </div>
    </div>
</div>
@endsection