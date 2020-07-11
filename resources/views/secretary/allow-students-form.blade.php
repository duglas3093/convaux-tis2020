@extends('layouts.app')

@section('title', 'Habilitar Estudiante')
@section('content')
<div class="container">
    <h3 class="text-center mt-5">Habilitar estudiante para postulación</h3>
    <div class="row border-top">
        <div class="col-md-6 mt-3 offset-md-3">
            @if(session('error_invalid_student'))
            <div class="alert alert-danger alert-dismissible col-12 text-center" role="alert">
                {{ session('error_invalid_student') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('error_existing_code'))
            <div class="alert alert-danger alert-dismissible col-6 offset-md-3 text-center" role="alert">
                {{ session('error_existing_code') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form class="form-register border-dark mt-0 rounded" role="form" method="POST" class="mt-3" action="{{ route('allowStudent') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="fnombaux">Correo del estudiante<span style="color: #d44950;">*</span>:</label>
                    <input id="studentEmail" type="email" class="form-control" placeholder="correo@mail.com" name="studentEmail">
                </div>
                <div class="form-group">
                    <label for="fdestino">Generar código para la postulación del estudiante:</label>
                    <button type="button" class="btn btn-outline-success ml-4" onclick="generateCode()">
                        Generar
                    </button>
                    <div class="col-12 text-center mt-3 p-4" style="background:#DAD2D0; height: 100px; font-size: 30px;">
                        <input id="studentCode" class="text-center" type="text" style="background: #DAD2D0; color: black; border: none;" name="code">
                    </div>
                </div>

                <button type="button" class="btn btn-outline-danger">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary float-right">Habilitar</button>
            </form>

        </div>
    </div>
</div>
<script>
    function generateCode() {
        var hash = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012346789";
        var randomCode = '';
        for (var i = 0; i < 6; i++) {
            randomCode += hash[parseInt(Math.random() * hash.length)];
        }
        randomCode = randomCode.toUpperCase();
        document.getElementById("studentCode").value = randomCode;
    }

</script>
@endsection
