@extends('layouts.app')
@section('title', 'Convocatorias')
@section('content')
<div class="container">
    <h3 class="text-center">Convocatorias</h3>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8"></div>
        <div class="col-md-2">
            <a href="#" class="btn btn-primary">Crear Convocatoria</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Gestion</th>
                                <th scope="col">Ver convocatoria</th>
                              </tr>
                            </thead>
                            <tbody class="border border-dark">
                              <tr>
                                <th scope="row">1</th>
                                <td>Convocatoria 1</td>
                                <td>Aux. para docencia</td>
                                <td>1/2020</td>
                                <td class="text-center"><a href="#" class="btn btn-outline-primary btn-sm">Ver más</a></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td>Convocatoria 2</td>
                                <td>Aux. de servicio</td>
                                <td>1/2020</td>
                                <td class="text-center"><a href="#" class="btn btn-outline-danger btn-sm">Ver más</a></td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection