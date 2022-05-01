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
            <div class="col-lg-7 m-auto">
                <div class="card-body">
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @if (isset($banners[0]))
                                <div class="carousel-item @if ($banners[0]->nombre = 'blogin1.jpeg') active @endif"
                                    data-bs-interval="4000">
                                    <a href="{{ $banners[0]->url }}" target="__blank">
                                        <img src="{{ asset($banners[0]->ruta) }}" class="img-fluid mx-auto d-block">
                                    </a>
                                </div>
                            @endif
                            @foreach ($banners as $banner)
                                <div class="carousel-item" data-bs-interval="4000">
                                    <a href="{{ $banner->url }}" target="_blank">
                                        <img src="{{ asset($banner->ruta) }}" class="img-fluid mx-auto d-block">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- FORM LOGIN --}}
            <div class="col-lg-5 my-auto border border-danger">
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
                        {{-- Formulario de Inicio de Sesi贸n --}}
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
                                    <label for="Captcha" class="col-xl-12 col-form-label mx-auto text-end">
                                        {!! captcha_img() !!}
                                    </label>
                                    <div class="col-sm-7 m-auto me-0">
                                        <input id="captcha" type="text" class="form-control text-danger fw-bold"
                                            name="captcha" required autofocus placeholder="{{ __('Result of blast') }}">

                                        @if ($errors->has('captcha'))
                                            <span class="fs-6 text-danger">
                                                {{ $errors->first('captcha') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- LOGIN --}}
                            <div class="text-end">
                                <input type="submit" class="btn btn-primary mb-3 text-uppercase"
                                    value="{{ __('Enter') }}">
                                <a class="btn btn-success mb-3"
                                    href="{{ route('register') }}">{{ __('Create your account') }}</a>

                            </div>
                            <div class="text-end">
                                <a class="btn btn-secondary mb-3"
                                    href="{{ route('contact') }}">{{ __('Contact us') }}</a>
                                <a class="text-end btn btn-light mb-3 text-uppercase"
                                    href="{{ route('password.request') }}">
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
