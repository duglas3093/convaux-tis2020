@extends('layouts.app')

@section('title', 'Postular a convocatoria')
@section('content')
<div class="container">
    <h3 class="text-center mt-5">Formulario de postulación</h3>
    <div class="row pb-5">
        <div class="col-md-8 m-auto pb-2">
            <h6 class="text-center font-weight-bold pt-5">Convocatoria:</h6>
            <p class="text-center">{{ $data['announcement']->title }}</p>
            <h6 class="text-center font-weight-bold" style="font-weight: 2px;">Categoria de la convocatoria:</h6>
            <p class="text-center text-uppercase">{{ $data['announcementType']->name }}</p>
            <h6 class="text-center font-weight-bold" style="font-weight: 2px;">Item al que está postulando:</h6>
            <p class="text-center text-uppercase">{{ $data['request']->auxiliary_name }}</p>
            <div class="text-center">
                <img src="/images/user.png" alt="" class="rounded-circle" width="100px" height="100px">
            </div>
            @if(session('error_code'))
            <div class="alert alert-danger alert-dismissible col-6 offset-md-3 text-center mt-2" role="alert">
                {{ session('error_code') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('error_user_code'))
            <div class="alert alert-danger alert-dismissible col-6 offset-md-3 text-center mt-2" role="alert">
                {{ session('error_user_code') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('error_user_code_used'))
            <div class="alert alert-danger alert-dismissible col-6 offset-md-3 text-center mt-2" role="alert">
                {{ session('error_user_code_used') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="col-5 m-auto">
            <form class="form-register border-dark rounded" role="form" method="POST" action="{{ route('postulate', ['id' => $data['announcement']->id, 'requestId' => $data['request']->id] ) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Ingrese su codigo de postulación:</label>
                    <input type="text" class="form-control" name="postulationCode">
                </div>
                <button type="button" class="btn btn-outline-danger" onclick="window.location='{{ route('announcementView', $data['announcement']->id) }}'">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-outline-primary float-right">Postular</button>
            </form>
        </div>
    </div>
</div>
@endsection
