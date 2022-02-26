@extends('layouts.app')

@section('content')
    <div class="card bg-black text-white mx-auto border border-danger mb-3">
        <div class="card-body border border-danger">
            <div class="row mx-auto">
                <div class="col-6 col-md-3 mb-3">
                    <img src=" {{ asset('storage/img/pata.jpg') }}" class="img-fluid d-block mx-auto">
                </div>
                <div class="col-6 col-md-3 my-auto">
                    <ul class="list-unstyled">
                        <li>
                            <h6> {{ __('USER') }}: {{ Auth::user()->name }}</h6>
                        </li>
                        <li>
                            <h6>{{ __('GALPON') }}: {{ Auth::user()->galpon }}</h6>
                        </li>
                        <li>
                            <h6>{{ __('COUNTRY') }}: {{ Auth::user()->country }}</h6>
                        </li>
                        <li>
                            <h6>{{ __('STATE') }}: {{ Auth::user()->state }}</h6>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 my-auto">
                    <img src="@if (!empty(
    Auth::user()->mascotas[0]->fotos->where('nfoto', 1)->first()
)) {{ asset(Auth::user()->mascotas[0]->fotos->where('nfoto', 1)->first()->ruta) }}
                    @else{{ asset('storage/img/pata.jpg') }} @endif"
                        class="img-fluid d-block mx-auto">
                </div>
                <div class="col-6 col-sm-3 my-auto">
                    <img src="@if (!empty(
    Auth::user()->mascotas[1]->fotos->where('nfoto', 1)->first()
)) {{ asset(Auth::user()->mascotas[1]->fotos->where('nfoto', 1)->first()->ruta) }}
                    @else{{ asset('storage/img/pata.jpg') }} @endif"
                        class="img-fluid d-block mx-auto">
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal" method="POST" action="{{ route('Events.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="card mx-auto bg-black text-white border border-danger mb-3">
            <div class="card-body border border-danger">
                <div class="row">
                    {{-- ORGANIZADOR ID --}}
                    <input id="organizador_id" type="text" name="organizador_id" value="{{ Auth::user()->id }}" hidden>
                    {{-- DATES --}}
                    <div class="col-sm-12 mb-3">
                        <label for="jueza_id" class="col-form-label fw-bold">
                            {{ __('Dates') }}
                            <a class="btn btn-success" id="adddates">+</a>
                            <a class="btn btn-danger" id="removedate">-</a>

                            @if ($errors->has('fechas.*') || $errors->has('fechas'))
                                <span class="text-danger text-fs6">
                                    {{ __('Get the dates right') }}
                                </span>
                            @endif
                        </label>
                        <div class="form_dates row g-3">
                        </div>
                    </div>
                    {{-- COLISEO --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('cls') ? ' has-error' : '' }}">
                        <label for="cls" class="col-form-label fw-bold">
                            {{ __('Coliseum') }}
                        </label>
                        <div class="col-auto">
                            <input id="cls" type="text" class="form-control text-danger fw-bold" name="cls"
                                value="{{ old('cls') }}" required autofocus>

                            @if ($errors->has('cls'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('cls') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- TYPE EVENT --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('tevent') ? ' has-error' : '' }}">
                        <label for="tevent" class="col-form-label fw-bold">
                            {{ __('Type Event') }}
                        </label>
                        <div class="col-auto">
                            <select class="form-select text-danger fw-bold" id="tevent" name="tevent"
                                value="{{ old('tevent') }}" required autofocus>
                                <option value="cmp">
                                    {{ __('Championship') }}
                                </option>
                                <option value="cct">
                                    {{ __('Concentration') }}
                                </option>
                                <option value="chk">
                                    {{ __('Chuzbk') }}
                                </option>
                                <option value="drb">
                                    {{ __('Derby') }}
                                </option>
                                <option value="prt">
                                    {{ __('Party') }}
                                </option>
                                <option value="thr">
                                    {{ __('Other') }}
                                </option>
                            </select>

                            @if ($errors->has('tevent'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('tevent') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- REGULATION --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('trl') ? ' has-error' : '' }}">
                        <label for="trl" class="col-form-label fw-bold">
                            {{ __('Regulation') }}
                        </label>
                        <div class="col-auto">
                            <select class="form-control form-select text-danger fw-bold" id="trl" name="trl"
                                value="{{ old('trl') }}" required autofocus>
                                <option class="text-danger fw-bold" selected value="cls">Coliseo</option>
                                <option class="text-danger fw-bold" value="dpt">Departamental </option>
                                <option class="text-danger fw-bold" value="nac">Nacional</option>
                                <option class="text-danger fw-bold" value="inc">Internacional</option>
                            </select>
                            @if ($errors->has('trl'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('trl') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- ESPUELAS --}}
                    <div class="col-6 col-md-2 mb-3 form-group{{ $errors->has('spl') ? ' has-error' : '' }}">
                        <label for="spl" class="col-form-label fw-bold">
                            {{ __('ESPUELAS') }}
                        </label>
                        <div class="col-auto">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="lbr" name="spl[]"
                                    @if (is_array(old('spl')) && in_array('lbr', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">Libre</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="fbr" name="spl[]"
                                    @if (is_array(old('spl')) && in_array('fbr', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">Fibra</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="plt" name="spl[]"
                                    @if (is_array(old('spl')) && in_array('plt', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">Plastica</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="cry" name="spl[]"
                                    @if (is_array(old('spl')) && in_array('cry', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">Carey</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" value="spn" name="spl[]"
                                    @if (is_array(old('spl')) && in_array('spn', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">Espina</label>
                            </div>
                            @if ($errors->has('spl'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('spl') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row col-6 col-md-2">
                        {{-- SIZE --}}
                        <div class="form-group{{ $errors->has('sz') ? ' has-error' : '' }}">
                            <label for="sz" class="col-form-label fw-bold">
                                {{ __('Size') }}
                            </label>
                            <div class="col-auto">
                                <select class="form-control form-select text-danger fw-bold" id="sz" name="sz"
                                    value="{{ old('sz') }}" required autofocus>
                                    <option class="text-danger fw-bold" selected value="5">5</option>
                                    <option class="text-danger fw-bold" value="8">8 </option>
                                    <option class="text-danger fw-bold" value="lbr">Libre</option>
                                </select>
                                @if ($errors->has('sz'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('sz') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- TIME --}}
                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label for="time" class="col-form-label fw-bold">
                                {{ __('Time') }}
                            </label>
                            <div class="col-auto">
                                <select class="form-control form-select text-danger fw-bold" id="time" name="time"
                                    value="{{ old('time') }}" required autofocus>
                                    <option class="text-danger fw-bold" selected value="4">4</option>
                                    <option class="text-danger fw-bold" value="9">6 </option>
                                    <option class="text-danger fw-bold" value="8">8</option>
                                    <option class="text-danger fw-bold" value="10">10</option>
                                </select>
                                @if ($errors->has('time'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('time') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- WEIGHTS PESO --}}
                    <div class="col-sm-8">
                        <div class="row">
                            <div
                                class="col-sm-5  form-group{{ $errors->has('miw') || $errors->has('maw') ? ' has-error' : '' }}">
                                <label for="weight" class="col-form-label fw-bold">
                                    {{ __('Weight') }}
                                </label>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            Min
                                            <input type="number" class="form-control" min="1" name="miw"
                                                onKeyPress="if(this.value.length==3) return false;"
                                                value="{{ old('miw') }}" required autofocus />
                                            -
                                            <input type="number" class="form-control" min="1" name="maw"
                                                onKeyPress="if(this.value.length==3) return false;"
                                                value="{{ old('maw') }}" required autofocus />
                                            Max
                                        </span>
                                    </div>
                                    @if ($errors->has('miw') || $errors->has('maw'))
                                        <span class="text-danger text-fs6">
                                            {{ __('Enter correct Weights') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3  form-group{{ $errors->has('ctr') ? ' has-error' : '' }}">
                                <label for="ctr" class="col-form-label fw-bold">
                                    {{ __('Country') }}
                                </label>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <input id="ctr" type="text" class="form-control text-danger fw-bold" name="ctr"
                                            value="{{ old('ctr') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('ctr'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('ctr') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4  form-group{{ $errors->has('stt') ? ' has-error' : '' }}">
                                <label for="stt" class="col-form-label fw-bold">
                                    {{ __('State') }}
                                </label>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <input id="stt" type="text" class="form-control text-danger fw-bold" name="stt"
                                            value="{{ old('stt') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('stt'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('stt') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12  form-group{{ $errors->has('drc') ? ' has-error' : '' }}">
                                <label for="drc" class="col-form-label fw-bold">
                                    {{ __('Direction') }}
                                </label>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <input id="drc" type="text" class="form-control text-danger fw-bold" name="drc"
                                            value="{{ old('drc') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('drc'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('drc') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 1 TIME WEIGHT PESO --}}
                    <div class="col-md-4 my-3 form-group{{ $errors->has('ftw') ? ' has-error' : '' }}">
                        <label for="ftw" class="col-form-label fw-bold">
                            {{ __('First Time Weight') }}
                        </label>
                        <div class="col-auto">
                            <input id="ftw" type="time" step='1' class="form-control text-danger fw-bold" name="ftw"
                                value="{{ old('ftw') }}" required autofocus>

                            @if ($errors->has('ftw'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('ftw') }}
                                </span>
                            @endif
                        </div>
                        @if ($errors->has('ftw'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('ftw') }}
                            </span>
                        @endif
                    </div>
                    {{-- 2 TIME WEIGHT --}}
                    <div class="col-md-4 my-3 form-group{{ $errors->has('stw') ? ' has-error' : '' }}">
                        <label for="stw" class="col-form-label fw-bold">
                            {{ __('Second Time Weight') }}
                        </label>
                        <div class="col-auto">
                            <input id="stw" type="time" step='1' class="form-control text-danger fw-bold" name="stw"
                                value="{{ old('stw') }}" required autofocus>

                            @if ($errors->has('stw'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('stw') }}
                                </span>
                            @endif
                        </div>
                        @if ($errors->has('time'))
                            <span class="text-danger text-fs6">
                                {{ $errors->first('time') }}
                            </span>
                        @endif
                    </div>
                    {{-- HORA INICIO --}}
                    <div class="col-sm-4 my-3 form-group{{ $errors->has('hstart') ? ' has-error' : '' }}">
                        <label for="hstart" class="col-form-label fw-bold">
                            {{ __('Time Start') }}
                        </label>
                        <div class="col-auto">
                            <input id="hstart" type="time" step='1' class="form-control text-danger fw-bold" name="hstart"
                                value="{{ old('hstart') }}" required autofocus>

                            @if ($errors->has('hstart'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('hstart') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- MESA DE CONTROL, JUEZ Y ASISTENTE --}}
                    {{-- MESA DE CONTROL --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('mcontrol_id') ? ' has-error' : '' }}">
                        <label for="mcontrol_id" class="col-form-label fw-bold">
                            {{ __('Control Desk') }}
                        </label>
                        <div class="col-auto">
                            <select class="form-select text-danger fw-bold" id="mcontrol_id" name="mcontrol_id"
                                value="{{ old('mcontrol_id') }}" required autofocus>
                                @foreach ($users as $mcontrol)
                                    <option value="{{ $mcontrol->id }}"
                                        @if (old('mcontrol_id') == $mcontrol->id) selected @endif>
                                        {{ $mcontrol->nombre . ' ' . $mcontrol->apellido }}
                                    </option>
                                @endforeach
                            </select>
                            @if ($errors->has('mcontrol_id'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('mcontrol_id') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- JUEZ --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('judge_id') ? ' has-error' : '' }}">
                        <label for="judge_id" class="col-form-label fw-bold">
                            {{ __('Judge') }}
                        </label>
                        <div class="col-auto">
                            <select class="form-select text-danger fw-bold" id="judge_id" name="judge_id"
                                value="{{ old('judge_id') }}" required autofocus>
                                @foreach ($users as $judge)
                                    <option value="{{ $judge->id }}" @if (old('judge_id') == $judge->id) selected @endif>
                                        {{ $judge->nombre . ' ' . $judge->apellido }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('judge_id'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('judge_id') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- ASSINTENT --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('assistent_id') ? ' has-error' : '' }}">
                        <label for="assistent_id" class="col-form-label fw-bold">
                            {{ __('Assitent') }}
                        </label>
                        <div class="col-auto">
                            <select class="form-select text-danger fw-bold" id="assistent_id" name="assistent_id"
                                value="{{ old('assistent_id') }}" required autofocus>
                                @foreach ($users as $assisten)
                                    <option value="{{ $assisten->id }}"
                                        @if (old('assistent_id') == $assisten->id) selected @endif>
                                        {{ $assisten->nombre . ' ' . $assisten->apellido }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('assistent_id'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('assistent_id') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="card mx-auto text-dark border border-danger mb-3">
            <div class="card-body border border-danger">
                {{-- BANNER --}}
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="1000">
                            <a href="http://www.google.com">
                                <img src="{{ url('storage/img/shampoo.jpg') }}" class="d-block mx-auto" height="380vh">
                            </a>
                        </div>
                        <div class="carousel-item" data-bs-interval="1000">
                            <a href="http://www.google.com">
                                <img src="{{ url('storage/img/pata.jpg') }}" class="d-block mx-auto" height="380vh">
                            </a>
                        </div>
                        <div class="carousel-item" data-bs-interval="1000">
                            <a href="http://www.google.com">
                                <img src="{{ url('storage/img/dogcorrea.jpg') }}" class="d-block mx-auto"
                                    height="380vh">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-auto bg-black text-white border border-danger mb-3">
            <div class="card-body border border-danger">
                <div class="row">
                    {{-- AWARDS --}}
                    <div class="col-sm-3 mb-3 form-group{{ $errors->has('awards') ? ' has-error' : '' }}">
                        <label for="awards" class="col-form-label fw-bold">
                            {{ __('Awards') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="awards" type="number" class="form-control text-danger fw-bold" name="awards"
                                    value="{{ old('awards') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==5) return false;" readonly />
                                @if ($errors->has('awards'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('awards') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- TROPHYS --}}
                    <div class="col-sm-2 mb-3 form-group{{ $errors->has('trophys') ? ' has-error' : '' }}">
                        <label for="trophys" class="col-form-label fw-bold">
                            {{ __('Trophys') }}
                        </label>
                        <div class="col-auto">
                            <input id="trophys" type="number" class="form-control text-danger fw-bold" name="trophys"
                                value="{{ old('trophys') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;" />

                            @if ($errors->has('trophys'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('trophys') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- ROOSTER 30 OR 60 --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('rooster') ? ' has-error' : '' }}">
                        <label for="rooster" class="col-form-label fw-bold">
                            {{ __('Rooster') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="rooster" type="number" class="form-control text-danger fw-bold" name="rooster"
                                    value="0" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;">
                                <select class="form-select text-danger fw-bold" id="trooster" name="trooster"
                                    value="{{ old('trooster') }}" required autofocus>
                                    <option value="30">30 {{ __('seconds') }}</option>
                                    <option value="60">60 {{ __('seconds') }}</option>
                                </select>

                                @if ($errors->has('rooster'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('rooster') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- ROOSTER 10 --}}
                    <div class="col-sm-3 mb-3 form-group{{ $errors->has('rten') ? ' has-error' : '' }}">
                        <label for="rten" class="col-form-label fw-bold">
                            {{ __('Rooster') }} 10 {{ __('seconds') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="rten" type="number" class="form-control text-danger fw-bold" name="rten"
                                    value="0" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;">

                                @if ($errors->has('rten'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('rten') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- 1 FRENTE --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('fft') ? ' has-error' : '' }}">
                        <label for="fft" class="col-form-label fw-bold">
                            {{ __('1er Frente') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="fft" type="number" class="form-control text-danger fw-bold" name="fft" value="0"
                                    required autofocus min="0" onKeyPress="if(this.value.length==4) return false;" />

                                @if ($errors->has('fft'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('fft') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- 2 FRENTE --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('sft') ? ' has-error' : '' }}">
                        <label for="sft" class="col-form-label fw-bold">
                            {{ __('2do Frente') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="sft" type="number" class="form-control text-danger fw-bold" name="sft" value="0"
                                    required autofocus min="0" onKeyPress="if(this.value.length==4) return false;" />

                                @if ($errors->has('sft'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('sft') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- 3 FRENTE --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('tft') ? ' has-error' : '' }}">
                        <label for="tft" class="col-form-label fw-bold">
                            {{ __('3er Frente') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="tft" type="number" class="form-control text-danger fw-bold" name="tft" value="0"
                                    required autofocus min="0" onKeyPress="if(this.value.length==4) return false;" />

                                @if ($errors->has('tft'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('tft') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- Pelea de Calidad --}}
                    <div class="col-md-4 mb-3 form-group{{ $errors->has('fcd') ? ' has-error' : '' }}">
                        <label for="fcd" class="col-form-label fw-bold">
                            {{ __('Pelea de Calidad') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="fcd" type="number" class="form-control text-danger fw-bold" name="fcd" value="0"
                                    required autofocus min="0" onKeyPress="if(this.value.length==4) return false;" />

                                @if ($errors->has('fcd'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('fcd') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- PAVOS --}}
                    <div class="col-md-2 mb-3 form-group{{ $errors->has('pvs') ? ' has-error' : '' }}">
                        <label for="pvs" class="col-form-label fw-bold">
                            {{ __('Pavos') }}
                        </label>
                        <div class="col-auto">
                            <input id="pvs" type="number" class="form-control text-danger fw-bold" name="pvs"
                                value="{{ old('pvs') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;" />

                            @if ($errors->has('pvs'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('pvs') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- Lechones --}}
                    <div class="col-md-2 mb-3 form-group{{ $errors->has('lch') ? ' has-error' : '' }}">
                        <label for="lch" class="col-form-label fw-bold">
                            {{ __('Lechones') }}
                        </label>
                        <div class="col-auto">
                            <input id="lch" type="number" class="form-control text-danger fw-bold" name="lch"
                                value="{{ old('lch') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;" />

                            @if ($errors->has('lch'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('lch') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- CANASTA --}}
                    <div class="col-md-2 mb-3 form-group{{ $errors->has('cnt') ? ' has-error' : '' }}">
                        <label for="cnt" class="col-form-label fw-bold">
                            {{ __('Canastas') }}
                        </label>
                        <div class="col-auto">
                            <input id="cnt" type="number" class="form-control text-danger fw-bold" name="cnt"
                                value="{{ old('cnt') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;" />

                            @if ($errors->has('cnt'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('cnt') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- SACO 20 KG --}}
                    <div class="col-md-2 mb-3 form-group{{ $errors->has('skg') ? ' has-error' : '' }}">
                        <label for="skg" class="col-form-label fw-bold">
                            {{ __('Saco 20 kg') }}
                        </label>
                        <div class="col-auto">
                            <input id="skg" type="number" class="form-control text-danger fw-bold" name="skg"
                                value="{{ old('skg') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;" />

                            @if ($errors->has('skg'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('skg') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-auto bg-black text-white border border-danger mb-3">
            <div class="card-body border border-danger">
                <div class="row">
                    {{-- ENTRADAS --}}
                    <label for="egn" class="col-form-label fw-bold">
                        {{ __('ENTRADAS') }}
                    </label>
                    {{-- GENERAL --}}
                    <div class="col-md-3 mb-3 form-group{{ $errors->has('egn') ? ' has-error' : '' }}">
                        <label for="egn" class="col-form-label fw-bold">
                            {{ __('GENERAL') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="egn" type="number" class="form-control text-danger fw-bold" name="egn"
                                    value="{{ old('egn') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==3) return false;" />
                            </div>

                            @if ($errors->has('egn'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('egn') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- VIP --}}
                    <div class="col-md-3 mb-3 form-group{{ $errors->has('evp') ? ' has-error' : '' }}">
                        <label for="evp" class="col-form-label fw-bold">
                            {{ __('VIP') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="evp" type="number" class="form-control text-danger fw-bold" name="evp"
                                    value="{{ old('evp') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==3) return false;" />
                            </div>
                            @if ($errors->has('evp'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('evp') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- PACTADO --}}
                    <div class="col-md-3 mb-3 form-group{{ $errors->has('pct') ? ' has-error' : '' }}">
                        <label for="pct" class="col-form-label fw-bold">
                            {{ __('PACTADA') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="pct" type="number" class="form-control text-danger fw-bold" name="pct"
                                    value="{{ old('pct') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==3) return false;" />
                            </div>
                            @if ($errors->has('pct'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('pct') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- BASE --}}
                    <div class="col-md-3 mb-3 form-group{{ $errors->has('bs') ? ' has-error' : '' }}">
                        <label for="bs" class="col-form-label fw-bold">
                            {{ __('BASE') }}
                        </label>
                        <div class="col-auto">
                            <input id="bs" type="number" class="form-control text-danger fw-bold" name="bs"
                                value="{{ old('bs') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==4) return false;" />

                            @if ($errors->has('bs'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('bs') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <label for="ift" class="col-form-label fw-bold">
                        {{ __('INSCRIPCIÓN FRENTE') }}
                    </label>
                    {{-- INSCRIPCIÓN --}}
                    {{-- FRENTE --}}
                    <div class="col-md-3 mb-3 form-group{{ $errors->has('ift') ? ' has-error' : '' }}">
                        <label for="ift" class="col-form-label fw-bold">
                            {{ __('FRENTE') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="ift" type="number" class="form-control text-danger fw-bold" name="ift"
                                    value="{{ old('ift') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;" />
                            </div>
                            @if ($errors->has('ift'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('ift') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- GALLO --}}
                    <div class="col-md-3 mb-3 form-group{{ $errors->has('gll') ? ' has-error' : '' }}">
                        <label for="gll" class="col-form-label fw-bold">
                            {{ __('Gallo') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="gll" type="number" class="form-control text-danger fw-bold" name="gll"
                                    value="{{ old('gll') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;" />
                            </div>
                            @if ($errors->has('gll'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('gll') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- GALPON --}}
                    <div class="col-md-3 mb-3 form-group{{ $errors->has('glp') ? ' has-error' : '' }}">
                        <label for="glp" class="col-form-label fw-bold">
                            {{ __('GALPON') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="glp" type="number" class="form-control text-danger fw-bold" name="glp"
                                    value="{{ old('glp') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;" />
                            </div>
                            @if ($errors->has('glp'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('glp') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h6>* Personas con discapacidad - PCD y mujeres bienvenidos</h6>
                        <h6>LEY 28683 Atención preferencial y LEY 29973 derechos persona con discapacidad - PCD</h6>
                    </div>
                    {{-- BOTON DE REGISTRO --}}
                    <div class="col-md-12 ">
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add Event') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript">
        /* ADD DATE */
        $("#adddates").click(function() {
            $(".form_dates").append(
                '<div id="dfechas" class="col-6 col-md"><input id="fechas" type="date" class="form-control text-danger fw-bold" name="fechas[]" required autofocus ></div>'
            );
        });
        /* DELETE DATE */
        $("#removedate").click(function() {
            $('#dfechas').last().remove();
        });
        /* AWARDS */
        function Sum() {
            var rtr = $('#rooster').val();
            var rten = $('#rten').val();
            var fft = $('#fft').val();
            var sft = $('#sft').val();
            var tft = $('#tft').val();
            var fcd = $('#fcd').val();
            var sum = parseInt(rtr) + parseInt(rten) + parseInt(fft) + parseInt(sft) + parseInt(tft) + parseInt(fcd);
            console.log(sum);
            $('#awards').val(sum);
        }
        $("#rooster").change(Sum);
        $("#rten").change(Sum);
        $("#1ft").change(Sum);
        $("#2ft").change(Sum);
        $("#3ft").change(Sum);
        $("#fcd").change(Sum);
        Sum();
    </script>
@endsection
