@extends('layouts.app')
@section('title', 'Iniciar Sesión')
@section('content')
<div class="container">
    <div class="row  rounded mt-3 mb-3">
        <div class="col-md-5 d-none d-sm-none d-md-block">
            <figure>
                <img class="rounded" src="./images/est_login.jpg" alt="" width="100%">
            </figure>
        </div>
        <div class="col-md-7 col-xs-12">
            <div class="card card-default ">
                <div class="card-heading mt-3"><h3 class="text-center">Iniciar sesión</h3></div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Dirección de correo electrónico">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-right">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-10 col-xs-12 col-md-offset-4 mr-5 ml-5">
                                <button type="submit" class="btn btn-primary col-md-12">
                                    <i class="fa fa-btn fa-sign-in"></i> Iniciar Sesión
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-10 col-xs-12 mr-5 ml-5">
                            <h3 class="text-center">¿Aún no tienes cuenta?</h3>
                                <a class="btn btn-success col-md-12" href="{{ url('/register') }}">Registrate</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

