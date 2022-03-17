@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1 class="text-uppercase">{{ $user->nombre }} {{ $user->apellido }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="row bg-black" style="padding:5vh 0 10vh 0;font-size: 1.3em">
            <div class="col-md-5">
                <div class="text-center">
                    <div class="mb">
                        <img width="100%" src="{{ asset($user->foto) }}"><br>
                    </div>
                    <div class="mb">{{ $user->name }}</div>
                    <div class="mb">{{ $user->email }}</div>
                    @can('chngs')
                        @if (Auth::user()->usert == 'webmaster')
                            <form class="form-horizontal" method="POST"
                                action="{{ route('usuarios.update', ['id' => $user->id]) }}">
                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}
                                <input type="text" name="typec" value="0" hidden>
                                <div class="form-group">
                                    <label class="col-sm-7 control-label">{{ __('Status') . ' ' . __('Account') }}:</label>
                                    <div class="col-sm-5">
                                        <select class="form-control text-danger" name="status">
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
                                    <br>
                                    <br>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">{{ __('Change status') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form class="form-horizontal" method="POST"
                                action="{{ route('usuarios.update', ['id' => $user->id]) }}">
                                {!! csrf_field() !!}
                                {{ method_field('PUT') }}
                                <input type="text" name="typec" value="1" hidden>

                                <div class="form-group">
                                    <label class="col-sm-7 control-label">{{ __('User') . ' /' . __('Name Social') }}</label>
                                    <div class="col-sm-5">
                                        <input type="name" name="name" class="form-control" maxlength="12" required autofocus
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-7 control-label">{{ __('Password') }}</label>
                                    <div class="col-sm-5">
                                        <input type="password" name="password" class="form-control" maxlength="8" required
                                            autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit"
                                            class="btn btn-primary">{{ __('Change username and password') }}</button>
                                    </div>
                                </div>
                            </form>
                            <form class="formulario-eliminar form-horizontal" method="POST"
                                action="{{ route('usuarios.destroy', ['id' => $user->id]) }}">
                                {!! csrf_field() !!}
                                {{ method_field('DELETE') }}
                                <button type="submit" id="delete" class="btn btn-danger">{{ __('Delete') }}</button>
                            </form>
                        @endif
                    @endcan
                </div>
            </div>
            <div class="col-md-6">
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
                    <div class="col-xs-6 mb"><label>{{ __('DNI') }}</label>
                        <input type="text" class="form-control" value="{{ $user->dni }}" readonly>
                    </div>
                    @if (isset($user->fdpt))
                        <div class="col-xs-6 text-capitalize text-center">
                            <a href="{{ asset($user->fdpt) }}"
                                target="blank">{{ __('document') }}<br>{{ __('Disability') }}</a>
                        </div>
                    @endif
                    @if (isset($user->sdpt))
                        <div class="col-xs-6 text-center">
                            <img class="img-responsive center-block" src="{{ asset($user->sdpt) }}" width="100%">
                        </div>
                    @endif
                    <div class="col-xs-6 mb"><label>{{ __('Galpon') }}</label>
                        <input type="text" class="form-control" value="{{ $user->galpon }}" readonly>
                    </div>
                    <div class="col-xs-6 mb"><label> {{ __('Preparer') }}</label>
                        <input type="text" class="form-control" value="{{ $user->prepa }}" readonly>
                    </div>
                    <div class="col-xs-6 mb"><label> {{ __('Operator') }}</label>
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
                    <div class="col-xs-5 mb"><label> {{ __('Profession or Trade') }}</label>
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

        .swal2-popup {
            height: 100%;
            font-size: 100%
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
    {{-- FORMULARIO ELIMINAR docente --}}
    <script>
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '{{ __('Are you sure?') }}',
                text: '{{ __('All records will be related to this user will be deleted. This action is irreversible.') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('Yes I agree!') }}',
                cancelButtonText: '{{ __('Cancel') }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection
