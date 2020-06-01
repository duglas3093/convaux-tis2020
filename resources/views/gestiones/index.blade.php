@extends('layouts.app')

@section('title', 'Gestiones')
@section('content')
<div class="contianer">
    <h3 class="text-center mt-3">Gestiones</h3>
    <div class="row">
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
@endsection