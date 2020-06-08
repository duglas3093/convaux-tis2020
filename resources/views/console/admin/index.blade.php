@extends('layouts.admin')
@section('title' , 'Console')
@section('content')
<div class="container">
    <div class="row">
        <div class="container">
            <h1 class="text-center">Bienvenido {{Auth::user()->name}}</h1>
        </div>
    </div>
</div>
@endsection