<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Veterinaria</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="bg-black m-auto p-auto text-light">
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-black">
                <div class="container-fluid">

                    <!-- Branding Image -->
                    <a class="navbar-brand link-light fs-4" href="{{ url('/') }}">
                        <img src="{{ asset('storage/img/pata.jpg') }}" width="50"
                            class="d-inline-block align-text-middle rounded-circle border border-light">
                        Vet<strong>Vega De Villa</strong>
                    </a>

                    <!-- Collapsed Hamburger -->
                    <button class="navbar-dark navbar-toggler bg-dark" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Izquierdo Side Of Navbar -->
                        <ul class="navbar-nav bg-black me-auto mb-2 mb-lg-0">
                            &nbsp;
                        </ul>

                        <!-- Derecho Side Of Navbar -->
                        <ul class="navbar-nav bg-black ms-auto mb-2 mb-lg-0 fs-5">
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
                                {{-- EVENETOS --}}
                                <li class="nav-item">
                                    <a class="nav-link link-light @if (Route::is('Events.index')) fw-bolder @endif"
                                        href="{{ route('Events.index') }}">
                                        {{ __('Events') }}</a>
                                </li>
                                {{-- USERMENU --}}
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link dropdown-toggle link-light" href="#" id="navbarDropdown"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="caret m-1">
                                            {{ Auth::user()->nombre }}{{ Auth::user()->apellido }}
                                            <img src="{{ asset(Auth::user()->foto) }}" width="40vh" height="40vh"
                                                class="rounded-circle d-inline-block align-text-middle">
                                        </span>
                                    </a>

                                    <ul class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                                        <li>
                                            <p class="dropdown-item text-uppercase fw-bolder" display>
                                                {{ Auth::user()->Roles[0]->name }}
                                            </p>
                                        </li>
                                        @can('MyPets')
                                            <li>
                                                <a class="dropdown-item link-dark " href="{{ route('Mascotas.index') }}">
                                                    {{ __('My Pets') }}
                                                </a>
                                            </li>
                                        @endcan
                                        @can('Mantenimientos')
                                            <li>
                                                <a class="dropdown-item link-dark" href="{{ route('Usuarios.index') }}">
                                                    {{ __('Mantenimientos') }}
                                                </a>
                                            </li>
                                        @endcan
                                        <li>
                                            <a class="dropdown-item link-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container mt-2 overflow-hidden mx-auto">
            {{-- Contenido --}}
            @yield('content')
        </main>

        <footer class="container mt-5 overflow-hidden mx-auto">
            {{-- Pie de pagina --}}
            <div class="row ">
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
                <ul class="list-unstyled d-flex">
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
                </ul>
        </footer>
    </div>
</body>

</html>
