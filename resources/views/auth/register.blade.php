@extends('layouts.app')

@section('content')
    <div class="card mx-auto text-black">
        <div class="card-header fw-bold fs-3">{{ __('Register') }}</div>
        <div class="card-body ">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                autocomplete="off">
                {{ csrf_field() }}
                {{-- USERNAME Y FOTO DE PERFIL --}}
                <div class="row">
                    {{-- NOMBRE Y APELLIDO --}}
                    <div class="row col-md-8">
                        {{-- USERNAME --}}
                        <div class="col-8 mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-form-label fw-bold">
                                {{ __('Username') }}/{{ __('Nickname') }}
                            </label>

                            <div class="col-auto">
                                <input id="name" type="text" class="form-control text-danger" name="name"
                                    value="{{ old('name') }}" required autofocus maxlength="15">

                                @if ($errors->has('name'))
                                    <span class="text-da nger fs-6">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif

                            </div>
                        </div>
                        {{-- SIGN UP AS --}}
                        <div class="col-4 mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-form-label fw-bold">
                                {{ __('SIGN UP AS') }}
                            </label>

                            <div class="col-auto">
                                <select name="sia" class="form-select text-danger" required autofocus>
                                    <option value="DUEGLP">DUEGLP</option>
                                    <option value="DUELCO">DUELCO</option>
                                    <option value="JUE">JUE</option>
                                    <option value="JUE">AFI</option>
                                </select>

                                @if ($errors->has('name'))
                                    <span class="text-da nger fs-6">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif

                            </div>
                        </div>
                        {{-- NOMBRE --}}
                        <div class="col-6 mb-3 form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="nombre" class="col-form-label fw-bold">
                                {{ __('Name') }}
                            </label>
                            <div class="col-auto">
                                <input type="text" class="form-control text-danger" name="nombre"
                                    value="{{ old('nombre') }}" required autofocus pattern="[A-zÀ-ú\S]+" maxlength="10">

                                @if ($errors->has('nombre'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('nombre') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- APELLIDO --}}
                        <div class="col-6 mb-3 form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-form-label fw-bold">
                                {{ __('Surname') }}
                            </label>

                            <div class="col-auto">
                                <input id="apellido" type="text" class="form-control  text-danger" name="apellido"
                                    value="{{ old('apellido') }}" autofocus required pattern="[A-zÀ-ú\S]+"
                                    maxlength="10">

                                @if ($errors->has('apellido'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('apellido') }}
                                    </span>
                                @endif
                            </div>
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
                            <label for="dni" class="col-form-label fw-bold">
                                {{ __('N°DNI') }}
                            </label>

                            <div class="col-auto">
                                <input id="dni" type="number" class="form-control  text-danger" name="dni"
                                    value="{{ old('dni') }}" required autofocus maxlength="7">

                                @if ($errors->has('dni'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('dni') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- FOTO DE PERFIL --}}
                    <div class="col-md-4 mb-3 form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                        <label for="foto" class="col-form-label fw-bold">
                            {{ __('Photo') }}
                        </label>
                        <div class="col-auto m-1 bg-black rounded">
                            <img id="preview" class="mx-auto d-block" height="200" width="180" />
                            <input id="foto" type="file" class="form-control form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept="image/*">
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
                        <label for="sdpt" class="col-form-label fw-bold text-uppercase">
                            {{ __('certificate') }} {{ __('Disability') }}
                        </label>
                        <div class="col-auto bg-black rounded">
                            <img id="fdview" class="mx-auto d-block" height="200" width="180" />
                            <input id="fdpt" type="file" class="form-control form-control-sm" name="fdpt"
                                value="{{ old('fdpt') }}" accept="image/*">
                        </div>
                        @if ($errors->has('fdpt'))
                            <span class="text-danger fs-6">
                                {{ $errors->first('fdpt') }}
                            </span>
                        @endif
                    </div>
                    {{-- FOTO DE DISABILITY 2 --}}
                    <div class="col-sm-6 mb-3 text-center form-group{{ $errors->has('sdpt') ? ' has-error' : '' }}">
                        <label for="sdpt" class="col-form-label fw-bold text-uppercase">
                            {{ __('Photo') }}
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
                {{-- NOMBRE DE GALPON Y PREPA --}}
                <div class="row">
                    {{-- NOMBRE DE GALPON --}}
                    <div class="col-sm-6 mb-3 form-group{{ $errors->has('galpon') ? ' has-error' : '' }}">
                        <label for="galpon" class="col-form-label fw-bold">
                            {{ __('Galpon') }}
                        </label>
                        <div class="col-auto">
                            <input id="galpon" type="text" class="form-control  text-danger" name="galpon"
                                value="{{ old('galpon') }}" required autofocus>

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
                            {{ __('Trainer') }}
                        </label>

                        <div class="col-auto">
                            <input id="prepa" type="text" class="form-control  text-danger" name="prepa"
                                value="{{ old('prepa') }}" required autofocus>

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
                            {{ __('E-Mail Address') }}
                        </label>

                        <div class="col">
                            <input id="email" type="email" class="form-control  text-danger" name="email"
                                value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- COMPAÑIA --}}
                    <div class="col-sm-3 mb-3 form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                        <label for="company" class="col-form-label fw-bold">
                            {{ __('Company') }}
                        </label>

                        <div class="col-auto">
                            <select class="form-select text-danger text-uppercase" name="company" required autofocus>
                                <option value="bitel" @if (old('company') == 'bitel') selected @endif>BITEL</option>
                                <option value="claro" @if (old('company') == 'claro') selected @endif>CLARO</option>
                                <option value="entel" @if (old('company') == 'entel') selected @endif>ENTEL</option>
                                <option value="movitar" @if (old('company') == 'movitar') selected @endif>MOVISTAR</option>
                                <option value="otro" @if (old('company') == 'otro') selected @endif>
                                    {{ __('Other') }}</option>
                            </select>

                            @if ($errors->has('company'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('company') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- CELULAR --}}
                    <div class="col-sm-3 mb-3 form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                        <label for="celular" class="col-form-label fw-bold">
                            N°{{ __('Phone') }}
                        </label>
                        <div class="col-auto">
                            <input id="celular" type="text" class="form-control  text-danger" name="celular"
                                value="{{ old('celular') }}" required autofocus>

                            @if ($errors->has('celular'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('celular') }}
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
                            {{ __('Country') }}
                        </label>

                        <div class="col">
                            <select class="select2 form-control form-select text-danger fw-bold" name="country" id="country"
                                value="{{ old('country') }}" required autofocus>
                                <option class="text-danger fw-bold" value="PER"
                                    @if (old('country') == 'PER') selected @endif>Perú</option>
                                {{-- <option class="text-danger fw-bold" value="CHL"
                                    @if (old('country') == 'CHL') selected @endif>Chile</option> --}}
                            </select>

                            @if ($errors->has('country'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('country') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- DEPARTAMENTO --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-form-label fw-bold">
                            {{ __('State') }}
                        </label>

                        <div class="col-auto">
                            <select class="select2 form-control form-select text-danger fw-bold" name="state" id="state"
                                value="{{ old('state') }}" required autofocus>
                                <option data="PER" class="text-danger fw-bold" value="AM"
                                    @if (old('state') == 'AM') selected @endif>AM-Amazonas</option>
                                <option data="PER" class="text-danger fw-bold" value="AN"
                                    @if (old('state') == 'AN') selected @endif>Ancash</option>
                                <option data="PER" class="text-danger fw-bold" value="AP"
                                    @if (old('state') == 'AP') selected @endif>Apurímac</option>
                                <option data="PER" class="text-danger fw-bold" value="AR"
                                    @if (old('state') == 'AR') selected @endif>Arequipa</option>
                                <option data="PER" class="text-danger fw-bold" value="AY"
                                    @if (old('state') == 'AY') selected @endif>Ayacucho</option>
                                <option data="PER" class="text-danger fw-bold" value="CJ"
                                    @if (old('state') == 'CJ') selected @endif>Cajamarca</option>
                                <option data="PER" class="text-danger fw-bold" value="CZ"
                                    @if (old('state') == 'CZ') selected @endif>Cuzco</option>
                                <option data="PER" class="text-danger fw-bold" value="HC"
                                    @if (old('state') == 'HC') selected @endif>Huancavelica</option>
                                <option data="PER" class="text-danger fw-bold" value="HU"
                                    @if (old('state') == 'HU') selected @endif>Huánuco</option>
                                <option data=" PER" class="text-danger fw-bold" value="IC"
                                    @if (old('state') == 'IC') selected @endif>Ica</option>
                                <option data="PER" class="text-danger fw-bold" value="JU"
                                    @if (old('state') == 'JU') selected @endif>Junín</option>
                                <option data=" PER" class="text-danger fw-bold" value="LL"
                                    @if (old('state') == 'LL') selected @endif>La Libertad</option>
                                <option data="PER" class="text-danger fw-bold" value="LB"
                                    @if (old('state') == 'LB') selected @endif>Lambayeque</option>
                                <option data="PER" class="text-danger fw-bold" value="LM"
                                    @if (old('state') == 'LM') selected @endif>Lima</option>
                                <option data="PER" class="text-danger fw-bold" value="LO"
                                    @if (old('state') == 'LO') selected @endif>Loreto</option>
                                <option data="PER" class="text-danger fw-bold" value="MD"
                                    @if (old('state') == 'MD') selected @endif>Madre de Dios</option>
                                <option data="PER" class="text-danger fw-bold" value="MQ"
                                    @if (old('state') == 'MQ') selected @endif>Moquegua</option>
                                <option data="PER" class="text-danger fw-bold" value="PA"
                                    @if (old('state') == 'PA') selected @endif>Pasco</option>
                                <option data="PER" class="text-danger fw-bold" value="PI"
                                    @if (old('state') == 'PI') selected @endif>Piura</option>
                                <option data="PER" class="text-danger fw-bold" value="PU"
                                    @if (old('state') == 'PU') selected @endif>Puno</option>
                                <option data="PER" class="text-danger fw-bold" value="SM"
                                    @if (old('state') == 'SM') selected @endif>San Martín</option>
                                <option data="PER" class="text-danger fw-bold" value="TA"
                                    @if (old('state') == 'TA') selected @endif>Tacna</option>
                                <option data="PER" class="text-danger fw-bold" value="TU"
                                    @if (old('state') == 'TU') selected @endif>Tumbes</option>
                                <option data=" PER" class="text-danger fw-bold" value="UC"
                                    @if (old('state') == 'UC') selected @endif>Ucayali</option>
                                {{-- CHILE --}}
                                {{-- <option data="CHL" class="text-danger fw-bold" value="CL-AI"
                                    @if (old('state') == 'CL-AI') selected @endif>Aysén</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-AN"
                                    @if (old('state') == 'CL-AN') selected @endif>Antofagasta</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-AP"
                                    @if (old('state') == 'CL-AP') selected @endif>Arica y Parinacota
                                </option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-AR"
                                    @if (old('state') == 'CL-AR') selected @endif>Araucanía</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-AT"
                                    @if (old('state') == 'CL-AT') selected @endif>Atacama</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-BI"
                                    @if (old('state') == 'CL-BI') selected @endif>Biobío</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-CO"
                                    @if (old('state') == 'CL-CO') selected @endif>Coquimbo</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-LI"
                                    @if (old('state') == 'CL-LI') selected @endif>O'Higgins</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-LL"
                                    @if (old('state') == 'CL-LL') selected @endif>Los Lagos</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-LR"
                                    @if (old('state') == 'CL-LR') selected @endif>Los Ríos</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-MA"
                                    @if (old('state') == 'CL-MA') selected @endif>Magallanes y Antártica
                                </option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-ML"
                                    @if (old('state') == 'CL-ML') selected @endif>Maule</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-NB"
                                    @if (old('state') == 'CL-NB') selected @endif>Ñuble</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-RM"
                                    @if (old('state') == 'CL-RM') selected @endif>Santiago</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-TA"
                                    @if (old('state') == 'CL-TA') selected @endif>Tarapacá</option>
                                <option data="CHL" class="text-danger fw-bold" value="CL-VS"
                                    @if (old('state') == 'CL-VS') selected @endif>Valparaíso</option> --}}
                            </select>

                            @if ($errors->has('state'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('state') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- DISTRITO --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                        <label for="district" class="col-form-label fw-bold">
                            {{ __('District') }}
                        </label>
                        <div class="col-auto">
                            <input id="district" type="text" class="form-control  text-danger" name="district"
                                value="{{ old('district') }}" required autofocus>

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
                                value="{{ old('direction') }}" required autofocus>

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
                            {{ __('Trade or profession') }}
                        </label>
                        <div class="col-auto">
                            <input id="job" type="text" class="form-control  text-danger" name="job"
                                value="{{ old('job') }}" required autofocus>

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
                    <div class="col-sm-6 mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-form-label fw-bold"
                            onKeyPress="if(this.value.length==8) return false;">
                            {{ __('Password') }}
                        </label>

                        <div class="col-auto">
                            <input type="password" class="form-control text-danger" name="password" required autofocus>

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
                            {{ __('Confirm Password') }}
                            {{-- ? --}}
                        </label>
                        <span data-bs-toggle="popover" data-bs-trigger="hover focus"
                            data-bs-content="Debe contener mayusculas, minusculas y un simbolo, min 8">
                            <button class="btn btn-primary py-0" type="button">?</button>
                        </span>
                        <div class="col-auto">
                            <input type="password" class="form-control  text-danger" name="password_confirmation" required
                                onKeyPress="if(this.value.length==8) return false;" autofocus>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>
                </div>
                {{-- ELEGIR PREGUNTA --}}
                <div class="col-sm-12 mb-3 form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                    <label for="question" class="col-auto col-form-label fw-bold">
                        {{ __('Question to password') }}
                    </label>
                    <div class="row">
                        <div class="col-sm-12 col-form-label fw-bold">
                            <select class="form-control text-danger col-sm-12" id="question" name="question"
                                value="{{ old('question') }}" required autofocus>
                                <option selected disabled value="">{{ __('Options') }}...</option>
                                <option value="0" @if (old('question') == '0') selected @endif>
                                    ¿{{ __('Name of first pet') }}?</option>
                                <option value="1" @if (old('question') == '1') selected @endif>
                                    ¿{{ __('Hometown name') }}?</option>
                                <option value="2" @if (old('question') == '2') selected @endif>
                                    ¿{{ __('Name of childhood best friend') }}?</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-form-label fw-bold">
                            <input id="answer" type="text" class="form-control  text-danger" name="answer"
                                placeholder="{{ __('Answer') }}..." value="{{ old('answer') }}" required autofocus>

                            @if ($errors->has('answer'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('answer') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- CAPTCHAT AND INPUT CAPCHAT --}}
                <div class="col-sm-6 mx-auto mb-3 form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                    {{-- CAPTCHAT --}}
                    <div for="Captcha" class="col-form-label fw-bold">
                        <span class="captcha-img col-sm-8">
                            {!! captcha_img() !!}
                        </span>
                    </div>
                    {{-- INPUT CAPTCHAT --}}
                    <div class="col-sm-7 col-form-label">
                        <input id="captcha" type="text" class="form-control text-danger fs-3 fw-bold" name="captcha"
                            required autofocus>

                        @if ($errors->has('captcha'))
                            <span class="fs-6 text-danger">
                                {{ $errors->first('captcha') }}
                            </span>
                        @endif
                    </div>
                </div>
                {{-- BOTON DE REGISTRO --}}
                <div class="col-sm-12 mb-3 ">
                    <button type="submit" class="btn btn-primary ">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script>
        /*  POPOVER  */
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
        /* PREVIEW */
        foto.onchange = evt => {
            const [file] = foto.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        };
        /* DISABILITY */
        $("#discapacidad").change(function() {
            if ($("#discapacidad").val() != 'No') {
                $('#fdb').show(600);
            }
            if ($("#discapacidad").val() == 'No') {
                $('#fdb').hide(600);
            }
            /* PREVIEW */
            fdpt.onchange = evt => {
                const [file] = fdpt.files
                if (file) {
                    fdview.src = URL.createObjectURL(file)
                }
            };
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
            $select2.html($options.filter('[data="' + this.value + '"]'));
        }).trigger('change');
    </script>
@endsection
