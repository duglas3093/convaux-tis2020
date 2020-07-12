@extends('layouts.app')
@section('title', 'Notice edit')
@section('content')

{!! Form::model($notice, ['route'=>['notice.update',$notice], 'method'=>'PUT', 'files']) !!}
    @include('console.admin.notice.form')
    {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection