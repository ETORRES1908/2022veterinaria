@extends('layouts.app')
@section('head')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-embedded.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-codes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-ie7-codes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-ie7.css') }}">
    {{-- STYLES --}}
    <style type="text/css">
        #html5lightbox-watermark {
            display: none !important;
        }

        .lightboxcontainer {
            width: 100%;
            height: 100%;
            text-align: left;
        }

    </style>
    {{-- SCRIPTS --}}
    <script src="{{ asset('css/lightbox/html5lightbox.js') }}"></script>
    <script src="{{ asset('css/lightbox/froogaloop2.min.js') }}"></script>
@endsection
@section('content')
    <div class="card bg-black">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-5 m-auto p-auto">
                    <div class="text-center">
                        <div class="mb-3">
                            <a href="{{ asset($user->foto) }}" class="html5lightbox">
                                <img class="img-fluid" src="{{ asset($user->foto) }}">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 my-auto">
                    <div class="row mb-3">
                        <div class="col-6 mb-3"><label class="col-form-label fw-bold"> {{ __('Username') }}</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        </div>
                        <div class="col-6 mb-3"><label class="col-form-label fw-bold"> {{ __('Email') }}</label>
                            <input type="text" class="form-control" value="{{ $user->email }}" readonly>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="col-form-label fw-bold">{{ __('Disability') }}</label>
                            <select class="form-control mb-3" disabled style="-webkit-appearance: none;">
                                <option value="No" @if ($user->discapacidad == 'No') selected @endif>
                                    {{ __('No') }}
                                </option>
                                <option value="Visual" @if ($user->discapacidad == 'Visual') selected @endif>
                                    {{ __('Visual') }}
                                </option>
                                <option value="Fisica" @if ($user->discapacidad == 'Fisica') selected @endif>
                                    {{ __('Physical') }}
                                </option>
                                <option value="Auditiva" @if ($user->discapacidad == 'Auditiva') selected @endif>
                                    {{ __('Auditory') }}</option>
                                <option value="Verbal" @if ($user->discapacidad == 'Verbal') selected @endif>
                                    {{ __('Verbal') }}
                                </option>
                                <option value="Mental" @if ($user->discapacidad == 'Mental') selected @endif>
                                    {{ __('Mental') }}
                                </option>
                            </select>
                        </div>

                        @if (isset($user->galpon))
                            <div class="col-6 mb-3"><label class="col-form-label fw-bold">{{ __('Shed') }}</label>
                                <input type="text" class="form-control" value="{{ $user->galpon }}" readonly>
                            </div>
                        @endif

                        <div class="col-4 mb-3"><label class="col-form-label fw-bold"> {{ __('Country') }}</label>
                            <input type="text" class="form-control" value="{{ $user->country }}" readonly>
                        </div>
                        <div class="col-4 mb-3"><label class="col-form-label fw-bold"> {{ __('State') }}</label>
                            <input type="text" class="form-control" value="{{ $user->state }}" readonly>
                        </div>
                        <div class="col-4 mb-3"><label class="col-form-label fw-bold"> {{ __('District') }}</label>
                            <input type="text" class="form-control" value="{{ $user->district }}" readonly>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($user->mascotas) > 0)
        <div class="card bg-black">
            <div class="card-body">
                <h1 class="text-center mb-3">{{ __('Pets') }}</h1>
                <div class="row">
                    @foreach ($mascotas as $mascota)
                        <div class="col-md-6">
                            <div class="card mb-3" style="background-color: #535353">
                                <div class="row g-0">
                                    <div class="col-md-6 m-auto p-auto">
                                        <a href="@if ($mascota->fotos->where('nfoto', 1)->first()->ruta != null) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }} @else {{ asset('storage/img/perro.jpg') }} @endif"
                                            class="html5lightbox" data-group="pets">
                                            <img src="@if ($mascota->fotos->where('nfoto', 1)->first()->ruta != null) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }} @else {{ asset('storage/img/perro.jpg') }} @endif"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title text-danger text-uppercase">{{ $mascota->nombre }}</h5>
                                            <p class="card-text">
                                                <strong>{{ __('Weight') }}:</strong> {{ $mascota->sss }}
                                            </p>
                                            <p class="card-text text-capitalize">
                                                <strong>{{ __('race') }}:</strong> {{ $mascota->raza }}
                                            </p>
                                            <p class="card-text text-capitalize">
                                                <strong>{{ __('Colour') }}:</strong> {{ $mascota->plu }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav>
                    <ul class="pagination">
                        <div class="d-flex ms-auto">
                            <li class="page-item @if ($mascotas->currentPage() == 1) disabled @endif">
                                <a class="page-link link-danger"
                                    href="{{ $mascotas->previousPageUrl() }}">{{ __('Prev') }}</a>
                            </li>
                            @for ($i = 1; $i <= $mascotas->lastPage(); $i++)
                                <li class="page-item">
                                    <a class="page-link link-danger @if ($i == $mascotas->currentPage()) text-white bg-danger pe-none @endif"
                                        href="{{ $mascotas->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item @if ($mascotas->currentPage() == $mascotas->lastPage()) disabled @endif">
                                <a class="page-link link-danger"
                                    href="{{ $mascotas->nextPageUrl() }}">{{ __('Next') }}</a>
                            </li>
                        </div>
                    </ul>
                </nav>
            </div>
        </div>
    @endif

@endsection
