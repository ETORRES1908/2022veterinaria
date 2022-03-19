@extends('layouts.app')
@section('head')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/animation.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-embedded.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-codes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-ie7-codes.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightbox/icons/css/mhfontello-ie7.css') }}">
    {{-- STYLES --}}
    <style type="text/css">
        #html5lightbox-watermark {
            display: none !important;
        }

        .lightboxcontainer {
            width: 100%;
            height: 100%;
            text-align: left;
        }

    </style>
@endsection
@section('content')
    <div class="card bg-black">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-5">
                <div class="text-center">
                    <div class="mb-3">
                        <img class="img-fluid" src="{{ asset(Auth::user()->foto) }}"><br>
                    </div>
                    <div class="mb-3">{{ Auth::user()->name }}</div>
                    <div class="mb-3">{{ Auth::user()->email }}</div>
                    <form class="text-uppercase" method="POST"
                        action="{{ route('profile.update', ['id' => Auth::user()->id]) }}">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <input type="text" name="typec" value="1" hidden>
                        <div class="row mb-3">
                            <label class="col-sm-7 col-form-label">{{ __('User') . ' /' . __('Name Social') }}</label>
                            <div class="col-sm-5">
                                <input type="name" name="name" class="form-control" maxlength="12" required autofocus
                                    value="{{ Auth::user()->name }}" @cannot('chngs') readonly @endcan>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-7 col-form-label">{{ __('Password') }}</label>
                            <div class="col-sm-5">
                                <input type="password" name="password" class="form-control" maxlength="8" required
                                    autofocus pattern="^(?=\D*\d)(?=.*?[a-zA-Z]).{8}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit"
                                    class="btn btn-primary">{{ __('Change username and password') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><br><br>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-6 mb">
                        <label class="col-form-label fw-bold">{{ __('Name') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->nombre }}" readonly>
                    </div>
                    <div class="col-6 mb">
                        <label class="col-form-label fw-bold">{{ __('Surname') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->apellido }}" readonly>
                    </div>
                    <div class="col-6">
                        <label class="col-form-label fw-bold">{{ __('Disability') }}</label>
                        <select class="form-control mb" disabled style="-webkit-appearance: none;">
                            <option value="No" @if (Auth::user()->discapacidad == 'No') selected @endif>
                                {{ __('No') }}
                            </option>
                            <option value="Visual" @if (Auth::user()->discapacidad == 'Visual') selected @endif>
                                {{ __('Visual') }}
                            </option>
                            <option value="Fisica" @if (Auth::user()->discapacidad == 'Fisica') selected @endif>
                                {{ __('Physical') }}
                            </option>
                            <option value="Auditiva" @if (Auth::user()->discapacidad == 'Auditiva') selected @endif>
                                {{ __('Auditory') }}</option>
                            <option value="Verbal" @if (Auth::user()->discapacidad == 'Verbal') selected @endif>
                                {{ __('Verbal') }}
                            </option>
                            <option value="Mental" @if (Auth::user()->discapacidad == 'Mental') selected @endif>
                                {{ __('Mental') }}
                            </option>
                        </select>
                    </div>
                    <div class="col-6 mb"><label class="col-form-label fw-bold">{{ __('DNI') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->dni }}" readonly>
                    </div>
                    @if (isset(Auth::user()->fdpt))
                        <div class="col-6 mb text-capitalize text-center center-block">
                            <label class="col-form-label fw-bold">{{ __('document') . ' ' . __('Disability') }}</label>
                            <a href="{{ asset(Auth::user()->fdpt) }}"
                                target="blank">{{ __('document') }}<br>{{ __('Disability') }}</a>
                        </div>
                    @endif
                    @if (isset(Auth::user()->sdpt))
                        <div class="col-6 mb text-center">
                            <label class="col-form-label fw-bold">{{ __('Photo') . ' ' . __('Disability') }}</label>
                            <img class="img-responsive center-block" src="{{ asset(Auth::user()->sdpt) }}" width="100%">
                        </div>
                    @endif
                    <div class="col-6 mb"><label class="col-form-label fw-bold">{{ __('Galpon') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->galpon }}" readonly>
                    </div>
                    <div class="col-6 mb"><label class="col-form-label fw-bold"> {{ __('Preparer') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->prepa }}" readonly>
                    </div>
                    <div class="col-6 mb"><label class="col-form-label fw-bold"> {{ __('Operator') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->company }}" readonly>
                    </div>
                    <div class="col-6 mb"><label class="col-form-label fw-bold"> {{ __('Phone') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->celular }}" readonly>
                    </div>
                    <div class="col-4 mb"><label class="col-form-label fw-bold"> {{ __('Country') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->country }}" readonly>
                    </div>
                    <div class="col-4 mb"><label class="col-form-label fw-bold"> {{ __('State') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->state }}" readonly>
                    </div>
                    <div class="col-4 mb"><label class="col-form-label fw-bold"> {{ __('District') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->district }}" readonly>
                    </div>
                    <div class="col-lg-7 mb"><label class="col-form-label fw-bold"> {{ __('Direction') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->direction }}" readonly>
                    </div>
                    <div class="col-lg-5 mb"><label class="col-form-label fw-bold">
                            {{ __('Profession or Trade') }}</label>
                        <input type="text" class="form-control" value="{{ Auth::user()->job }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        //HIDE
        setTimeout(function() {
            $('.alert').fadeOut(3000);
        });
    </script>
@endsection
