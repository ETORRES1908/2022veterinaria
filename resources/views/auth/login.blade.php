@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="row">
            <div class="col-md-7 my-auto">
                <img src="{{ url('storage/img/shampoo.jpg') }}" class="img-fluid" alt="...">
            </div>
            <div class="card-body col-md-5 my-auto">
                <div class="card">
                    <div class="card-header">
                        {{ __('Log in')}}
                    </div>
                    <div class=" card-body">
                        <div class="form-group my-4">
                            {{-- Nombre de la Empresa --}}
                            <label for="email" class="col-md-5 col-form-label">
                                Nombre de la Empresa Ejemplo
                            </label>
                            <img src="{{ url('storage/img/shampoo.jpg') }}" class="img-fluid"
                                style="width: 55%;height: auto;">
                        </div>
                        {{-- Formulario de Inicio de Sesión --}}
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="row mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-5 col-form-label">{{ __('Username')}}</label>
                                {{-- USERNAME --}}
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="fs-6 text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- PASSWORD --}}
                            <div class="row mb-3 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-sm-5 col-form-label">{{ __('Password')}}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="fs-6 text-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{-- CAPTCHAT --}}
                            <div class="row mb-3 form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                <div for="Captcha" class="col-sm-5 col-form-label">
                                    <span class="captcha-img">
                                        {!!captcha_img()!!}
                                    </span>
                                </div>

                                <div class="col-md-6">
                                    <input id="captcha" type="text" class="form-control" name="captcha" required>

                                    @if ($errors->has('captcha'))
                                    <span class="fs-6 text-danger">
                                        {{ $errors->first('captcha') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
{{-- RECORDAR USUARIO --}}
                            <div class="row mb-3 form-group">
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="remember"
                                            {{old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ __('Remember Me')}}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login')}}
                                    </button>
                                </div>
                            </div>
                            <div>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Create a new account')}}
                                </a>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?')}}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection