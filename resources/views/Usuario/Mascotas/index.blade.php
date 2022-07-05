@extends('layouts.app')

@section('content')

    @if (session('mensaje'))
        <div class="alert alert-success text-uppercase">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="card bg-black">
        @can('addanimal')
            @if (count(Auth::user()->mascotas) < 200)
                <div class="mb-3">
                    <a href="{{ route('mascotas.create') }}" class="fw-bold text-uppercase btn btn-danger px-5">
                        {{ __('Add pet') }}
                    </a>
                </div>
            @endif
        @endcan

        <div class="card bg-black">
            <div class="card-body">
                <div class="row">
                    @foreach ($mascotas as $mascota)
                        <div class="col-md-6">
                            <div class="card border-dark mb-3" style="background-color:#3e3e3e">
                                <div class="row g-0">
                                    <div class="col-md-6 m-auto p-auto">
                                        <a href="{{ route('mascotas.show', $mascota->id) }}">
                                            <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                                @else
                                {{ asset('storage/img/pata.jpg') }} @endif"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('mascotas.show', $mascota->id) }}"
                                                    class="fw-bold text-decoration-none link-danger text-uppercase">{{ $mascota->REGANI }}
                                                </a>
                                            </h5>
                                            <p class="card-text text-capitalize"><strong>{{ __('Name') }}:</strong>
                                                {{ $mascota->nombre }}

                                            </p>
                                            <p class="card-text text-capitalize"><strong>{{ __('Birthday') }}:</strong>
                                                {{ $mascota->fnac }}

                                            </p>
                                            <p class="card-text text-capitalize"><strong>{{ __('gender') }}:</strong>
                                                {{ __($mascota->gender) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
