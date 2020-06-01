@extends('layouts.app')

@section('title', 'Crear Gestion')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Crear Gestión</h3>

    <div class="row border border-dark mt-3 mb-3 rounded">
        <div class="col-md-4 mt-3 d-none d-sm-none d-md-block">
            <figure>
                <img src="{{ url('/images/pizarra.jpg') }}" width="100%">
            </figure>
        </div>
        <div class="col-md-8 col-sm-12 mt-3 mb-3">
            <form role="form" method="POST" action="{{ route('gestionesCrear') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="fgestion">Gestión:</label>
                    <input type="text" class="form-control" id="idgestion" name="gestion">
                </div>

                <div class="form-group">
                    <label for="ffechainicio">Fecha de inicio:</label>
                    <input type="date" class="form-control date" id="idfechainicio" name="fechaInicio">
                </div>

                <div class="form-group">
                    <label for="ffechafin">Fecha de finalización:</label>
                    <input type="date" class="form-control" id="idfechafin" name="fechaFin">
                </div>

                <div class="form-group">
                    <label for="fdescripcion">Descripción:</label>
                    <textarea type="text" class="form-control" id="iddescripcion" name="descripcion"></textarea>
                </div>
                <p class="text-center"><input class="btn btn-primary btn-lange" type="submit" value="Crear"></p>
            </form>
        </div>
    </div>
</div>
@endsection
