@extends('layouts.app')

@extends('layouts.datatable')

@section('content')

    <div class="card bg-black border border-danger">
        <div class="card-header border border-danger">
            @if (count($duelos) <= 150 && $evento->organizador_id == Auth::user()->id)
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddPet">
                    {{ __('Add Duel') }}
                </button>
                @if ($errors->has('fcc') || $errors->has('scc '))
                    <span class="fs-6 text-danger" id="Message">
                        Cambie las cintas.
                    </span>
                @endif
                @if ($errors->has('pmascota_id') || $errors->has('smascota_id'))
                    <span class="fs-6 text-danger" id="Message">
                        Las mascotas deben ser diferentes.
                    </span>
                @endif
            @endif
        </div>
        <div class="card-body table-responsive border border-danger">
            <table id="datatable" class="table table-dark table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>DUEÑO 1</th>
                        <th>MASCOTA 1</th>
                        <th>VS</th>
                        <th>MASCOTA 2</th>
                        <th>DUEÑO 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($duelos as $duel)
                        <tr>
                            <td>{{ $duel->pmascota->user->nombre . ' ' . $duel->pmascota->user->apellido }}</td>
                            <td>{{ $duel->pmascota->nombre }}</td>
                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#VS{{ $duel->id }}">
                                    VS
                                </button>
                                <!-- Modal VS-->
                                <div class="modal fade" id="VS{{ $duel->id }}" aria-hidden="true"
                                    aria-labelledby="VS{{ $duel->id }}" tabindex="-1">
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
                                                        {{ __('Cancha') }}: {{ $duel->cch }}
                                                    </label>
                                                </div>
                                                <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body row">
                                                {{-- MASCOTA 1 --}}
                                                <div
                                                    class="col-sm-5 m-1 mx-auto form-group card bg-black border border-danger">
                                                    <div class="col-sm-6 mx-auto my-2">
                                                        <figure class="figure">
                                                            <img src="@if (!empty($duel->pmascota->fotos->where('nfoto', 1)->first())) {{ asset($duel->pmascota->fotos->where('nfoto', 1)->first()->ruta) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                                class="figure-img d-block mx-auto" width="120" height="140">
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
                                                                <input value="{{ $duel->pmascota->user->galpon }}"
                                                                    class="form-control text-danger" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                {{ __('Color') }}
                                                            </label>
                                                            <div class="col-auto">
                                                                <input value="{{ $duel->pmascota->plu }}"
                                                                    class="form-control text-danger" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                {{ __('Weight') }}
                                                            </label>
                                                            <div class="col-auto">
                                                                <input value="{{ $duel->pmascota->sss }}"
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
                                                                <input value="{{ $duel->pmascota->user->country }}"
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
                                                                <input value="{{ $duel->pmascota->des }}"
                                                                    class="form-control text-danger" readonly>
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
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label fw-bold">
                                                            {{ __('Cinta') }}
                                                        </label>
                                                        <div class="col-auto">
                                                            <input value="{{ $duel->fcc }}"
                                                                class="form-control text-danger" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- MASCOTA 2 --}}
                                                <div class="col-sm-5 m-1 mx-auto form-group bg-black border border-danger">
                                                    <div class="col-sm-6 mx-auto my-2">
                                                        <figure class="figure">
                                                            <img src="@if (!empty($duel->smascota->fotos->where('nfoto', 1)->first())) {{ asset($duel->smascota->fotos->where('nfoto', 1)->first()->ruta) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                                class="figure-img d-block mx-auto" width="120" height="140">
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
                                                                <input value="{{ $duel->smascota->user->galpon }}"
                                                                    class="form-control text-danger" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                {{ __('Color') }}
                                                            </label>
                                                            <div class="col-auto">
                                                                <input value="{{ $duel->smascota->plu }}"
                                                                    class="form-control text-danger" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 mb-3">
                                                            <label class="form-label fw-bold">
                                                                {{ __('Weight') }}
                                                            </label>
                                                            <div class="col-auto">
                                                                <input value="{{ $duel->smascota->sss }}"
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
                                                                <input value="{{ $duel->smascota->user->country }}"
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
                                                                <input value="{{ $duel->smascota->des }}"
                                                                    class="form-control text-danger" readonly>
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
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label fw-bold">
                                                            {{ __('Cinta') }}
                                                        </label>
                                                        <div class="col-auto">
                                                            <input value="{{ $duel->scc }}"
                                                                class="form-control text-danger" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $duel->smascota->nombre }}</td>
                            <td>{{ $duel->smascota->user->nombre . ' ' . $duel->smascota->user->apellido }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>DUEÑO 1</th>
                        <th>MASCOTA 1</th>
                        <th>VS</th>
                        <th>MASCOTA 2</th>
                        <th>DUEÑO 2</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- MODAL ADD -->
    <div class="modal fade" id="AddPet" aria-hidden="true" aria-labelledby="AddPet" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-black border border-danger">
                <div class="modal-header border border-danger">
                    <div class="modal-title fw-bold">{{ __('CHOOSE PET') }}</div>
                    <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('Duels.store') }}">
                    {{ csrf_field() }}
                    {{-- LPARTICIPANTE_ID --}}
                    <input type="text" id="lparticipante_id" name="lparticipante_id" value="{{ $lparticipante }}" hidden>
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
                                                    <option value="Rojo" @if (old('fcc') == 'Rojo') selected @endif>
                                                        Rojo</option>
                                                    <option value="Azul" @if (old('fcc') == 'Azul') selected @endif>
                                                        Azul</option>
                                                    <option value="Verde" @if (old('fcc') == 'Verde') selected @endif>
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
                                                    <option value="Rojo" @if (old('scc') == 'Rojo') selected @endif>
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
                                        {{ __('Cancha') }}
                                    </label>
                                    <div class="col-auto">
                                        <select name="cch" id="cch" class="form-select" required autofocus>
                                            <option value="" disabled selected>Elige cancha</option>
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
                            {{ __('Add Duel') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
            });
        });
    </script>
    {{-- MASCOTA --}}
    <script>
        function displayVals1() {
            var id = $('#pmascota_id').val();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/Participants/' + id,
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
    </script>
    {{-- MASCOTA 2 --}}
    <script>
        function displayVals2() {
            var id = $('#smascota_id').val();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/Participants/' + id,
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
    </script>
@endsection
