@extends('layouts.main')

@section('title', 'Requerimientos')
@section('content')
<div class="container">
    <h3 class="text-center mt-5">Agregar requerimiento a Convocatoria</h3>
    <div class="row border-top">
        @if(session('set_dates_error'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('set_dates_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif


        <div class="col-md-6 offset-md-3">
            <h6 class="text-center mt-3">{{ $data['announcement']->title }}</h6>
            <h6 class="text-center mt-3">Categoría: <strong style="text-transform: uppercase;">{{ $data['announcementTpye']->name }}</strong></h6>
            <br>
            <form class="form-register border-dark mt-0 rounded" role="form" method="POST" class="mt-3" action="{{ route('announcementAddRequests', $data['announcement']->id) }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6">
                        <br>
                        <div class="form-group">
                            <label for="fcodconv">Código de auxiliatura<span style="color: #d44950;">*</span>:</label>
                            <input type="text" class="form-control" id="idcodconv" name="codconv" value="{{ old('codconv') }}">
                        </div>
                        @if ($errors->has('codconv'))
                        <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('codconv') }}</span>
                        @endif
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="fcantaux">Cantidad de auxiliares<span style="color: #d44950;">*</span>:</label>
                            <input type="number" class="form-control" id="idcantaux" name="cantaux" value="{{ old('cantaux') }}">
                            @if ($errors->has('cantaux'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('cantaux') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="fhoracad">Horas académicas/mes<span style="color: #d44950;">*</span>:</label>
                            <input type="number" class="form-control" id="idhoracad" name="horacad" value="{{ old('horacad') }}">
                            @if ($errors->has('horacad'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('horacad') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    @if ($data['announcementTpye']->id == 1)
                    <label for="fnombaux">Destino<span style="color: #d44950;">*</span>:</label>
                    @else
                    <label for="fdestino">Nombre de auxiliatura<span style="color: #d44950;">*</span>:</label>
                    @endif
                    <input type="text" class="form-control" id="idnombaux" name="nombaux" value="{{ old('nombaux') }}">
                    @if ($errors->has('nombaux'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('nombaux') }}</span>
                    @endif
                </div>

                <button type="button" class="btn btn-outline-danger" onclick="window.location='{{ route('announcementView', $data['announcement']->id) }}'">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary float-right">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection