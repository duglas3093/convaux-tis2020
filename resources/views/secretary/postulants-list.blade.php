@extends('layouts.app')

@section('title', 'Convocatorias')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Lista de postulantes</h3>
    <div class="row">
        <div class="col-md-12 mr-auto ml-auto">
            <h6 class="text-center text-uppercase font-weight-bold mt-2">A Convocatoria:</h6>
            <div class="col-8 offset-2 mt-3 mb-4">
                <h6 class="text-center">
                    {{ $postulations[0]['announcement']->title }}
                </h6>
            </div>
            @if (count($postulations) > 0)
            <table class="table table-striped table-hover table-responsive-xl">
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Postulante</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Requerimiento</th>
                        <th scope="col">Estado de postulacion</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($postulations as $index => $currentPostulation)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $currentPostulation['postulant']->name }} {{ $currentPostulation['postulant']->last_name }}</td>
                        <td>{{ $currentPostulation['postulant']->email }}</td>
                        <td class="text-uppercase">{{ $currentPostulation['request']->auxiliary_name }}</td>
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
                        <td>
                            <button class="btn btn-outline-primary">
                                Ver postulacion
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
