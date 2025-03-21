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
    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif
    <div class="card bg-black border border-danger mb-3">
        <div class="card-body border border-danger">
            <h5 class="card-title fw-bold text-uppercase pe-none text-danger">
                REGANI: {{ $mascota->REGANI }}
            </h5>
            <form method="POST" class="text-uppercase" action="{{ route('mascotas.destroy', $mascota->id) }}">
                {!! method_field('delete') !!}
                {!! csrf_field() !!}
                <button type="submit" class="col btn btn-danger">{{ __('Delete') }}</button>
            </form>
            <div class="row">
                <div class="col-lg-6  mb-3">
                    <div class="card-text">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Name') }}:</strong> {{ $mascota->nombre }}</div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div class="text-capitalize"><strong>{{ __('race') }}:</strong>
                                    {{ __($mascota->raza) }}
                                </div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div class="text-capitalize"><strong>{{ __('gender') }}:</strong>
                                    {{ __($mascota->gender) }}
                                </div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Birthday') }}:</strong> {{ $mascota->fnac }}</div>
                            </li>
                            {{-- <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Weight') }}:</strong> {{ $mascota->sss }}</div>
                            </li> --}}
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Size') }}:</strong>
                                    <?php switch ($mascota->size) {
                                        case 'smll':
                                            echo __('Small');
                                            break;
                                        case 'mdm':
                                            echo __('Medium');
                                            break;
                                        case 'lrg':
                                            echo __('Large');
                                            break;
                                    } ?>
                                </div>
                            </li>
                            <li class="list-group-item bg-black text-white text-capitalize">
                                <div><strong>{{ __('plaque') }}:</strong> {{ $mascota->plc }}</div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Locker') }}:</strong> {{ $mascota->lck }}</div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Colour') }}:</strong> {{ $mascota->plu }}</div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Father') }}:</strong>
                                    @if ($pad)
                                        {{ $pad->REGANI }}
                                    @endif
                                </div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Mother') }}:</strong>
                                    @if ($mad)
                                        {{ $mad->REGANI }}
                                    @endif
                                </div>
                            </li>
                            <li class="list-group-item bg-black text-white">
                                <div><strong>{{ __('Disability') }}:</strong>
                                    <?php switch ($mascota->des) {
                                        case '0':
                                            echo __('No');
                                            break;
                                        case '1':
                                            echo __('Visual');
                                            break;
                                        case '2':
                                            echo __('Physical');
                                            break;
                                        case '3':
                                            echo __('Other');
                                            break;
                                    } ?>
                                    {{ $mascota->des }}
                                </div>
                            </li>
                            @if ($mascota->gender == 'female')
                                <li class="list-group-item bg-black text-white">
                                    <div><strong>{{ __('Incubation') }}:</strong> {{ $mascota->icbc }}</div>
                                </li>
                                <li class="list-group-item bg-black text-white">
                                    <div><strong>{{ __('Eggs') }}:</strong> {{ $mascota->hvs }}</div>
                                </li>
                                <li class="list-group-item bg-black text-white">
                                    <div><strong>{{ __('Born') }}:</strong> {{ $mascota->ncr }}</div>
                                </li>
                            @endif
                            <li class="list-group-item mb-3 bg-black text-white  border border-danger rounded">
                                <label class="form-label"><strong>{{ __('Vaccines') }}:</strong></label>
                                <div class="table-responsive">
                                    <table class="table text-white text-uppercase">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('Brand') }}</th>
                                                <th>{{ __('Dose') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mascota->vacunas as $vacuna)
                                                <tr>
                                                    <td>
                                                        {{ $vacuna->vcnsf }}
                                                    </td>
                                                    <td>
                                                        {{ $vacuna->vcnst }}
                                                    </td>
                                                    <td>
                                                        {{ $vacuna->vcnsm }}
                                                    </td>
                                                    <td>
                                                        {{ $vacuna->vcnsd }}
                                                    </td>
                                                    <td>
                                                        <form method="POST" class="text-uppercase"
                                                            action="{{ route('delete_vcns', $vacuna->id) }}">
                                                            {{ csrf_field() }}
                                                            <input type="submit" class="col btn btn-danger" value="-">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <form method="POST" action="{{ route('create_vcns') }}" autocomplete="off">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                        <div class="col-5">
                                            <input class=" form-control" type="date" name="vcnsf"
                                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-6 mb-2">
                                            <input class=" form-control" type="text" name="vcnst" pattern="[A-zÀ-ú1-9\S]+"
                                                maxlength="10" required placeholder="{{ __('Type') }}"
                                                onkeydown="return /[A-zÀ-ú1-9\S]/i.test(event.key)">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <input class=" form-control" type="text" name="vcnsm" pattern="[A-zÀ-ú\s]+"
                                                maxlength="10" required placeholder="{{ __('Brand') }}"
                                                onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <input class=" form-control" type="number" name="vcnsd" required
                                                placeholder="{{ __('Dose') }}"
                                                onKeyPress="if(this.value.length==2) return false;"
                                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189">
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" class="btn btn-success" value="+">
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="list-group-item bg-black mb-3 text-white  border border-danger rounded">
                                <label class="form-label"><strong>{{ __('Moves') }}</strong></label>
                                <div class="table-responsive">
                                    <table class="table text-white text-uppercase">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Time') }}</th>
                                                <th>{{ __('Type') }}</th>
                                                <th>{{ __('Result') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mascota->movidas as $movida)
                                                <tr>
                                                    <td>
                                                        {{ $movida->mvf }}
                                                    </td>
                                                    <td>
                                                        {{ $movida->mm }}
                                                    </td>
                                                    <td>
                                                        {{ $movida->mvtp }}
                                                    </td>
                                                    <td>
                                                        {{ __($movida->mvr) }}
                                                    </td>
                                                    <td>
                                                        <form method="POST" class="text-uppercase"
                                                            action="{{ route('delete_mvds', $movida->id) }}">
                                                            {{ csrf_field() }}
                                                            <input type="submit" class="col btn btn-danger" value="-">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <form method="POST" action="{{ route('create_mvds') }}" autocomplete="off">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                        <div class="col-6">
                                            <input class="form-control" type="date" name="mvf"
                                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-5 mb-2">
                                            <input class="form-control" type="number" name="mm" required
                                                placeholder="{{ __('00 min') }}"
                                                onKeyPress="if(this.value.length==2) return false;"
                                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <input class="form-control" type="text" name="mvtp" pattern="[A-zÀ-ú1-9\s]+"
                                                required placeholder="{{ __('Type') }}">
                                        </div>
                                        <div class="col-5 mb-2">
                                            <select name="mvr" class="form-select text-capitalize">
                                                <option value="good">
                                                    {{ __('good') }}</option>
                                                <option value="regular">
                                                    {{ __('regular') }}</option>
                                                <option value="bad">
                                                    {{ __('bad') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" class="btn btn-success" value="+">
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <li class="list-group-item bg-black mb-3 text-white  border border-danger rounded">
                                <div><strong>{{ __('Supplement') }}s:</strong></div>
                                <div class="table-responsive">
                                    <table class="table text-white text-uppercase">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Name') . ' ' . __('Supplement') }}</th>
                                                <th>{{ __('Date') }}</th>
                                                <th>{{ __('Time') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mascota->suplementos as $smpt)
                                                <tr>
                                                    <td>
                                                        {{ $smpt->nombre }}
                                                    </td>
                                                    <td>
                                                        {{ $smpt->fecha }}
                                                    </td>
                                                    <td>
                                                        {{ $smpt->time }}
                                                    </td>
                                                    <td>
                                                        <form method="POST" class="text-uppercase"
                                                            action="{{ route('delete_smpt', $smpt->id) }}">
                                                            {{ csrf_field() }}
                                                            <input type="submit" class="col btn btn-danger" value="-">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <form method="POST" action="{{ route('create_smpt') }}" autocomplete="off">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                        <div class="col-11 mb-2">
                                            <input class=" form-control" type="text" name="spmtname"
                                                pattern="[A-zÀ-ú1-9\s]+" maxlength="25" required
                                                placeholder="{{ __('New suplement') }}"
                                                onkeydown="return /[A-zÀ-ú1-9\s]/i.test(event.key)">
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" type="date" name="spmtfecha"
                                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                        </div>
                                        <div class="col-4">
                                            <input class="form-control" type="time" name="spmttime" required>
                                        </div>
                                        <div class="col-1">
                                            <input type="submit" class="btn btn-success" value="+">
                                        </div>
                                    </div>
                                </form>
                            </li>
                            <form class="text-uppercase" action="{{ route('mascotas.update', $mascota->id) }}"
                                method="POST" autocomplete="off">
                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}

                                <li class="list-group-item bg-black text-white">
                                    <div><strong>{{ __('SENASA') }}:</strong></div>
                                    <input class="form-control" type="text" name="sena" value="{{ $mascota->sena }}"
                                        pattern="[A-zÀ-ú1-9\s]+" maxlength="30"
                                        onkeydown="return /[A-zÀ-ú1-9\s]/i.test(event.key)">
                                </li>
                                <li class="list-group-item bg-black text-white">
                                    <div class="form-label"><strong>{{ __('Observations') }}:</strong><br>
                                        <textarea class="form-control" value="{{ old('obs') }}" name="obs" maxlength="200"
                                            rows="4">{{ $mascota->obs }}</textarea>
                                    </div>
                                </li>
                                <li class="list-group-item bg-black text-center">
                                    <input type="submit" class="btn btn-dark" value=" {{ __('Update') }}">
                                </li>
                            </form>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 h-100 text-uppercase">
                    <div class="row g-3 text-center">
                        <div class="col-12">
                            <div for="nombre" class="form-label fw-bold text-white">
                                {{ __('Photo Profile') }} {{ __('Pet') }}
                            </div>
                            <a href="#foto1" class="html5lightbox btn border border-danger" data-group="fotos">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" style="height: 10em;">
                            </a>
                            <div id="foto1" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute">
                                        @if (!empty($mascota->fotos->where('nfoto', 1)->first()))
                                            <form
                                                action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 1)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR FOTO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nfoto" type="text" name="nfoto" value="1" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="foto" type="file" class="form-control form-control-sm"
                                                    name="foto" value="{{ old('foto') }}" required autofocus
                                                    accept="image/*">
                                                <button type="submit" class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 3MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 1)->first())) {{ asset($mascota->fotos->where('nfoto', 1)->first()->ruta) }}
                                            @else
                                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div for="nombre" class="form-label fw-bold text-white">
                            {{ __('Photo') }}s
                        </div>
                        <div class="col-6">
                            <a href="#foto2" class="html5lightbox btn" data-group="fotos">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 2)->first())) {{ asset($mascota->fotos->where('nfoto', 2)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" style="height: 10em;">
                            </a>
                            <div id="foto2" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute">
                                        @if (!empty($mascota->fotos->where('nfoto', 2)->first()))
                                            <form
                                                action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 2)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR FOTO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nfoto" type="text" name="nfoto" value="2" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="foto" type="file" class="form-control form-control-sm"
                                                    name="foto" value="{{ old('foto') }}" required autofocus
                                                    accept="image/*">


                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 3MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 2)->first())) {{ asset($mascota->fotos->where('nfoto', 2)->first()->ruta) }}
                                            @else
                                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="#foto3" class="html5lightbox btn" data-group="fotos">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 3)->first())) {{ asset($mascota->fotos->where('nfoto', 3)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" style="height: 10em;">
                            </a>
                            <div id="foto3" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute">
                                        @if (!empty($mascota->fotos->where('nfoto', 3)->first()))
                                            <form
                                                action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 3)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR FOTO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nfoto" type="text" name="nfoto" value="3" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="foto" type="file" class="form-control form-control-sm"
                                                    name="foto" value="{{ old('foto') }}" required autofocus
                                                    accept="image/*">
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 3MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 3)->first())) {{ asset($mascota->fotos->where('nfoto', 3)->first()->ruta) }}
                                            @else
                                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="#foto4" class="html5lightbox btn" data-group="fotos">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 4)->first())) {{ asset($mascota->fotos->where('nfoto', 4)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" style="height: 10em;">
                            </a>
                            <div id="foto4" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute">
                                        @if (!empty($mascota->fotos->where('nfoto', 4)->first()))
                                            <form
                                                action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 4)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR FOTO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nfoto" type="text" name="nfoto" value="4" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="foto" type="file" class="form-control form-control-sm"
                                                    name="foto" value="{{ old('foto') }}" required autofocus
                                                    accept="image/*">
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 3MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 4)->first())) {{ asset($mascota->fotos->where('nfoto', 4)->first()->ruta) }}
                                            @else
                                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="#foto5" class="html5lightbox btn" data-group="fotos">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 5)->first())) {{ asset($mascota->fotos->where('nfoto', 5)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" style="height: 10em;">
                            </a>
                            <div id="foto5" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute">
                                        @if (!empty($mascota->fotos->where('nfoto', 5)->first()))
                                            <form
                                                action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 5)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR FOTO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nfoto" type="text" name="nfoto" value="5" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="foto" type="file" class="form-control form-control-sm"
                                                    name="foto" value="{{ old('foto') }}" required autofocus
                                                    accept="image/*">
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 3MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 5)->first())) {{ asset($mascota->fotos->where('nfoto', 5)->first()->ruta) }}
                                            @else
                                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="#foto6" class="html5lightbox btn" data-group="fotos">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 6)->first())) {{ asset($mascota->fotos->where('nfoto', 6)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" style="height: 10em;">
                            </a>
                            <div id="foto6" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute">
                                        @if (!empty($mascota->fotos->where('nfoto', 6)->first()))
                                            <form
                                                action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 6)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR FOTO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nfoto" type="text" name="nfoto" value="6" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="foto" type="file" class="form-control form-control-sm"
                                                    name="foto" value="{{ old('foto') }}" required autofocus
                                                    accept="image/*">
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 3MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 6)->first())) {{ asset($mascota->fotos->where('nfoto', 6)->first()->ruta) }}
                                            @else
                                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="#foto7" class="html5lightbox btn" data-group="fotos">
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 7)->first())) {{ asset($mascota->fotos->where('nfoto', 7)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="rounded img-fluid" style="height: 10em;">
                            </a>
                            <div id="foto7" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute">
                                        @if (!empty($mascota->fotos->where('nfoto', 7)->first()))
                                            <form
                                                action="{{ route('mfotos.destroy', $mascota->fotos->where('nfoto', 7)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR FOTO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mfotos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nfoto" type="text" name="nfoto" value="7" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="foto" type="file" class="form-control form-control-sm"
                                                    name="foto" value="{{ old('foto') }}" required autofocus
                                                    accept="image/*">
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('foto'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('foto') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 3MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <img src="@if (!empty($mascota->fotos->where('nfoto', 7)->first())) {{ asset($mascota->fotos->where('nfoto', 7)->first()->ruta) }}
                                            @else
                                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div for="nombre" class="form-label fw-bold text-white">
                            {{ __('Videos') }}
                        </div>
                        <div class="col-6">
                            {{-- VIDEO 1 --}}
                            <a href="#video1" class="html5lightbox btn" data-group="fotos">
                                @if (!empty($mascota->videos->where('nvideo', 1)->first()))
                                    <video class="rounded img-fluid" style="height: 10em;">
                                        <source src="{{ asset($mascota->videos->where('nvideo', 1)->first()->ruta) }}"
                                            type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('storage/img/pata.jpg') }}" class="rounded img-fluid"
                                        style="height: 10em;">
                                @endif
                            </a>
                            <div id="video1" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute fixed-top">
                                        @if (!empty($mascota->videos->where('nvideo', 1)->first()))
                                            <form
                                                action="{{ route('mvideos.destroy', $mascota->videos->where('nvideo', 1)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR VIDEO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mvideos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nvideo" type="text" name="nvideo" value="1" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="video" type="file" class="form-control form-control-sm"
                                                    name="video" value="{{ old('video') }}" required autofocus
                                                    accept=".mp4">
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('video'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('video') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 20MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if (!empty($mascota->videos->where('nvideo', 1)->first()))
                                    <video class="img-fluid" autoplay controls>
                                        <source src="{{ asset($mascota->videos->where('nvideo', 1)->first()->ruta) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ asset('storage/img/pata.jpg') }}" class="img-fluid">
                                @endif
                            </div>
                        </div>
                        <div class="col-6">
                            {{-- VIDEO 2 --}}
                            <a href="#video2" class="html5lightbox btn" data-group="fotos">
                                @if (!empty($mascota->videos->where('nvideo', 2)->first()))
                                    <video class="rounded img-fluid" style="height: 10em;">
                                        <source src="{{ asset($mascota->videos->where('nvideo', 2)->first()->ruta) }}"
                                            type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{ asset('storage/img/pata.jpg') }}" class="rounded img-fluid"
                                        style="height: 10em;">
                                @endif
                            </a>
                            <div id="video2" style="display:none;">
                                <div class="lightboxcontainer w-100 h-100">
                                    <div class="position-absolute fixed-top">
                                        @if (!empty($mascota->videos->where('nvideo', 2)->first()))
                                            <form
                                                action="{{ route('mvideos.destroy', $mascota->videos->where('nvideo', 2)->first()) }}"
                                                method="post">
                                                {!! method_field('delete') !!}
                                                {!! csrf_field() !!}
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            {{-- AGREGAR VIDEO --}}
                                            <form class="d-flex justify-content-between mt-3 w-75" method="POST"
                                                action="{{ route('mvideos.store') }}" enctype="multipart/form-data">
                                                {!! csrf_field() !!}
                                                <input id="nvideo" type="text" name="nvideo" value="2" hidden>
                                                <input id="REGANI" type="text" name="REGANI"
                                                    value="{{ $mascota->REGANI }}" hidden>
                                                <input id="text" type="text" name="text" value="xd" hidden>
                                                <input id="mascota_id" type="text" name="mascota_id"
                                                    value="{{ $mascota->id }}" hidden>
                                                <input id="video" type="file" class="form-control form-control-sm"
                                                    name="video" value="{{ old('video') }}" required autofocus
                                                    accept=".mp4">
                                                <button type="submit"
                                                    class="btn btn-danger">{{ __('Upload') }}</button>
                                            </form>
                                            @if ($errors->has('video'))
                                                <span class="text-danger fs-6">
                                                    {{ $errors->first('video') }}
                                                </span>
                                            @else{
                                                <span class="text-danger fs-6">
                                                    {{ __('Max file size') }} 20MB
                                                </span>
                                                }
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if (!empty($mascota->videos->where('nvideo', 2)->first()))
                                    <video class="img-fluid" autoplay controls>
                                        <source src="{{ asset($mascota->videos->where('nvideo', 2)->first()->ruta) }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <img src="{{ asset('storage/img/pata.jpg') }}" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- TABLE --}}
    <div class="border border-danger table-responsive">
        <label
            class="form-label fw-bold text-uppercase text-danger text-uppercase">{{ __('Last 20 participantions') }}</label>
        <table class="table table-sm table-dark table-hover fs-5 text-uppercase" id="datatable">
            <thead>
                <tr>
                    <th>{{ __('Deal') }}</th>
                    <th>{{ __('Shed') }}</th>
                    <th>{{ __('Coliseum') }}</th>
                    <th>{{ __('Time') }}</th>
                    <th>{{ __('Result') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($duelos as $duelo)
                    <tr class="my-auto">
                        <td>{{ str_replace('-', '', $duelo->evento->fechas[0]) . $duelo->evento->coliseum->country . $duelo->evento->coliseum->state . 'JUEZ' . $duelo->evento->judge->id }}
                        </td>
                        <td>
                            @if ($duelo->pmascota_id == $mascota->id)
                                {{ $duelo->smascota->nombre }}
                            @elseif ($duelo->smascota_id == $mascota->id)
                                {{ $duelo->pmascota->nombre }}
                            @endif
                        </td>
                        <td>{{ $duelo->evento->coliseum->nombre }}</td>
                        <td>{{ $duelo->dm . ':' . $duelo->ds }}</td>
                        <td class="text-center">
                            @if ($duelo->result == 'draw')
                                <div class="bg-warning mt-1">{{ __('Draw') }}</div>
                            @elseif ($duelo->result == '')
                                <div class="bg-warning mt-1">{{ __('Waiting') }}</div>
                            @elseif ($duelo->result == $mascota->id)
                                <div class="bg-success mt-1">{{ __('Win') }}</div>
                            @elseif ($duelo->result != $mascota->id)
                                <div class="bg-danger mt-1">{{ __('Lose') }}</div>
                            @endif
                        </td>
                        <td>
                            @if ($duelo->pmascota_id == $mascota->id)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                                    data-bs-target="#m1">
                                    <i class="bi bi-upload"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="m1" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('url1') }}" method="post" class="text-black"
                                                    autocomplete="off">
                                                    {!! csrf_field() !!}
                                                    <div class="mb-3">
                                                        <h4 class="text-uppercase">{{ __('put your link') }}</h4>
                                                    </div>
                                                    <input type="hidden" name="duelo_id" value="{{ $duelo->id }}">
                                                    <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('link') }}</label>
                                                        <input type="text" maxlength="80" class="form-control"
                                                            name="url1" placeholder="https://www.example.com">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="submit" class="btn btn-danger text-uppercase"
                                                            value="{{ __('ready') }}" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ $duelo->url1 }}" target="_blank" class="btn btn-primary"><i
                                        class="bi bi-eye-fill"></i></a>
                            @elseif ($duelo->smascota_id == $mascota->id)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                                    data-bs-target="#m2">
                                    <i class="bi bi-upload"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="m2" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('url2') }}" method="post" class="text-black"
                                                    autocomplete="off">
                                                    {!! csrf_field() !!}
                                                    <div class="mb-3">
                                                        <h4 class="text-uppercase">{{ __('put your link') }}</h4>
                                                    </div>
                                                    <input type="hidden" name="duelo_id" value="{{ $duelo->id }}">
                                                    <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ __('link') }}</label>
                                                        <input type="text" maxlength="80" class="form-control"
                                                            name="url2" placeholder="https://www.example.com">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="submit" class="btn btn-danger text-uppercase"
                                                            value="{{ __('ready') }}" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ $duelo->url2 }}" target="_blank" class="btn btn-primary"><i
                                        class="bi bi-eye-fill"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/buttons.dataTables.min.css') }}">
    {{-- JS --}}
    <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/ajax/jszip.min.js') }}"></script>
    <script src="{{ asset('js/ajax/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/ajax/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/datatable/sorting/date-eu.js') }}"></script>
    {{-- SCRIPTS --}}
    <script src="{{ asset('css/lightbox/html5lightbox.js') }}"></script>
    <script src="{{ asset('css/lightbox/froogaloop2.min.js') }}"></script>
    <script type="text/javascript">
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
            bInfo: false,
            lengthChange: false,
            pageLength: 20,
            paginate: false,
            lengthMenu: [
                [20],
                [20]
            ],
            language: {
                "url": getLanguage()
            }
        });
        /* ERROR */
        setTimeout(function() {
            $('.alert').fadeOut(6000);
        }, );
    </script>
@endsection
