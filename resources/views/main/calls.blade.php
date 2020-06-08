@extends('layouts.app')

@section('title', 'Convocatorias')
@section('content')
    <div class="contianer">
        <h3 class="text-center mt-3">Convocatorias</h3>
        <div class="row">
            <div class="col-md">
                <nav class="navbar navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                            <a class="nav-link" href="#">Ultimas Convocatorias</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="#">Ver Todas las Convocatorias</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Codigo de convocatoria" aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Buscar</button>
                            <button class="btn btn-outline-info my-2 my-sm-0" onclick="window.location='{{ route('announcementsForm') }}'">Crear Convocatoria</button>
                        </form>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-5 mb-5 mr-auto ml-auto">
                <table class="table table-hover table-responsive-xl">
                    <thead>
                      <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Disponible desde:</th>
                        <th scope="col">Disponible hasta:</th>
                        <th scope="col">Ver Convocatoria</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Convocatoria a auxiliar 2020-2021</td>
                        <td>Auxiliar de pisarra</td>
                        <td>21/05/2020</td>
                        <td>31/05/2020</td>
                        <td><a href="#">Ver pdf Convocatoria</a></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Convocatoria a labororatorio de computo 2020</td>
                        <td>Auxiliar de servicios</td>
                        <td>30/05/2020</td>
                        <td>15/06/2020</td>
                        <td><a href="#">Ver pdf Convocatoria</a></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection