@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
    <style>
        .carousel-inner img {
            width: 100%;
            height: 450px;
        }
    </style>
    
    <div id="slideConvAux" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slideConvAux" data-slide-to="0" class="active"></li>
            <li data-target="#slideConvAux" data-slide-to="1"></li>
            <li data-target="#slideConvAux" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="http://www.cs.umss.edu.bo/imagenes/imagen_secretaria.jpg" alt="Los Angeles" width="1100" height="500">  
            </div>
            <div class="carousel-item">
                <img src="http://www.cs.umss.edu.bo/imagenes/imagen_laboratorio.jpg" alt="Chicago" width="1100" height="500">  
            </div>
            <div class="carousel-item">
                <img src="http://www.cs.umss.edu.bo/imagenes/imagen_computo.jpg" alt="New York" width="1100" height="500">   
            </div>
        </div>
        <a class="carousel-control-prev" href="#slideConvAux" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#slideConvAux" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <hr>
    <div class="container">
        <h3 class="text-center">Avisos</h3>
        <div class="row">
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-3">
                <div class="grow">
                    <a href="#">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="https://www.infobae.com/new-resizer/nMLxx7qCukOvus3F9oqXJ8-kaa0=/750x0/filters:quality(100)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/53UHUZMEQVBWNPR7VPSOC6TWRY.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                Lorem ipsum dolor, voluptates minus aliquid! Perspiciatis!
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection