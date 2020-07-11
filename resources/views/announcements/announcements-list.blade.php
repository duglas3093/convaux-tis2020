@extends('layouts.app')

@section('title', 'Convocatorias')
@section('content')
<div class="container">
    <h3 class="text-center mt-3">Convocatorias</h3>
    <div class="row">
        @if(session('exito_crear_conv'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('exito_crear_conv') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session('published_conv_successful'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('published_conv_successful') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
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
                    </form>
                    @if (!Auth::guest() && (Auth::user()->name == 'admin' || Auth::user()->name == 'admin'))
                    <button class="btn btn-outline-info my-2 my-sm-0" onclick="window.location='{{ route('announcementsForm') }}'">Crear Convocatoria</button>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-5 mb-5 mr-auto ml-auto">
            <table class="table table-striped table-hover table-responsive-xl">
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Código</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Gestión</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ver Convocatoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $announcement)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $announcement['announcement']->name }}</td>
                        <td>{{ $announcement['announcementType'] }}</td>
                        <td>{{ $announcement['management'] }}</td>
                        <td>{{ $announcement['announcement']->status }}</td>
                        <td>
                            <button class="btn btn-outline-primary" onclick="window.location='{{ route('announcementView', $announcement['announcement']->id) }}'">
                                Ver mas
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