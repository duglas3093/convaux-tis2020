@extends('layouts.admin')

@section('title','Calls Create')

@section('content')

    @include('common.errors')
    {!!Form::open(['route'=>'calls.store', 'method' => 'POST','files'=> true])!!}
        {{-- Ya no es necesario incorporar el csrf --}}
        @include('trainers.form')

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}

@endsection