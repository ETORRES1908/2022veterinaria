@extends('layouts.app')

@section('content')

<div class="card col-xl-8 mx-auto">
    <div class="card-header fw-bold fs-3">{{ __('Register')}}</div>
    <div class="card-body ">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            {{-- USERNAME Y FOTO DE PERFIL --}}
            <div class="row">
                {{-- USERNAME --}}
                <div class="col-sm-6 mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-form-label fw-bold">
                        {{ __('Username')}}/{{ __('Nickname')}}
                    </label>

                    <div class="col-auto">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                            autofocus>

                        @if ($errors->has('name'))
                        <span class="text-da nger fs-6">
                            {{ $errors->first('name') }}
                        </span>
                        @endif

                    </div>
                </div>
                {{-- FOTO DE PERFIL --}}
                <div class="col-sm-6 mb-3 form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
                    <label for="name" class="col-form-label fw-bold">
                        {{ __('Photo')}}
                    </label>
                    <div class="col-auto m-1 bg-black rounded">
                        <img id="preview" src="" class="img-fluid mx-auto d-block " width="40%" />
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
            {{-- NOMBRE Y APELLIDO --}}
            <div class="row">
                {{-- NOMBRE --}}
                <div class="col-sm-6 mb-3 form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    <label for="nombre" class="col-form-label fw-bold">
                        {{ __('Name')}}
                    </label>
                    <div class="col-auto">
                        <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"
                            required autofocus pattern="[A-zÀ-ú\S]+">

                        @if ($errors->has('nombre'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('nombre') }}
                        </span>
                        @endif
                    </div>
                </div>
                {{-- APELLIDO --}}
                <div class="col-sm-6 mb-3 form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                    <label for="apellido" class="col-form-label fw-bold">
                        {{ __('Surname')}}
                    </label>

                    <div class="col-auto">
                        <input id="apellido" type="text" class="form-control" name="apellido"
                            value="{{ old('apellido') }}" required autofocus pattern="[A-zÀ-ú\S]+">

                        @if ($errors->has('apellido'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('apellido') }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            {{-- DISCPACIDAD Y DNI --}}
            <div class="row">
                {{-- DISCPACIDAD --}}
                <div class="col-sm-4 mb-3 form-group{{ $errors->has('discapacidad') ? ' has-error' : '' }}">
                    <label for="discapacidad" class="col-form-label fw-bold">
                        {{ __('Discapacidad')}}
                    </label>
                    <select class="form-select" id="inputGroupSelect01" required>
                        <option selected value="0">No</option>
                        <option value="0">Visual</option>
                        <option value="1">Fisica</option>
                        <option value="1">Auditiva</option>
                        <option value="1">Verbal</option>
                        <option value="2">Mental</option>
                    </select>

                    @if ($errors->has('discapacidad'))
                    <span class="text-danger text-fs6">
                        {{ $errors->first('discapacidad') }}
                    </span>
                    @endif
                </div>
                {{-- NÚMERO DE DNI --}}
                <div class="col-sm-8 mb-3 form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                    <label for="dni" class="col-form-label fw-bold">
                        {{ __('N°DNI')}}
                    </label>

                    <div class="col-auto">
                        <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" required
                            autofocus>

                        @if ($errors->has('dni'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('dni') }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            {{-- NOMBRE DE GALPON Y PREPA --}}
            <div class="row">
                {{-- NOMBRE DE GALPON --}}
                <div class="col-sm-6 mb-3 form-group{{ $errors->has('galpon') ? ' has-error' : '' }}">
                    <label for="galpon" class="col-form-label fw-bold">
                        {{ __('Galpon')}}
                    </label>
                    <div class="col-auto">
                        <input id="galpon" type="text" class="form-control" name="galpon" value="{{ old('galpon') }}"
                            required autofocus>

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
                        {{ __('Trainer')}}
                    </label>

                    <div class="col-auto">
                        <input id="prepa" type="text" class="form-control" name="prepa" value="{{ old('prepa') }}"
                            required autofocus>

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
                        {{ __('E-Mail Address')}}
                    </label>

                    <div class="col">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                            required>

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
                        {{ __('Company')}}
                    </label>

                    <div class="col-auto">
                        <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}"
                            required autofocus>

                        @if ($errors->has('company'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('company') }}
                        </span>
                        @endif
                    </div>
                </div>
                {{-- CELULAR --}}
                <div class="col-sm-3 mb-3 form-group{{ $errors->has('ncel') ? ' has-error' : '' }}">
                    <label for="celular" class="col-form-label fw-bold">
                        N°{{ __('Phone')}}
                    </label>
                    <div class="col-auto">
                        <input id="ncel" type="text" class="form-control" name="ncel" value="{{ old('ncel') }}" required
                            autofocus>

                        @if ($errors->has('ncel'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('ncel') }}
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
                        {{ __('Country')}}
                    </label>

                    <div class="col">
                        <input id="country" type="text" class="form-control" name="country" value="{{ old('email') }}"
                            required>

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
                        {{ __('State')}}
                    </label>

                    <div class="col-auto">
                        <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}"
                            required autofocus>

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
                        N°{{ __('District')}}
                    </label>
                    <div class="col-auto">
                        <input id="district" type="text" class="form-control" name="district"
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
                        {{ __('Direction')}}
                    </label>
                    <div class="col-auto">
                        <input id="direction" type="text" class="form-control" name="direction"
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
                        {{ __('Job')}}
                    </label>
                    <div class="col-auto">
                        <input id="job" type="text" class="form-control" name="job" value="{{ old('job') }}" required
                            autofocus>

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
                    <label for="password" class="col-form-label fw-bold">
                        {{ __('Password')}}
                    </label>

                    <div class="col-auto">
                        <input id="password" type="password" class="form-control" name="password" required>

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
                        {{ __('Confirm Password')}}
                        {{-- ? --}}
                    </label>
                    <span data-bs-toggle="popover" data-bs-trigger="hover focus"
                        data-bs-content="Debe contener mayusculas, minusculas y un simbolo, min 8">
                        <button class="btn btn-primary py-0" type="button" disabled>?</button>
                    </span>
                    <div class="col-auto">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required>
                    </div>
                </div>
            </div>
            {{-- ELEGIR PREGUNTA --}}
            <div class="col-sm-12 mb-3 form-group{{ $errors->has('question') ? ' has-error' : '' }}">
                <label for="question" class="col-auto col-form-label fw-bold">
                    {{ __('Question to password')}}
                </label>
                <div class="row">
                    <div class="col-sm-12 col-form-label fw-bold">
                        <select class="form-control col-sm-12" id="question" name="question" required>
                            <option selected disabled value="">Opciones...</option>
                            <option value="0">¿Nombre de la Primera mascota?</option>
                            <option value="1">¿Nombre de la ciudad natal?</option>
                            <option value="2">¿Nombre del mejor amigo de la infancia?</option>
                        </select>
                    </div>
                    <div class="col-sm-12 col-form-label fw-bold">
                        <input id="answer" type="text" class="form-control" name="answer" placeholder="Respuesta..."
                            value="{{ old('answer') }}" required autofocus>

                        @if ($errors->has('answer'))
                        <span class="text-danger text-fs6">
                            {{ $errors->first('answer') }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            {{-- CAPTCHAT --}}
            <div class="row mb-3 form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                <div for="Captcha" class="col-sm-5 col-form-label fw-bold">
                    <span class="captcha-img">
                        {!!captcha_img()!!}
                    </span>
                </div>

                <div class="col-sm-6">
                    <input id="captcha" type="text" class="form-control" name="captcha" required>

                    @if ($errors->has('captcha'))
                    <span class="fs-6 text-danger">
                        {{ $errors->first('captcha') }}
                    </span>
                    @endif
                </div>
            </div>
            {{-- BOTON DE REGISTRO --}}
            <div class=" col-sm-12 mb-3 ">
                <button type="submit" class="btn btn-primary ">
                    {{ __('Register')}}
                </button>
            </div>
        </form>
    </div>
</div>
{{-- SCRIPT --}}
<script>
    /* POPOVER */
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
  return new bootstrap.Popover(popoverTriggerEl)
})
var popover = new bootstrap.Popover(document.querySelector('.popover-dismiss'), {
  trigger: 'focus'
})
</script>
<script>
    /* PREVIEW */
    foto.onchange = evt => {
  const [file] = foto.files
  if (file) {
    preview.src = URL.createObjectURL(file)
  }
}
</script>

@endsection