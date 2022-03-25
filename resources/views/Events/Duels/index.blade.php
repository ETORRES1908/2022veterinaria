@extends('layouts.app')

@section('content')
    @if (session('mensaje'))
        <div class="alert btn alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <div class="card bg-black border border-danger">
        <div class="card-header border border-danger">
            @cannot('sentence')
                <a class="btn btn-success" href="{{ route('events.show', $evento->id) }}">
                    {{ __('Event') }}
                </a>
            @endcan
            @if ($evento->mcontrol_id == Auth::user()->id)
                @if (count($duelos) <= 150 && $evento->mcontrol_id == Auth::user()->id)
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#AddDeal">
                        {{ __('Add Deal') }}
                    </button>
                    @if ($errors->has('fcc') || $errors->has('scc '))
                        <span class="alert fs-6 text-danger" id="Message">
                            {{ __('Change the tapes.') }}
                        </span>
                    @endif
                    @if ($errors->has('pmascota_id') || $errors->has('smascota_id'))
                        <span class="alert fs-6 text-danger" id="Message">
                            {{ __('The pets must be different.') }}
                        </span>
                    @endif
                @endif
                @if (session('mensaje'))
                    <span class="alert fs-6 text-danger">
                        {{ session('mensaje') }}
                    </span>
                @endif
            @endif
        </div>
        <div class="card-body table-responsive border border-danger">
            <table id="datatable" class="table table-dark table-hover nowrap" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th class="fw-blod">#</th>
                        <th class="text-uppercase">{{ __('Shed') }}</th>
                        <th class="text-uppercase">{{ __('Pet') }} 1</th>
                        <th></th>
                        <th class="text-uppercase">{{ __('Pet') }} 2</th>
                        <th class="text-uppercase">{{ __('Shed') }}</th>
                        <th class="text-uppercase">{{ __('Time') }}</th>
                        <th class="text-uppercase">{{ __('Result') }}</th>
                        @can('sentence')
                            <th></th>
                        @endcan
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($duelos as $duel)
                        <tr>
                            <td>{{ $duel->npelea }}</td>
                            <td>{{ $duel->pmascota->user->galpon }}</td>
                            <td>{{ $duel->pmascota->nombre }}</td>
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#VS{{ $duel->id }}">
                                    {{ __('Deal') }}
                                </button>
                                <!-- Modal VS-->
                                <div class="modal fade" id="VS{{ $duel->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                        <div class="modal-content bg-black border border-danger text-white">
                                            <div class="modal-header border-danger">
                                                <div class="justify-content-between">
                                                    <a class="btn btn-primary" onclick="window.print();">
                                                        {{ __('Print') }}
                                                    </a>
                                                    <label class="btn btn-primary">
                                                        {{ __('Fight') }}: {{ $duel->npelea }}
                                                    </label>
                                                    <label class="btn btn-primary">
                                                        {{ __('Field') }}: {{ $duel->cch }}
                                                    </label>
                                                    <label class="btn btn-primary">
                                                        {{ __('Accordance') }}: {{ $duel->pactada }}
                                                    </label>
                                                </div>
                                                <button type="button" class="btn btn-danger bg-danger btn-close"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row row-cols-2 g-2">
                                                    {{-- MASCOTA 1 --}}
                                                    <div class="col-6">
                                                        <div class="card-body card bg-black border border-danger">
                                                            <div class="col-sm-6 mx-auto my-2">
                                                                <figure class="figure">
                                                                    <img src="@if (!empty($duel->pmascota->fotos->where('nfoto', 1)->first())) {{ asset($duel->pmascota->fotos->where('nfoto', 1)->first()->ruta) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                                        class="figure-img d-block mx-auto" width="120"
                                                                        height="140">
                                                                </figure>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('REGANI') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->pmascota->REGANI }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Galpon') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input
                                                                            value="{{ $duel->pmascota->user->galpon }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Color') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->pmascota->plu }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Weight') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->pmascota->sss }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Cinta') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->fcc }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Country') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input
                                                                            value="{{ $duel->pmascota->user->country }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('State') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->pmascota->user->state }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Disability') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <select class="form-control text-danger"
                                                                            value="{{ $duel->pmascota->des }}" disabled>
                                                                            <option
                                                                                @if ($duel->pmascota->des == '0') selected @endif>
                                                                                {{ __('No') }}</option>
                                                                            <option
                                                                                @if ($duel->pmascota->des == '1') selected @endif>
                                                                                {{ __('Visual') }}</option>
                                                                            <option
                                                                                @if ($duel->pmascota->des == '2') selected @endif>
                                                                                {{ __('Physical') }}</option>
                                                                            <option
                                                                                @if ($duel->pmascota->des == '3') selected @endif>
                                                                                {{ __('Other') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Seal') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->pmascota->seal }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- MASCOTA 2 --}}
                                                    <div class="col-6">
                                                        <div class="card-body bg-black border border-danger">
                                                            <div class="col-sm-6 mx-auto my-2">
                                                                <figure class="figure">
                                                                    <img src="@if (!empty($duel->smascota->fotos->where('nfoto', 1)->first())) {{ asset($duel->smascota->fotos->where('nfoto', 1)->first()->ruta) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                                        class="figure-img d-block mx-auto" width="120"
                                                                        height="140">
                                                                </figure>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('REGANI') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->smascota->REGANI }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Galpon') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input
                                                                            value="{{ $duel->smascota->user->galpon }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Colour') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->smascota->plu }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Weight') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->smascota->sss }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-4 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Cinta') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->scc }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Country') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input
                                                                            value="{{ $duel->smascota->user->country }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('State') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->smascota->user->state }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Disability') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <select class="form-control text-danger"
                                                                            value="{{ $duel->smascota->des }}" disabled>
                                                                            <option
                                                                                @if ($duel->smascota->des == '0') selected @endif>
                                                                                {{ __('No') }}</option>
                                                                            <option
                                                                                @if ($duel->smascota->des == '1') selected @endif>
                                                                                {{ __('Visual') }}</option>
                                                                            <option
                                                                                @if ($duel->smascota->des == '2') selected @endif>
                                                                                {{ __('Physical') }}</option>
                                                                            <option
                                                                                @if ($duel->smascota->des == '3') selected @endif>
                                                                                {{ __('Other') }}</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Seal') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->smascota->seal }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $duel->smascota->nombre }}</td>
                            <td>{{ $duel->smascota->user->galpon }}</td>
                            <form class="text-uppercase" method="POST"
                                action="{{ route('pactados.update', $duel->id) }}">
                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}
                                <td>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" placeholder="00 {{ __('minutes') }}"
                                            value="{{ $duel->dm }}" name="dm" required
                                            onKeyPress="if(this.value.length==1) return false;"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189"
                                            @if ($duel->result != '') disabled @endif
                                            @cannot('sentence') readonly @endcan>
                                        <span class="input-group-text">:</span>
                                        <input type="number" class="form-control" placeholder="00 {{ __('seconds') }}"
                                            value="{{ $duel->ds }}" name="ds" required
                                            @if ($duel->result != '') disabled @endif
                                            onKeyPress="if(this.value.length==2) return false;"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189"
                                            @cannot('sentence') readonly @endcan>
                                    </div>
                                </td>
                                <td class="text-black fs-5 fw-bolder">
                                    <select name="result" class="form-control" required
                                        @if ($duel->result != '') disabled @endif
                                        @cannot('sentence') disabled @endcan>
                                        <option @if ($duel->result == 'waiting') selected @endif value="waiting" hidden>
                                            {{ __('Waiting') }}</option>
                                        <option @if ($duel->result == $duel->pmascota->id) selected @endif
                                            value="{{ $duel->pmascota->id }}">
                                            {{ $duel->pmascota->user->galpon }}
                                        </option>
                                        <option @if ($duel->result == $duel->smascota->id) selected @endif
                                            value="{{ $duel->smascota->id }}">
                                            {{ $duel->smascota->user->galpon }}
                                        </option>
                                        <option @if ($duel->result == 'draw') selected @endif value="draw">
                                            {{ __('Draw') }}</option>
                                    </select>
                                </td>
                                @can('sentence')
                                    <td>
                                        @if ($duel->result == '')
                                            <input type="submit" class="btn btn-warning" value="{{ __('sentence') }}">
                                        @else
                                            <input type="submit" class="btn btn-success" value="{{ __('sentenced') }}"
                                                disabled>
                                        @endif
                                    </td>
                                @endcan
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL ADD -->
    <div class="modal fade" id="AddDeal" aria-hidden="true" aria-labelledby="AddDeal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-black border border-danger">
                <div class="modal-header border border-danger">
                    <div class="modal-title fw-bold text-uppercase">{{ __('Choose pets') }}</div>
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form class="text-uppercase" method="POST" action="{{ route('pactados.store') }}">
                    {!! csrf_field() !!}
                    {{-- EVENTO --}}
                    <input type="text" id="evento_id" name="evento_id" value="{{ $evento->id }}" hidden>

                    <div class="modal-body border border-danger">
                        <div class="row">
                            {{-- MASCOTA 1 --}}
                            <div class="col-lg-5 m-auto border border-danger">
                                {{-- SELECT PMASCOTA --}}
                                <div class="mb-3">
                                    <label class="form-label">MASCOTA 1:</label>
                                    <select class="form-select" id="pmascota_id" name="pmascota_id"
                                        value="{{ old('pmascota_id') }}" required>
                                        <option value="" selected disabled>{{ __('Choose pet') }}</option>
                                        @foreach ($participantes as $participante)
                                            <option class="text-black" value="{{ $participante->id }}"
                                                @if (old('pmascota_id') == $participante->id) selected @endif>
                                                {{ $participante->mascota->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <label class="form-label fw-bold">
                                                {{ __('REGANI') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="REGANI" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <label for="fcc" class="form-label fw-bold">
                                                {{ __('Cinta') }}
                                            </label>
                                            <div class="col-auto">
                                                <select name="fcc" id="fcc" class="form-select text-danger" required
                                                    autofocus>
                                                    <option value="" hidden></option>
                                                    <option value="Roja"
                                                        @if (old('fcc') == 'Roja') selected @endif>
                                                        Roja</option>
                                                    <option value="Blanca"
                                                        @if (old('fcc') == 'Blanca') selected @endif>Blanca</option>
                                                    <option value="Amarilla"
                                                        @if (old('fcc') == 'Amarilla') selected @endif>
                                                        Amarilla</option>
                                                    <option value="Azul"
                                                        @if (old('fcc') == 'Azul') selected @endif>
                                                        Azul</option>
                                                    <option value="Negra"
                                                        @if (old('fcc') == 'Negra') selected @endif>Negra</option>
                                                    <option value="Verde"
                                                        @if (old('fcc') == 'Verde') selected @endif>
                                                        Verde</option>
                                                    <option value="Gris"
                                                        @if (old('fcc') == 'Gris') selected @endif>Gris</option>
                                                </select>
                                                @if ($errors->has('fcc'))
                                                    <span class="text-danger text-fs6">
                                                        Elija otra cinta
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="plu" class="form-label fw-bold">
                                                {{ __('Color') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="plu" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="sss" class="form-label fw-bold">
                                                {{ __('Weight') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="sss" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="des" class="form-label fw-bold">
                                                {{ __('Disability') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="des" type="text" class="form-control text-danger" value=""
                                                    readonly>
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <label for="seal" class="form-label fw-bold">
                                                {{ __('Seal') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="seal" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- MASCOTA 2 --}}
                            <div class="col-lg-5 m-auto border border-danger">
                                {{-- SELECT PMASCOTA --}}
                                <div class="mb-3">
                                    <label class="form-label">MASCOTA 2:</label>
                                    <select class="form-select" id="smascota_id" name="smascota_id"
                                        value="{{ old('smascota_id') }}" required>
                                        <option value="" selected disabled>{{ __('Choose pet') }}</option>
                                        @foreach ($participantes as $participante)
                                            <option class="text-black" value="{{ $participante->id }}"
                                                @if (old('smascota_id') == $participante->id) selected @endif>
                                                {{ $participante->mascota->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <label class="form-label fw-bold">
                                                {{ __('REGANI') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="PREGANI" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="scc" class="form-label fw-bold">
                                                {{ __('Cinta') }}
                                            </label>
                                            <div class="col-auto">
                                                <select name="scc" id="scc" class="form-select text-danger" required
                                                    autofocus>
                                                    <option value="" hidden></option>
                                                    <option value="Roja"
                                                        @if (old('fcc') == 'Roja') selected @endif>
                                                        Roja</option>
                                                    <option value="Blanca"
                                                        @if (old('fcc') == 'Blanca') selected @endif>Blanca</option>
                                                    <option value="Amarilla"
                                                        @if (old('fcc') == 'Amarilla') selected @endif>
                                                        Amarilla</option>
                                                    <option value="Azul"
                                                        @if (old('fcc') == 'Azul') selected @endif>
                                                        Azul</option>
                                                    <option value="Negra"
                                                        @if (old('fcc') == 'Negra') selected @endif>Negra</option>

                                                    <option value="Verde"
                                                        @if (old('fcc') == 'Verde') selected @endif>
                                                        Verde</option>
                                                    <option value="Gris"
                                                        @if (old('fcc') == 'Gris') selected @endif>Gris</option>
                                                </select>
                                                @if ($errors->has('scc'))
                                                    <span class="text-danger text-fs6">
                                                        Elija otra cinta
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pplu" class="form-label fw-bold">
                                                {{ __('Color') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="pplu" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="psss" class="form-label fw-bold">
                                                {{ __('Weight') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="psss" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pdes" class="form-label fw-bold">
                                                {{ __('Disability') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="pdes" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <label for="pseal" class="form-label fw-bold">
                                                {{ __('Seal') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="pseal" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- FOOTER --}}
                        <div class="w-50 mx-auto mt-1">
                            <div class="row">
                                <div class="col-sm-4 mx-auto">
                                    <label for="pmad" class="form-label fw-bold">
                                        {{ __('Accordance') }}
                                    </label>
                                    <div class="col-auto">
                                        <input type="number" class="form-control text-danger" name="pactada"
                                            onKeyPress="if(this.value.length==4) return false;" required
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" min="0"
                                            value="{{ old('pactada') }}" placeholder="0000">
                                    </div>
                                </div>
                                <div class="col-sm-4 mx-auto">
                                    <label for="pmad" class="form-label fw-bold">
                                        {{ __('Field') }}
                                    </label>
                                    <div class="col-auto">
                                        <select name="cch" id="cch" class="form-select text-danger" required autofocus>
                                            <option value="" hidden>{{-- __('Choose field') --}}</option>
                                            <option value="A" @if (old('cch') == 'A') selected @endif>A</option>
                                            <option value="B" @if (old('cch') == 'B') selected @endif>B</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- NUMBER FIGHT --}}
                                <div class="col-sm-4 mx-auto">
                                    <label for="npelea" class="form-label fw-bold">
                                        {{ __('Fight') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="npelea" name="npelea" type="text" class="form-control text-danger"
                                            value="{{ count($duelos) + 1 }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-black border-top border-danger">
                        <a class="btn btn-primary mx-auto" onclick="window.print();">
                            {{ __('Print') }}
                        </a>
                        <input type="submit" class="btn btn-primary mx-auto" value="{{ __('Add Deal') }}">
                    </div>
                </form>
            </div>
        </div>
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
    {{-- DATATABLE --}}
    <script>
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
                language: {
                    "url": getLanguage()
                },
                bInfo: false,
                lengthChange: false,
                pageLength: 10,
                lengthMenu: [
                    [10],
                    [10]
                ]
            });
        });
        /*  MASCOTA */
        function displayVals1() {
            var id = $('#pmascota_id').val();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/participants/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $.each(data, function(i, item) {
                        $("#REGANI").val(item.REGANI);
                        $("#plu").val(item.plu);
                        $("#sss").val(item.sss);
                        $("#country").val(item.country);
                        $("#state").val(item.state);
                        $("#des").val(item.des);
                        /* $("#seal").val(item.seal); */
                        $("#pad").val(item.pad);
                        $("#mad").val(item.mad);
                    });
                },
                error: function() {
                    console.log(id);
                }
            });
        }
        $("#pmascota_id").change(displayVals1);

        /* MASCOTA 2 */
        function displayVals2() {
            var id = $('#smascota_id').val();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/participants/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $.each(data, function(i, item) {
                        $("#PREGANI").val(item.REGANI);
                        $("#pplu").val(item.plu);
                        $("#psss").val(item.sss);
                        $("#pcountry").val(item.country);
                        $("#pstate").val(item.state);
                        $("#pdes").val(item.des);
                        /*  $("#pseal").val(item.seal); */
                        $("#ppad").val(item.pad);
                        $("#pmad").val(item.mad);
                    });
                },
                error: function() {
                    console.log(id);
                }
            });
        }
        $("#smascota_id").change(displayVals2);

        /*  DONT COPY OR PASTE*/
        $(document).ready(function() {
            $('input').bind('copy paste', function(e) {
                e.preventDefault();
            });
        });
        //HIDE
        setTimeout(function() {
            $('.alert').fadeOut(5000);
        });
    </script>
@endsection
