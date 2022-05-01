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
    {{-- SCRIPTS --}}
    <script src="{{ asset('css/lightbox/html5lightbox.js') }}"></script>
    <script src="{{ asset('css/lightbox/froogaloop2.min.js') }}"></script>
@endsection
@section('content')
    <div class="card bg-black">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-5">
                    <form class="text-uppercase" method="POST"
                        action="{{ route('profile.update', ['id' => Auth::user()->id]) }}">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="type" value="a">
                        <div class="text-center">
                            <div class="mb-3">
                                <a href="{{ asset(Auth::user()->foto) }}" class="html5lightbox" data-width="800"
                                    data-height="800">
                                    <img class="img-fluid" src="{{ asset(Auth::user()->foto) }}">
                                </a>
                            </div>
                            <div class="mb-3">{{ Auth::user()->name }}</div>
                            <div class="mb-3">{{ Auth::user()->email }}</div>

                            <div class="row mb-3">
                                <label
                                    class="col-lg-5 col-form-label">{{ __('User') . ' /' . __('Name Social') }}</label>
                                <div class="col-lg-7">
                                    <input type="name" name="name" class="form-control" maxlength="12" required
                                        value="{{ Auth::user()->name }}" @cannot('chngs') readonly @endcan>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-lg-5 col-form-label">{{ __('Password') }}</label>
                                <div class="col-lg-7">
                                    <input type="password" name="password" class="form-control" maxlength="8"
                                        minlength="8" pattern="^(?=\D*\d)(?=.*?[a-zA-Z]).{8}" required
                                        placeholder="{{ __('8 digits - Minimum 1 letter and 1 number') }}">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="{{ __('Change password') }}" />
                        </div>
                    </form>
                </div>

                <div class="col-lg-7">
                    <form class="text-uppercase" method="POST"
                        action="{{ route('profile.update', ['id' => Auth::user()->id]) }}">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <input type="hidden" name="type" value="b">
                        <div class="row mb-3">
                            <div class="col-6 mb-3">
                                <label class="col-form-label fw-bold">{{ __('First name') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->nombre }}" readonly>
                            </div>
                            <div class="col-6 mb-3">
                                <label class="col-form-label fw-bold">{{ __('First surname') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->apellido }}" readonly>
                            </div>
                            <div class="col-6">
                                <label class="col-form-label fw-bold">{{ __('Disability') }}</label>
                                <select class="form-control mb-3" disabled style="-webkit-appearance: none;">
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
                            <div class="col-6 mb-3">
                                <label class="col-form-label fw-bold">{{ __('DNI') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->dni }}" readonly>
                            </div>
                            @if (isset(Auth::user()->fdpt))
                                <div class="col-6 mb-3 text-capitalize text-center center-block">
                                    <a target="_blank" class="col-form-label text-decoration-none"
                                        href="{{ asset(Auth::user()->fdpt) }}">{{ __('document') . ' ' . __('Disability') }}</a>
                                    <iframe id="viewer" src="{{ asset(Auth::user()->fdpt) }}" frameborder="0"
                                        scrolling="no" height="200" width="100%"></iframe>

                                </div>
                            @endif
                            @if (isset(Auth::user()->sdpt))
                                <div class="col-6 mb-3 text-center">
                                    <label class="form-label fw-bold">{{ __('Photo') . ' ' . __('Disability') }}</label>
                                    <a href="{{ asset(Auth::user()->sdpt) }}" class="html5lightbox" data-width="800"
                                        data-height="800">
                                        <img class="img-responsive center-block" src="{{ asset(Auth::user()->sdpt) }}"
                                            width="100%">
                                    </a>
                                </div>
                            @endif
                            <div class="col-6 mb-3">
                                <label class="col-form-label fw-bold">{{ __('Galpon') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->galpon }}"
                                    maxlength="30" name="galpon" pattern="[A-zÀ-ú1-9\s]+" onkeydown="return /[A-zÀ-ú1-9\s]/i.test(event.key)">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('Preparer') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->prepa }}"
                                    maxlength="20" name="prepa" pattern="[A-zÀ-ú\s]+" onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)">
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('Operator') }}</label>
                                <select class="form-select text-uppercase" name="company" required autofocus>
                                    <option value="bitel" @if (Auth::user()->company == 'bitel') selected @endif>BITEL
                                    </option>
                                    <option value="claro" @if (Auth::user()->company == 'claro') selected @endif>CLARO
                                    </option>
                                    <option value="entel" @if (Auth::user()->company == 'entel') selected @endif>ENTEL
                                    </option>
                                    <option value="movitar" @if (Auth::user()->company == 'movitar') selected @endif>MOVISTAR
                                    </option>
                                    <option value="otros" @if (Auth::user()->company == 'otros') selected @endif>
                                        {{ __('Other') }}</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-4 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('Phone') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->celular }}"
                                    minlength="9" onKeyPress="if(this.value.length==9) return false;" name="celular"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" required>
                                @if ($errors->has('celular'))
                                    <span class="text-danger text-fs6">
                                        {{ __('This cell phone number already registered') }}
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-md-4 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('secrect answer') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->answer }}" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('Country') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->country }}" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="col-form-label fw-bold"> {{ __('State') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->state }}" readonly>
                            </div>
                            <div class="col-4 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('District') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->district }}"
                                    maxlength="18" name="district" pattern="[A-zÀ-ú\s]+" onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)">
                            </div>
                            <div class="col-lg-7 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('Direction') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->direction }}"
                                    maxlength="50" name="direction">
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label class="col-form-label fw-bold">
                                    {{ __('Profession or Trade') }}</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->job }}" maxlength="36"
                                    name="job" pattern="[A-zÀ-ú\s]+" onkeydown="return /[A-zÀ-ú\s]/i.test(event.key)">
                            </div>
                        </div>
                        <div class="position-relative start-50">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //HIDE
        setTimeout(function() {
            $('.alert').fadeOut(6000);
            $('span').fadeOut(6000);
        });
    </script>
@endsection
