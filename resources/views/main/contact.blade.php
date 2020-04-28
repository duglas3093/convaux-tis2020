@extends('layouts.app')
@section('title', 'Contacto')
    @section('content')
    <div class="container">
        <h3 class="text-uppercase text-center mt-3">contactanos</h3>
        <div class="row border border-dark mt-3 mb-3 rounded">
            <div class="col-md-4 mt-3 d-none d-sm-none d-md-block">
                <figure>
                    <img class="rounded" src="./images/img_contacto.jpg" width="100%" alt="">
                </figure>
            </div>
            <div class="col-md-8 col-sm-12 mt-3 mb-3">
                <form>
                    <div class="form-group">
                        <label for="fnombre">Nombre:</label>
                        <input type="text" class="form-control" id="idnombre">
                    </div>
                    <div class="form-group">
                        <label for="fCorreo">Correo:</label>
                        <input type="email" class="form-control" placeholder="nombre@ejemplo.com" id="idcorreo">
                    </div>
                    <div class="form-group">
                        <label for="fasunto">Asunto:</label>
                        <input type="text" class="form-control" id="idasunto">
                    </div>
                    <div class="form-group">
                        <label for="fcontenido">Contenido:</label>
                        <textarea class="form-control" id="idcontenido" rows="3"></textarea>
                    </div>
                    <p class="text-center"><input class="btn btn-primary btn-lange" type="submit" value="Enviar"></p>
                </form>
            </div>
        </div>
    </div>
@stop