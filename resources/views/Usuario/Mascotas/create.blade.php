@extends('layouts.app')
@section('content')
    <div class="card mx-auto bg-black border border-danger">
        <div class="card-header fs-4 border border-danger">
            {{ __('Add pet') }}
        </div>
        <div class="card-body border border-danger">
            <form class="text-uppercase" method="POST" action="{{ route('mascotas.store') }}" enctype="multipart/form-data"
                autocomplete="off">
                {!! csrf_field() !!}
                {{-- USER ID --}}
                <input id="user_id" type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                <div class="card bg-black border border-danger">
                    <div class="card-body border border-danger">
                        {{-- NOMBRE, FNAC Y SIZE --}}
                        <div class="row">
                            <div class="row col-lg-8">
                                {{-- NOMBRE --}}
                                <div
                                    class="col-6 col-md-4 mb-3 form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                    <label for="nombre" class="col-form-label fw-bold">
                                        {{ __('Name') }} {{ __('pet') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="nombre" type="text" class="form-control text-danger" name="nombre"
                                            value="{{ old('nombre') }}" maxlength="18" required autofocus}>

                                        @if ($errors->has('nombre'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- GENERO --}}
                                <div
                                    class="col-6 col-md-4 mb-3 form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-form-label fw-bold">
                                        {{ __('gender') }}
                                    </label>
                                    <div class="col-auto">
                                        <select id="gender" name="gender" class="form-select text-capitalize text-danger">
                                            <option value="male" @if (old('gender') == 'male') selected @endif>
                                                {{ __('male') }}</option>
                                            <option value="female" @if (old('gender') == 'female') selected @endif>
                                                {{ __('female') }}</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('gender') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- NACIMIENTO --}}
                                <div
                                    class="col-6 col-md-4 mb-3 form-group{{ $errors->has('fnac') ? ' has-error' : '' }}">
                                    <label for="fnac" class="col-form-label fw-bold">
                                        {{ __('Birthday') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="fnac" type="date" class="form-control text-danger" name="fnac"
                                            value="{{ old('fnac') }}" required autofocus
                                            max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        @if ($errors->has('fnac'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('fnac') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- TAMAÑO --}}
                                <div
                                    class="col-6 col-md-4 mb-3 form-group{{ $errors->has('size') ? ' has-error' : '' }}">
                                    <label for="size" class="col-form-label fw-bold">
                                        {{ __('Size') }}
                                    </label>
                                    <div class="col-auto">
                                        <select class="form-select text-danger" name="size" value="{{ old('size') }}">
                                            <option value="smll" @if (old('size')) selected @endif>
                                                {{ __('Small') }}</option>
                                            <option value="mdm" @if (old('size')) selected @endif>
                                                {{ __('Medium') }}</option>
                                            <option value="lrg" @if (old('size')) selected @endif>
                                                {{ __('Large') }}</option>
                                        </select>
                                        @if ($errors->has('size'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('size') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- PLC Y PLU --}}
                                {{-- PLC --}}
                                <div class="col-6 col-md-4 mb-3 form-group{{ $errors->has('plc') ? ' has-error' : '' }}">
                                    <label for="plc" class="col-form-label fw-bold">
                                        {{ __('plaque') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="plc" type="number" class="form-control text-danger" name="plc"
                                            value="{{ old('plc') }}" required autofocus
                                            onKeyPress="if(this.value.length==4) return false;"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" min="0">

                                        @if ($errors->has('plc'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('plc') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- LOCKER --}}
                                <div class="col-6 col-md-4 mb-3 form-group{{ $errors->has('lck') ? ' has-error' : '' }}">
                                    <label for="lck" class="col-form-label fw-bold">
                                        {{ __('Locker') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="lck" type="number" class="form-control text-danger" name="lck"
                                            value="{{ old('lck') }}" required autofocus
                                            onKeyPress="if(this.value.length==3) return false;"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" min="0">

                                        @if ($errors->has('lck'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('lck') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- PLU --}}
                                <div class="col-12 mb-3 form-group{{ $errors->has('plu') ? ' has-error' : '' }}">
                                    <label for="plu" class="col-form-label fw-bold">
                                        {{ __('Colour') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="plu" type="text" class="form-control text-danger" name="plu"
                                            value="{{ old('plu') }}" required autofocus maxlength="18">

                                        @if ($errors->has('plu'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('plu') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- PAD, MAD --}}
                                {{-- PAD --}}
                                <div class="col-6 mb-3 form-group{{ $errors->has('pad') ? ' has-error' : '' }}">
                                    <label for="pad" class="col-form-label fw-bold">
                                        {{ __('Father') }}
                                    </label>
                                    <div class="col-auto">
                                        <select class="select2 form-select" name="pad" autofocus>
                                            <option value="" hidden>
                                                {{ __('Choose pet') }}...
                                            </option>
                                            @foreach ($pads as $mascota)
                                                <option @if (old('pad') == $mascota->id) selected @endif
                                                    value="{{ $mascota->id }}">{{ $mascota->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('pad'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('pad') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- MAD --}}
                                <div class="col-6 mb-3 form-group{{ $errors->has('mad') ? ' has-error' : '' }}">
                                    <label for="mad" class="col-form-label fw-bold">
                                        {{ __('Mother') }}
                                    </label>
                                    <div class="col-auto">
                                        <select class="select2 form-select" name="mad" autofocus>
                                            <option value="" hidden>
                                                {{ __('Choose pet') }}...
                                            </option>
                                            @foreach ($mads as $mascota)
                                                <option @if (old('mad') == $mascota->id) selected @endif
                                                    value="{{ $mascota->id }}">{{ $mascota->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('mad'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('mad') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- DES --}}
                                <div class="col-6 mb-3 form-group{{ $errors->has('des') ? ' has-error' : '' }}">
                                    <label for="des" class="col-form-label fw-bold">
                                        {{ __('Disability') }}
                                    </label>
                                    <div class="col-auto">
                                        <select class="form-select text-danger" id="des" name="des"
                                            value="{{ old('des') }}" required>
                                            <option value="No" @if (old('des') == 'No') selected @endif>
                                                {{ __('No') }}</option>
                                            <option value="Visual" @if (old('des') == 'Visual') selected @endif>
                                                {{ __('Visual') }}</option>
                                            <option value="Fisica" @if (old('des') == 'Física') selected @endif>
                                                {{ __('Física') }}</option>
                                            <option value="Otra" @if (old('des') == 'Otra') selected @endif>
                                                {{ __('Other') }}</option>
                                        </select>

                                        @if ($errors->has('des'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('des') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- SENASA --}}
                                <div class="col-6 mb-3 form-group{{ $errors->has('sena') ? ' has-error' : '' }}">
                                    <label for="sena" class="col-form-label fw-bold">
                                        {{ __('SENASA') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="sena" type="text" class="form-control text-danger" name="sena"
                                            value="{{ old('sena') }}" autofocus maxlength="30">

                                        @if ($errors->has('sena'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('sena') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- INCUBACIÓN --}}
                                <div id="ficbc"
                                    class="col-6 mb-3 form-group{{ $errors->has('icbc') ? ' has-error' : '' }}">
                                    <label for="icbc" class="col-form-label fw-bold">
                                        {{ __('Incubation') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="icbc" type="date" class="form-control text-danger" name="icbc"
                                            value="{{ old('icbc') }}" autofocus
                                            max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">

                                        @if ($errors->has('icbc'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('icbc') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- HUEVOS --}}
                                <div id="fhvs"
                                    class="col-3 mb-3 form-group{{ $errors->has('hvs') ? ' has-error' : '' }}">
                                    <label for="hvs" class="col-form-label fw-bold">
                                        {{ __('Eggs') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="hvs" type="number" class="form-control text-danger" name="hvs"
                                            value="{{ old('hvs') }}" autofocus
                                            onKeyPress="if(this.value.length==2) return false;"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" min="0">

                                        @if ($errors->has('hvs'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('hvs') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- NACIERON --}}
                                <div id="fncr"
                                    class="col-3 mb-3 form-group{{ $errors->has('ncr') ? ' has-error' : '' }}">
                                    <label for="ncr" class="col-form-label fw-bold">
                                        {{ __('Born') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="ncr" type="number" class="form-control text-danger" name="ncr"
                                            value="{{ old('ncr') }}" autofocus
                                            onKeyPress="if(this.value.length==2) return false;"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" min="0">

                                        @if ($errors->has('ncr'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('ncr') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- VACUNAS --}}
                                <div
                                    class="col-12 mb-3 border border-danger rounded form-group{{ $errors->has('vcns') ? ' has-error' : '' }}">
                                    <label for="vcns" class="col-form-label fw-bold">
                                        {{ __('Vaccines') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="addvcns" type="button" class="btn btn-success mb-3" value="+">
                                        <input id="removevcns" type="button" class="btn btn-danger mb-3" value="-">
                                        <div class="form_vcns">

                                        </div>

                                        @if ($errors->has('vcns'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('vcns') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- MOVIDAS --}}
                                <div
                                    class="col-12 mb-3 border border-danger rounded form-group{{ $errors->has('mvs') ? ' has-error' : '' }}">
                                    <label for="mvs" class="col-form-label fw-bold">
                                        {{ __('Moves') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="addmvs" type="button" class="btn btn-success mb-3" value="+">
                                        <input id="removemvs" type="button" class="btn btn-danger mb-3" value="-">
                                        <div class="form_mvs">

                                        </div>
                                    </div>
                                    @if ($errors->has('mvs'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('mvs') }}
                                        </span>
                                    @endif
                                </div>
                                {{-- SUPLEMENTO --}}
                                <div
                                    class="col-md-12 mb-3 border border-danger form-group{{ $errors->has('spmt') ? ' has-error' : '' }}">
                                    <label for="spmt" class="col-form-label fw-bold">
                                        {{ __('Supplement') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="addsmpt" type="button" class="btn btn-success mb-3" value="+">
                                        <input id="removesmpt" type="button" class="btn btn-danger mb-3" value="-">
                                        <div class="form_smpt">
                                        </div>

                                        @if ($errors->has('spmt'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('spmt') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- OBS --}}
                                <div class="col-md-12 mb-3 form-group{{ $errors->has('obs') ? ' has-error' : '' }}">
                                    <label for="obs" class="col-form-label fw-bold">
                                        {{ __('Observations') }}
                                    </label>
                                    <div class="col-auto">
                                        <textarea id="obs" class="form-control text-danger" name="obs" value="{{ old('obs') }}" rows="3" maxlength="200"
                                            autofocus></textarea>
                                        @if ($errors->has('obs'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('obs') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                {{-- FOTO DE PERFIL --}}
                                <div class="col-md-12 mb-3 form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label for="name" class="col-form-label fw-bold">
                                        {{ __('Photo Profile') }} {{ __('Pet') }}
                                    </label>
                                    <div class="col-auto rounded">
                                        <img id="preview" src="{{ asset('storage/img/perro.jpg') }}"
                                            class="img-fluid mx-auto d-block bg-danger" />
                                        <div for="foto" onclick="getFile()" id="v" class="btn btn-white bg-white d-flex">
                                            <i class="bi bi-cloud-upload"></i>{{ __('Upload') }}
                                            <div id="yourBtn" class="mx-2">...{{ __('there is no picture') }}
                                            </div>
                                        </div>
                                        <input id="foto" type="file" name="foto" value="{{ old('foto') }}" required
                                            autofocus accept="image/*" onchange="sub(this)" hidden>
                                        <script>
                                            function getFile() {
                                                document.getElementById("foto").click();

                                            }

                                            function sub(obj) {
                                                var file = obj.value;
                                                var fileName = file.split("\\");
                                                document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
                                                event.preventDefault();
                                                /* FOTO */
                                                if (foto.files) {
                                                    preview.src = URL.createObjectURL(foto.files[0])
                                                }
                                            }
                                        </script>
                                    </div>
                                    @if ($errors->has('foto'))
                                        <span class="text-danger fs-6">
                                            {{ $errors->first('foto') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- BOTON DE REGISTRO --}}
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add pet') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script>
        /* PASTE AND COPY */
        $(document).ready(function() {
            $('input').bind('copy paste', function(e) {
                e.preventDefault();
            });
        });
        $("#removevcns").hide();
        /* ADD VCNS */
        $("#addvcns").click(function() {
            $(".form_vcns").append(
                '<div id="vcns" class="row mb-3"><div class="col-6 col-md-3 mb-1"><input id="vcnsf" type="date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control text-danger fw-bold"name="vcnsf[]" required autofocus></div><div class="col-6 col-md-3 mb-1"><input id="vcnst" type="text" class="form-control text-danger fw-bold"name="vcnst[]" required autofocus placeholder="{{ __('Type') }}" pattern="[A-zÀ-ú1-9\s]+" maxlength="10"onkeydown="return /[A-zÀ-ú1-9\s]/i.test(event.key)"> </div><div class="col-6 col-md-3 mb-1"><input id="vcnsm" type="text" class="form-control text-danger fw-bold"name="vcnsm[]" required autofocus placeholder="{{ __('Brand') }}" pattern="[A-zÀ-ú\s]+" maxlength="10" onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)"></div><div class="col-6 col-md-3 mb-1"><input id="vcnsd" type="number" class="form-control text-danger fw-bold"name="vcnsd[]" required autofocus placeholder="{{ __('Dose') }}"onKeyPress="if(this.value.length==2) return false;" onkeydown="return event.keyCode !== 69 && event.keyCode !== 189"> </div></div > '
            );
            var n = $("div[id='vcns']").length;
            if (n == 4) {
                $('#addvcns').attr('disabled', true);
                $('#addvcns').hide(500);
            }
            if (n >= 0) {
                $('#removevcns').attr('disabled', false);
                $('#removevcns').show(500);
            }
        });

        /* DELETE VCNS */
        $("#removevcns").click(function() {
            $('#vcns').last().remove();
            var n = $("div[id='vcns']").length;
            if (n <= 4) {
                $('#addvcns').attr('disabled', false);
                $('#addvcns').show(500);
            }
            if (n <= 0) {
                $('#removevcns').attr('disabled', true);
                $('#removevcns').hide(500);
            }
        });
        $("#removemvs").hide();
        /* ADD MVS */
        $("#addmvs").click(function() {
            $(".form_mvs").append(
                '<div id="mvs" class="row mb-3"><div class="col-6 col-md-4 mb-1"><input type="date" class="form-control text-danger fw-bold" name="mvf[]"required autofocus max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"></div><div class="col-6 col-md-2 mb-1"><div class="input-group"><input type="number" class="form-control text-danger" name="mm[]" onKeyPress="if(this.value.length==2) return false;" required onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" min="0" max="59" placeholder="00 min"></div></div><div class="col-6 col-md-3 mb-1"><input type="text" class="form-control text-danger fw-bold" name="mvtp[]" required autofocus placeholder="{{ __('Type') }}" maxlength="10"></div><div class="col-6 col-md-3 mb-1"><select name="mvr[]" class="form-select text-danger text-capitalize"><option value="good"@if (old('mvr[]') == 'good') ) selected @endif>{{ __('good') }}</option><option value="regular"@if (old('mvr[]') == 'regular') ) selected @endif>{{ __('regular') }}</option><option value="bad"@if (old('mvr[]') == 'bad') ) selected @endif>{{ __('bad') }}</option></select></div></div>'
            );
            var n = $("div[id='mvs']").length;
            if (n >= 4) {
                $('#addmvs').attr('disabled', true);
                $('#addmvs').hide(500);
            }
            if (n >= 0) {
                $('#removemvs').attr('disabled', false);
                $('#removemvs').show(500);
            }
        });

        /* DELETE MVS */
        $("#removemvs").click(function() {
            $('#mvs').last().remove();
            var n = $("div[id='mvs']").length;
            if (n <= 4) {
                $('#addmvs').attr('disabled', false);
                $('#addmvs').show(500);
            }
            if (n <= 0) {
                $('#removemvs').attr('disabled', true);
                $('#removemvs').hide(500);
            }
        });
        $("#removesmpt").hide();
        /* ADD SUPLEMENTOS */
        $("#addsmpt").click(function() {
            $(".form_smpt").append(
                '<div id="smpt" class="row mb-3"><div class="col-6"><input type="text" class="form-control text-danger" name="spmtname[]" maxlength="20" autofocus required></div><div class="col-3"><input type="date" class="form-control text-danger" name="spmtfecha[]" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" autofocus required></div><div class="col-3"><input type="time" class="form-control text-danger" name="spmttime[]" autofocus required></div></div>'
            );
            var n = $("div[id='smpt']").length;
            if (n == 4) {
                $('#addsmpt').attr('disabled', true);
                $('#addsmpt').hide(500);
            }
            if (n >= 0) {
                $('#removesmpt').attr('disabled', false);
                $('#removesmpt').show(500);
            }
        });

        /* DELETE SUPLEMENTOS */
        $("#removesmpt").click(function() {
            $('#smpt').last().remove();
            var n = $("div[id='smpt']").length;
            if (n <= 4) {
                $('#addsmpt').attr('disabled', false);
                $('#addsmpt').show(500);
            }
            if (n <= 0) {
                $('#removesmpt').attr('disabled', true);
                $('#removesmpt').hide(500);
            }
        });

        /* GENDER */
        $("#gender").change(function() {
            if ($("#gender").val() == 'male') {
                $('#icbc').attr("disabled", true);
                $('#ficbc').hide(600);
                $('#hvs').attr("disabled", true);
                $('#fhvs').hide(600);
                $('#ncr').attr("disabled", true);
                $('#fncr').hide(600);
            }
            if ($("#gender").val() == 'female') {
                $('#icbc').attr("disabled", false)
                $('#ficbc').show(600);
                $('#hvs').attr("disabled", false);
                $('#fhvs').show(600);
                $('#ncr').attr("disabled", false);
                $('#fncr').show(600);
            }
        }).change();
    </script>

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2/select2-bootstrap-5-theme.min.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/select2/select2.min.js') }}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: "resolve"
        });
    </script>
    <style>
        .select2-container {
            color: rgb(210, 0, 0);
        }

    </style>
@endsection
