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
    <script src="{{ asset('js/app.js')}}"></script>

</head>

<body class="bg-white mx-0 px-0">
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <div class="container-fluid">

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ url('storage/img/pata.jpg') }}" alt="..." class="image-fluid" width="50vh">
                        Vet<strong>Vega De Villa</strong>
                    </a>

                    <!-- Collapsed Hamburger -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Izquierdo Side Of Navbar -->
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            &nbsp;
                        </ul>

                        <!-- Derecho Side Of Navbar -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li class="nav-item">
                                <a class="nav-link 
                                @if (Route::is('login'))
                                fw-bolder
                                @endif" href="{{ route('login') }}">
                                    {{ __('Login')}}</a>
                            </li>
                            @else
                            {{-- HOME --}}
                            <li class="nav-item">
                                <a class="nav-link 
                                    @if (Route::is('welcome'))
                                        fw-bolder
                                    @endif" href="{{ route('welcome') }}">
                                    {{ __('Home')}}</a>
                            </li>
                            {{-- QUIENES SOMOS --}}
                            <li class="nav-item">
                                <a class="nav-link 
                                @if (Route::is('about'))
                                       fw-bolder
                                 @endif" href="{{ route('about') }}">
                                    {{ __('About us')}}</a>
                            </li>
                            {{-- CONTACTENOS --}}
                            <li class="nav-item">
                                <a class="nav-link
                                    @if (Route::is('contact'))
                                        fw-bolder
                                    @endif" href="{{ route('contact') }}">
                                    {{ __('Contact us')}}</a>
                            </li>
                            {{-- USERMENU --}}
                            <li class="nav-item dropdown me-5">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="caret">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</span>
                                </a>

                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <p class="dropdown-item text-uppercase fw-bolder" display>
                                            {{ Auth::user()->Roles[0]->name}}
                                        </p>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('home') }}">
                                            {{ __('My interface')}}
                                        </a>
                                    </li>
                                    @can('Mantenimientos')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('Usuarios.index') }}">
                                            {{ __('Mantenimientos')}}
                                        </a>
                                    </li>
                                    @endcan
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout')}}
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

        <main class="container-sm pt-2 overflow-hidden">
            {{-- Contenido --}}
            @yield('content')
        </main>

        <footer class="container-sm pt-5 overflow-hidden">
            {{-- Pie de pagina --}}
            <div class="row">
                <div class="col">
                    <h5>Section</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Features</a>
                        </li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h5>Section</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Features</a>
                        </li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>

                <div class="col">
                    <h5>Section</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Features</a>
                        </li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                        <li class="list-group-item"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                    </ul>
                </div>
            </div>
            <div class="py-4 my-4 border-top text-center">
                <p>© 2021 Company, Inc. Todos los derechos reservados.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-0 mx-auto">
                        <a class="link-light nav-link text-muted" href="#">
                            Authentication
                        </a>
                    </li>
                    <li class="mx-auto">
                        <a class="link-light nav-link text-muted" href="#">
                            Authentication
                        </a>
                    </li>
                    <li class="me-0 mx-auto">
                        <a class="link-light nav-link text-muted" href="#">
                            Authentication
                        </a>
                    </li>
                </ul>
        </footer>
    </div>
</body>

</html>