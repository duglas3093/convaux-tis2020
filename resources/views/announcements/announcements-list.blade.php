@extends('layouts.app')

@section('title', 'Convocatorias')
@section('content')
<div class="container">
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
                    </form>
                    @if (!Auth::guest())
                    <button class="btn btn-outline-info my-2 my-sm-0" onclick="window.location='{{ route('announcementsForm') }}'">Crear Convocatoria</button>
                    @endif
                </div>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 mt-5 mb-5 mr-auto ml-auto">
            <table class="table table-hover table-responsive-xl">
                <thead>
                    <tr>
                        <th scope="col">Número</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Gestión</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ver Convocatoria</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $index => $announcement)
                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $announcement->name }}</td>
                        <td>{{ $announcement->announcementType->name }}</td>
                        <td>{{ $announcement->management->name }}</td>
                        <td>{{ $announcement->status }}</td>
                        <td>Hola</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection