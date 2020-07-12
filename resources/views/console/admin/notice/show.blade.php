@extends('layouts.app')
    @section('title', 'Notice')
        @section('content')
            @include('console.admin.common.success')
            <img style="height:200px; width:200px; background-color: #EFEFEF; margin: 20px" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{ $notice->image }}" alt="">
            <div class="text-center">
                <h5 class="card-title">{{ $notice->name }}</h5>
                <p>{{ $notice->description }}</p>
                <a href="/notice/{{ $notice->slug }}/edit" class="btn btn-primary">Editar</a>
                {!! Form::open(['route'=>['notice.destroy', $notice->slug], 'method'=>'DELETE']) !!}
                    {!! Form::submit('Eliminar',['class'=>'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        @endsection