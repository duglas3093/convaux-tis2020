@extends('layouts.main')
@section('title','Verificación de codigo')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="text-center mb-5">
                    <img src="/images/user.png" alt="" class="rounded-circle" width="300px" height="300px">
                </div>
                <div class="text-center mb-5">
                    {!! Form::open(['route' => 'authcode.store', 'method' => 'POST']) !!}
                        <div class="form-group">
                            {!! Form::label('description','Ingrese su codigo') !!}
                            {!! Form::text('code',null,['class'=>'form-control']) !!}
                        </div>
                        {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection