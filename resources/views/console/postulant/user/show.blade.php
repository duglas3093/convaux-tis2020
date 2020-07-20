@extends('layouts.main')
@section('title'.'Postulante')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @include('common.success')
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 ml-0">
                <h2 class="text-center">Información Personal del Postulante</h2>
                <div class="card">
                    <h5 class="m-3 "><b>Nombre del Postulante:</b> {{$postulant->name}}</h5>
                    <h5 class="m-3 "><b>Apellido(s) del Postulante:</b> {{$postulant->last_name}}</h5>
                    <h5 class="m-3 "><b>Codigo sis del Postulante:</b> {{$postulant->cod_sis}}</h5>
                    <h5 class="m-3 "><b>Email:</b> {{$postulant->email}}</h5>
                    <h5 class="m-3 "><b>N° de Carnet de Identidad:</b> {{$postulant->ci}}</h5>
                    <h5 class="m-3 "><b>Expedido en:</b> {{$postulant->expedido}}</h5>
                    <h5 class="m-3 "><b>Carrera:</b> {{$postulant->carrera}}</h5>
                    <a href="/postulant/{{$postulant->id}}/edit" class="btn btn-primary btn-lg">Editar información</a>
                </div>
            </div>
            <div class="col-md-4 ml-0">
                <img style="height:300px; width:300px; background-color: #EFEFEF; margin: 20px" class="mt-5 card-img-top rounded-circle mx-auto d-block" src="http://www.rrhhdigital.com/userfiles/estudiante-universitario-joven.jpg" alt="">
            </div>
        </div>
    </div>
@endsection