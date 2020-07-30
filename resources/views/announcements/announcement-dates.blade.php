@extends('layouts.main')

@section('title', 'Fechas')
@section('content')
<div class="container">
    <h3 class="text-center mt-5">EVENTOS DE LA CONVOCATORIA</h3>
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
            <form class="form-register border-dark mt-0 mb-5 rounded" role="form" method="POST" class="mt-3" action="{{ route('announcementSetDates', $data['announcement']->id) }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="fpubconv">Publicacion de la convocatoria<span style="color: #d44950;">*</span>:</label>
                    <input type="date" class="form-control" id="idpubconv" name="pubconv" value="{{ old('pubconv') }}">
                    @if ($errors->has('pubconv'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('pubconv') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-5">
                            <label for="fpresdocs">Presentacion de documentos<span style="color: #d44950;">*</span>:</label>
                            <input type="date" class="form-control" id="idpresdocs" name="presdocs" value="{{ old('presdocs') }}">
                            @if ($errors->has('presdocs'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('presdocs') }}</span>
                            @endif
                        </div>
                        <div class="col-7">
                            <br>
                            <label for="ftitle">Lugar de presentacion<span style="color: #d44950;">*</span>:</label>
                            <input type="text" class="form-control" id="idpresdocsubi" name="presdocsubi" value="{{ old('presdocsubi') }}">
                            @if ($errors->has('presdocsubi'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('presdocsubi') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fpubhabilitados">Publicacion de habilitados<span style="color: #d44950;">*</span>:</label>
                    <input type="date" class="form-control" id="idpubhabilitados" name="pubhabilitados" value="{{ old('pubhabilitados') }}">
                    @if ($errors->has('pubhabilitados'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('pubhabilitados') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="freclamos">Presentacion de reclamos<span style="color: #d44950;">*</span>:</label>
                            <input type="date" class="form-control" id="idreclamos" name="reclamos" value="{{ old('reclamos') }}">
                            @if ($errors->has('reclamos'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('reclamos') }}</span>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="freclamosubi">Lugar de presentacion<span style="color: #d44950;">*</span>:</label>
                            <input type="text" class="form-control" id="idreclamosubi" name="reclamosubi" value="{{ old('reclamosubi') }}">
                            @if ($errors->has('reclamosubi'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('reclamosubi') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fpruebas">Rol de pruebas<span style="color: #d44950;">*</span>:</label>
                    <input type="date" class="form-control" id="idpruebas" name="pruebas" value="{{ old('pruebas') }}">
                    @if ($errors->has('pruebas'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('pruebas') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="fpubresul">Publicacion de resultados<span style="color: #d44950;">*</span>:</label>
                    <input type="date" class="form-control" id="idpubresul" name="pubresul" value="{{ old('pubresul') }}">
                    @if ($errors->has('pubresul'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('pubresul') }}</span>
                    @endif
                </div>
                <button type="button" class="btn btn-outline-danger" onclick="window.location='{{ route('announcementView', $data['announcement']->id) }}'">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary float-right">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection