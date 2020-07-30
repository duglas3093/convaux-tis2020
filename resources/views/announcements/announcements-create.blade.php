@extends('layouts.main')

@section('title', 'Crear Convocatoria')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Crear Convocatoria</h3>
    <div class="row border-top">
        <div class="col-md-6 offset-md-3">
            <form class="form-register border-dark mt-3 mb-3 rounded" role="form" method="POST" class="mt-3" action="{{ route('announcementsCreate') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="fname" data-toggle="tooltip" title="Con este nombre podras encontrar facilmente esta convocatoria.">Codigo<span style="color: #d44950;">*</span>:</label>
                    <input type="text" class="form-control" id="idname" name="name">
                    @if ($errors->has('name'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ftitle">Título<span style="color: #d44950;">*</span>:</label>
                    <textarea type="text" class="form-control" id="idtitle" name="title" rows="2"></textarea>
                    @if ($errors->has('title'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-5">
                            <label for="fgestion">Seleccionar gestión<span style="color: #d44950;">*</span>:</label>
                            <select class="form-control" name="gestion" id="idgestionconv">
                                @foreach ($data['gestiones'] as $gestion)
                                <option value="{{ $gestion }}">{{ $gestion->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('gestion'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('gestion') }}</span>
                            @endif
                            <br>
                            <a style="color: #007bff;" href="{{ route('gestionesForm') }}">Crear gestión?</a>
                        </div>
                        <div class="col-7">
                            <label for="ftitle">Convocatoria a<span style="color: #d44950;">*</span>:</label>
                            <select class="form-control" name="tipoconv" id="idtipoconv">
                                @foreach ($data['tiposConvocatoria'] as $tipoConvocatoria)
                                <option value="{{ $tipoConvocatoria }}">{{ $tipoConvocatoria->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('tipoconv'))
                            <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('tipoconv') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fdescription">Descripción<span style="color: #d44950;">*</span>:</label>
                    <textarea type="text" class="form-control" id="iddescription" name="description" rows="7"></textarea>
                    @if ($errors->has('description'))
                    <span class="help-block" style="color: #d44950; font-size: 14px;">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <button type="button" class="btn btn-outline-danger" onclick="window.location='{{ route('announcementsList') }}'">Cancelar</button>
                <button type="submit" class="btn btn-outline-primary float-right">Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection