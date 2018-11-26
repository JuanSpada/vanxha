<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    
    @yield('head')
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


</head>
<body class="d-flex flex-column justify-content-between">
    <div>
        <div class="container-fluid d-flex flex-column">
            
            <nav class="row navbar navbar-expand-md navbar-light navbar-laravel border">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Vanxa') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    @if (Route::has('register'))
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    @endif
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>
                                    
                                    

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="/perfil" class="dropdown-item"><i class="fas fa-user-alt"></i> Mi Perfil</a>

                                        <a href="/empresa" class="dropdown-item"><i class="fas fa-building"></i> Mi Empresa</a>

                                        <a href="/configuracion" class="dropdown-item"><i class="fas fa-cog"></i> Configuración</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Log Out
                                        </a>
    
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
            </nav>
            <div class="row">
                <div class="col-md-2 border side-bar">
                    <nav class="sidebar">
                        <ul class="nav nav-pills nav-fill">
                            <li class="nav-item">
                                <a class="nav-link text-white btn btn-secondary" href="/informe">
                                    <i class="fas fa-chart-pie"></i>
                                    <span>Informe</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white btn btn-secondary" href="/pedidos">
                                    <i class="fas fa-file-alt"></i>
                                    <span>Pedidos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white btn btn-secondary" href="/entregas">
                                    <i class="fas fa-truck"></i>
                                    <span>Entregas</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
    
                </div>
    
                <div class="col-md-10 d-flex justify-content-center">
                    
                    @yield('content')
    
                </div>
    
            </div>
            
        </div>
    </div>
        <div class="container-fluid row bg-white">
            <footer class="col-12 text-center">
                <p>Sistema de ventas.</p>
            </footer>
        </div>
    
    
</body>
</html>
