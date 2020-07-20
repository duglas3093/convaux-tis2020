@extends('layouts.app')

@section('title', 'Convocatorias')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Mis Postulaciones</h3>
    <div class="row">
        <div class="col-md-10 mt-5 mb-5 mr-auto ml-auto">
            @if (count($data) > 0)
            <table class="table table-striped table-hover table-responsive-xl">
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Categoria Convocatoria</th>
                        <th scope="col">Item</th>
                        <th scope="col">Codigo del Item</th>
                        <th scope="col">Estado de postulacion</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $currentPostulation)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td class="m-auto">{{ $currentPostulation['announcementType']->name }}</td>
                        <td>{{ $currentPostulation['request']->auxiliary_name }}</td>
                        <td>{{ $currentPostulation['request']->auxiliary_code }}</td>
                        @if ($currentPostulation['postulation']->postulation_status == 'EN REVISION')
                        <td style="background: #fff3cd; color: #856404; font-size: 15px; padding-top: 20px;" class="text-center text-uppercase m-auto">
                            {{ $currentPostulation['postulation']->postulation_status }}
                        </td>
                        @endif
                        @if ($currentPostulation['postulation']->postulation_status == 'HABILITADO')
                        <td style="background: #d4edda; color: #155724; font-size: 15px; padding-top: 20px;" class="text-center">
                            {{ $currentPostulation['postulation']->postulation_status }}
                        </td>
                        @endif
                        @if ($currentPostulation['postulation']->postulation_status == 'RECHAZADO')
                        <td style="background: #f8d7da; color: #721c24; font-size: 15px; padding-top: 20px;" class="text-center">
                            {{ $currentPostulation['postulation']->postulation_status }}
                        </td>
                        @endif
                        @if ($currentPostulation['postulation']->rejected_description != 'empty')
                        <td>
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#seeReject">
                                Ver rechazo
                            </button>
                            <div class="modal fade" id="seeReject" tabindex="-1" role="dialog" aria-labelledby="seeRejectModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="seeRejectModalLabel">Fuiste rechazado debido a lo siguiente</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{ $currentPostulation['postulation']->rejected_description }}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        @endif
                        @if ($currentPostulation['postulation']->rejected_description == 'empty')
                        <td>
                            <button class="btn btn-outline-primary">
                                Ver postulacion
                            </button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
