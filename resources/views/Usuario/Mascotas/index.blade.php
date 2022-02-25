@extends('layouts.app')

@section('content')
    <div class="mx-auto w-75">
        <div class="mb-5">
            <a href="{{ route('Mascotas.create') }}" class="fw-bold text-uppercase btn btn-outline-danger px-5">
                Añadir Mascota
            </a>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 g-4">
            @foreach ($mascotas as $mascota)
                <div class="col">
                    <div class="card border-dark mb-3">
                        <div class="row g-0">
                            <div class="col-md-4 my-auto">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                                @else
                                {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('Mascotas.show', $mascota->id) }}"
                                            class="fw-bold nav-link link-danger text-uppercase">{{ $mascota->REGGAL }}
                                        </a>
                                    </h5>
                                    <div class="card-text">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div>Nombre: {{ $mascota->nombre }}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <div>Nacimiento: {{ $mascota->fnac }}</div>
                                            </li>
                                            <li class="list-group-item">
                                                <div>Peso: {{ $mascota->sss }}</div>
                                            </li>
                                            {{-- <li class="list-group-item">PLU: {{$mascota->plu}}</li>
                                    <li class="list-group-item">PAD: {{$mascota->pad}}</li>
                                    <li class="list-group-item">MAD: {{$mascota->mad}}</li>
                                    <li class="list-group-item">DES: {{$mascota->des}}</li>
                                    <li class="list-group-item">OBS: {{$mascota->obs}}</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
