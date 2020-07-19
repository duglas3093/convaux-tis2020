@extends('layouts.app')

@section('title', 'Convocatorias')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Mis Postulaciones</h3>
    <div class="row">
        <div class="col-md-10 mt-5 mb-5 mr-auto ml-auto">
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
                        <td>
                            <button class="btn btn-outline-primary">
                                Ver postulacion
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
