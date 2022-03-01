@extends('layouts.app')

@section('content')
    <div class="card mx-auto bg-black border border-danger">
        <div class="card-header fs-4 border border-danger">
            {{ __('Add Pet') }}
        </div>
        <div class="card-body border border-danger">
            <form class="form-horizontal" method="POST" action="{{ route('Mascotas.store') }}"
                enctype="multipart/form-data" autocomplete="off">
                {{ csrf_field() }}
                {{-- USER ID --}}
                <input id="user_id" type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                <div class="card bg-black border border-danger">
                    <div class="card-body border border-danger">
                        {{-- NOMBRE, FNAC Y SSS --}}
                        <div class="row">
                            {{-- NOMBRE --}}
                            <div class="col-sm-5 mb-3 form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <label for="nombre" class="col-form-label fw-bold">
                                    {{ __('Name') }}
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
                            {{-- NACIMIENTO --}}
                            <div class="col-sm-3 mb-3 form-group{{ $errors->has('fnac') ? ' has-error' : '' }}">
                                <label for="fnac" class="col-form-label fw-bold">
                                    {{ __('Birthday') }}
                                </label>

                                <div class="col-auto">
                                    <input id="fnac" type="date" class="form-control text-danger" name="fnac"
                                        value="{{ old('fnac') }}" required autofocus>

                                    @if ($errors->has('fnac'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('fnac') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- SSS --}}
                            <div class="col-sm-4 mb-3 form-group{{ $errors->has('sss') ? ' has-error' : '' }}">
                                <label for="sss" class="col-form-label fw-bold">
                                    {{ __('Weight') }}
                                </label>
                                <div class="col-auto">
                                    <input id="sss" type="number" class="form-control text-danger" name="sss"
                                        value="{{ old('sss') }}" onKeyPress="if(this.value.length==4) return false;"
                                        onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" required autofocus
                                        min="300" max="505">

                                    @if ($errors->has('sss'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('sss') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- PLC Y PLU --}}
                        <div class="row mx-auto">
                            <div class="row col-sm-8">
                                {{-- PLC --}}
                                <div class="col-6 col-md-6 mb-3 form-group{{ $errors->has('plc') ? ' has-error' : '' }}">
                                    <label for="plc" class="col-form-label fw-bold">
                                        {{ __('Seal') }}
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
                                {{-- PLU --}}
                                <div class="col-6 col-md-6 mb-3 form-group{{ $errors->has('plu') ? ' has-error' : '' }}">
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
                                {{-- PAD, MAD Y DES --}}
                                {{-- PAD --}}
                                <div class="col-6 col-lg-4 mb-3 form-group{{ $errors->has('pad') ? ' has-error' : '' }}">
                                    <label for="pad" class="col-form-label fw-bold">
                                        {{ __('Father') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="pad" type="text" class="form-control text-danger" name="pad"
                                            value="{{ old('pad') }}" maxlength="30" required autofocus>

                                        @if ($errors->has('pad'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('pad') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- MAD --}}
                                <div class="col-6 col-lg-4 mb-3 form-group{{ $errors->has('mad') ? ' has-error' : '' }}">
                                    <label for="mad" class="col-form-label fw-bold">
                                        {{ __('Mother') }}
                                    </label>
                                    <div class="col-auto">
                                        <input id="mad" type="text" class="form-control text-danger" name="mad"
                                            value="{{ old('mad') }}" maxlength="30" required autofocus>

                                        @if ($errors->has('mad'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('mad') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- DES --}}
                                <div class="col col-lg-4 mb-3 form-group{{ $errors->has('des') ? ' has-error' : '' }}">
                                    <label for="des" class="col-form-label fw-bold">
                                        {{ __('Disability') }}
                                    </label>
                                    <div class="col-auto">
                                        <select class="form-select text-danger" id="des" name="des"
                                            value="{{ old('des') }}" required>
                                            <option selected value="No">{{ __('No') }}</option>
                                            <option value="Visual">{{ __('Visual') }}</option>
                                            <option value="Fisica">{{ __('Physical') }}</option>
                                            <option value="Auditiva">{{ __('Auditory') }}</option>
                                            <option value="Verbal">{{ __('Verbal') }}</option>
                                            <option value="Mental">{{ __('Mental') }}</option>
                                        </select>

                                        @if ($errors->has('des'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('des') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                {{-- OBS --}}
                                <div class="col-sm-12 mb-3 form-group{{ $errors->has('obs') ? ' has-error' : '' }}">
                                    <label for="obs" class="col-form-label fw-bold">
                                        {{ __('Observations') }}
                                    </label>
                                    <div class="col-auto">
                                        <textarea id="obs" class="form-control text-danger" name="obs"
                                            value="{{ old('obs') }}" rows="3" maxlength="200" required
                                            autofocus></textarea>

                                        @if ($errors->has('obs'))
                                            <span class="text-danger text-fs6">
                                                {{ $errors->first('obs') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mx-auto">
                                {{-- FOTO DE PERFIL --}}
                                <div class="col-sm-12 mb-3 form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                                    <label for="name" class="col-form-label fw-bold">
                                        {{ __('Photo Profile') }}
                                    </label>
                                    <div class="col-auto bg-dark rounded">
                                        <img id="preview" class="mx-auto d-block bg-black" width="136vh" height="200vh"
                                            style="max-width: 220px;" />
                                        <input id="foto" type="file" class="form-control text-danger form-control-sm"
                                            name="foto" value="{{ old('foto') }}" required autofocus accept="image/*">
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
                                {{ __('Add Pet') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script>
        /* PASTE AND COPY */
        $(document).ready(function() {
            $('input').bind('copy paste', function(e) {
                e.preventDefault();
            });
        });
        /* FOTO */
        foto.onchange = evt => {
            const [file] = foto.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
