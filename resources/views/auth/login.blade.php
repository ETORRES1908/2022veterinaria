@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card bg-black p-0 m-0 border-danger">
        <div class="row">
            {{-- BANNER --}}
            <div class="card-body col-sm-7 my-auto">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="1000">
                            <a href="http://www.google.com">
                                <img src="{{ url('storage/img/shampoo.jpg') }}" class="d-block mx-auto" height="380vh">
                            </a>
                        </div>
                        <div class="carousel-item" data-bs-interval="1000">
                            <a href="http://www.google.com">
                                <img src="{{ url('storage/img/pata.jpg') }}" class="d-block mx-auto" height="380vh">
                            </a>
                        </div>
                        <div class="carousel-item" data-bs-interval="1000">
                            <a href="http://www.google.com">
                                <img src="{{ url('storage/img/dogcorrea.jpg') }}" class="d-block mx-auto" height="380vh">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- FORM LOGIN --}}
            <div class="card-body col-sm-5 my-auto">
                <div class="card bg-black border border-danger">
                    <div class="card-header fw-bold fs-4">
                        {{ __('Log in') }}
                    </div>
                    <div class=" card-body text-white fw-bold">
                        <div class="row my-4">
                            {{-- Nombre de la Empresa --}}
                            <label for="email" class="col-sm-5 col-form-label">
                                Nombre de la Empresa Ejemplo
                            </label>
                            <img src="{{ url('storage/img/shampoo.jpg') }}" class="img-fluid col-sm-7">
                        </div>
                        {{-- Formulario de Inicio de Sesión --}}
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="row mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-5 col-form-label">{{ __('Username') }}</label>
                                {{-- USERNAME --}}
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control text-danger" name="name"
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
                                <label for="password" class="col-sm-5 col-form-label">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control text-danger" name="password"
                                        required autofocus>

                                    @if ($errors->has('password'))
                                        <span class="fs-6 text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- CAPTCHAT --}}
                            <div class="row mb-3 form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                <label for="Captcha">
                                    <span class="captcha-img image-fluid">
                                        {!! captcha_img() !!}
                                    </span>
                                </label>

                                <div class="mt-1 col-sm-7">
                                    <input id="captcha" type="text" class="form-control text-danger fs-3 fw-bold"
                                        name="captcha" required autofocus>

                                    @if ($errors->has('captcha'))
                                        <span class="fs-6 text-danger">
                                            {{ $errors->first('captcha') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- LOGIN --}}
                            <div class="row mb-3 form-group">
                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            <div>
                                <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('Create a new account') }}
                                </a>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
