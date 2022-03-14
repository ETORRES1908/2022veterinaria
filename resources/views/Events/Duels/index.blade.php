@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card bg-black border border-danger">
        <div class="card-header border border-danger">
            <a class="btn btn-dark" href="{{ route('events.show', $evento->id) }}">
                {{ __('Event') }}
            </a>
            @if (Gate::check('adddeal') || Gate::check('sentence'))
                @if (count($duelos) <= 150 && $evento->mcontrol_id == Auth::user()->id)
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddDeal">
                        {{ __('Add Deal') }}
                    </button>
                    @if ($errors->has('fcc') || $errors->has('scc '))
                        <span class="alert fs-6 text-danger" id="Message">
                            {{ __('Change the tapes.') }}
                        </span>
                    @endif
                    @if ($errors->has('pmascota_id') || $errors->has('smascota_id'))
                        <span class="alert fs-6 text-danger" id="Message">
                            {{ __('The exemplars must be different.') }}
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
                        <th class="text-uppercase">{{ __('Owner') }}</th>
                        <th class="text-uppercase">{{ __('Exemplar') }} 1</th>
                        <th></th>
                        <th class="text-uppercase">{{ __('Exemplar') }} 2</th>
                        <th class="text-uppercase">{{ __('Owner') }}</th>
                        <th class="text-uppercase">{{ __('Time') }}</th>
                        <th class="text-uppercase">{{ __('Type') . ' ' . __('Result') }}</th>
                        <th class="text-uppercase">{{ __('Result') }}</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($duelos as $duel)
                        <tr>
                            <td>{{ $duel->pmascota->user->nombre . ' ' . $duel->pmascota->user->apellido }}</td>
                            <td>{{ $duel->pmascota->nombre }}</td>
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#VS{{ $duel->id }}">
                                    VS
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
                                                    @can('sentence')
                                                        {{-- 2nd SECOND --}}
                                                        @if ($evento->judge_id == Auth::user()->id)
                                                            <button class="btn btn-primary text-capitalize"
                                                                data-bs-target="#sentence{{ $duel->id }}"
                                                                data-bs-toggle="modal">{{ __('sentence') }}</button>
                                                        @endif
                                                    @endcan
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
                                                                        {{ __('REGGAL') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->pmascota->REGGAL }}"
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
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Stamp') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->pmascota->plc }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
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
                                                                        {{ __('REGGAL') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->smascota->REGGAL }}"
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
                                                                <div class="col-sm-6 mb-3">
                                                                    <label class="form-label fw-bold">
                                                                        {{ __('Stamp') }}
                                                                    </label>
                                                                    <div class="col-auto">
                                                                        <input value="{{ $duel->smascota->plc }}"
                                                                            class="form-control text-danger" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @can('sentence')
                                    {{-- 2nd MODAL --}}
                                    <div class="modal fade" id="sentence{{ $duel->id }}" aria-hidden="true"
                                        aria-labelledby="sentence{{ $duel->id }}" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-black border border-danger text-white">
                                                <div class="modal-header border border-danger">
                                                    <button class="btn btn-primary" data-bs-target="#VS{{ $duel->id }}"
                                                        data-bs-toggle="modal">VS</button>
                                                    <button type="button" class="btn btn-danger bg-danger btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body border border-danger">
                                                    <form action="{{ route('duels.update', $duel->id) }}" method="POST">
                                                        {!! method_field('PUT') !!}
                                                        {!! csrf_field() !!}
                                                        <div class="row mb-3">
                                                            <label
                                                                class="col-sm-4 col-form-label col-form-label-sm fs-5 fw-uppercase">{{ __('Result') }}
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select id="result" name="result"
                                                                    class="form-select text-danger" required autofocus>
                                                                    <option value="" selected disabled>
                                                                        {{ __('Choose result') }}...
                                                                    </option>
                                                                    <option value="draw">{{ __('Draw') }}</option>
                                                                    <option value="{{ $duel->pmascota->id }}">
                                                                        {{ $duel->pmascota->nombre }}</option>
                                                                    <option value="{{ $duel->smascota->id }}">
                                                                        {{ $duel->smascota->nombre }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-3" id="trst">
                                                            <label
                                                                class="col-sm-4 col-form-label col-form-label-sm fs-5 fw-uppercase">{{ __('Type') . ' ' . __('Result') }}
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <select id="trslt" name="trslt" class="form-select text-danger"
                                                                    required autofocus>
                                                                    <option value="win">{{ __('Win') }}</option>
                                                                    <option value="rooster">
                                                                        {{ __('Rooster') }}</option>
                                                                    <option value="srstr">
                                                                        Super {{ __('Rooster') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function displayVals() {
                                                                var result = $('#result').val();
                                                                if (result == 'draw') {
                                                                    $("#trst").fadeOut("3000");
                                                                    $("#trslt").attr("disabled", true);
                                                                } else {
                                                                    $("#trst").show("3000");
                                                                    $("#trslt").attr("disabled", false);
                                                                }
                                                            };
                                                            $("#result").change(displayVals);
                                                        </script>
                                                        <div class="row mb-3">
                                                            <label
                                                                class="col-sm-4 col-form-label col-form-label-sm fs-5 fw-uppercase">
                                                                {{ __('Time') }}(m:s)
                                                            </label>
                                                            <div class="col-sm-8">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control text-danger"
                                                                        name="dm"
                                                                        onKeyPress="if(this.value.length==2) return false;"
                                                                        required
                                                                        onkeydown="return event.keyCode !== 69 && event.keyCode !== 189"
                                                                        min="0" max="59" value="{{ old('dm') }}"
                                                                        placeholder="00">
                                                                    <div class="input-group-text">:</div>
                                                                    <input type="number" class="form-control text-danger"
                                                                        name="ds"
                                                                        onKeyPress="if(this.value.length==2) return false;"
                                                                        required
                                                                        onkeydown="return event.keyCode !== 69 && event.keyCode !== 189"
                                                                        min="0" max="59" value="{{ old('ds') }}"
                                                                        placeholder="00">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-warning text-uppercase">{{ __('sentence') }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                            </td>
                            <td>{{ $duel->smascota->nombre }}</td>
                            <td>{{ $duel->smascota->user->nombre . ' ' . $duel->smascota->user->apellido }}</td>
                            <td>{{ $duel->dm }}:{{ $duel->ds }}</td>
                            <td>
                                <select class="form-control text-white" style="background:none;border:none;" disabled>
                                    <option @if ($duel->trslt == '') selected @endif> </option>
                                    <option @if ($duel->trslt == 'win') selected @endif>
                                        {{ __('Win') }}</option>
                                    <option @if ($duel->trslt == 'win') selected @endif>
                                        {{ __('Win') }}</option>
                                    <option @if ($duel->trslt == 'rooster') selected @endif>
                                        {{ __('Rooster') }}</option>
                                    <option @if ($duel->trslt == 'srstr') selected @endif>
                                        Super {{ __('Rooster') }}</option>
                                </select>
                            </td>
                            <td class="text-black fs-5 fw-bolder">
                                @if (empty($duel->result))
                                    <div class="bg-warning p-1">{{ __('Waiting') }}</div>
                                @else
                                    @if ($duel->result == $duel->pmascota->id)
                                        <div class="bg-success  p-1">
                                            {{ $duel->pmascota->nombre }}
                                        </div>
                                    @elseif ($duel->result == $duel->smascota->id)
                                        <div class="bg-success  p-1">
                                            {{ $duel->smascota->nombre }}
                                        </div>
                                    @elseif ($duel->result == 'draw')
                                        <div class="bg-warning  p-1">
                                            {{ __('Draw') }}
                                        </div>
                                    @endif
                                @endif
                            </td>
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
                    <div class="modal-title fw-bold text-uppercase">{{ __('Choose exemplars') }}</div>
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('duels.store') }}">
                    {!! csrf_field() !!}
                    <input type="text" id="evento_id" name="evento_id" value="{{ $evento->id }}" hidden>
                    {{-- LPARTICIPANTE_ID --}}
                    <input type="text" id="lparticipante_id" name="lparticipante_id" value="{{ $lparticipante }}"
                        hidden>
                    <div class="modal-body border border-danger">
                        <div class="row">
                            {{-- MASCOTA 1 --}}
                            <div class="col-sm-5 m-auto border border-danger">
                                {{-- SELECT PMASCOTA --}}
                                <div class="mb-3">
                                    <label class="form-label">MASCOTA 1:</label>
                                    <select class="form-select" id="pmascota_id" name="pmascota_id"
                                        value="{{ old('pmascota_id') }}" required>
                                        <option value="" selected disabled>Seleccionar mascota</option>
                                        @foreach ($participantes as $participante)
                                            <option class="text-black" value="{{ $participante->mascota->id }}"
                                                @if (old('pmascota_id') == $participante->mascota->id) selected @endif>
                                                {{ $participante->mascota->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <label for="REGGAL" class="form-label fw-bold">
                                                {{ __('REGGAL') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="REGGAL" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <label for="fcc" class="form-label fw-bold">
                                                {{ __('Cinta') }}
                                            </label>
                                            <div class="col-auto">
                                                <select name="fcc" id="fcc" class="form-select" required autofocus>
                                                    <option value="" disabled selected>Elige cinta</option>
                                                    <option value="Rojo"
                                                        @if (old('fcc') == 'Rojo') selected @endif>
                                                        Rojo</option>
                                                    <option value="Azul"
                                                        @if (old('fcc') == 'Azul') selected @endif>
                                                        Azul</option>
                                                    <option value="Verde"
                                                        @if (old('fcc') == 'Verde') selected @endif>
                                                        Verde</option>
                                                    <option value="Blanco"
                                                        @if (old('fcc') == 'Blanco') selected @endif>Blanco</option>
                                                    <option value="Morado"
                                                        @if (old('fcc') == 'Morado') selected @endif>Morado</option>
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
                                                <input id="des" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="plc" class="form-label fw-bold">
                                                {{ __('Stamp') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="plc" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="pad" class="form-label fw-bold">
                                                {{ __('Father') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="pad" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="mad" class="form-label fw-bold">
                                                {{ __('Mother') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="mad" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- MASCOTA 2 --}}
                            <div class="col-sm-5 m-auto border border-danger">
                                {{-- SELECT PMASCOTA --}}
                                <div class="mb-3">
                                    <label class="form-label">MASCOTA 2:</label>
                                    <select class="form-select" id="smascota_id" name="smascota_id"
                                        value="{{ old('smascota_id') }}" required>
                                        <option value="" selected disabled>Seleccionar mascota</option>
                                        @foreach ($participantes as $participante)
                                            <option class="text-black" value="{{ $participante->mascota->id }}"
                                                @if (old('smascota_id') == $participante->mascota->id) selected @endif>
                                                {{ $participante->mascota->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <label for="PREGGAL" class="form-label fw-bold">
                                                {{ __('REGGAL') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="PREGGAL" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="scc" class="form-label fw-bold">
                                                {{ __('Cinta') }}
                                            </label>
                                            <div class="col-auto">
                                                <select name="scc" id="scc" class="form-select" required autofocus>
                                                    <option value="" disabled selected>Elige cinta</option>
                                                    <option value="Rojo"
                                                        @if (old('scc') == 'Rojo') selected @endif>
                                                        Rojo</option>
                                                    <option value="Azul"
                                                        @if (old('scc') == 'Azul') selected @endif>Azul</option>
                                                    <option value="Verde"
                                                        @if (old('scc') == 'Verde') selected @endif>Verde</option>
                                                    <option value="Blanco"
                                                        @if (old('scc') == 'Blanco') selected @endif>Blanco</option>
                                                    <option value="Morado"
                                                        @if (old('scc') == 'Morado') selected @endif>Morado</option>
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
                                        <div class="col-sm-6">
                                            <label for="pplc" class="form-label fw-bold">
                                                {{ __('Stamp') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="pplc" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="ppad" class="form-label fw-bold">
                                                {{ __('Father') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="ppad" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="pmad" class="form-label fw-bold">
                                                {{ __('Mother') }}
                                            </label>
                                            <div class="col-auto">
                                                <input id="pmad" type="text" class="form-control text-danger" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- FOOTER --}}
                        <div class="w-50 mx-auto mt-1">
                            <div class="row">
                                <div class="col-sm-6 mx-auto">
                                    <label for="pmad" class="form-label fw-bold">
                                        {{ __('Field') }}
                                    </label>
                                    <div class="col-auto">
                                        <select name="cch" id="cch" class="form-select" required autofocus>
                                            <option value="" disabled selected>{{ __('Choose field') }}</option>
                                            <option value="A" @if (old('cch') == 'A') selected @endif>A</option>
                                            <option value="B" @if (old('cch') == 'B') selected @endif>B</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- NUMBER FIGHT --}}
                                <div class="col-sm-6 mx-auto">
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
                        <button type="submit" class="btn btn-primary mx-auto">
                            {{ __('Add Deal') }}
                        </button>
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
                        $("#REGGAL").val(item.REGGAL);
                        $("#plu").val(item.plu);
                        $("#sss").val(item.sss);
                        $("#country").val(item.country);
                        $("#state").val(item.state);
                        $("#des").val(item.des);
                        $("#plc").val(item.plc);
                        $("#pad").val(item.pad);
                        $("#mad").val(item.mad);
                    });
                },
                error: function() {
                    console.log(data);
                }
            });
        }
        $("#pmascota_id").change(displayVals1);
        displayVals1();
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
                        $("#pimg").val(item.REGGAL);
                        $("#PREGGAL").val(item.REGGAL);
                        $("#pplu").val(item.plu);
                        $("#psss").val(item.sss);
                        $("#pcountry").val(item.country);
                        $("#pstate").val(item.state);
                        $("#pdes").val(item.des);
                        $("#pplc").val(item.plc);
                        $("#ppad").val(item.pad);
                        $("#pmad").val(item.mad);
                    });
                },
                error: function() {
                    console.log(data);
                }
            });
        }
        $("#smascota_id").change(displayVals2);
        displayVals2();
        /*  DONT COPY OR PASTE*/
        $(document).ready(function() {
            $('input').bind('copy paste', function(e) {
                e.preventDefault();
            });
        });
        //HIDE
        setTimeout(function() {
            $('.alert').fadeOut(2000);
        });
    </script>
@endsection
