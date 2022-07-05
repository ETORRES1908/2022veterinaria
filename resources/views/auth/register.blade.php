@extends('layouts.app')
@section('content')
    <div class="card bg-black border border-danger">
        <div class="card-header fw-bold fs-3 border border-danger">{{ __('Create your account') }}</div>
        <form class="text-uppercase" method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
            autocomplete="off">
            {!! csrf_field() !!}
            <div class="card-body border border-danger">
                {{-- USERNAME Y FOTO DE PERFIL --}}
                <div class="row">
                    {{-- NOMBRE Y APELLIDO --}}
                    <div class="row col-lg-8">
                        {{-- USERNAME --}}
                        <div class="col-sm-8 mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-form-label fw-bold">
                                * {{ __('User') }} / {{ __('Name Social') }}
                            </label>
                            <div class="col-auto">
                                <input id="name" type="text" class="form-control text-danger" name="name"
                                    style="text-transform:lowercase" value="{{ old('name') }}" required autofocus
                                    maxlength="12" onkeydown="return /[A-z1-9]/i.test(event.key)"
                                    oninput="this.value = this.value.replace(/[^A-z0-9]/g, '')">

                                @if ($errors->has('name'))
                                    <span class="text-danger fs-6">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- SIGN UP AS --}}
                        <div class="col-sm-4 mb-3 form-group{{ $errors->has('usert') ? ' has-error' : '' }}">
                            <label for="usert" class="col-form-label fw-bold">
                                * {{ __('Sign Up as') }}
                            </label>
                            <div class="col-auto">
                                <select id="usert" name="usert" class="form-select text-danger" required autofocus>
                                    <option value="" selected hidden>{{ __('') }}</option>
                                    <option value="own" @if (old('usert') == 'own') selected @endif>
                                        {{ __('Owner') }}</option>
                                    <option value="ppr" @if (old('usert') == 'ppr') selected @endif>
                                        {{ __('Preparer') }}</option>
                                    <option value="cls" @if (old('usert') == 'cls') selected @endif>
                                        {{ __('Coliseum') }}</option>
                                    <option value="cdk" @if (old('usert') == 'cdk') selected @endif>
                                        {{ __('Control desk') }}</option>
                                    <option value="jdg" @if (old('usert') == 'jdg') selected @endif>
                                        {{ __('Judge') }}</option>
                                    <option value="asst" @if (old('usert') == 'asst') selected @endif>
                                        {{ __('Assistant') }}</option>
                                    <option value="amt" @if (old('usert') == 'amt') selected @endif>
                                        {{ __('Amateur') }}</option>
                                </select>
                                @if ($errors->has('usert'))
                                    <span class="text-da nger fs-6">
                                        {{ $errors->first('usert') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- NOMBRE --}}
                        <div class="col-4 mb-3 form-group{{ $errors->has('nombre') ? 'has-error' : '' }}">
                            <label for="nombre" class="col-form-label fw-bold">
                                * {{ __('First name') }}
                            </label>
                            <div class="col-auto">
                                <input type="text" class="uppert form-control text-danger" name="nombre"
                                    style="text-transform: uppercase" value="{{ old('nombre') }}" required autofocus
                                    maxlength="12" onkeydown="return /[A-Z\s]/i.test(event.key)" />
                                @if ($errors->has('nombre'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('nombre') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                         {{-- PRUEBA --}}
                         <div class="col-4 mb-3 form-group{{ $errors->has('prueba') ? 'has-error' : '' }}">
                            <label for="prueba" class="col-form-label fw-bold">
                                * {{ __('prueba') }}
                            </label>
                            <div class="col-auto">
                                <input type="text" class="uppert form-control text-danger" name="prueba"
                                    style="text-transform: uppercase" value="{{ old('prueba') }}" required autofocus
                                    maxlength="12" onkeydown="return /[A-Z\s]/i.test(event.key)" />
                                @if ($errors->has('prueba'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('prueba') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- APELLIDO --}}
                        <div class="col-4 mb-3 form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-form-label fw-bold">
                                * {{ __('First surname') }}
                            </label>

                            <div class="col-auto">
                                <input type="text" class="uppert form-control  text-danger" name="apellido"
                                    style="text-transform: uppercase" value="{{ old('apellido') }}" autofocus required
                                    maxlength="12" onkeydown="return /[A-Z\s]/i.test(event.key)">

                                @if ($errors->has('apellido'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('apellido') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- COLISEO NAME --}}
                        <div id="clsname" class="col-12 mb-3">
                            <label for="nombre" class="col-form-label fw-bold">
                                * {{ __('Name') . ' ' . __('Coliseum') }}
                            </label>
                            <input type="text" class="form-control text-danger" name="clsname"
                                style="text-transform:uppercase" value="{{ old('clsname') }}" autofocus
                                pattern="[A-zÀ-ú1-9\s]+" maxlength="30"
                                onkeydown="return /[A-zÀ-ú1-9\s]/i.test(event.key)" />

                            @if ($errors->has('clsname'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('clsname') }}
                                </span>
                            @endif
                        </div>
                        {{-- DISCPACIDAD --}}
                        <div class="col-6 mb-3 form-group{{ $errors->has('discapacidad') ? ' has-error' : '' }}">
                            <label for="discapacidad" class="col-form-label fw-bold">
                                {{ __('Disability') }}
                            </label>
                            <select class="form-select text-danger" id="discapacidad" name="discapacidad"
                                value="{{ old('discapacidad') }}" required autofocus>
                                <option value="No" @if (old('discapacidad') == 'No') selected @endif>{{ __('No') }}
                                </option>
                                <option value="Visual" @if (old('discapacidad') == 'Visual') selected @endif>
                                    {{ __('Visual') }}
                                </option>
                                <option value="Fisica" @if (old('discapacidad') == 'Fisica') selected @endif>
                                    {{ __('Physical') }}
                                </option>
                                <option value="Auditiva" @if (old('discapacidad') == 'Auditiva') selected @endif>
                                    {{ __('Auditory') }}</option>
                                <option value="Verbal" @if (old('discapacidad') == 'Verbal') selected @endif>
                                    {{ __('Verbal') }}
                                </option>
                                <option value="Mental" @if (old('discapacidad') == 'Mental') selected @endif>
                                    {{ __('Mental') }}
                                </option>
                            </select>

                            @if ($errors->has('discapacidad'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('discapacidad') }}
                                </span>
                            @endif
                        </div>
                        {{-- NÚMERO DE DNI --}}
                        <div class="col-6 mb-3 form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="dni" class="col-form-label fw-bold text-uppercase">
                                * {{ __('DNI') }} / {{ __('identification card') }}
                            </label>

                            <div class="col-auto">
                                <input id="dni" type="number" class="form-control  text-danger" name="dni"
                                    value="{{ old('dni') }}" onKeyPress="if(this.value.length==12) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" required autofocus
                                    minlength="8" maxlength="12">

                                @if ($errors->has('dni'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('dni') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- FOTO DE PERFIL --}}
                    <div
                        class="col-lg-4 my-auto text-center mb-3 form-group{{ $errors->has('foto') ? 'has-error' : '' }}">
                        <label for="foto" class="col-form-label fw-bold text-uppercase">
                            {{ __('upload photo to your profile') }}
                        </label>
                        {{-- <label class="rounded border p-1 m-1 bg-danger text-white">
                            {{ __('put a photo is required') }}
                        </label> --}}
                        <div class="col-auto m-1 bg-black rounded">
                            <img id="preview" src="{{ asset('storage/img/defaultuser.png') }}"
                                class="img-fluid mx-auto d-block" height="240" />
                            <div for="foto" onclick="getFile()" id="v" class="btn btn-white bg-white d-flex">
                                <i id="cloud" class="bi bi-cloud-upload"></i>{{ __('Upload') }}
                                <div id="yourBtn" class="mx-2">...{{ __('there is no picture') }}
                                </div>
                            </div>
                            <input id="foto" type="file" name="foto" value="{{ old('foto') }}" autofocus accept="image/*"
                                onchange="sub(this)" hidden>
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
                                    document.getElementById("cloud").className = "bi bi-cloud-upload-fill";
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
                {{-- FOTOS DE DISABILITY --}}
                <div class="row" id="fdb" style="display: none">
                    {{-- FOTO DE DISABILITY --}}
                    <div class="col-sm-6 mb-3 text-center form-group{{ $errors->has('fdpt') ? ' has-error' : '' }}">
                        <label for="sdpt" class="col-form-label fw-bold">
                            {{ __('document') }} {{ __('Disability') }}
                        </label>
                        <div class="col-auto bg-black rounded">
                            <div style="clear:both">
                                <iframe id="viewer" frameborder="0" scrolling="no" height="200" width="100%"></iframe>
                            </div>
                            <input type="file" id="fdpt" name="fdpt" class="form-control form-control-sm"
                                value="{{ old('fdpt') }}" accept=".pdf">
                        </div>
                        @if ($errors->has('fdpt'))
                            <span class="text-danger fs-6">
                                {{ $errors->first('fdpt') }}
                            </span>
                        @endif
                    </div>
                    {{-- FOTO DE DISABILITY 2 --}}
                    <div class="col-sm-6 mb-3 text-center form-group{{ $errors->has('sdpt') ? ' has-error' : '' }}">
                        <label for="sdpt" class="col-form-label fw-bold">
                            {{ __('Photo') }} {{ __('Disability') }}
                        </label>
                        <div class="col-auto m-1 bg-black rounded">
                            <img id="sdview" class="mx-auto d-block" height="200" width="180" />
                            <input id="sdpt" type="file" class="form-control form-control-sm" name="sdpt"
                                value="{{ old('sdpt') }}" accept="image/*">
                        </div>

                        @if ($errors->has('sdpt'))
                            <span class="text-danger fs-6">
                                {{ $errors->first('sdpt') }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body border border-danger">
                {{-- BANNER --}}
                <div class="col-md-8 m-auto">
                    <div class="card-body">
                        <div id="bregister" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if (isset($banners[0]))
                                    <div class="carousel-item @if ($banners[0]->nombre = 'bregister1.jpeg') active @endif"
                                        data-bs-interval="1000">
                                        <a href="{{ $banners[0]->url }}" target="_blank">
                                            <img src="{{ asset($banners[0]->ruta) }}" class="img-fluid mx-auto d-block">
                                        </a>
                                    </div>
                                @endif
                                @foreach ($banners as $banner)
                                    <div class="carousel-item" data-bs-interval="1000">
                                        <a href="{{ $banner->url }}" target="_blank">
                                            <img src="{{ asset($banner->ruta) }}" class="img-fluid mx-auto d-block">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border border-danger">
                {{-- NOMBRE DE GALPON Y PREPA --}}
                <div class="row" id="galpre">
                    {{-- NOMBRE DE GALPON --}}
                    <div class="col-sm-6 mb-3 form-group{{ $errors->has('galpon') ? ' has-error' : '' }}">
                        <label for="galpon" class="col-form-label fw-bold">
                            {{ __('Shed') }}
                        </label>
                        <div class="col-auto">
                            <input id="galpon" type="text" class="form-control  text-danger" name="galpon"
                                style="text-transform:uppercase" value="{{ old('galpon') }}" maxlength="20" autofocus
                                onkeydown="return /[A-zÀ-ú1-9\s]/i.test(event.key)">
                            @if ($errors->has('galpon'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('galpon') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- PREPA --}}
                    <div class="col-sm-6 mb-3 form-group{{ $errors->has('prepa') ? ' has-error' : '' }}">
                        <label for="prepa" class="col-form-label fw-bold">
                            {{ __('Preparer') }}
                        </label>

                        <div class="col-auto">
                            <input id="prepa" type="text" class="form-control  text-danger" name="prepa"
                                value="{{ old('prepa') }}" maxlength="14" autofocus pattern="[A-zÀ-ú\s]+"
                                onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)">

                            @if ($errors->has('prepa'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('prepa') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- EMAIL, CELULAR Y COMPAÑIA --}}
                <div class="row">
                    {{-- EMAIL --}}
                    <div class="col-sm-6 mb-3 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-form-label fw-bold">
                            * {{ __('email') }}
                        </label>

                        <div class="col">
                            <input id="email" type="email" class="lowert form-control  text-danger" name="email"
                                style="text-transform: lowercase" value="{{ old('email') }}" maxlength="30" required
                                autofocus onkeydown="return /[A-zÁ-ú1-9._-@]/i.test(event.key)">

                            @if ($errors->has('email'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- CELULAR --}}
                    <div class="col-sm-3 mb-3 form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                        <label for="celular" class="col-form-label fw-bold">
                            * {{ __('Phone') }}
                        </label>
                        <div class="col-auto">
                            <input id="celular" type="number" class="form-control  text-danger" name="celular" minlength="9"
                                value="{{ old('celular') }}" onKeyPress="if(this.value.length==9) return false;"
                                minlength="9" onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" required
                                autofocus>

                            @if ($errors->has('celular'))
                                <span class="text-danger text-fs6">
                                    {{ __('This cell phone number already registered') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- OPERADOR --}}
                    <div class="col-sm-3 mb-3 form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-form-label fw-bold">
                            {{ __('Operator') }}
                        </label>

                        <div class="col-auto">
                            <select class="form-select text-danger text-uppercase" name="company" autofocus>
                                <option value="" hidden @if (old('company') == '') selected @endif></option>
                                <option value="bitel" @if (old('company') == 'bitel') selected @endif>BITEL</option>
                                <option value="claro" @if (old('company') == 'claro') selected @endif>CLARO</option>
                                <option value="entel" @if (old('company') == 'entel') selected @endif>ENTEL</option>
                                <option value="movitar" @if (old('company') == 'movitar') selected @endif>MOVISTAR
                                </option>
                                <option value="otros" @if (old('company') == 'otros') selected @endif>
                                    {{ __('Other') }}</option>
                            </select>

                            @if ($errors->has('company'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('company') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- PAIS, DEPARTAMENTO Y DISTRITO --}}
                <div class="row">
                    {{-- PAIS --}}
                    <div class="col-md-4 mb-3 form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="country" class="col-form-label fw-bold">
                            * {{ __('Country') }}
                        </label>

                        <div class="col">
                            <select class="select2 form-control form-select text-danger fw-bold" name="country"
                                id="country" value="{{ old('country') }}" required autofocus>
                                <option class="text-danger fw-bold" value="PER"
                                    @if (old('country') == 'PER') selected @endif>PER - Perú
                                </option>
                                <option class="text-danger fw-bold" value="CHI"
                                    @if (old('country') == 'CHI') selected @endif>CHI - Chile
                                </option>
                                <option class="text-danger fw-bold" value="COL"
                                    @if (old('country') == 'COL') selected @endif>COL - Colombia
                                </option>
                                <option class="text-danger fw-bold" value="ECU"
                                    @if (old('country') == 'ECU') selected @endif>ECU - Ecuador
                                </option>
                                <option class="text-danger fw-bold" value="MEX"
                                    @if (old('country') == 'MEX') selected @endif>MEX - México
                                </option>
                                <option class="text-danger fw-bold" value="PRI"
                                    @if (old('country') == 'PRI') selected @endif>PRI - Puerto Rico
                                </option>
                                <option class="text-danger fw-bold" value="DOM"
                                    @if (old('country') == 'DOM') selected @endif>DOM - Rep. Dominicana
                                </option>
                                <option class="text-danger fw-bold" value="OTR"
                                    @if (old('country') == 'OTR') selected @endif>OTR - Otros
                                </option>
                            </select>
                            @if ($errors->has('country'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('country') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- DEPARTAMENTO --}}
                    <div class="col-6 col-md-4 mb-3 form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-form-label fw-bold">
                            * {{ __('State') }}
                        </label>

                        <div class="col-auto">
                            <select class="form-control text-danger fw-bold text-uppercase" name="state" id="state"
                                value="{{ old('state') }}" required autofocus>
                                {{-- PERÚ --}}
                                <option data="PER" class="text-danger fw-bold" value="LM"
                                    @if (old('state') == 'LM') selected @endif>
                                    LM - Lima
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="AM"
                                    @if (old('state') == 'AM') selected @endif>
                                    AM - Amazonas
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="AN"
                                    @if (old('state') == 'AN') selected @endif>
                                    AN - Ancash
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="AP"
                                    @if (old('state') == 'AP') selected @endif>
                                    AP - Apurímac
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="AR"
                                    @if (old('state') == 'AR') selected @endif>
                                    AR - Arequipa
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="AY"
                                    @if (old('state') == 'AY') selected @endif>
                                    AY - Ayacucho
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="CJ"
                                    @if (old('state') == 'CJ') selected @endif>
                                    CJ - Cajamarca
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="CZ"
                                    @if (old('state') == 'CZ') selected @endif>
                                    CZ - Cuzco
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="HC"
                                    @if (old('state') == 'HC') selected @endif>
                                    HC - Huancavelica
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="HU"
                                    @if (old('state') == 'HU') selected @endif>
                                    HU - Huánuco
                                </option>
                                <option data=" PER" class="text-danger fw-bold" value="IC"
                                    @if (old('state') == 'IC') selected @endif>
                                    IC - Ica
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="JU"
                                    @if (old('state') == 'JU') selected @endif>
                                    JU - Junín
                                </option>
                                <option data=" PER" class="text-danger fw-bold" value="LL"
                                    @if (old('state') == 'LL') selected @endif>
                                    LL - La Libertad
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="LB"
                                    @if (old('state') == 'LB') selected @endif>
                                    LB - Lambayeque
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="LO"
                                    @if (old('state') == 'LO') selected @endif>
                                    LO - Loreto
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="MD"
                                    @if (old('state') == 'MD') selected @endif>
                                    MD - Madre de Dios
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="MQ"
                                    @if (old('state') == 'MQ') selected @endif>
                                    MQ - Moquegua
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="PA"
                                    @if (old('state') == 'PA') selected @endif>
                                    PA - Pasco
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="PI"
                                    @if (old('state') == 'PI') selected @endif>
                                    PI - Piura
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="PU"
                                    @if (old('state') == 'PU') selected @endif>
                                    PU - Puno
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="SM"
                                    @if (old('state') == 'SM') selected @endif>
                                    SM - San Martín</option>
                                <option data="PER" class="text-danger fw-bold" value="TA"
                                    @if (old('state') == 'TA') selected @endif>
                                    TA - Tacna
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="TU"
                                    @if (old('state') == 'TU') selected @endif>
                                    TU - Tumbes
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="UC"
                                    @if (old('state') == 'UC') selected @endif>
                                    UC - Ucayali
                                </option>
                                {{-- CHILE --}}
                                <option data="CHI" class="text-danger fw-bold" value="RM"
                                    @if (old('state') == 'RM') selected @endif>
                                    RM - Santiago de Chile
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="AI"
                                    @if (old('state') == 'AI') selected @endif>
                                    AI - Aysén
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="AN"
                                    @if (old('state') == 'AN') selected @endif>
                                    AN - Antofagasta
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="AP"
                                    @if (old('state') == 'AP') selected @endif>
                                    AP - Arica y Parinacota
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="AT"
                                    @if (old('state') == 'AT') selected @endif>
                                    AT - Atacama
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="BI"
                                    @if (old('state') == 'BI') selected @endif>
                                    BI - Biobío
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="CO"
                                    @if (old('state') == 'CO') selected @endif>
                                    CO - Coquimbo
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="AR"
                                    @if (old('state') == 'AR') selected @endif>
                                    AR - La Araucanía
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="LI"
                                    @if (old('state') == 'LI') selected @endif>
                                    LI - O'Higgins
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="LL"
                                    @if (old('state') == 'LL') selected @endif>
                                    LL - Los Lagos
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="LR"
                                    @if (old('state') == 'LR') selected @endif>
                                    LR - Los Ríos
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="MA"
                                    @if (old('state') == 'MA') selected @endif>
                                    MA - Magallanes
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="ML"
                                    @if (old('state') == 'ML') selected @endif>
                                    ML - Maule
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="TA"
                                    @if (old('state') == 'TA') selected @endif>
                                    TA - Tarapacá
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="VS"
                                    @if (old('state') == 'VS') selected @endif>
                                    VS - Valparaíso
                                </option>
                                <option data="CHI" class="text-danger fw-bold" value="NB"
                                    @if (old('state') == 'NB') selected @endif>
                                    NB - Ñuble
                                </option>
                                {{-- COLOMBIA --}}
                                <option data="COL" class="text-danger fw-bold" value="BO"
                                    @if (old('state') == 'BO') selected @endif>
                                    BO - Bogotá
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="AM"
                                    @if (old('state') == 'AM') selected @endif>
                                    AM - Amazonas
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="AT"
                                    @if (old('state') == 'AT') selected @endif>
                                    AT - Antioquia
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="AR"
                                    @if (old('state') == 'ARA') selected @endif>
                                    ARA - Arauca
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="AT"
                                    @if (old('state') == 'AT') selected @endif>
                                    AT - Atlántico
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="BL"
                                    @if (old('state') == 'BL') selected @endif>
                                    BL - Bolívar
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="BY"
                                    @if (old('state') == 'BY') selected @endif>
                                    BY - Boyacá
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CL"
                                    @if (old('state') == 'CL') selected @endif>
                                    CL - Caldas
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CQ"
                                    @if (old('state') == 'CQ') selected @endif>
                                    CQ - Caquetá
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CS"
                                    @if (old('state') == 'CS') selected @endif>
                                    CS - Casanare
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CU"
                                    @if (old('state') == 'CU') selected @endif>
                                    CU - Cauca
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CS"
                                    @if (old('state') == 'CS') selected @endif>
                                    CS - Cesar
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CH"
                                    @if (old('state') == 'CH') selected @endif>
                                    CH - Chocó
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CU"
                                    @if (old('state') == 'CU') selected @endif>
                                    CU - Cundinamarca
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="CR"
                                    @if (old('state') == 'CR') selected @endif>
                                    CR - Córdoba
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="GU"
                                    @if (old('state') == 'GU') selected @endif>
                                    GU - Guainía
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="GV"
                                    @if (old('state') == 'GV') selected @endif>
                                    GV - Guaviare
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="HU"
                                    @if (old('state') == 'HU') selected @endif>
                                    HU - Huila
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="LG"
                                    @if (old('state') == 'LG') selected @endif>
                                    LG - La Guajira
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="MG"
                                    @if (old('state') == 'MG') selected @endif>
                                    MG - Magdalena
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="MT"
                                    @if (old('state') == 'MT') selected @endif>
                                    MT - Meta
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="NR"
                                    @if (old('state') == 'NR') selected @endif>
                                    NR - Nariño
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="NS"
                                    @if (old('state') == 'NS') selected @endif>
                                    NS - Norte de Santander
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="PT"
                                    @if (old('state') == 'PT') selected @endif>
                                    PT - Putumayo
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="QU"
                                    @if (old('state') == 'QUI') selected @endif>
                                    QU - Quindío
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="RS"
                                    @if (old('state') == 'RS') selected @endif>
                                    RS - Risaralda
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="SP"
                                    @if (old('state') == 'SP') selected @endif>
                                    SP - San Andrés, Providencia y Santa Catalina
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="SN"
                                    @if (old('state') == 'SN') selected @endif>
                                    SN - Santander
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="SC"
                                    @if (old('SC') == 'SC') selected @endif>
                                    SC - Sucre
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="TL"
                                    @if (old('state') == 'TL') selected @endif>
                                    TL - Tolima
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="VC"
                                    @if (old('state') == 'VC') selected @endif>
                                    VC - Valle del Cauca
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="VU"
                                    @if (old('state') == 'VU') selected @endif>
                                    VU - Vaupés
                                </option>
                                <option data="COL" class="text-danger fw-bold" value="VD"
                                    @if (old('state') == 'VD') selected @endif>
                                    VD - Vichada
                                </option>
                                {{-- ECUADOR --}}
                                <option data="ECU" class="text-danger fw-bold" value="AZ"
                                    @if (old('state') == 'AZ') selected @endif>
                                    AZ - Azuay
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="BL"
                                    @if (old('state') == 'BL') selected @endif>
                                    BL - Bolívar
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="CA"
                                    @if (old('state') == 'CA') selected @endif>
                                    CA - Carchi
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="CÑ"
                                    @if (old('state') == 'CÑ') selected @endif>
                                    CÑ - Cañar
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="CH"
                                    @if (old('state') == 'CH') selected @endif>
                                    CH - Chimborazo
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="CO"
                                    @if (old('state') == 'CO') selected @endif>
                                    CO - Cotopaxi
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="EO"
                                    @if (old('state') == 'EO') selected @endif>
                                    EO - El Oro
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="ES"
                                    @if (old('state') == 'ES') selected @endif>
                                    ES - Esmeraldas
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="GA"
                                    @if (old('state') == 'GA') selected @endif>
                                    GA - Galápagos
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="GU"
                                    @if (old('state') == 'GU') selected @endif>
                                    GU - Guayas
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="IM"
                                    @if (old('state') == 'IM') selected @endif>
                                    IM - Imbabura
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="LO"
                                    @if (old('state') == 'LO') selected @endif>
                                    LO - Loja
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="LR"
                                    @if (old('state') == 'LR') selected @endif>
                                    LR - Los Ríos
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="MA"
                                    @if (old('state') == 'MA') selected @endif>
                                    MA - Manabí
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="MS"
                                    @if (old('state') == 'MS') selected @endif>
                                    MS - Morona Santiago
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="NA"
                                    @if (old('state') == 'NA') selected @endif>
                                    NA - Napo
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="OR"
                                    @if (old('state') == 'OR') selected @endif>
                                    OR - Orellana
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="PA"
                                    @if (old('state') == 'PA') selected @endif>
                                    PA - Pastaza
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="PI"
                                    @if (old('state') == 'PI') selected @endif>
                                    PI - Pichincha
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="SE"
                                    @if (old('state') == 'SE') selected @endif>
                                    SE - Santa Elena
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="ST"
                                    @if (old('state') == 'ST') selected @endif>
                                    ST - Santo Domingo de los Tsáchilas
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="SU"
                                    @if (old('state') == 'SU') selected @endif>
                                    SU - Sucumbíos
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="TU"
                                    @if (old('state') == 'TU') selected @endif>
                                    TU - Tungurahua
                                </option>
                                <option data="ECU" class="text-danger fw-bold" value="ZC"
                                    @if (old('state') == 'ZC') selected @endif>
                                    ZC - Zamora Chinchipe
                                </option>
                                {{-- MEX --}}
                                <option data="MEX" class="text-danger fw-bold" value="CX"
                                    @if (old('state') == 'CX') selected @endif>
                                    CX - Ciudad de México
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="AG"
                                    @if (old('state') == 'AG') selected @endif>
                                    AG - Aguascalientes
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="BC"
                                    @if (old('state') == 'BC') selected @endif>
                                    BC - Baja California
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="BS"
                                    @if (old('state') == 'BS') selected @endif>
                                    BS - Baja California Sur
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="CM"
                                    @if (old('state') == 'CM') selected @endif>
                                    CM - Campeche
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="CS"
                                    @if (old('state') == 'CS') selected @endif>
                                    CS - Chiapas
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="CH"
                                    @if (old('state') == 'CH') selected @endif>
                                    CH - Chihuahua
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="CO"
                                    @if (old('state') == 'CO') selected @endif>
                                    CO - Coahuila
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="CL"
                                    @if (old('state') == 'CL') selected @endif>
                                    CL - Colima
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="DG"
                                    @if (old('state') == 'DG') selected @endif>
                                    DG - Durango
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="GT"
                                    @if (old('state') == 'GT') selected @endif>
                                    GT - Guanajuato
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="GR"
                                    @if (old('state') == 'GR') selected @endif>
                                    GR - Guerrero
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="HG"
                                    @if (old('state') == 'HG') selected @endif>
                                    HG - Hidalgo
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="JC"
                                    @if (old('state') == 'JC') selected @endif>
                                    JC - Jalisco
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="EM"
                                    @if (old('state') == 'EM') selected @endif>
                                    EM - México
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="MI"
                                    @if (old('state') == 'MI') selected @endif>
                                    MI - Michoacán
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="MO"
                                    @if (old('state') == 'MO') selected @endif>
                                    MO - Morelos
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="NA"
                                    @if (old('state') == 'NA') selected @endif>
                                    NA - Nayarit
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="NL"
                                    @if (old('state') == 'NL') selected @endif>
                                    NL - Nuevo León
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="OA"
                                    @if (old('state') == 'OA') selected @endif>
                                    OA - Oaxaca
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="PU"
                                    @if (old('state') == 'PU') selected @endif>
                                    PU - Puebla
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="QT"
                                    @if (old('state') == 'QT') selected @endif>
                                    QT - Querétaro
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="QR"
                                    @if (old('state') == 'QR') selected @endif>
                                    QR - Quintana Roo
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="SL"
                                    @if (old('state') == 'SL') selected @endif>
                                    SL - San Luis Potosí
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="SI"
                                    @if (old('state') == 'SI') selected @endif>
                                    SI - Sinaloa
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="SO"
                                    @if (old('state') == 'SO') selected @endif>
                                    SO - Sonora
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="TB"
                                    @if (old('state') == 'TB') selected @endif>
                                    TB - Tabasco
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="TL"
                                    @if (old('state') == 'TL') selected @endif>
                                    TL - Tlaxcala
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="TM"
                                    @if (old('state') == 'TM') selected @endif>
                                    TM - Tamaulipas
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="TL"
                                    @if (old('state') == 'TL') selected @endif>
                                    TL - Tlaxcala
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="VE"
                                    @if (old('state') == 'VE') selected @endif>
                                    VE - Veracruz
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="YU"
                                    @if (old('state') == 'YU') selected @endif>
                                    YU - Yucatán
                                </option>
                                <option data="MEX" class="text-danger fw-bold" value="ZA"
                                    @if (old('state') == 'ZA') selected @endif>
                                    ZA - Zacatecas
                                </option>
                                {{-- PUERTO RICO --}}
                                <option data="PRI" class="text-danger fw-bold" value="SJ"
                                    @if (old('state') == 'SJ') selected @endif>
                                    SJ - San Juan
                                </option>
                                <option data="PRI" class="text-danger fw-bold" value="BY"
                                    @if (old('state') == 'BY') selected @endif>
                                    BY - Bayamón
                                </option>
                                <option data="PRI" class="text-danger fw-bold" value="AB"
                                    @if (old('state') == 'AB') selected @endif>
                                    AB - Arecibo
                                </option>
                                <option data="PRI" class="text-danger fw-bold" value="AM"
                                    @if (old('state') == 'AM') selected @endif>
                                    AM - Aguadilla/ Mayagüez
                                </option>
                                <option data="PRI" class="text-danger fw-bold" value="GY"
                                    @if (old('state') == 'GY') selected @endif>
                                    GY - Guayama
                                </option>
                                <option data="PRI" class="text-danger fw-bold" value="PN"
                                    @if (old('state') == 'PN') selected @endif>
                                    PN - Ponce
                                </option>
                                <option data="PRI" class="text-danger fw-bold" value="HO"
                                    @if (old('state') == 'HO') selected @endif>
                                    HO - Humacao
                                </option>
                                <option data="PRI" class="text-danger fw-bold" value="CN"
                                    @if (old('state') == 'CN') selected @endif>
                                    CN - Carolina
                                </option>
                                {{-- REPUBLICA DOMINICANA --}}
                                <option data="DOM" class="text-danger fw-bold" value="SJ"
                                    @if (old('state') == 'SJ') selected @endif>
                                    SJ - San Juan
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="AZ"
                                    @if (old('state') == 'AZ') selected @endif>
                                    AZ - Azua
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="AG"
                                    @if (old('state') == 'AG') selected @endif>
                                    AG - La Altagracia
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="BH"
                                    @if (old('state') == 'BH') selected @endif>
                                    BH - Barahona
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="DT"
                                    @if (old('state') == 'DT') selected @endif>
                                    DT - Duarte
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="EP"
                                    @if (old('state') == 'EP') selected @endif>
                                    EP - Elías Piña
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="ES"
                                    @if (old('state') == 'ES') selected @endif>
                                    ES - El Seibo
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="HM"
                                    @if (old('state') == 'HM') selected @endif>
                                    HM - Hato Mayor
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="IP"
                                    @if (old('state') == 'IP') selected @endif>
                                    IP - Independencia
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="LV"
                                    @if (old('state') == 'LV') selected @endif>
                                    LV - La Vega
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="MC"
                                    @if (old('state') == 'MC') selected @endif>
                                    MC - Monte Cristi
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="MP"
                                    @if (old('state') == 'MP') selected @endif>
                                    MP - Monte Plata
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="PD"
                                    @if (old('state') == 'PD') selected @endif>
                                    PD - Pedernales
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="PP"
                                    @if (old('state') == 'PP') selected @endif>
                                    PP - Puerto Plata
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="SD"
                                    @if (old('state') == 'SD') selected @endif>
                                    SD - Santo Domingo
                                </option>
                                <option data="DOM" class="text-danger fw-bold" value="SA"
                                    @if (old('state') == 'SA') selected @endif>
                                    SA - Santiago
                                </option>
                                {{-- OTHER --}}
                                <option target="OTR" class="text-danger fw-bold" value="OTR"
                                    @if (old('state') == 'OTR') selected @endif>
                                    OTR - {{ __('Other') }}
                                </option>
                            </select>

                            @if ($errors->has('state'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('state') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- DISTRITO --}}
                    <div class="col-6 col-md-4 mb-3 form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                        <label for="district" class="col-form-label fw-bold">
                            {{ __('District') }}
                        </label>
                        <div class="col-auto">
                            <input id="district" type="text" class="form-control  text-danger" name="district"
                                value="{{ old('district') }}" maxlength="18" autofocus pattern="[A-zÀ-ú\s]+"
                                onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)">

                            @if ($errors->has('district'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('district') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- DIRECCION Y OFICIO --}}
                <div class="row">
                    {{-- DIRECCION --}}
                    <div class="col-sm-7 mb-3 form-group{{ $errors->has('direction') ? ' has-error' : '' }}">
                        <label for="direction" class="col-form-label fw-bold">
                            {{ __('Direction') }}
                        </label>
                        <div class="col-auto">
                            <input id="direction" type="text" class="form-control  text-danger" name="direction"
                                value="{{ old('direction') }}" maxlength="50" autofocus
                                placeholder="{{ __('Include ref or alt.') }}">

                            @if ($errors->has('direction'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('direction') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- OFICIO --}}
                    <div class="col-sm-5 mb-3 form-group{{ $errors->has('job') ? ' has-error' : '' }}">
                        <label for="job" class="col-form-label fw-bold">
                            {{ __('Profession or Trade') }}
                        </label>
                        <div class="col-auto">
                            <input id="job" type="text" class="form-control  text-danger" name="job"
                                value="{{ old('job') }}" maxlength="36" autofocus
                                placeholder="{{ __('Architect, Carpenter') }}" pattern="[A-zÀ-ú\s]+"
                                onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)">

                            @if ($errors->has('job'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('job') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- CONTRASEÑA Y CONFIRMACIÓN --}}
                <div class="row">
                    {{-- CONTRASEÑA --}}
                    <div class="col-sm-6 mb-3 form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="col-form-label fw-bold"
                            onKeyPress="if(this.value.length==8) return false;">
                            * {{ __('Password') }}
                        </label>

                        <div class="col-auto">
                            <input type="password" class="form-control text-danger" name="password" minlength="8"
                                onKeyPress="if(this.value.length==8) return false;" pattern="^(?=\D*\d)(?=.*?[a-zA-Z]).{8}"
                                required autofocus placeholder="{{ __('8 digits - Minimum 1 letter and 1 number') }}">
                            @if ($errors->has('password'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- CONFIRMAR CONTRASEÑA --}}
                    <div class="col-sm-6 mb-3 form-group">
                        <label for="password-confirm" class="col-form-label fw-bold">
                            * {{ __('Confirm Password') }}
                            {{-- ? --}}
                        </label>
                        <div class="col-auto">
                            <input type="password" class="form-control  text-danger" name="password_confirmation" required
                                onKeyPress="if(this.value.length==8) return false;" autofocus minlength="8"
                                placeholder="{{ __('8 digits - Minimum 1 letter and 1 number') }}">
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>
                </div>

                {{-- ELEGIR RESPUESTA --}}
                <div class="col-12 mb-3 form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                    <label for="answer" class="col-auto col-form-label fw-bold">
                        * {{ __('secrect answer') }}
                    </label>
                    <input id="answer" type="text" class="form-control text-danger" name="answer" maxlength="12"
                        value="{{ old('answer') }}" required autofocus style="text-transform: lowercase"
                        placeholder="{{ __('To recover your account') }}"
                        onkeydown="return /[A-z1-9\s]/i.test(event.key)">
                    @if ($errors->has('answer'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('answer') }}
                        </span>
                    @endif
                </div>
                <div class="row">
                    {{-- CAPTCHAT AND INPUT CAPCHAT --}}
                    <div class="col-auto form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                        <div class="row mb-3">
                            {{-- CAPTCHAT --}}
                            <div for="Captcha" class="col-lg-6 col-form-label my-auto text-start">
                                {!! captcha_img() !!}
                            </div>
                            {{-- INPUT CAPTCHAT --}}
                            <div class="col-7 col-lg-6 my-auto text-start">
                                <input id="captcha" type="text" class="form-control text-danger fw-bold" name="captcha"
                                    required autofocus placeholder="{{ __('Result of blast') }}">

                                @if ($errors->has('captcha'))
                                    <span class="fs-6 text-danger">
                                        {{ $errors->first('captcha') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- BOTON DE REGISTRO --}}
                    <div class="col-lg-5 my-auto text-start">
                        <div class="row mb-3">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-success text-uppercase">
                                    {{ __('Create your account') }}
                                </button>
                            </div>
                            <div class="col-auto">
                                <a type="" class="btn btn-secondary" href="{{ route('contact') }}">
                                    {{ __('Contact us') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- SCRIPTS --}}
    <script>
        /*  POPOVER  */
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
        /* DISABILITY */
        $("#discapacidad").change(function() {
            if ($("#discapacidad").val() != 'No') {
                $('#fdb').show(600);
            }
            if ($("#discapacidad").val() == 'No') {
                $('#fdb').hide(600);
            }
            /* PREVIEW */
            sdpt.onchange = evt => {
                const [file] = sdpt.files
                if (file) {
                    sdview.src = URL.createObjectURL(file)
                }
            };
        }).change();

        /* STATE -  */
        var $select1 = $('#country'),
            $select2 = $('#state'),
            $options = $select2.find('option');

        $select1.on('change', function() {
            $select2.html($options.filter('[data="' + this.value + '"],[target="OTR"]'));
        }).trigger('change');

        /*  DONT COPY OR PASTE*/
        $(document).ready(function() {
            $('input').bind('cut copy paste', function(e) {
                e.preventDefault();
            });
        });

        /* DISABILITY DOCUMENT */
        fdpt.onchange = evt => {
            pdffile = document.getElementById("fdpt").files[0];
            pdffile_url = URL.createObjectURL(pdffile);
            $('#viewer').attr('src', pdffile_url);
        };

        $('#clsname').hide();
        $('#galpre').hide();
        /* USERT */
        $("#usert").change(function() {
            switch ($("#usert").val()) {
                case 'own':
                    $('#galpre').attr("disabled", false);
                    $('#galpre').show(600);
                    $('#clsname').attr("disabled", true);
                    $('#clsname').hide(600);
                    break;
                case 'cls':
                    $('#galpre').attr("disabled", true);
                    $('#galpre').hide(600);
                    $('#clsname').attr("disabled", false);
                    $('#clsname').show(600);
                    break;
                case 'jdg':
                    $('#galpre').attr("disabled", true);
                    $('#galpre').hide(600);
                    $('#clsname').attr("disabled", true);
                    $('#clsname').hide(600);
                    break;
                case 'ppr':
                    $('#galpre').attr("disabled", true);
                    $('#galpre').hide(600);
                    $('#clsname').attr("disabled", true);
                    $('#clsname').hide(600);
                    break;
                case 'cdk':
                    $('#galpre').attr("disabled", true);
                    $('#galpre').hide(600);
                    $('#clsname').attr("disabled", true);
                    $('#clsname').hide(600);
                    break;
                case 'asst':
                    $('#galpre').attr("disabled", true);
                    $('#galpre').hide(600);
                    $('#clsname').attr("disabled", true);
                    $('#clsname').hide(600);
                    break;
                case 'amt':
                    $('#galpre').attr("disabled", true);
                    $('#galpre').hide(600);
                    $('#clsname').attr("disabled", true);
                    $('#clsname').hide(600);
                    break;

                default:
                    break;
            }
        }).change();
    </script>
    <script>
        $(function() {
            $('.uppert').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });
        });
        $(function() {
            $('.lowert').keyup(function() {
                this.value = this.value.toLocaleLowerCase();
            });
        });
    </script>
@endsection
