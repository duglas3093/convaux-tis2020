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
                    @if (!Auth::guest() && Auth::user()->roles[0]->name == 'Admin')
                    <button class="btn btn-outline-info my-2 my-sm-0" onclick="window.location='{{ route('announcementsForm') }}'">Crear Convocatoria</button>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    @if (!Auth::guest() && Auth::user()->roles[0]->name == 'Admin')
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
    @endif
    @if (!Auth::guest() && Auth::user()->roles[0]->name == 'User_estudiante')
    <div class="row mt-4 mb-4">
        @foreach($data as $index => $announcement)
        @if ($announcement['announcement']->status == 'PUBLICADO')
        <div class="col-sm-4">
            <div class="card" style="min-height: 400px;">
                <div class="card-body">
                    <div class="card-header">
                        <h6><strong>{{ $announcement['announcementType'] }}</strong></h6>
                    </div>
                    <p class="card-text">{{ $announcement['announcement']->title }}</p>
                </div>
                <div class="text-center mb-4">
                    <button class="btn btn-outline-primary" onclick="window.location='{{ route('announcementView', $announcement['announcement']->id) }}'">
                        Ver mas
                    </button>
                </div>
                <div class="card-footer">
                    <small class="text-muted">
                        Disponible hasta el:
                    </small>
                    <small class="text-muted">
                        {{ $announcement['dates']->docs_presentation->format('j F, Y') }}
                    </small>
                </div>
            </div>
            <br>
        </div>
        @endif
        @endforeach
    </div>
    @endif
    @if (Auth::guest())
    <div class="row mt-4 mb-4">
        @foreach($data as $index => $announcement)
        @if ($announcement['announcement']->status == 'PUBLICADO')
        <div class="col-sm-4">
            <div class="card" style="min-height: 400px;">
                <div class="card-body">
                    <div class="card-header">
                        <h6><strong>{{ $announcement['announcementType'] }}</strong></h6>
                    </div>
                    <p class="card-text">{{ $announcement['announcement']->title }}</p>
                </div>
                <div class="text-center mb-4">
                    <button class="btn btn-outline-primary" onclick="window.location='{{ route('announcementView', $announcement['announcement']->id) }}'" disabled data-toggle="tooltip" data-placement="bottom" title="Debes registrate para ver la informacion de la convocatoria, y poder postularte.">
                        Ver mas
                    </button>
                </div>
                <div class="card-footer">
                    <small class="text-muted">{{ $announcement['announcement']->name }}</small>
                    @if ($announcement['announcement']->status == 'PUBLICADO')
                    <small class="text-muted float-right">VIGENTE</small>
                    @endif
                </div>
            </div>
            <br>
        </div>
        @endif
        @endforeach
    </div>
    @endif
</div>
@endsection
