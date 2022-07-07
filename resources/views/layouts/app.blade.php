<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Veterinaria</title>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    {{-- CSSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- BOOTSTRAPP ICONS --}}
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/vendor/font-awesome/css/all.min.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>

    {{-- Contenido --}}
    @yield('head')

</head>

{{-- CAMBIAR RETURN "FALSE" -> "TRUE"  PARA ACTIVAR SEGUNDO CLICK --}}

<body class="bg-black text-light" oncontextmenu="return false">
    <header>
        {{-- CABEZERA --}}
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-black">
            <div class="container-fluid">
                <!-- Branding Image -->
                <a class="navbar-brand link-light fs-4" href="{{ url('/') }}">
                    <img src="{{ asset('storage/img/pata.jpg') }}" width="50"
                        class="d-inline-block align-text-middle rounded-circle border border-light">
                    <strong>Veterinaria</strong>
                </a>

                <!-- Collapsed Hamburger -->
                <button class="navbar-dark navbar-toggler bg-dark" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Izquierdo Side Of Navbar -->
                    <ul class="navbar-nav bg-black me-auto mb-2 mb-2">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ app()->getLocale() }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('language', 'es') }}">Español</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('language', 'en') }}">English</a>
                                </li>
                            </ul>
                        </li>
                        @auth
                            {{-- FIND --}}
                            <li class="nav-item">
                                <a class="link-light text-capitalize nav-link @if (Route::is('findperson')) fw-bolder @endif"
                                    href="{{ route('findperson') }}">
                                    {{ __('searcher') }} <i class="bi bi-search"></i></a>
                            </li>
                        @endauth
                    </ul>

                    <!-- Derecho Side Of Navbar -->
                    <ul class="navbar-nav bg-black ms-auto text-nowrap mb-2">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="nav-item">
                                <a class="link-light nav-link @if (Route::is('login')) fw-bolder @endif"
                                    href="{{ route('login') }}">
                                    {{ __('Login') }}</a>
                            </li>
                        @else
                            {{-- HOME --}}
                            <li class="nav-item">
                                <a class="link-light nav-link @if (Route::is('welcome')) fw-bolder @endif"
                                    href="{{ route('welcome') }}">
                                    {{ __('Home') }}</a>
                            </li>

                            {{-- QUIENES SOMOS --}}
                            <li class="nav-item">
                                <a class="nav-link link-light @if (Route::is('about')) fw-bolder @endif"
                                    href="{{ route('about') }}">
                                    {{ __('About us') }}</a>
                            </li>

                            {{-- CONTACTENOS --}}
                            <li class="nav-item">
                                <a class="nav-link link-light @if (Route::is('contact')) fw-bolder @endif"
                                    href="{{ route('contact') }}">
                                    {{ __('Contact us') }}</a>
                            </li>

                            {{-- EVENTOS --}}
                            <li class="nav-item">
                                <a class="nav-link link-light @if (Route::is('events.index')) fw-bolder @endif"
                                    href="{{ route('events.index') }}">
                                    {{ __('Events') }}</a>
                            </li>

                            {{-- Pets --}}
                            @can('addanimal')
                                <li class="nav-item">
                                    <a class="nav-link link-light @if (Route::is('mascotas.index')) fw-bolder @endif"
                                        href="{{ route('mascotas.index') }}">
                                        {{ __('Pets') }}</a>
                                </li>
                            @endcan

                            {{-- CMS --}}
                            @can('cms')
                                <li class="nav-item">
                                    <a class="nav-link link-light @if (Route::is('usuarios.index')) fw-bolder @endif"
                                        href="{{ route('usuarios.index') }}">
                                        {{ __('CMS') }}
                                    </a>
                                </li>
                            @endcan

                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    {!! csrf_field() !!}
                                    {{-- LOGOUT --}}
                                    <a class="nav-link link-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </form>
                            </li>

                            {{-- USERMENU --}}
                            <li class="nav-item">
                                <a class="nav-link link-light"
                                    @can('profile') href="{{ route('profile.index') }}" @endcan>
                                    {{ Auth::user()->nombre }} {{ Auth::user()->apellido }}
                                    <img src="{{ asset(Auth::user()->foto) }}" width="30vh" height="30vh"
                                        class="rounded-circle d-inline align-text-middle">

                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container my-5 overflow-hidden mx-auto">
        <div class="mt-5">
            {{-- Contenido --}}
            @yield('content')
        </div>
    </main>

    <footer class="container overflow-hidden mx-auto">
        <hr class="featurette-divider">
        {{-- Pie de pagina --}}
        <div class="row">
            <div class="col">
                <p class="text-center">
                    <img src="{{ asset('storage/img/dog.jpg') }}" width="250" height="100">
                </p>
                <p class="h6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor pelican incididunt ut
                    labore et dolore magna aliqua.
                </p>
                <p class="text-decoration-none">
                    <i class="bi bi-facebook link-primary fs-3"></i>
                    <i class="bi bi-instagram link-danger fs-3"></i>
                    <i class="bi bi-twitter link-info fs-3"></i>
                    <i class="bi bi-linkedin link-primary fs-3"></i>
                </p>
            </div>

            <div class="col">
                <h5>{{ __('Direction') }}</h5>
                <ul class="list-group">
                    <li class="list-group-item bg-black text-white">
                        {{ __('Direction') }}: Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </li>
                    <li class="list-group-item bg-black text-white">
                        {{ __('Email') }}: Lorem ipsum dolor sit amet, consectetur adipiscing elit
                    </li>
                    <li class="list-group-item bg-black text-white">
                        {{ __('Phone') }}: +51 980251639
                    </li>
                </ul>
            </div>

            <div class="col">
                <h5>Section</h5>
                <ul class="list-group">
                    <li class="list-group-item bg-black"><a href="#" class="link-light nav-link p-0">Home</a></li>
                    <li class="list-group-item bg-black"><a href="#" class="link-light nav-link p-0">Features</a>
                    </li>
                    <li class="list-group-item bg-black"><a href="#" class="link-light nav-link p-0">Pricing</a>
                    </li>
                    <li class="list-group-item bg-black"><a href="#" class="link-light nav-link p-0">FAQs</a></li>
                    <li class="list-group-item bg-black"><a href="#" class="link-light nav-link p-0">About</a></li>
                </ul>
            </div>
        </div>
        <div class="py-4 my-4 border-top border-light text-center">
            <p>© 2021 Company, Inc. Todos los derechos reservados.</p>
            {{-- <ul class="list-unstyled d-flex">
                <li class="ms-0 mx-auto">
                    <a class="link-light nav-link" href="#">
                        Authentication
                    </a>
                </li>
                <li class="mx-auto">
                    <a class="link-light nav-link" href="#">
                        Authentication
                    </a>
                </li>
                <li class="me-0 mx-auto">
                    <a class="link-light nav-link" href="#">
                        Authentication
                    </a>
                </li>
            </ul> --}}
    </footer>

</body>

</html>
