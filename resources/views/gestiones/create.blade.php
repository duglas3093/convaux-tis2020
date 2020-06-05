@extends('layouts.app')

@section('title', 'Crear Gestion')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Crear Gestión</h3>
    <div class="row border-top">
        <div class="col-md-6 offset-md-3">
            @if(session('error_existe_gestion'))
            <div class="alert alert-danger" role="alert">
                {{session('error_existe_gestion')}}
            </div>
            @endif
            <form class="form-register border-dark mt-3 mb-3 rounded" role="form" method="POST" class="mt-3" action="{{ route('gestionesCrear') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="fgestion">Gestión:</label>
                    <input type="text" class="form-control" id="idgestion" name="gestion" value="{{ old('gestion') }}">
                    @if ($errors->has('gestion'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('gestion') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="ffechainicio">Fecha de inicio:</label>
                    <input type="date" class="form-control date" id="idfechainicio" name="fechaInicio" value="{{ old('fechaInicio') }}">
                    @if ($errors->has('fechaInicio'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('fechaInicio') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="ffechafin">Fecha de finalización:</label>
                    <input type="date" class="form-control" id="idfechafin" name="fechaFin" value="{{ old('fechaFin') }}">
                    @if ($errors->has('fechaFin'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('fechaFin') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="fdescripcion">Descripción:</label>
                    <textarea type="text" class="form-control" id="iddescripcion" name="descripcion"></textarea>
                </div>
                <button type="button" class="btn btn-outline-danger" onclick="window.location='{{ route('gestiones') }}'">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary float-right">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection