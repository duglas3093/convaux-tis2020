@extends('layouts.app')
@section('title', 'Registrarse')
@section('content')
<div class="container">
    <div class="row rounded mt-3 mb-3">
        <div class="col-md-5 d-none d-sm-none d-md-block mt-4">
            <figure>
                <img class="rounded" src="./images/est_register.png" alt="" width="100%">
            </figure>
        </div>
        <div class="col-md-7 col-xs-12">
            <div class="card card-default rounded">
                <div class="card-heading mt-3"><h3 class="text-center">Registra tus datos</h3></div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
    
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombre(s)">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Apellido_Paterno Apellido_Materno">

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ci') ? ' has-error' : '' }}">
                            <!-- <label for="ci" class="col-md-4 control-label">C.I.</label> -->

                            <div class="col-md-12">
                                <input id="ci" type="text" class="form-control" name="ci" value="{{ old('ci') }}" maxlength="8" placeholder="Número de carnet">
                                @if($errors->has('ci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- Todo esto nose por que no sirve el error -->
                        <div class="form-group{{ $errors->has('expedido') ? ' has-error' : '' }}">
                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <select class="custom-select form-control" id="expedido" name="expedido" value="{{ old('expedido') }}">
                                        <option selected>Expedido en...</option>
                                        <option value="1">Beni (BNI)</option>
                                        <option value="2">Chuquisaca (CHQ)</option>
                                        <option value="3">Cochabamba (CBBA)</option>
                                        <option value="4">La Paz(LPZ)</option>
                                        <option value="5">Oruro (ORU)</option>
                                        <option value="6">Pando (PND)</option>
                                        <option value="7">Potosi(PSI)</option>
                                        <option value="8">Santa Cruz(SCZ)</option>
                                        <option value="9">Tarija (TJA)</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="expedido">Departamentos</label>
                                    </div>
                                    @if($errors->has('expedido'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('expedido') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
<!-- Todo esto nose por que no sirve el error -->
                        <div class="form-group{{ $errors->has('cod_sis') ? ' has-error' : '' }}">
                            <!-- <label for="cod_sis" class="col-md-4 control-label">Codigo sis</label> -->

                            <div class="col-md-12">
                                <input id="cod_sis" type="cod_sis" class="form-control" name="cod_sis" value="{{ old('cod_sis') }}" placeholder="Codigo sis">

                                @if ($errors->has('cod_sis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cod_sis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('carrera') ? ' has-error' : '' }}">
                            <!-- <label for="carrera" class="col-md-4 control-label">Carrera</label> -->

                            <div class="col-md-12">
                                <div class="input-group mb-3">
                                    <select class="custom-select form-control" id="carrera" name="carrera" value="{{ old('carrera') }}">
                                        <option selected>Carrera...</option>
                                        <option value="0">Ingeniería Eléctrica</option>
                                        <option value="1">Ingeniería Electrónica</option>
                                        <option value="2">Ingeniería Mecánica</option>
                                        <option value="3">Ingeniería Electromecánica</option>
                                        <option value="4">Ingeniería Industrial</option>
                                        <option value="5">Ingeniería Civil</option>
                                        <option value="6">Ingeniería Matemática</option>
                                        <option value="7">Ingeniería Informática</option>
                                        <option value="8">Ingeniería de Sistemas</option>
                                        <option value="9">Ingeniería de Alimentos</option>
                                        <option value="10">Ingeniería Química</option>
                                        <option value="11">Licenciatura en Química</option>
                                        <option value="12">Licenciatura en Biología</option>
                                        <option value="13">Licenciatura en Matemáticas</option>
                                        <option value="14">Licenciatura en Física</option>
                                        <option value="15">Licenciatura en Didáctica de la Física</option>
                                    </select>
                                    <div class="input-group-append">
                                        <label class="input-group-text" for="carrera">Carrera</label>
                                    </div>
                                    @if($errors->has('carrera'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('carrera') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Dirección de correo electrónico">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <!-- <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label> -->

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar contraseña">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 col-xs-12 mr-5 ml-5">
                                <button type="submit" class="btn btn-success text-center col-md-12">
                                    <i class="fa fa-btn fa-user"></i> Registrase
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
