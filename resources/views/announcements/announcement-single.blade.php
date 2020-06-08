@extends('layouts.app')

@section('title', 'Gestiones')
@section('content')
<div class="container">
    <h3 class="text-center mt-5">{{ $announcement['announcement']->title }}</h3>
    <div class="row border">
        <div class="col-md-10 mt-5 mb-5 mr-auto ml-auto">
            <label for=""><strong>Nombre:</strong></label>
            <h6>{{ $announcement['announcement']->name }}</h6>
            <label for=""><strong>Gestión:</strong></label>
            <h6>{{ $announcement['management']->name }}</h6>
            <label for=""><strong>Categoría:</strong></label>
            <h6>{{ $announcement['announcementType']->name }}</h6>
            <label for=""><strong>Descripcion:</strong></label>
            <h6>{{ $announcement['announcement']->description }}</h6>
            <label for=""><strong>Fechas:</strong></label>
            <button class="btn btn-outline-info my-2 my-sm-0 float-right">
                Fijar fechas
            </button>
            <br>
            <label for=""><strong>Requisitos:</strong></label>
            <br>
            <label for=""><strong>Requerimientos:</strong></label>
        </div>
    </div>
</div>
@endsection