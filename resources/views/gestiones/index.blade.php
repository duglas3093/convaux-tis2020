@extends('layouts.app')

@section('title', 'Gestiones')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Gestiones</h3>
    <div class="row">
        @if(session('exito_crear_gestion'))
        <div class="alert alert-success col-6 offset-md-3 text-center" role="alert">
            {{ session('exito_crear_gestion') }}
        </div>
        @endif
        <div class="col-md">
            <nav class="navbar navbar-expand-lg float-right">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <button class="btn btn-outline-info my-2 my-sm-0" onclick="window.location='{{ route('gestionesForm') }}'" type="submit">
                        Crear Gestión
                    </button>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection