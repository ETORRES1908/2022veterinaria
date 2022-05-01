@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1 class="text-uppercase">
        {{ $user->nombre }} {{ $user->apellido }}</h1>
@stop

@section('content')
    <div class="container-fluid bg-black">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <br>
        @can('chngs')
            <a class="btn btn-primary" href="{{ route('usuarios.edit', $user->id) }}">{{ __('Edit') }}</a>
        @endcan
        <div class="row" style="padding:5vh 0 10vh 0;font-size: 1.3em">
            <div class="col-md-5">
                <div class="text-center">
                    <div class="mb">
                        <img width="100%" src="{{ asset($user->foto) }}"><br>
                    </div>
                    <div class="mb">{{ $user->name }} -
                        <?php switch ($user->usert) {
                            case 'own':
                                echo __('Owner');
                                break;
                            case 'cls':
                                echo __('Coliseum');
                                break;
                            case 'jdg':
                                echo __('Judge');
                                break;
                            case 'cdk':
                                echo __('Control desk');
                                break;
                            case 'asst':
                                echo __('Assistant');
                                break;
                            case 'ppr':
                                echo __('Preparer');
                                break;
                            case 'amt':
                                echo __('Amateur');
                                break;
                        
                            default:
                                # code...
                                break;
                        } ?>@if ($user->discapacidad != 'No')
                            - <i class="fas fa-wheelchair"></i>
                        @endif
                    </div>
                    <div class="mb">{{ $user->email }}</div><br>
                    <div class="form-group mb">
                        <label class="col-xs-4 col-md-7 control-label">{{ __('Status') . ' ' . __('Account') }}:</label>
                        <div class="col-xs-8 col-md-5">
                            <select class="form-control text-danger" name="status" disabled>
                                <option value="0" @if ($user->status == '0') selected @endif>
                                    {{ __('Inactived') }}
                                </option>
                                <option value="1" @if ($user->status == '1') selected @endif>
                                    {{ __('Actived') }}
                                </option>
                                <option value="2" @if ($user->status == '2') selected @endif>
                                    {{ __('Suspended') }}
                                </option>
                                <option value="3" @if ($user->status == '3') selected @endif>
                                    {{ __('Cancelled') }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div><br><br>
            <div class="col-md-6 text-uppercase">
                <div class="row">
                    <div class="col-xs-6 mb">
                        <label>{{ __('Name') }}</label>
                        <input type="text" class="form-control" value="{{ $user->nombre }}" readonly>
                    </div>
                    <div class="col-xs-6 mb">
                        <label>{{ __('Surname') }}</label>
                        <input type="text" class="form-control" value="{{ $user->apellido }}" readonly>
                    </div>
                    <div class="col-xs-6">
                        <label>{{ __('Disability') }}</label>
                        <select class="form-control mb" disabled style="-webkit-appearance: none;">
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
                    <div class="row">
                        <div class="col-xs-6 mb"><label>{{ __('DNI') }}</label>
                            <input type="text" class="form-control" value="{{ $user->dni }}" readonly>
                        </div>
                        @if (isset($user->fdpt))
                            <div class="col-xs-6 mb text-capitalize text-center center-block">
                                <a target="_blank" class="col-form-label text-decoration-none"
                                    href="{{ asset($user->fdpt) }}">{{ __('document') . ' ' . __('Disability') }}
                                </a>
                                <iframe id="viewer" src="{{ asset($user->fdpt) }}" frameborder="0" scrolling="no"
                                    height="200" width="100%"></iframe>
                            </div>
                        @endif
                        @if (isset($user->sdpt))
                            <div class="col-xs-6 mb text-center">
                                <label>{{ __('Photo') . ' ' . __('Disability') }}</label>
                                <a target="_blank" class="col-form-label text-decoration-none"
                                    href="{{ asset($user->sdpt) }}">
                                    <img class="img-responsive center-block" src="{{ asset($user->sdpt) }}" width="100%">

                                </a>
                            </div>
                        @endif
                    </div>
                    @if ($user->usert == 'own')
                        <div class="col-xs-6 mb"><label>{{ __('Shed') }}</label>
                            <input type="text" class="form-control" value="{{ $user->galpon }}" readonly>
                        </div>
                        <div class="col-xs-6 mb"><label> {{ __('Preparer') }}</label>
                            <input type="text" class="form-control" value="{{ $user->prepa }}" readonly>
                        </div>
                    @endif
                    <div class="col-xs-6 col-md-4 mb"><label> {{ __('Operator') }}</label>
                        <input type="text" class="form-control" value="{{ $user->company }}" readonly>
                    </div>
                    <div class="col-xs-6 col-md-4 mb"><label> {{ __('Phone') }}</label>
                        <input type="number" class="form-control" value="{{ $user->celular }}" readonly>
                    </div>
                    <div class="col-xs-12 col-md-4 mb text-capitalize"><label> {{ __('secrect answer') }}</label>
                        <input type="number" class="form-control" value="{{ $user->answer }}" readonly>
                    </div>
                    <div class="col-xs-4 mb"><label> {{ __('Country') }}</label>
                        <input type="text" class="form-control" value="{{ $user->country }}" readonly>
                    </div>
                    <div class="col-xs-8 col-lg-4 mb">
                        <label> {{ __('State') }}</label>
                        <input type="text" class="form-control" value="{{ $user->state }}" readonly>
                    </div>
                    <div class=" col-lg-4 mb">
                        <label> {{ __('District') }}</label>
                        <input type="text" class="form-control" value="{{ $user->district }}" readonly>
                    </div>
                    <div class="col-lg-7 mb"><label> {{ __('Direction') }}</label>
                        <input type="text" class="form-control" value="{{ $user->direction }}" readonly>
                    </div>
                    <div class="col-lg-5 mb"><label> {{ __('Profession or Trade') }}</label>
                        <input type="text" class="form-control" value="{{ $user->job }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- STYLES --}}
    <style>
        .form-control {
            color: rgb(210, 0, 0);
        }

        .mb {
            margin-bottom: 1vh;
        }

    </style>
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    {{-- COLISEO --}}
    <script>
        /* ALERT */
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
@endsection
