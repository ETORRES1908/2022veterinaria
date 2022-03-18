@extends('layouts.app')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="card bg-black">
        <div class="row border border-danger">
            {{-- BANNER --}}
            <div class="col-md-7 my-auto">
                <div class="card-body">
                    <div class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($banners as $banner)
                                <div class="carousel-item @if ($banner->nombre = 'blogin1.jpeg') active @endif"
                                    data-bs-interval="1000">
                                    <a href="{{ $banner->url }}">
                                        <img src="{{ asset($banner->ruta) }}" class="img-fluid mx-auto d-block">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- FORM LOGIN --}}
            <div class="col-md-5 my-auto border border-danger">
                <div class="card bg-black">
                    <div class="card-header fw-bold fs-4">
                        {{ __('Log in') }}
                    </div>
                    <div class=" card-body text-white fw-bold">
                        <div class="row mb-3">
                            {{-- Nombre de la Empresa --}}
                            <label for="ejemplo" class="col-sm-5 col-form-label">
                                Nombre de la Empresa Ejemplo
                            </label>
                            <img src="{{ url('storage/img/shampoo.jpg') }}" class="img-fluid col-sm-7">
                        </div>
                        {{-- Formulario de Inicio de Sesión --}}
                        <form class="text-uppercase" method="POST" action="{{ route('login') }}">
                            {!! csrf_field() !!}
                            <div class="row mb-3 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-sm-5 col-form-label">{{ __('Username') }}</label>
                                {{-- USERNAME --}}
                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control text-danger" name="name"
                                        value="{{ old('name') }}" required autofocus
                                        onKeyPress="if(this.value.length==15) return false;">

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

                                <div class="col-md-7">
                                    <input id="password" type="password" class="form-control text-danger" name="password"
                                        required autofocus onKeyPress="if(this.value.length==8) return false;">

                                    @if ($errors->has('password'))
                                        <span class="fs-6 text-danger">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {{-- CAPTCHAT --}}
                            <div class="mb-3 form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-12 col-lg-8 mb-3">
                                        <label for="Captcha">
                                            <span class="captcha-img image-fluid">
                                                {!! captcha_img() !!}
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-8 col-sm-7 col-lg-4 justify-content-center mb-3">
                                        <input id="captcha" type="text" class="form-control text-danger fs-3 fw-bold"
                                            name="captcha" required autofocus>
                                        @if ($errors->has('captcha'))
                                            <span class="fs-6 text-danger">
                                                {{ $errors->first('captcha') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- LOGIN --}}
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary mb-3" value="{{ __('Login') }}">
                            </div>
                        </form>
                        <a class="btn btn-link mb-3" href="{{ route('register') }}">
                            {{ __('Create a new account') }}
                        </a>
                        <a class="btn btn-link mb-3" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
