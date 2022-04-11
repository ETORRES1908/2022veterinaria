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

        <div class="row mb-3">
            <div class="col-lg-5">

                <div class="text-center">
                    <div class="mb-3">
                        <a href="{{ asset($user->foto) }}" class="html5lightbox" data-width="800" data-height="800"> <img
                                class="img-fluid" src="{{ asset($user->foto) }}"></a>
                    </div>
                    <div class="mb-3">
                        {{ $user->name }}
                        @if ($user->discapacidad != 'No')
                            - <i class="fas fa-wheelchair"></i>
                        @endif
                    </div>
                    <div class="mb-3">{{ $user->email }}</div>

                </div>

            </div>

            <div class="col-lg-7">

                <div class="row mb-3">
                    <div class="col-6 mb-3">
                        <label class="col-form-label fw-bold">{{ __('First name') }}</label>
                        <input type="text" class="form-control" value="{{ $user->nombre }}" readonly>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="col-form-label fw-bold">{{ __('First surname') }}</label>
                        <input type="text" class="form-control" value="{{ $user->apellido }}" readonly>
                    </div>
                    <div class="col-12">
                        <label class="col-form-label fw-bold">{{ __('Disability') }}</label>
                        <select class="form-control mb-3" disabled style="-webkit-appearance: none;">
                            <option value="No" @if ($user->discapacidad == 'No') selected @endif>
                                {{ __('No') }}
                            </option>
                            <option value="Visual" @if ($user->discapacidad == 'Visual') selected @endif>
                                {{ __('Visual') }}
                            </option>
                            <option value="Fisica" @if ($user->discapacidad == 'Fisica') selected @endif>
                                {{ __('Physical') }}
                            </option>
                            <option value="Auditiva" @if ($user->discapacidad == 'Auditiva') selected @endif>
                                {{ __('Auditory') }}</option>
                            <option value="Verbal" @if ($user->discapacidad == 'Verbal') selected @endif>
                                {{ __('Verbal') }}
                            </option>
                            <option value="Mental" @if ($user->discapacidad == 'Mental') selected @endif>
                                {{ __('Mental') }}
                            </option>
                        </select>
                    </div>
                    {{-- <div class="col-6 mb-3"><label class="col-form-label fw-bold">{{ __('DNI') }}</label>
                        <input type="text" class="form-control" value="{{ $user->dni }}" readonly>
                    </div> --}}
                    {{-- @if (isset($user->fdpt))
                        <div class="col-6 mb-3 text-capitalize text-center center-block">
                            <a target="blank" class="col-form-label text-decoration-none"
                                href="{{ asset($user->fdpt) }}">{{ __('document') . ' ' . __('Disability') }}</a>
                            <iframe id="viewer" src="{{ asset($user->fdpt) }}" frameborder="0" scrolling="no"
                                height="200" width="100%"></iframe>
                        </div>
                    @endif
                    @if (isset($user->sdpt))
                        <div class="col-6 mb-3 text-center">
                            <label class="form-label fw-bold">{{ __('Photo') . ' ' . __('Disability') }}</label>
                            <a href="{{ asset($user->sdpt) }}" class="html5lightbox" data-width="800" data-height="800">
                                <img class="img-responsive center-block" src="{{ asset($user->sdpt) }}" width="100%">
                            </a>
                        </div>
                    @endif --}}
                    @if (isset($user->galpon))
                        <div class="col-6 mb-3"><label class="col-form-label fw-bold">{{ __('Shed') }}</label>
                            <input type="text" class="form-control" value="{{ $user->galpon }}" readonly>
                        </div>
                    @endif
                    @if (isset($user->prepa))
                        <div class="col-6 mb-3"><label class="col-form-label fw-bold"> {{ __('Preparer') }}</label>
                            <input type="text" class="form-control" value="{{ $user->prepa }}" readonly>
                        </div>
                    @endif
                    <div class="col-6 mb-3"><label class="col-form-label fw-bold"> {{ __('Operator') }}</label>
                        <select class="form-control text-uppercase" name="company" disabled>
                            <option value="bitel" @if ($user->company == 'bitel') selected @endif>BITEL</option>
                            <option value="claro" @if ($user->company == 'claro') selected @endif>CLARO</option>
                            <option value="entel" @if ($user->company == 'entel') selected @endif>ENTEL</option>
                            <option value="movitar" @if ($user->company == 'movitar') selected @endif>MOVISTAR
                            </option>
                            <option value="otros" @if ($user->company == 'otros') selected @endif>
                                {{ __('Other') }}</option>
                        </select>
                    </div>
                    <div class="col-6 mb-3"><label class="col-form-label fw-bold"> {{ __('Phone') }}</label>
                        <input type="text" class="form-control" value="{{ $user->celular }}" minlength="9"
                            onKeyPress="if(this.value.length==9) return false;" name="celular"
                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" readonly>
                        @if ($errors->has('celular'))
                            <span class="text-danger text-fs6">
                                {{ __('This cell phone number already registered') }}
                            </span>
                        @endif
                    </div>
                    <div class="col-4 mb-3"><label class="col-form-label fw-bold"> {{ __('Country') }}</label>
                        <input type="text" class="form-control" value="{{ $user->country }}" readonly>
                    </div>
                    <div class="col-4 mb-3"><label class="col-form-label fw-bold"> {{ __('State') }}</label>
                        <input type="text" class="form-control" value="{{ $user->state }}" readonly>
                    </div>
                    <div class="col-4 mb-3"><label class="col-form-label fw-bold"> {{ __('District') }}</label>
                        <input type="text" class="form-control" value="{{ $user->district }}" readonly>
                    </div>
                    {{-- <div class="col-lg-7 mb-3"><label class="col-form-label fw-bold"> {{ __('Direction') }}</label>
                        <input type="text" class="form-control" value="{{ $user->direction }}" readonly>
                    </div> --}}
                    {{-- <div class="col-lg-5 mb-3"><label class="col-form-label fw-bold">
                            {{ __('Profession or Trade') }}</label>
                        <input type="text" class="form-control" value="{{ $user->job }}" readonly>
                    </div> --}}
                </div>
            </div>

        </div>

    </div>
@endsection
