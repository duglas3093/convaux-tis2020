<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ConvAux - @yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> --}}

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <!-- menu -->
    <nav class="navbar navbar-expand-lg nav-background">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-layer-group" style="color: white"></i>
        </button>
        <div class="collapse navbar-collapse nav-font" id="navbarToggler">
            <ul class="navbar-nav mr-auto ml-5 mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Inicio</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/convocatorias">Convocatorias</a>
                </li>
                <li class="nav-item"><a href="/avisos" class="nav-link">Avisos</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="/contacto">Contacto</a>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto mt-2-mt-lg-0 ">
                <!-- Authentication Links -->
                 @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Iniciar Sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Registrarse</a></li>
                @else
                    <li class="dropdown nav-item">
                        <a class="nav-link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                            @if(!Auth::guest() && Auth::user()->roles[0]->name == 'Admin')
                            <small class="text-center p-0 m-0">administrador</small>
                            @endif
                            @if(!Auth::guest() && Auth::user()->roles[0]->name == 'User_secretary')
                            <small class="text-center p-0 m-0">secretaria</small>
                            @endif
                            @if(!Auth::guest() && Auth::user()->roles[0]->name == 'User_estudiante')
                            <small class="text-center p-0 m-0">Postulante</small>
                            @endif 
                            <i class="fa fa-angle-down" ></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li class="nav-item"><a class="nav-link" href="{{ url('/console') }}" style="color: black"><i class="far fa-window-maximize"></i>&nbsp;Consola</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/logout') }}" style="color: black"><i class="fa fa-arrow-circle-right"></i>&nbsp;Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    
    <!-- menu -->

{{-- sub-menu --}}
    <div class="subMenu">
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div class="sidebar">
            <header>Mi Consola</header>
            <ul>
                <li><a href="/postulant/{{ Auth::user()->id }}"><i class="fas fa-user-tie"></i>Mi Perfil</a></li>
                <li><a href="/convocatorias"><i class="fas fa-archive"></i>convocatorias</a></li>
                <li><a href="/index_cod"><i class="far fa-folder"></i>Postular</a></li>
                <li><a href="{{ route('postulationsList', Auth::user()->id) }}"><i class="far fa-folder-open"></i>Postulaciones</a></li>
                <li><a href="#"><i class="fas fa-envelope"></i>Contact</a></li>
            </ul>
        </div>
    </div>
{{-- sub-menu --}}

    @yield('content')

    
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
