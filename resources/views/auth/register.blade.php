@extends('layouts.app')

@section('content')
    <div class="card bg-black border border-danger">
        <div class="card-header fw-bold fs-3 border border-danger">{{ __('Register') }}</div>
        <div class="card-body border border-danger">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                autocomplete="off">
                {!! csrf_field() !!}
                {{-- USERNAME Y FOTO DE PERFIL --}}
                <div class="row">
                    {{-- NOMBRE Y APELLIDO --}}
                    <div class="row col-lg-8">
                        {{-- USERNAME --}}
                        <div class="col-sm-8 mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-form-label fw-bold">
                                {{ __('User') }}/{{ __('Name Social') }}
                            </label>

                            <div class="col-auto">
                                <input id="name" type="text" class="form-control text-danger" name="name"
                                    value="{{ old('name') }}" required autofocus maxlength="12">

                                @if ($errors->has('name'))
                                    <span class="text-da nger fs-6">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif

                            </div>
                        </div>
                        {{-- SIGN UP AS --}}
                        <div class="col-sm-4 mb-3 form-group{{ $errors->has('usert') ? ' has-error' : '' }}">
                            <label for="usert" class="col-form-label fw-bold">
                                {{ __('Sign Up as') }}
                            </label>
                            <div class="col-auto">
                                <select name="usert" class="form-select text-danger" required autofocus>
                                    <option value="own">{{ __('Owner') }}</option>
                                    <option value="cls">{{ __('Coliseum') }}</option>
                                    <option value="cdk">{{ __('Control desk') }}</option>
                                    <option value="jdg">{{ __('Judge') }}</option>
                                    <option value="ppr">{{ __('Preparer') }}</option>
                                    <option value="asst">{{ __('Assistant') }}</option>
                                    <option value="amt">{{ __('Amateur') }}</option>
                                </select>
                                @if ($errors->has('usert'))
                                    <span class="text-da nger fs-6">
                                        {{ $errors->first('usert') }}
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
                                    value="{{ old('nombre') }}" required autofocus pattern="[A-zÀ-ú\S]+" maxlength="10"
                                    onkeydown="return /[A-zÀ-ú]/i.test(event.key)" />

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
                                    value="{{ old('apellido') }}" autofocus required pattern="[A-zÀ-ú\S]+" maxlength="10"
                                    onkeydown="return /[A-zÀ-ú]/i.test(event.key)">

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
                                    value="{{ old('dni') }}" onKeyPress="if(this.value.length==8) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" required autofocus
                                    minlength="8" maxlength="8">

                                @if ($errors->has('dni'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('dni') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- FOTO DE PERFIL --}}
                    <div class="col-lg-4 mb-3 form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
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
                        <label for="sdpt" class="col-form-label fw-bold text-capitalize">
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
                        <label for="sdpt" class="col-form-label fw-bold text-capitalize">
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
                {{-- NOMBRE DE GALPON Y PREPA --}}
                <div class="row">
                    {{-- NOMBRE DE GALPON --}}
                    <div class="col-sm-6 mb-3 form-group{{ $errors->has('galpon') ? ' has-error' : '' }}">
                        <label for="galpon" class="col-form-label fw-bold">
                            {{ __('Shed') }}
                        </label>
                        <div class="col-auto">
                            <input id="galpon" type="text" class="form-control  text-danger" name="galpon"
                                value="{{ old('galpon') }}" maxlength="14" required autofocus>

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
                                value="{{ old('prepa') }}" maxlength="14" required autofocus>

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
                                value="{{ old('email') }}" maxlength="20" required autofocus>

                            @if ($errors->has('email'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('email') }}
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
                            <select class="form-select text-danger text-uppercase" name="company" required autofocus>
                                <option value="bitel" @if (old('company') == 'bitel') selected @endif>BITEL</option>
                                <option value="claro" @if (old('company') == 'claro') selected @endif>CLARO</option>
                                <option value="entel" @if (old('company') == 'entel') selected @endif>ENTEL</option>
                                <option value="movitar" @if (old('company') == 'movitar') selected @endif>MOVISTAR
                                </option>
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
                            {{ __('Phone') }}
                        </label>
                        <div class="col-auto">
                            <input id="celular" type="number" class="form-control  text-danger" name="celular" minlength="9"
                                value="{{ old('celular') }}" onKeyPress="if(this.value.length==9) return false;"
                                minlength="9" onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" required
                                autofocus>

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
                                    @if (old('country') == 'PER') selected @endif>PER - Perú</option>
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
                            <select class="form-control text-danger fw-bold" name="state" id="state"
                                value="{{ old('state') }}" required autofocus>
                                <option data="PER" class="text-danger fw-bold" value="AM"
                                    @if (old('state') == 'AM') selected @endif>
                                    AM - Amazonas</option>
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
                                    HC - Huancavelica</option>
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
                                    LL - La Libertad</option>
                                <option data="PER" class="text-danger fw-bold" value="LB"
                                    @if (old('state') == 'LB') selected @endif>
                                    LB - Lambayeque</option>
                                <option data="PER" class="text-danger fw-bold" value="LM"
                                    @if (old('state') == 'LM') selected @endif selected>
                                    LM - Lima
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="LO"
                                    @if (old('state') == 'LO') selected @endif>
                                    LO - Loreto
                                </option>
                                <option data="PER" class="text-danger fw-bold" value="MD"
                                    @if (old('state') == 'MD') selected @endif>
                                    MD - Madre de Dios</option>
                                <option data="PER" class="text-danger fw-bold" value="MQ"
                                    @if (old('state') == 'MQ') selected @endif>
                                    MQ - Moquegua</option>
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
                                <option data=" PER" class="text-danger fw-bold" value="UC"
                                    @if (old('state') == 'UC') selected @endif>
                                    UC - Ucayali</option>
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
                                value="{{ old('district') }}" maxlength="10" required autofocus>

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
                                value="{{ old('direction') }}" maxlength="30" required autofocus
                                placeholder="REF. ó ALT.">

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
                                value="{{ old('job') }}" maxlength="15" required autofocus>

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
                            <input type="password" class="form-control text-danger" name="password" min="8"
                                onKeyPress="if(this.value.length==8) return false;" pattern="^(?=\D*\d)(?=.*?[a-zA-Z]).{8}"
                                required autofocus>


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
                            data-bs-content="{{ __('Must contain 1 letter 1 number, minimum 8') }}">
                            <input type="button" class="btn btn-primary py-0" value="?">
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
                    <label for="answer" class="col-auto col-form-label fw-bold text-capitalize">
                        {{ __('secrect answer') }}
                    </label>
                    <input id="answer" type="text" class="form-control text-danger" name="answer" maxlength="10"
                        placeholder="{{ __('Answer') }}..." value="{{ old('answer') }}" required autofocus>
                    @if ($errors->has('answer'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('answer') }}
                        </span>
                    @endif
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
                            required autofocus maxlength="5">

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
    </script>
@endsection
