@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>{{ __('EVENT') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="row bg-black text-danger" style="padding:5vh 0 10vh 0;font-size: 1.3em">
            <div class="col-md-5 text-center center-block">
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{ route('usuarios.show', $evento->organizador->id) }}">
                            <img width="150" src="{{ asset($evento->organizador->foto) }}" class="form-group">
                            <div>{{ __('Organizer') }}</div>
                            <div>{{ $evento->organizador->nombre }} {{ $evento->organizador->apellido }}</div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a href="{{ route('usuarios.show', $evento->mcontrol->id) }}">
                            <img width="150" src="{{ asset($evento->mcontrol->foto) }}" class="form-group">
                            <div>{{ __('Control desk') }}</div>
                            <div>{{ $evento->mcontrol->nombre }} {{ $evento->mcontrol->apellido }}</div>
                        </a>
                    </div>
                    <div class="col-xs-6">
                        <a href="{{ route('usuarios.show', $evento->judge->id) }}">
                            <img width="150" src="{{ asset($evento->judge->foto) }}" class="form-group">
                            <div>{{ __('Judge') }}</div>
                            <div>{{ $evento->judge->nombre }} {{ $evento->judge->apellido }}</div>
                        </a>
                    </div>
                    @if (!empty($evento->assistent))
                        <div class="col-xs-6 form-group">
                            <a href="{{ route('usuarios.show', $evento->assistent->id) }}">
                                <img width="150" src="{{ asset($evento->assistent->foto) }}" class="form-group">
                                <div>{{ __('Assistant') }}</div>
                                <div>{{ $evento->assistent->nombre }} {{ $evento->assistent->apellido }}</div>
                            </a>
                        </div>
                    @endif
                    <div class="col-xs-12"><br>
                        <form class="text-uppercase" method="POST"
                            action="{{ route('meventos.update', ['id' => $evento->id]) }}">
                            {!! csrf_field() !!}
                            {{ method_field('PUT') }}
                            <div class="form-group">
                                <div class="col-xs-6">{{ __('Status') }}:</div>
                                <select class="col-xs-6 form-control" name="status" style="width: 40%;margin:auto">
                                    <option value="0" @if ($evento->status == '0') selected @endif>
                                        {{ __('Inactived') }}
                                    </option>
                                    <option value="1" @if ($evento->status == '1') selected @endif>
                                        {{ __('Actived') }}
                                    </option>
                                </select><br>
                            </div><br>
                            <button type="submit" class="btn btn-primary">{{ __('Change status') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-7 center-block">
                <div class="row">
                    {{-- DATES --}}
                    <div class="col-xs-12 form-group">
                        <label>{{ __('Dates') }}</label>
                        <div class="row">
                            @foreach ($evento->fechas as $fecha)
                                <div class="col-xs-4 form-group">
                                    <label type="text" class="form-control text-danger">
                                        {{ $fecha }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- COLISEUM --}}
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Coliseum') }}</label>
                        <select class="form-control" id="coliseo_id" name="coliseo_id" disabled>
                            <option value="{{ $evento->coliseum->id }}" selected>
                                {{ $evento->coliseum->nombre }}
                            </option>
                        </select>
                    </div>
                    {{-- TYPE EVENT --}}
                    <div class="col-xs-4 form-group"><label>{{ __('Type Event') }}</label>
                        <select class="form-control text-danger fw-bold" disabled style="-webkit-appearance: none;">
                            <option value="cmp" @if ($evento->tevent == 'cmp') selected @endif>
                                {{ __('Championship') }}
                            </option>
                            <option value="cct" @if ($evento->tevent == 'cmp') selected @endif>
                                {{ __('Concentration') }}
                            </option>
                            <option value="chk" @if ($evento->tevent == 'chk') selected @endif>
                                {{ __('Chuscas') }}
                            </option>
                            <option value="drb" @if ($evento->tevent == 'drb') selected @endif>
                                {{ __('Derby') }}
                            </option>
                            <option value="prt" @if ($evento->tevent == 'prt') selected @endif>
                                {{ __('Party') }}
                            </option>
                            <option value="thr" @if ($evento->tevent == 'thr') selected @endif>
                                {{ __('Other') }}
                            </option>
                        </select>
                    </div>
                    {{-- REGULATION --}}
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Regulation') }}</label>
                        <select class="form-control text-danger fw-bold" disabled style="-webkit-appearance: none;">
                            <option eventovalue="cls" @if ($evento->trl == 'cls') selected @endif>
                                {{ __('Coliseum') }}</option>
                            <option eventovalue="dpt" @if ($evento->trl == 'dpt') selected @endif>
                                {{ __('Departmental') }}</option>
                            <option eventovalue="nac" @if ($evento->trl == 'nac') selected @endif>
                                {{ __('National') }} </option>
                            <option value="inc" @if ($evento->trl == 'inc') selected @endif>
                                {{ __('International') }}
                            </option>
                        </select>
                    </div>
                    {{-- ESPINAS - SPURS --}}
                    <div class="col-xs-12 form-group">
                        <label class="form-label">{{ __('Spurs') }}</label>
                        <div class="row">
                            @foreach ($evento->spl as $spl)
                                @if ($spl == 'lbr')
                                    <div class="col-xs-4 form-group">
                                        <label class="form-control text-danger">Libre</label>
                                    </div>
                                @elseif($spl == 'fbr')
                                    <div class="col-xs-4 form-group">
                                        <label class="form-control text-danger">Fibra</label>
                                    </div>
                                @elseif($spl == 'plt')
                                    <div class="col-xs-4 form-group">
                                        <label class="form-control text-danger">Plastica</label>
                                    </div>
                                @elseif($spl == 'cry')
                                    <div class="col-xs-4 form-group">
                                        <label class="form-control text-danger">Carey</label>
                                    </div>
                                @elseif($spl == 'spn')
                                    <div class="col-xs-4 form-group">
                                        <label class="form-control text-danger">Espina</label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    {{-- SIZE --}}
                    <div class="col-xs-3 form-group">
                        <label>{{ __('Size') }}</label>
                        <input type="text" class="form-control" value="{{ $evento->sz }}" readonly>
                    </div>
                    {{-- TIME --}}
                    <div class="col-xs-3 form-group">
                        <label>{{ __('Time') }}</label>
                        <input type="text" class="form-control" value="{{ $evento->sz }}" readonly>
                    </div>
                    {{-- MIN - MAX WEIGHT --}}
                    <div class="col-xs-6 form-group">
                        <label for="title" class="form-label">{{ __('Weight') }}</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                Min</span>
                            <div class="form-control">
                                {{ $evento->miw }}</div>
                            <span class="input-group-addon">Max</span>
                            <div class="form-control">
                                {{ $evento->maw }}</div>
                        </div>
                    </div>
                    {{-- COUNTRY --}}
                    <div class="col-xs-6 form-group">
                        <label>{{ __('Country') }}</label>
                        <input type="text" class="form-control" value="{{ $evento->coliseum->country }}" readonly>
                    </div>
                    {{-- STATE --}}
                    <div class="col-xs-6 form-group">
                        <label>{{ __('State') }}</label>
                        <input type="text" class="form-control" value="{{ $evento->coliseum->state }}" readonly>
                    </div>
                    {{-- DIRECCION --}}
                    <div class="col-xs-8 form-group">
                        <label>{{ __('Referencia') }}</label>
                        <input class="form-control" type="text" id="rfr" readonly>
                    </div>
                    {{-- DISTRICO --}}
                    <div class="col-xs-4 form-group">
                        <label>{{ __('District') }}</label>
                        <input class="form-control" type="text" id="drt" readonly>
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>{{ __('1st WEIGH') }}</label>
                        <input class="form-control" type="time" step='0' value="{{ $evento->ftw }}" readonly>
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>{{ __('2nd WEIGH') }}</label>
                        <input class="form-control" type="time" step='0' value="{{ $evento->stw }}" readonly>
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Start') }}</label>
                        <input class="form-control" type="time" step='0' value="{{ $evento->hstart }}" readonly>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label>{{ __('Awards') }}</label>
                        <input class="form-control" value="{{ $evento->awards }}" readonly>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label>{{ __('Awards') }}</label>
                        <input class="form-control" value="{{ $evento->trophys }}" readonly>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label>{{ __('Rooster') . ' ' . $evento->trooster . __('seconds') }}</label>
                        <input class="form-control" value="{{ $evento->rooster }}" readonly>
                    </div>
                    <div class="col-xs-6 form-group">
                        <label>Super {{ __('Rooster') . ' 10' . __('seconds') }}</label>
                        <input class="form-control" value="{{ $evento->rten }}" readonly>
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>1 {{ __('Forehead') }}</label>
                        <input class="form-control" value="{{ $evento->fft }}" readonly>
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>2 {{ __('Forehead') }}</label>
                        <input class="form-control" value="{{ $evento->sft }}" readonly>
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>3 {{ __('Forehead') }}</label>
                        <input class="form-control" value="{{ $evento->tft }}" readonly>
                    </div>
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Fight quality') }}</label>
                        <input class="form-control" value="{{ $evento->fcd }}" readonly>
                    </div>
                    {{-- PAVOS --}}
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Turkeys') }}</label>
                        <input class="form-control" value="{{ $evento->pvs }}" readonly />
                    </div>
                    {{-- Lechones --}}
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Piglets') }}</label>
                        <input class="form-control" value="{{ $evento->lch }}" readonly />
                    </div>
                    {{-- CANASTA --}}
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Baskets') }}</label>
                        <input class="form-control" value="{{ $evento->cnt }}" readonly />
                    </div>
                    {{-- SACO 20 KG --}}
                    <div class="col-xs-4 form-group">
                        <label>{{ __('Bags') }} 20KG </label>
                        <input class="col form-control" value="{{ $evento->skg }}" readonly />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- STYLES --}} <style>
        .form-control {
            color: rgb(210, 0, 0);
        }

        .form-group {
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

        function displayVals1() {
            var id = $('#coliseo_id').val();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/coliseums/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $.each(data, function(i, item) {
                        $("#ctr").val(item.country);
                        $("#stt").val(item.state);
                        $("#drt").val(item.district);
                        $("#rfr").val(item.reference);
                    });
                },
                error: function() {
                    console.log(data);
                }
            });
        }
        $("#coliseo_id").change(displayVals1);
        displayVals1();
        //HIDE
        setTimeout(function() {
            $('.alert').fadeOut(3000);
        });
    </script>

@endsection
