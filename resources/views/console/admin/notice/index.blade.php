@extends('layouts.app')
    @section('title', 'Notices')
    @section('content')
        <div class="row">
            <div class="container">
                <a class="btn btn-primary" href="/notice/create" style="margin-top: 5px;">Crear un nuevo aviso</a>
            </div>
            @foreach ($notices as $notice)
                <div class="col-sm-4">
                    <div class="card text-center" style="width: 18rem; margin-top:50px;">
                        <img style="height:150px; width:150px; background-color: #EFEFEF; margin: 20px" class="card-img-top mx-auto d-block" src="/images/{{$notice->image}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $notice->name }}</h5>
                            <p class="card-text">{{$notice->description}}</p>
                            <a href="/notice/{{$notice->slug}}" class="btn btn-primary">Ver más</a>
                            {{-- notices --}}
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>
    @endsection