@extends('layouts.app')
@extends('layouts.datatable')

@section('content')
    <div class="card col-md-8 col-12 bg-black border border-danger mb-3 mx-auto">
        <div class="card-body border border-danger">
            <h5 class="card-title fw-bold text-uppercase pe-none text-danger">
                {{ $mascota->REGGAL }}
            </h5>
            <div class="row">
                <div class="col-lg-5  mb-3">
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div>{{ __('Name') }}: {{ $mascota->nombre }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Birthday') }}: {{ $mascota->fnac }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Weight') }}: {{ $mascota->sss }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Seal') }}: {{ $mascota->plc }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Colour') }}: {{ $mascota->plu }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Father') }}: {{ $mascota->pad }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Mother') }}: {{ $mascota->mad }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Disability') }}: {{ $mascota->des }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>{{ __('Observation') }}: {{ $mascota->obs }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 my-auto">
                    <div class="row">
                        <!-- Button Modal -->
                        <div class="col-4 border border-danger">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" alt="...">
                            </button>
                        </div>

                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle2">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 2)->first())) {{ asset($mascota->fotos->where('nfoto', 2)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" alt="...">
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle3">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 3)->first())) {{ asset($mascota->fotos->where('nfoto', 3)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" alt="...">
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle4">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 4)->first())) {{ asset($mascota->fotos->where('nfoto', 4)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" alt="...">
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle5">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 5)->first())) {{ asset($mascota->fotos->where('nfoto', 5)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" alt="...">
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle6">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 6)->first()->ruta)) {{ asset($mascota->fotos->where('nfoto', 6)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" alt="...">
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle7">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 7)->first())) {{ asset($mascota->fotos->where('nfoto', 7)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" alt="...">
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle8">
                                @if (!empty($mascota->videos->where('nvideo', 1)->first()))
                                    <video class="rounded img-fluid">
                                        <source src="{{ asset($mascota->videos->where('nvideo', 1)->first()->ruta) }}"
                                            type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('storage/img/pata.jpg') }}" class="rounded img-fluid" alt="...">
                                @endif
                            </button>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn" data-bs-toggle="modal"
                                data-bs-target="#exampleModalToggle9">
                                @if (!empty($mascota->videos->where('nvideo', 2)->first()->ruta))
                                    <video class="rounded img-fluid">
                                        <source src="{{ asset($mascota->videos->where('nvideo', 2)->first()->ruta) }}"
                                            type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('storage/img/pata.jpg') }}" class="rounded img-fluid" alt="...">
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- TABLE --}}
        <div class="card-footer border border-danger table-responsive">
            <label class="form-label fw-bold text-uppercase text-danger">{{ __('Last 10 participantions') }}</label>
            <table class="table table-sm table-dark table-hover" id="datatable">
                <thead>
                    <tr>
                        <th>{{ __('Opponent') }}</th>
                        <th>{{ __('Shed') }}</th>
                        <th>{{ __('Coliseum') }}</th>
                        <th>{{ __('Time') }}</th>
                        <th>{{ __('Result') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($duelos as $duelo)
                        <tr>
                            <td>
                                @if ($duelo->pmascota_id == $mascota->id)
                                    {{ $duelo->smascota->nombre }}
                                @elseif ($duelo->smascota_id == $mascota->id)
                                    {{ $duelo->pmascota->nombre }}
                                @endif
                            </td>
                            <td>{{ $duelo->cch }}</td>
                            <td>{{ $duelo->lparticipante->evento->coliseum->nombre }}</td>
                            <td>{{ $duelo->npelea }}</td>
                            <td class="table-active text-center">
                                @if ($duelo->result != $mascota->id)
                                    <div class="bg-danger">{{ __('Lose') }}</div>
                                @else
                                    <div class="bg-success">{{ __('Win') }}</div>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal 1-->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 1)->first()))
                        <form action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 1)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="1" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="foto" type="file" class=" form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('foto') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                                                                                                                                                                                                                                                                                                                                                                    "
                            class="figure-img" width="100%" height="250vh">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle9" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 2 -->
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 2)->first()))
                        <form action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 2)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="2" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="foto" type="file" class="form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('foto') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 2)->first())) {{ asset($mascota->fotos->where('nfoto', 2)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                                                                                                                                                                                                                                                                                                                                                                    "
                            class="figure-img" width="100%" height="250vh">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal 3 -->
    <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 3)->first()))
                        <form action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 3)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="3" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="foto" type="file" class="form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('foto') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 3)->first())) {{ asset($mascota->fotos->where('nfoto', 3)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                                                                                                                                                                                                                                                                                                                                                                    "
                            class="figure-img" width="100%" height="250vh">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle4" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal 4 --}}
    <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 4)->first()))
                        <form action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 4)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="4" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="foto" type="file" class="form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('foto') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 4)->first())) {{ asset($mascota->fotos->where('nfoto', 4)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                                                                                                                                                                                                                                                                                                                                                                    "
                            class="figure-img" width="100%" height="250vh">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle5" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL 5 --}}
    <div class="modal fade" id="exampleModalToggle5" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 5)->first()))
                        <form action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 5)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="5" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="foto" type="file" class="form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('foto') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 5)->first())) {{ asset($mascota->fotos->where('nfoto', 5)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                                                                                                                                                                                                                                                                                                                                                                    "
                            class="figure-img" width="100%" height="250vh">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle4" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle6" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL 6 --}}
    <div class="modal fade" id="exampleModalToggle6" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 6)->first()))
                        <form action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 6)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="6" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="foto" type="file" class="form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('foto') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 6)->first())) {{ asset($mascota->fotos->where('nfoto', 6)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                                                                                                                                                                                                                                                                                                                                                                    "
                            class="figure-img" width="100%" height="250vh">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle5" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle7" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL 7 --}}
    <div class="modal fade" id="exampleModalToggle7" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 7)->first()))
                        <form action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 7)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="7" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="foto" type="file" class="form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
                            @if ($errors->has('foto'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('foto') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 7)->first())) {{ asset($mascota->fotos->where('nfoto', 7)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                                                                                                                                                                                                                                                                                                                                                                    "
                            class="figure-img" width="100%" height="250vh">
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle6" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle8" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL 8 --}}
    <div class="modal fade" id="exampleModalToggle8" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->videos->where('nvideo', 1)->first()))
                        <form action="{{ route('mvideos.destroy', $mascota->videos->where('nvideo', 1)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR VIDEO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mvideos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nvideo" type="text" name="nvideo" value="1" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="video" type="file" class="form-control form-control-sm" name="video"
                                value="{{ old('video') }}" required autofocus accept=".mp4">
                            @if ($errors->has('video'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('video') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        @if (!empty($mascota->videos->where('nvideo', 1)->first()))
                            <video width="100%" height="250vh" autoplay controls>
                                <source src="{{ asset($mascota->videos->where('nvideo', 1)->first()->ruta) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('storage/img/pata.jpg') }}" class="figure-img" width="100%"
                                height="250vh">
                        @endif
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle7" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle9" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL-9 --}}
    <div class="modal fade" id="exampleModalToggle9" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->videos->where('nvideo', 2)->first()))
                        <form action="{{ route('mvideos.destroy', $mascota->videos->where('nvideo', 2)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR VIDEO --}}
                        <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                            action="{{ route('mvideos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nvideo" type="text" name="nvideo" value="2" hidden>
                            <input id="REGGAL" type="text" name="REGGAL" value="{{ $mascota->REGGAL }}" hidden>
                            <input id="text" type="text" name="text" value="xd" hidden>
                            <input id="mascota_id" type="text" name="mascota_id" value="{{ $mascota->id }}" hidden>
                            <input id="video" type="file" class="form-control form-control-sm" name="video"
                                value="{{ old('video') }}" required autofocus accept=".mp4">
                            @if ($errors->has('video'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('video') }}
                                </span>
                            @endif
                            <button type="submit" class="btn btn-danger">Editar</button>
                        </form>
                    @endif
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        @if (!empty($mascota->videos->where('nvideo', 2)->first()))
                            <video width="100%" height="250vh" autoplay controls>
                                <source src="{{ asset($mascota->videos->where('nvideo', 2)->first()->ruta) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset('storage/img/pata.jpg') }}" class="figure-img" width="100%"
                                height="250vh">
                        @endif
                        <figcaption class="figure-caption">A caption for the above image.</figcaption>
                    </figure>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle8" data-bs-toggle="modal">
                        Prev</button>
                    <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                        Next</button>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script type="text/javascript">
        $(document).ready(function() {
            function getLanguage() {
                var lang = $('html').attr('lang');
                if (lang == 'es') {
                    lng = "es-ES";
                } else if (lang == 'en') {
                    lng = "en-GB";
                }
                var result = null;
                var path = 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/';
                result = path + lng + ".json";
                return result;
            }
            // Build Datatable
            $('#datatable').DataTable({
                paging: false,
                info: false,
                language: {
                    "url": getLanguage()
                }
            });
        });
    </script>
@endsection
