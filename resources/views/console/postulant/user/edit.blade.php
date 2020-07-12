@extends('layouts.app')
@section('title', 'Postulant edit')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            {!! Form::model($postulant, ['route'=>['postulant.update',$postulant], 'method'=>'PUT', 'files']) !!}
            @include('console.postulant.user.form')
                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection