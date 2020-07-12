@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if(session('error_error_allowed'))
            <div class="alert alert-danger alert-dismissible col-12 text-center" role="alert">
                {{ session('error_error_allowed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(session('error_successful_allowed'))
            <div class="alert alert-success alert-dismissible col-6 offset-md-3 text-center" role="alert">
                {{ session('error_successful_allowed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="col-md-6 col-xs-12">
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <img class="img-responsive" align="left" src="/images/logoCA.png" height="100px" alt="">
                            {{-- <img class="img-responsive ml-2" align="right" src="/images/UMSS.png" height="90px" alt="">
                            <img class="img-responsive mr-2" align="right" src="/images/fcyt.jpg" height="90px" alt=""> --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-left title-index">Convocatoria</h1><br>
                            <h1 class="ml-5 title-index">Auxiliares</h1>
                        </div>
                        <div class="col-md-12">
                            <p class="text-justify m-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus totam dolore iure qui blanditiis? Tenetur neque facere odit iure est optio quia blanditiis a dolores. Iusto quas ut ipsam cupiditate?</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12" style="background-image: url('/images/desk.jpg'); height: 635px;background-size: cover">
                 
            </div>
        </div>
    </div>
@endsection