@extends('layouts.app')

@section('title','Notice Create')

@section('content')
    <div class="row">
        <div class="container">
            @include('console.admin.common.errors')
            {!!Form::open(['route'=>'notice.store', 'method' => 'POST','files'=> true])!!}
                {{-- Ya no es necesario incorporar el csrf --}}
                @include('console.admin.notice.form')
        
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection