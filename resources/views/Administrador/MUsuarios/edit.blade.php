@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1 class="text-uppercase">{{ $user->nombre }} {{ $user->apellido }}</h1>
@stop

@section('content')
    <div class="row bg-black" style="padding:5vh 0 10vh 0;font-size: 1.3em">
        <div class="col-md-5">
            <div class="text-center">
                <img width="200" src="{{ asset($user->foto) }}" class="mb">
                <div class="mb">{{ $user->name }}</div>
                <div class="mb">{{ $user->email }}</div>
                <div class="mb">
                    <form method="POST" action="{{ route('Usuarios.update', ['id' => $user->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <label>{{ __('Status') }}</label>
                        <select class="form-control text-danger" name="status" style="width: 40%;margin:auto">
                            <option value="0" @if ($user->status == '0') selected @endif>
                                {{ __('Inactived') }}
                            </option>
                            <option value="1" @if ($user->status == '1') selected @endif>
                                {{ __('Actived') }}
                            </option>
                            <option value="2" @if ($user->status == '2') selected @endif>
                                {{ __('Suspended') }}
                            </option>
                        </select><br>
                        <button type="submit" class="btn btn-primary">{{ __('Change status') }}</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-xs-6 mb">
                    <label>{{ __('Name') }}</label>
                    <input type="text" class="form-control" value="{{ $user->nombre }}" readonly>
                </div>
                <div class="col-xs-6 mb">
                    <label>{{ __('Surname') }}</label>
                    <input type="text" class="form-control" value="{{ $user->apellido }}" readonly>
                </div>
                <div class="col-xs-6"><label>{{ __('Disability') }}</label>
                    <select class="form-control" disabled>
                        <option value="No" @if ($user->discapacidad == 'No') selected @endif>{{ __('No') }}
                        </option>
                        <option value="Visual" @if ($user->discapacidad == 'Visual') selected @endif>{{ __('Visual') }}
                        </option>
                        <option value="Fisica" @if ($user->discapacidad == 'Fisica') selected @endif>{{ __('Physical') }}
                        </option>
                        <option value="Auditiva" @if ($user->discapacidad == 'Auditiva') selected @endif>
                            {{ __('Auditory') }}</option>
                        <option value="Verbal" @if ($user->discapacidad == 'Verbal') selected @endif>{{ __('Verbal') }}
                        </option>
                        <option value="Mental" @if ($user->discapacidad == 'Mental') selected @endif>{{ __('Mental') }}
                        </option>
                    </select>
                </div>
                <div class="col-xs-6 mb"><label>{{ __('N°DNI') }}</label>
                    <input type="text" class="form-control" value="{{ $user->dni }}" readonly>
                </div>
                <div class="col-xs-6 mb"><label>{{ __('Galpon') }}</label>
                    <input type="text" class="form-control" value="{{ $user->galpon }}" readonly>
                </div>
                <div class="col-xs-6 mb"><label> {{ __('Trainer') }}</label>
                    <input type="text" class="form-control" value="{{ $user->prepa }}" readonly>
                </div>
                <div class="col-xs-6 mb"><label> {{ __('Company') }}</label>
                    <input type="text" class="form-control" value="{{ $user->company }}" readonly>
                </div>
                <div class="col-xs-6 mb"><label> {{ __('Phone') }}</label>
                    <input type="text" class="form-control" value="{{ $user->celular }}" readonly>
                </div>
                <div class="col-xs-4 mb"><label> {{ __('Country') }}</label>
                    <input type="text" class="form-control" value="{{ $user->country }}" readonly>
                </div>
                <div class="col-xs-4 mb"><label> {{ __('State') }}</label>
                    <input type="text" class="form-control" value="{{ $user->state }}" readonly>
                </div>
                <div class="col-xs-4 mb"><label> {{ __('District') }}</label>
                    <input type="text" class="form-control" value="{{ $user->district }}" readonly>
                </div>
                <div class="col-xs-7 mb"><label> {{ __('Direction') }}</label>
                    <input type="text" class="form-control" value="{{ $user->direction }}" readonly>
                </div>
                <div class="col-xs-5 mb"><label> {{ __('Job') }}</label>
                    <input type="text" class="form-control" value="{{ $user->job }}" readonly>
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
@endsection
