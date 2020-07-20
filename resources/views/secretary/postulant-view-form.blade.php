@extends('layouts.app')

@section('title', 'Convocatorias')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Documentos de Requisitos</h3>
    <div class="row">
        <div class="col-md-12 mr-auto ml-auto">
            <div class="col-8 offset-2 mt-3 mb-4">
                <h4 class="text-center">
                    Postulante: {{ $postulantDocuments[0]['postulant']->name }} {{ $postulantDocuments[0]['postulant']->last_name }}
                </h4>
            </div>
            <div class="col-1 mt-4 mb-4">
                <button class="btn btn-primary" onclick="window.location='{{ route('postulantsList', $postulantDocuments[0]['requirement']->announcement_id) }}'">
                    <i class="fa fa-arrow-left"></i>
                </button>
            </div>
            <table class="table table-striped table-hover table-responsive-xl">
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Nombre del documento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postulantDocuments as $index => $document)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $document['requirement']->title }}</td>
                        <td>{{ $document['filePath'] }}</td>
                        <td>
                            <form action="{{ route('openDocument', ['id' => $document['requirement']->announcement_id, 'userId' => $document['postulant']->id, 'fileName' => $document['filePath']] ) }}" method="POST">
                                {{ csrf_field() }}
                                <a target="_blank">
                                    <button class="btn btn-outline-primary" type="submit">
                                        Ver documento
                                    </button>
                                </a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-center pb-5 pt-4">
                <div class="col-4 text-center">
                    <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#rejectPostulation">
                        Rechazar
                    </button>
                </div>
                <div class="modal fade" id="rejectPostulation" tabindex="-1" role="dialog" aria-labelledby="rejectPostulationModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Indique porque se le esta rechazando al postulante</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{ route('rejectPostulation', ['id' => $postulantDocuments[0]['requirement']->announcement_id, 'userId' => $postulantDocuments[0]['postulant']->id, 'requestId' =>  $postulantDocuments[0]['request']->id] ) }}">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="fdescriptionReject" class="col-form-label">Descripción:</label>
                                        <textarea type="text" class="form-control" id="idrejectDescription" name="rejectDescription" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger float-left" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-outline-primary float-right">Rechazar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <form action="{{ route('allowPostulation', ['id' => $postulantDocuments[0]['requirement']->announcement_id, 'userId' => $postulantDocuments[0]['postulant']->id, 'requestId' =>  $postulantDocuments[0]['request']->id] ) }}" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-outline-primary float-left">Habilitar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- postulantDocuments --}}
</div>
@endsection
