@extends('layouts.app')

@section('title', 'Gestiones')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Gestiones</h3>
    <div class="row">
        @if(session('exito_crear_gestion'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('exito_crear_gestion') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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

    <div class="row">
        <div class="col-8 offset-md-2 mt-5">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gestión</th>
                        <th scope="col">Fecha de Inicio</th>
                        <th scope="col">Fecha de Finalización</th>
                        <th scope="col">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gestiones as $index => $gestion)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $gestion->name }}</td>
                        <td>{{ $gestion->start_date }}</td>
                        <td>{{ $gestion->end_date }}</td>
                        <td>{{ $gestion->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection