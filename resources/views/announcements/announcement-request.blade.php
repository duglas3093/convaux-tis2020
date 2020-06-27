@extends('layouts.app')

@section('title', 'Convocatoria')
@section('content')
<div class="container" style="background-color: whitesmoke;">
    <h5 class="text-center pt-5">{{ $data['request']->titleConv }}</h5>
    <h5 class="text-center mt-5">Requerimiento:</h5>
    <h3 class="text-center text-uppercase"><strong>{{ $data['request']->auxiliary_name }}</strong></h3>
    <div class="row mb-4">
        <div class="col-md-10 mt-5 mb-5 mr-auto ml-auto">
            <label for="">Cantidad de axuliares:</label>
            <h5><strong>{{ $data['request']->assistant_amount }} Auxiliares requeridos</strong></h5>
            <label for="">Horas academicas:</label>
            <h5><strong>{{ $data['request']->academic_hours }} Horas al Mes (Hrs/Mes)</strong></h5>
            <label for="">Código del requerimiento:</label>
            <h5 class="mb-5"><strong>{{ $data['request']->auxiliary_code }}</strong></h5>
            <div class="row">
                <div class="col-6 mb-1">
                    <label>Calificación de Conocimientos:</label>
                    <h4>{{ $data['request']->knowledgeDescription }}</h4>
                </div>
                <div class="col-6">
                    <button class="btn btn-outline-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#addTematica">
                        Añadir tematica
                    </button>
                </div>
                <div class="modal fade" id="addTematica" tabindex="-1" role="dialog" aria-labelledby="addTematicaModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Añadir tematica para la calificación de conocimientos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('addTematica', ['id' => $data['request']->announcement_id, 'requestId' => $data['request']->id]) }}">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="fcriterio" class="col-form-label">Temática:</label>
                                        <input type="text" class="form-control" id="idtematica" name="tematica">
                                    </div>
                                    <div class="form-group col-4 pl-0">
                                        <label for="fpuntaje" class="col-form-label">Puntaje:</label>
                                        <input type="number" class="form-control" id="idscore" name="scoreTematica">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger float-left" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-primary float-right">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @if(session('tematica_added'))
                <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
                    {{ session('tematica_added') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('tematica_added_error'))
                <div class="alert alert-danger alert-dismissible col-6 offset-md-3 text-center" role="alert">
                    {{ session('tematica_added_error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="col-md-12  mr-auto ml-auto">
                    <table class="table table-striped table-bordered table-hover table-responsive-xl">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Temática</th>
                                <th scope="col">Puntaje</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['requestTematicas'] as $index => $requestTematica)
                            <tr>
                                <th scope="row">{{ $index+1 }}</th>
                                <td>{{ $requestTematica->criteria }}</td>
                                <td>{{ $requestTematica->score }} puntos</td>
                                <td>
                                    <button class="btn btn-outline-danger my-2 my-sm-0">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection