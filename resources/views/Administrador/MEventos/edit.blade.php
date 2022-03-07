@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>{{ __('EVENT') }}</h1>
@stop

@section('content')
    <div class="row bg-black text-danger" style="padding:5vh 0 10vh 0;font-size: 1.3em">
        <div class="col-md-5 text-center center-block">
            <div class="row">
                <div class="col-xs-6">
                    <img width="150" src="{{ asset($evento->organizador->foto) }}" class="mb">
                    <div>{{ __('Organizer') }}</div>
                    <div>{{ $evento->organizador->nombre }} {{ $evento->organizador->apellido }}</div>
                </div>
                <div class="col-xs-6">
                    <img width="150" src="{{ asset($evento->mcontrol->foto) }}" class="mb">
                    <div>{{ __('Control desk') }}</div>
                    <div>{{ $evento->mcontrol->nombre }} {{ $evento->mcontrol->apellido }}</div>

                </div>
                <div class="col-xs-6">
                    <img width="150" src="{{ asset($evento->judge->foto) }}" class="mb">
                    <div>{{ __('Judge') }}</div>
                    <div>{{ $evento->judge->nombre }} {{ $evento->judge->apellido }}</div>

                </div>
                <div class="col-xs-6 mb">
                    <img width="150" src="{{ asset($evento->assistent->foto) }}" class="mb">
                    <div>{{ __('Assistant') }}</div>
                    <div>{{ $evento->assistent->nombre }} {{ $evento->assistent->apellido }}</div>
                </div>
                <div class="col-xs-12"><br>
                    <form method="POST" action="{{ route('meventos.update', ['id' => $evento->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="mb">
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
                <div class="col-xs-12 mb">
                    <label>{{ __('Dates') }}</label>
                    <div class="row">
                        @foreach ($evento->fechas as $fecha)
                            <div class="col-xs-4 mb">
                                <label type="text" class="form-control text-danger">
                                    {{ $fecha }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-4 mb">
                    <label>{{ __('Coliseum') }}</label>
                    <input type="text" class="form-control" value="{{ $evento->coliseum->nombre }}" readonly>
                </div>
                <div class="col-xs-4 mb"><label>{{ __('Type Event') }}</label>
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
                <div class="col-xs-4 mb">
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
                <div class="col-xs-12 mb">
                    <label class="form-label">{{ __('Spurs') }}</label>
                    <div class="row">
                        @foreach ($evento->spl as $spl)
                            @if ($spl == 'lbr')
                                <div class="col-xs-4 mb">
                                    <label class="form-control text-danger">Libre</label>
                                </div>
                            @elseif($spl == 'fbr')
                                <div class="col-xs-4 mb">
                                    <label class="form-control text-danger">Fibra</label>
                                </div>
                            @elseif($spl == 'plt')
                                <div class="col-xs-4 mb">
                                    <label class="form-control text-danger">Plastica</label>
                                </div>
                            @elseif($spl == 'cry')
                                <div class="col-xs-4 mb">
                                    <label class="form-control text-danger">Carey</label>
                                </div>
                            @elseif($spl == 'spn')
                                <div class="col-xs-4 mb">
                                    <label class="form-control text-danger">Espina</label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-3 mb">
                    <label>{{ __('Size') }}</label>
                    <input type="text" class="form-control" value="{{ $evento->sz }}" readonly>
                </div>
                <div class="col-xs-3 mb">
                    <label>{{ __('Time') }}</label>
                    <input type="text" class="form-control" value="{{ $evento->sz }}" readonly>
                </div>
                <div class="col-xs-6 mb">
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
                <div class="col-xs-5 mb">
                    <label>{{ __('Country') . ', ' . __('State') }}</label>
                    <div class="form-control">
                        <?php switch ($evento->ctr) {
                            case 'PER':
                                echo 'Perú';
                                break;
                            case 'ARG':
                                echo 'Argentina';
                                break;
                            case 'ECU':
                                echo 'Ecuador';
                                break;
                            case 'CHL':
                                echo 'Chile';
                                break;
                        } ?>,
                        <select disabled class="text-white"
                            style="-webkit-appearance: none;background:none;border:none;">
                            <option @if ($evento->stt == 'PE-AMA') selected @endif>Amazonas</option>
                            <option @if ($evento->stt == 'PE-ANC') selected @endif>Ancash</option>
                            <option @if ($evento->stt == 'PE-APU') selected @endif>Apurímac</option>
                            <option @if ($evento->stt == 'PE-ARE') selected @endif>Arequipa</option>
                            <option @if ($evento->stt == 'PE-AYA') selected @endif>Ayacucho</option>
                            <option @if ($evento->stt == 'PE-CAJ') selected @endif>Cajamarca</option>
                            <option @if ($evento->stt == 'PE-CUS') selected @endif>Cuzco</option>
                            <option @if ($evento->stt == 'PE-HUV') selected @endif>Huancavelica</option>
                            <option @if ($evento->stt == 'PE-HUC') selected @endif>Huánuco</option>
                            <option @if ($evento->stt == 'PE-ICA') selected @endif>ICA</option>
                            <option @if ($evento->stt == 'PE-JUN') selected @endif>Junín</option>
                            <option @if ($evento->stt == 'PE-LAL') selected @endif>La Libertad</option>
                            <option @if ($evento->stt == 'PE-LAM') selected @endif>Lambayeque</option>
                            <option @if ($evento->stt == 'PE-LIM') selected @endif>Lima</option>
                            <option @if ($evento->stt == 'PE-LOR') selected @endif>Loreto</option>
                            <option @if ($evento->stt == 'PE-MDD') selected @endif>Madre de Dios</option>
                            <option @if ($evento->stt == 'PE-MOQ') selected @endif>Moquegua</option>
                            <option @if ($evento->stt == 'PE-PAS') selected @endif>Pasco</option>
                            <option @if ($evento->stt == 'PE-PIU') selected @endif>Piura</option>
                            <option @if ($evento->stt == 'PE-PUN') selected @endif>Puno</option>
                            <option @if ($evento->stt == 'PE-SAM') selected @endif>San Martín</option>
                            <option @if ($evento->stt == 'PE-TAC') selected @endif>Tacna</option>
                            <option @if ($evento->stt == 'PE-TUM') selected @endif>Tumbes</option>
                            <option @if ($evento->stt == 'PE-UCA') selected @endif>Ucayali</option>
                            {{-- CHILE --}}
                            <option @if ($evento->stt == 'CL-AI') selected @endif>Aysén</option>
                            <option @if ($evento->stt == 'CL-AN') selected @endif>Antofagasta</option>
                            <option @if ($evento->stt == 'CL-AP') selected @endif>Arica y Parinacota
                            </option>
                            <option @if ($evento->stt == 'CL-AR') selected @endif>Araucanía</option>
                            <option @if ($evento->stt == 'CL-AT') selected @endif>Atacama</option>
                            <option @if ($evento->stt == 'CL-BI') selected @endif>Biobío</option>
                            <option @if ($evento->stt == 'CL-CO') selected @endif>Coquimbo</option>
                            <option @if ($evento->stt == 'CL-LI') selected @endif>O'Higgins</option>
                            <option @if ($evento->stt == 'CL-LL') selected @endif>Los Lagos</option>
                            <option @if ($evento->stt == 'CL-LR') selected @endif>Los Ríos</option>
                            <option @if ($evento->stt == 'CL-MA') selected @endif>Magallanes y Antártica
                            </option>
                            <option @if ($evento->stt == 'CL-ML') selected @endif>Maule</option>
                            <option @if ($evento->stt == 'CL-NB') selected @endif>Ñuble</option>
                            <option @if ($evento->stt == 'CL-RM') selected @endif>Santiago</option>
                            <option @if ($evento->stt == 'CL-TA') selected @endif>Tarapacá</option>
                            <option @if ($evento->stt == 'CL-VS') selected @endif>Valparaíso</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-7 mb">
                    <label>{{ __('Direction') }}</label>
                    <div class="form-control">
                        {{ $evento->drc }}
                    </div>
                </div>
                <div class="col-xs-4 mb">
                    <label>{{ __('1st WEIGH') }}</label>
                    <input class="form-control" type="time" step='1' value="{{ $evento->ftw }}" readonly>
                </div>
                <div class="col-xs-4 mb">
                    <label>{{ __('2nd WEIGH') }}</label>
                    <input class="form-control" type="time" step='1' value="{{ $evento->stw }}" readonly>
                </div>
                <div class="col-xs-4 mb">
                    <label>{{ __('Start') }}</label>
                    <input class="form-control" type="time" step='1' value="{{ $evento->hstart }}" readonly>
                </div>
                <div class="col-xs-6 mb">
                    <label>{{ __('Awards') }}</label>
                    <input class="form-control" value="{{ $evento->awards }}" readonly>
                </div>
                <div class="col-xs-6 mb">
                    <label>{{ __('Awards') }}</label>
                    <input class="form-control" value="{{ $evento->trophys }}" readonly>
                </div>
                <div class="col-xs-6 mb">
                    <label>{{ __('Rooster') . ' ' . $evento->trooster . __('seconds') }}</label>
                    <input class="form-control" value="{{ $evento->rooster }}" readonly>
                </div>
                <div class="col-xs-6 mb">
                    <label>{{ __('Rooster') . ' 10' . __('seconds') }}</label>
                    <input class="form-control" value="{{ $evento->rten }}" readonly>
                </div>
                <div class="col-xs-3 mb">
                    <label>1 {{ __('FRENTE') }}</label>
                    <input class="form-control" value="{{ $evento->fft }}" readonly>
                </div>
                <div class="col-xs-3 mb">
                    <label>2 {{ __('FRENTE') }}</label>
                    <input class="form-control" value="{{ $evento->sft }}" readonly>
                </div>
                <div class="col-xs-3 mb">
                    <label>3 {{ __('FRENTE') }}</label>
                    <input class="form-control" value="{{ $evento->tft }}" readonly>
                </div>
                <div class="col-xs-3 mb">
                    <label>{{ __('Fight quality') }}</label>
                    <input class="form-control" value="{{ $evento->fcd }}" readonly>
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
