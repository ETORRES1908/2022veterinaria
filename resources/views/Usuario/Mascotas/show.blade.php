@extends('layouts.app')

@section('content')
    <div class="card col-md-8 col-sm-12 border-dark mb-3 mx-auto">
        <div class="row g-0">
            <div class="col-sm-5">
                <div class="card-body">
                    <h5 class="card-title fw-bold text-uppercase pe-none text-danger">
                        {{ $mascota->REGGAL }}
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
                                <div>SSS: {{ $mascota->sss }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>PLC: {{ $mascota->plc }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>PLU: {{ $mascota->plu }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>PAD: {{ $mascota->pad }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>MAD: {{ $mascota->mad }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>DES: {{ $mascota->des }}</div>
                            </li>
                            <li class="list-group-item">
                                <div>OBS: {{ $mascota->obs }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-7 my-auto">
                <div class="row">
                    <!-- Button Modal -->
                    <div class="col-4 mt-3">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle">
                            <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="rounded img-fluid border border-danger" alt="...">
                        </button>
                    </div>

                    <div class="col-4 mt-3">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle2">
                            <img src="@if (!empty($mascota->fotos->where('nfoto', 2)->first())) {{ asset($mascota->fotos->where('nfoto', 2)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif
                                                " class="rounded img-fluid" alt="...">
                        </button>
                    </div>
                    <div class="col-4 mt-3">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle3">
                            <img src="@if (!empty($mascota->fotos->where('nfoto', 3)->first())) {{ asset($mascota->fotos->where('nfoto', 3)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif
                                                " class="rounded img-fluid" alt="...">
                        </button>
                    </div>
                    <div class="col-4 mt-3">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle4">
                            <img src="@if (!empty($mascota->fotos->where('nfoto', 4)->first())) {{ asset($mascota->fotos->where('nfoto', 4)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif
                                                " class="rounded img-fluid" alt="...">
                        </button>
                    </div>
                    <div class="col-4 mt-3">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle5">
                            <img src="@if (!empty($mascota->fotos->where('nfoto', 5)->first())) {{ asset($mascota->fotos->where('nfoto', 5)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif
                                                " class="rounded img-fluid" alt="...">
                        </button>
                    </div>
                    <div class="col-4 mt-3">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle6">
                            <img src="@if (!empty($mascota->fotos->where('nfoto', 6)->first()->ruta)) {{ asset($mascota->fotos->where('nfoto', 6)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif
                                                " class="rounded img-fluid" alt="...">
                        </button>
                    </div>
                    <div class="col-4 mt-3">
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#exampleModalToggle7">
                            <img src="@if (!empty($mascota->fotos->where('nfoto', 7)->first())) {{ asset($mascota->fotos->where('nfoto', 7)->first()->ruta) }}
                        @else
                        {{ asset('storage/img/pata.jpg') }} @endif
                                                " class="rounded img-fluid" alt="...">
                        </button>
                    </div>
                    <div class="col-4 mt-3">
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
                    <div class="col-4 mt-3">
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


    <!-- Modal 1-->
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 1)->first()))
                        <form action="{{ route('MFotos.destroy', $mascota->fotos->where('nfoto', 1)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MFotos.store') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input id="nfoto" type="text" name="nfoto" value="1" hidden>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="figure-img" width="100%" height="250vh">
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
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 2)->first()))
                        <form action="{{ route('MFotos.destroy', $mascota->fotos->where('nfoto', 2)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MFotos.store') }}"
                            enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 2)->first())) {{ asset($mascota->fotos->where('nfoto', 2)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="figure-img" width="100%" height="250vh">
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
    <div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 3)->first()))
                        <form action="{{ route('MFotos.destroy', $mascota->fotos->where('nfoto', 3)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MFotos.store') }}"
                            enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 3)->first())) {{ asset($mascota->fotos->where('nfoto', 3)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="figure-img" width="100%" height="250vh">
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
    {{-- Modal 3 --}}
    <div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 4)->first()))
                        <form action="{{ route('MFotos.destroy', $mascota->fotos->where('nfoto', 4)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MFotos.store') }}"
                            enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 4)->first())) {{ asset($mascota->fotos->where('nfoto', 4)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="figure-img" width="100%" height="250vh">
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
    <div class="modal fade" id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 5)->first()))
                        <form action="{{ route('MFotos.destroy', $mascota->fotos->where('nfoto', 5)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MFotos.store') }}"
                            enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 5)->first())) {{ asset($mascota->fotos->where('nfoto', 5)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="figure-img" width="100%" height="250vh">
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
    <div class="modal fade" id="exampleModalToggle6" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 6)->first()))
                        <form action="{{ route('MFotos.destroy', $mascota->fotos->where('nfoto', 6)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MFotos.store') }}"
                            enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 6)->first())) {{ asset($mascota->fotos->where('nfoto', 6)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="figure-img" width="100%" height="250vh">
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
    <div class="modal fade" id="exampleModalToggle7" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->fotos->where('nfoto', 7)->first()))
                        <form action="{{ route('MFotos.destroy', $mascota->fotos->where('nfoto', 7)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR FOTO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MFotos.store') }}"
                            enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-auto">
                    <figure class="figure">
                        <img src="@if (!empty($mascota->fotos->where('nfoto', 7)->first())) {{ asset($mascota->fotos->where('nfoto', 7)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif
                                                    " class="figure-img" width="100%" height="250vh">
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
    <div class="modal fade" id="exampleModalToggle8" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->videos->where('nvideo', 1)->first()))
                        <form action="{{ route('MVideos.destroy', $mascota->videos->where('nvideo', 1)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR VIDEO --}}
                        <form class="d-flex justify-content-between" method="POST" action="{{ route('MVideos.store') }}"
                            enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    <div class="modal fade" id="exampleModalToggle9" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    @if (!empty($mascota->videos->where('nvideo', 2)->first()))
                        <form action="{{ route('MVideos.destroy', $mascota->videos->where('nvideo', 2)->first()) }}"
                            method="post">
                            {!! method_field('delete') !!}
                            {!! csrf_field() !!}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    @else
                        {{-- AÑADIR VIDEO --}}
                        <form class="d-flex justify-content-between" method="POST"
                            action="{{ route('MVideos.store') }}" enctype="multipart/form-data">
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

@endsection
