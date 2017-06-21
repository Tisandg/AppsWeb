<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <title>AppRestaurante</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    {{ Html::style('bootstrap.css') }}
    {{ Html::style('assets/css/custom.min.css') }}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('head')
  </head>
  <body>

    <!-- Barra Superior-->
    <div class="navbar navbar-default navbar-fixed-top">

        <div class="navbar-header">
          <a class="navbar-brand" href="{{ url('/') }}">
              App Restaurante
          </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="collapse navbar-collapse" id="navbar-main">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->

                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Ingresar</a></li>
                    <li><a href="{{ route('register') }}">Registrarse</a></li>
                @else
                    
                    @if(!is_null(Auth::user()->profile))

                      @if( strcmp(Auth::user()->profile,'Administrador') == 0)
                        <li><a href="{{ route('ordenes') }}">Pedidos</a></li>
                        <li><a href="{{ route('indexUser') }}">Usuarios</a></li>
                        <li><a href="{{ route('indexProducto') }}">Productos</a></li>
                        <li><a href="{{ route('indexRequest') }}">Peticiones</a></li>
                      @endif

                      @if( strcmp(Auth::user()->profile,'Cocinero') == 0)
                        <li><a href="{{ route('ordenes') }}">Pedidos</a></li>
                      @endif

                      @if( strcmp(Auth::user()->profile,'Mesero') == 0)
                        <li>
                          <a href="{{ route('resumenOrder')}}">Revisar orden
                           <span class="badge">{{ Session::has('order') ? Session::get('order')->totalCantidad : ''}}</span>
                          </a>
                        </li>
                        <li><a href="{{ route('createOrder') }}">Tomar Pedidos</a></li>
                        <li><a href="{{ route('ordenes') }}">Estado Pedidos</a></li>
                      @endif

                    @endif

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a  href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); 
                                            document.getElementById('logout-form').submit();">
                                    Salir
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>

    </div>

    <div class="container">
      <div class="row">
        <div class="page-header">
          @include('layouts._errors')
        @include('layouts._mensages')
        @yield('content')
        </div>
      </div>
        
    </div>
    


    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
    {{ Html::script('assets/js/custom.js') }}
    
  
  </body>
</html>