@extends('layouts.app')

@section('title', 'Convocatoria')
@section('content')
<div class="container">
    <h3 class="text-center mt-5">{{ $announcement['announcement']->title }}</h3>
    <div class="row mb-4">
        <!-- Mensajes para los Eventos -->        
        @if(session('set_dates_successful'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('set_dates_successful') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Mensajes para los Requisitos -->
        @if(session('set_requirement_successful'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('set_requirement_successful') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session('set_requirement_error'))
        <div class="alert alert-danger alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('set_requirement_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Mensajes para los Requerimientos -->
        @if(session('add_request_successful'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('add_request_successful') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(session('add_request_error'))
        <div class="alert alert-danger alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('add_request_error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="col-md-10 mt-5 mb-5 mr-auto ml-auto">
            <label for=""><strong>Nombre:</strong></label>
            <h6>{{ $announcement['announcement']->name }}</h6>
            <label for=""><strong>Gestión:</strong></label>
            <h6>{{ $announcement['management']->name }}</h6>
            <label for=""><strong>Categoría:</strong></label>
            <h6>{{ $announcement['announcementType']->name }}</h6>
            <label for=""><strong>Descripcion:</strong></label>
            <h6>{{ $announcement['announcement']->description }}</h6>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-fechas-tab" data-toggle="tab" href="#nav-fechas" role="tab" aria-controls="nav-fechas" aria-selected="true">Eventos</a>
                    <a class="nav-item nav-link" id="nav-requisitos-tab" data-toggle="tab" href="#nav-requisitos" role="tab" aria-controls="nav-requisitos" aria-selected="false">Requisitos</a>
                    <a class="nav-item nav-link" id="nav-requirimientos-tab" data-toggle="tab" href="#nav-requirimientos" role="tab" aria-controls="nav-requirimientos" aria-selected="false">Requerimientos</a>
                    <a class="nav-item nav-link" id="nav-calificaciones-tab" data-toggle="tab" href="#nav-calificaciones" role="tab" aria-controls="nav-calificaciones" aria-selected="false">Calificaciones</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-fechas" role="tabpanel" aria-labelledby="nav-fechas-tab">
                    <br>
                    @if ($announcement['dates'] == '')
                    <button class="btn btn-outline-primary my-2 my-sm-0 float-right" onclick="window.location='{{ route('announcementDates', $announcement['announcement']->id) }}'">
                        Fijar Evento
                    </button>
                    @else
                    <div class="row">
                        <div class="col-md-12  mr-auto ml-auto">
                            <table class="table table-striped table-hover table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">Número</th>
                                        <th scope="col">Evento</th>
                                        <th scope="col">Fecha</th>
                                        <th scope="col">Ubicación</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Publicación de la convocatoria</td>
                                        <td>{{ $announcement['dates']->publication_date }}</td>
                                        <td>En el Sistema</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Presentación de documentos</td>
                                        <td>{{ $announcement['dates']->docs_presentation }}</td>
                                        <td>{{ $announcement['dates']->docs_location }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Publicacion de los habilitados</td>
                                        <td>{{ $announcement['dates']->publication_of_enabled }}</td>
                                        <td>En el Sistema</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Presentación de reclamos</td>
                                        <td>{{ $announcement['dates']->claims_presentation }}</td>
                                        <td>{{ $announcement['dates']->claims_location }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Rol de pruebas</td>
                                        <td>{{ $announcement['dates']->phase_tests }}</td>
                                        <td>En el Sistema</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Publicacion de la resultados</td>
                                        <td>{{ $announcement['dates']->publication_results }}</td>
                                        <td>En el Sistema</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="tab-pane fade" id="nav-requisitos" role="tabpanel" aria-labelledby="nav-requisitos-tab">
                    <br>
                    <div class="row float-right">
                        <div class="col-12">
                            <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#addRequirement">
                                Añadir Requisito
                            </button>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="modal fade" id="addRequirement" tabindex="-1" role="dialog" aria-labelledby="addRequirementModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir requisito</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('announcementSetRequirement', $announcement['announcement']->id) }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="frequisito" class="col-form-label">Requisito:</label>
                                            <textarea type="text" class="form-control" id="idrequisito" name="requisitoDescripcion" rows="10"></textarea>
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
                    <div class="row">
                        <div class="col mr-auto ml-auto">
                            <table class="table table-striped table-hover table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Requisito</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcement['requirements'] as $index => $requirement)
                                    <tr>
                                        <th scope="row">{{ $index+1 }}</th>
                                        <td>{{ $requirement->description }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-requirimientos" role="tabpanel" aria-labelledby="nav-requirimientos-tab">
                    <br>
                    <button class="btn btn-outline-primary my-2 my-sm-0 float-right" onclick="window.location='{{ route('announcementRequests', $announcement['announcement']->id) }}'">
                        Añadir Requerimiento
                    </button>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col mr-auto ml-auto">
                            <table class="table table-striped table-hover table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Hrs. Academicas</th>
                                        <th scope="col">Nombre de auxiliatura</th>
                                        <th scope="col">Código de auxiliatura</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcement['requests'] as $index => $request)
                                    <tr>
                                        <th scope="row">{{ $index+1 }}</th>
                                        <td>{{ $request->assistant_amount }} Auxiliares</td>
                                        <td>{{ $request->academic_hours }} hrs/mes</td>
                                        <td>{{ $request->auxiliary_name }}</td>
                                        <td>{{ $request->auxiliary_code }}</td>
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

                <div class="tab-pane fade" id="nav-calificaciones" role="tabpanel" aria-labelledby="nav-calificaciones-tab">
                    <br>
                    <button class="btn btn-outline-primary my-2 my-sm-0 float-right">
                        Configurar tabla de Calificaciones
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection