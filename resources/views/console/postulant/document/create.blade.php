@extends('layouts.main')
@section('title', 'Document')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 class="text-center">Documentos para la Postulaci&oacute;n</h3>
                {!! Form::open(['route'=>'document.store', 'method' => 'POST','files'=> true]) !!}
                <table class="table table-striped mt-5">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">Auxliar de Laboratorio (Requisitos)</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Subir Documento</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <div class="form-group">
                          <td>{!! Form::label('carta_aux', 'Carta de Solicitud de Auxiliatura') !!}</td>
                          <td>Obligatorio</td>
                          <td>{!! Form::file('carta_aux', ['accept'=>'application/pdf']) !!}</td>{{--<i class="fas fa-plus-circle"></i>--}}
                        </div>
                      </tr>
                      <tr>
                        <td>{!! Form::label('kardex', 'Kardex de la Gestion I del anterior año') !!}</td>
                        <td>Obligatorio</td>
                        <td>{!! Form::file('kardex', ['accept'=>'application/pdf']) !!}</td>
                        {{-- <td class="text-center"><a href=""><i class="fas fa-plus-circle"></i></a></td> --}}
                      </tr>
                      <tr>
                        <td>{!! Form::label('certificado_estudiante','Certificado de Estudiante') !!}</td>
                        <td>Obligatorio</td>
                        <td>{!! Form::file('certificado_estudiante', ['accept'=>'application/pdf']) !!}</td>
                        {{-- <td class="text-center"><a href=""><i class="fas fa-plus-circle"></i></a></td> --}}
                      </tr>
                      <tr>
                        <td>{!! Form::label('ci','Fotocopia de carnet de identidad') !!}</td>
                        <td>Obligatorio</td>
                        <td>{!! Form::file('ci', ['accept'=>'application/pdf']) !!}</td>
                        {{-- <td class="text-center"><a href=""><i class="fas fa-plus-circle"></i></a></td> --}}
                      </tr>
                      <tr>
                        <td>{!! Form::label('certificado_biblioteca','Certificado de la Biblioteca') !!}</td>
                        <td>Obligatorio</td>
                        <td>{!! Form::file('certificado_biblioteca', ['accept'=>'application/pdf']) !!}</td>
                        {{-- <td class="text-center"><a href=""><i class="fas fa-plus-circle"></i></a></td> --}}
                      </tr>
                      <tr>
                        <td>{!! Form::label('curriculum','Curriculum Vitae') !!}</td>
                        <td>Obligatorio</td>
                        <td>{!! Form::file('curriculum', ['accept'=>'application/pdf']) !!}</td>
                        {{-- <td class="text-center"><a href=""><i class="fas fa-plus-circle"></i></a></td> --}}
                      </tr>
                      <tr>
                        <td>{!! Form::label('doc_resp_curriculum','Documentaci&oacute;n de respaldo (Curriculum Vitae)') !!}</td>
                        <td>Obligatorio</td>
                        <td>{!! Form::file('doc_resp_curriculum', ['accept'=>'application/pdf']) !!}</td>
                        {{-- <td class="text-center"><a href=""><i class="fas fa-plus-circle"></i></a></td> --}}
                      </tr>
                    </tbody>
                  </table>
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary ml-5 mr-5']) !!}
                    <a href="../console" class="btn btn-danger ml-5 mr-5">Cancelar</a>
                {!! Form::close() !!}
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection