@extends('layouts.app')

@section('title', 'Convocatoria')
@section('content')
<div class="container" style="background-color: whitesmoke;">
    <h3 class="text-center pt-5">{{ $announcement['announcement']->title }}</h3>
    @if ($announcement['dates'] != null && $announcement['requirements'] != null && $announcement['requests'] != null && $announcement['knowledge'] != ' ' &&
    $announcement['knowledgeDetails'] != ' ' && $announcement['merit'] != ' ' && count($announcement['meritDetails']) > 0 && $announcement['announcement']->status == 'CREADO')
    <div class="col-md-11 mt-4 text-right">
        <form method="POST" action="{{ route('announcementPublish', $announcement['announcement']->id) }}">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary my-2 my-sm-0">
                PUBLICAR CONVOCATORIA
            </button>
        </form>

    </div>
    @endif
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
        <!-- Mensajes para la tabla de Conocimientos -->
        @if(session('set_knowledge_successful'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('set_knowledge_successful') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Mensajes para la tabla de Conocimientos -->
        @if(session('set_knowledge_detail_successful'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('set_knowledge_detail_successful') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!-- Mensajes para la tabla de Conocimientos -->
        @if(session('set_merit_successful'))
        <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
            {{ session('set_merit_successful') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="col-md-10 mt-4 mb-5 mr-auto ml-auto">
            <label for=""><strong>Codigo:</strong></label>
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
                    <a class="nav-item nav-link" id="nav-conocimientos-tab" data-toggle="tab" href="#nav-conocimientos" role="tab" aria-controls="nav-conocimientos" aria-selected="false">Conocimientos</a>
                    <a class="nav-item nav-link" id="nav-meritos-tab" data-toggle="tab" href="#nav-meritos" role="tab" aria-controls="nav-meritos" aria-selected="false">Méritos</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-fechas" role="tabpanel" aria-labelledby="nav-fechas-tab">
                    <br>
                    @if ($announcement['dates'] == '')
                    <button class="btn btn-outline-primary my-2 my-sm-0 float-right" onclick="window.location='{{ route('announcementDates', $announcement['announcement']->id) }}'">
                        Fijar Eventos
                    </button>
                    @else
                    <div class="row">
                        <div class="col-md-12  mr-auto ml-auto">
                            <table class="table table-striped table-bordered table-hover table-responsive-xl">
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
                            <table class="table table-striped table-bordered table-hover table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Requisito</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcement['requirements'] as $index => $requirement)
                                    <tr>
                                        <th scope="row">{{ $index+1 }}</th>
                                        <td>{{ $requirement->description }}</td>
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

                <!-- REQUERIMIENTOS -->
                <div class="tab-pane fade" id="nav-requirimientos" role="tabpanel" aria-labelledby="nav-requirimientos-tab">
                    <br>
                    <button class="btn btn-outline-primary my-2 my-sm-0 float-right" onclick="window.location='{{ route('announcementRequests', $announcement['announcement']->id) }}'">
                        Añadir Requerimiento
                    </button>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col mr-auto ml-auto">
                            <table class="table table-striped table-bordered table-hover table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">Item</th>
                                        <th scope="col">Cantidad de Auxiliares</th>
                                        <th scope="col">Horas Academicas</th>
                                        @if ($announcement['announcementType']->id == 1)
                                        <th scope="col">Destino o Materia</th>
                                        @else
                                        <th scope="col">Requerimiento</th>
                                        @endif
                                        <th scope="col">Código del requerimiento</th>
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
                                            @if ($announcement['announcementType']->id == 2)
                                            <button class="btn btn-outline-primary my-2 my-sm-0" onclick="window.location='{{ route('requestView', ['id' => $announcement['announcement']->id, 'requestId' => $request->id]) }}'" requestView>
                                                Ver mas
                                            </button>
                                            @endif
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

                <!-- CONOCIMIENTOS -->
                <div class="tab-pane fade" id="nav-conocimientos" role="tabpanel" aria-labelledby="nav-conocimientos-tab">
                    <br>
                    <div class="row float-right">
                        <div class="col-12">
                            @if ($announcement['knowledge'] == ' ' && $announcement['announcementType']->id == 1)
                            <button class="btn btn-outline-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#addConocimientoDetalle" disabled>
                                Configurar tabla de Conocimientos
                            </button>
                            @endif
                            @if ($announcement['knowledge'] != ' ' && $announcement['announcementType']->id == 1)
                            <button class="btn btn-outline-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#addConocimientoDetalle">
                                Configurar tabla de Conocimientos
                            </button>
                            @endif
                            @if ($announcement['knowledge'] == ' ')
                            <button class="btn btn-outline-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#addConocimiento">
                                Añadir Descripción
                            </button>
                            @endif
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="modal fade" id="addConocimiento" tabindex="-1" role="dialog" aria-labelledby="addConocimientoModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir descripción para la tabla de conocimientos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('announcementSetKnowledgeDescription', $announcement['announcement']->id) }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="fdescripcioncon" class="col-form-label">Descripción:</label>
                                            <textarea type="text" class="form-control" id="iddescripcioncon" name="descripcionConocimiento" rows="3"></textarea>
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
                    <div class="modal fade" id="addConocimientoDetalle" tabindex="-1" role="dialog" aria-labelledby="addConocimientoDetalleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir criterio para la calificación de conocimientos</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('announcementSetKnowledgeDetail', $announcement['announcement']->id) }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="fcriterio" class="col-form-label">Criterio:</label>
                                            <textarea type="text" class="form-control" id="idcriterio" name="criterioConocimiento" rows="3"></textarea>
                                        </div>
                                        <div class="form-group col-4 pl-0">
                                            <label for="fpuntaje" class="col-form-label">Puntaje:</label>
                                            <input type="number" class="form-control" id="idcriterio" name="puntajeConocimiento">
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
                    <div class="row mt-3 mb-3">
                        <div class="col-12">
                            <label><strong>Calificación de Conocimientos:</strong></label>
                            @if ($announcement['knowledge'] != ' ')
                            <h6>{{ $announcement['knowledge']->description }}</h6>
                            @endif
                            @if ($announcement['announcementType']->id == 2)
                            <label><strong>IMPORTANTE:</strong></label>
                            <h6 class="font-italic">Los criterios de calificacion se encuentran especificados en cada requerimiento de la convocatoria</h6>
                            @endif
                        </div>
                    </div>
                    @if ($announcement['announcementType']->id == 1)
                    <div class="row">
                        <div class="col-md-12  mr-auto ml-auto">
                            <table class="table table-striped table-bordered table-hover table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Criterio</th>
                                        <th scope="col">Puntaje</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($announcement['knowledgeDetails'] != ' ')
                                    @foreach ($announcement['knowledgeDetails'] as $index => $knowledgeDetails)
                                    <tr>
                                        <th scope="row">{{ $index+1 }}</th>
                                        <td>{{ $knowledgeDetails->criteria }}</td>
                                        <td>{{ $knowledgeDetails->score }}%</td>
                                        <td>
                                            <button class="btn btn-outline-danger my-2 my-sm-0">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- MERITOS -->
                <div class="tab-pane fade mb-3" id="nav-meritos" role="tabpanel" aria-labelledby="nav-meritos-tab">
                    <div class="row mt-4 float-right">
                        <div class="col-12">
                            @if ($announcement['merit'] != ' ')
                            <button class="btn btn-outline-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#addMeritDetail">
                                Configurar tabla de Meritos
                            </button>
                            @else
                            <button class="btn btn-outline-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#addMeritDetail" disabled>
                                Configurar tabla de Meritos
                            </button>
                            @endif
                            @if ($announcement['merit'] == ' ')
                            <button class="btn btn-outline-primary my-2 my-sm-0 float-right" data-toggle="modal" data-target="#addMerits">
                                Añadir Descripción
                            </button>
                            @endif
                        </div>
                    </div>
                    <div class="modal fade" id="addMerits" tabindex="-1" role="dialog" aria-labelledby="addMeritsModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir descripción para la tabla de MERITOS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('announcementSetMeritDescription', $announcement['announcement']->id) }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="fdescriptionMerit" class="col-form-label">Descripción:</label>
                                            <textarea type="text" class="form-control" id="idmeritDescription" name="meritDescription" rows="3"></textarea>
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
                    <div class="modal fade" id="addMeritDetail" tabindex="-1" role="dialog" aria-labelledby="addMeritDetailModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Añadir criterio para la tabla de MERITOS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" action="{{ route('announcementSetMeritDetail', $announcement['announcement']->id) }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="fmeritcategory" class="col-form-label">Categoria:</label>
                                                    <select class="form-control" name="meritCategory" id="idmeritcategory" onchange="hideSubcategories()">
                                                        <option>RENDIMIENTO ACADEMICO</option>
                                                        <option>EXPERIENCIA GENERAL</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <div class="subcategories" style="display: none;">
                                                        <label for="fsubcategorymerit" class="col-form-label">Sub Categoria:</label>
                                                        <select class="form-control" name="meritSubcategory" id="idmeritcategory">
                                                            @if ($announcement['announcementType']->id == 2)
                                                            <option>Documentos de experiencia en laboratorio</option>
                                                            <option>Produccion</option>
                                                            <option>Documentos de experiencia extrauniversitaria y capacitacion</option>
                                                            @else
                                                            <option>Documentos de experiencia universitaria</option>
                                                            <option>Documentos de experiencia extrauniversitaria</option>
                                                            @endif
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="fmeritCriteria" class="col-form-label">Criterio:</label>
                                            <textarea type="text" class="form-control" id="idmeritcriteria" name="meritCriteria" rows="3"></textarea>
                                        </div>
                                        <div class="form-group col-4 pl-0">
                                            <label for="fmeritscore" class="col-form-label">Puntaje:</label>
                                            <input type="number" class="form-control" id="idmeritsocre" name="meritScore">
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
                    <br>
                    <br>
                    <br>
                    <div class="row mb-3">
                        <div class="col-12">
                            <label><strong>Calificación de Meritos:</strong></label>
                            @if ($announcement['merit'] != ' ')
                            <h6>{{ $announcement['merit']->description }}</h6>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mr-auto ml-auto">
                            <table class="table table-striped table-bordered table-hover table-responsive-xl">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Categoría</th>
                                        <th scope="col">Sub Categoría</th>
                                        <th scope="col">Criterio</th>
                                        <th scope="col">Puntaje</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($announcement['meritDetails'] != ' ')
                                    @foreach ($announcement['meritDetails'] as $index => $meritDetail)
                                    <tr>
                                        <th scope="row">{{ $index+1 }}</th>
                                        <td>{{ $meritDetail->category }}</td>
                                        @if ($meritDetail->sub_category != null)
                                        <td>{{ $meritDetail->sub_category }}</td>
                                        @else
                                        <td></td>
                                        @endif
                                        <td>{{ $meritDetail->criteria }}</td>
                                        <td>{{ $meritDetail->score }} puntos</td>
                                        <td>
                                            <button class="btn btn-outline-danger my-2 my-sm-0">
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- @section('scripts') --}}
<script>
    function hideSubcategories() {
        var categoryName = document.getElementById('idmeritcategory').value;
        if (categoryName === "RENDIMIENTO ACADEMICO") {
            $('.subcategories').hide();
        } else {
            $('.subcategories').show();
        }
    }
</script>
{{-- @endsection --}}


@endsection