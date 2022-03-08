@extends('layouts.app')
@section('content')
    <div class="card bg-black text-white mx-auto border border-danger mb-3">
        <div class="card-body border border-danger">
            <div class="row g-1 mx-auto">
                <div class="col-6 col-lg-3 my-auto">
                    <img src="@if (!empty(Auth::user()->foto)) {{ asset(Auth::user()->foto) }}
                    @else{{ asset('storage/img/pata.jpg') }} @endif"
                        class="img-fluid d-block mx-auto">
                </div>
                <div class="col-6 col-lg-3 m-auto">
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
                            <h6>{{ __('STATE') }}: {{ Auth::user()->stt }}</h6>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <h5 class="form-label text-center">{{ __('My exemplars') }}</h5>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-control">
                                <img src="@if (!empty(Auth::user()->mascotas[0])) {{ asset(Auth::user()->mascotas[0]->fotos->where('nfoto', 1)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid d-block mx-auto">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-control">
                                <img src="@if (!empty(Auth::user()->mascotas[1])) {{ asset(Auth::user()->mascotas[1]->fotos->where('nfoto', 1)->first()->ruta) }}
                            @else
                            {{ asset('storage/img/pata.jpg') }} @endif"
                                    class="img-fluid d-block mx-auto">

                            </div>
                        </div>
                    </div>
                    <label class="form-label">{{ __('Challenge') }}:</label>
                    <input class="form-control" type="number" name="chll2" value="{{ old('chll2') }}"
                        onKeyPress="if(this.value.length==4) return false;"
                        onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" required>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal" method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data"
        autocomplete="off">
        {{ csrf_field() }}
        <div class="card mx-auto bg-black text-white border border-danger mb-3">
            <div class="card-body border border-danger">
                <div class="row">
                    {{-- ORGANIZADOR ID --}}
                    <input id="organizador_id" type="text" name="organizador_id" value="{{ Auth::user()->id }}" hidden>
                    {{-- DATES --}}
                    <div class="col-sm-12 mb-3">
                        <label for="jueza_id" class="col-form-label fw-bold">
                            {{ __('Add dates') }}
                            <button class="btn btn-success" id="adddates">+</button>
                            <button class="btn btn-danger" id="removedate">-</button>

                            @if ($errors->has('fechas.*') || $errors->has('fechas'))
                                <span class="text-danger text-fs6">
                                    {{ __('Get the dates right') }}
                                </span>
                            @endif
                        </label>
                        <div class="form_dates row g-3">
                            <div class="col-6 col-md"><input id="fechas" type="date"
                                    class="form-control text-danger fw-bold" name="fechas[]"
                                    min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                                    max="{{ \Carbon\Carbon::now()->addMonths(6)->format('Y-m-d') }}" required autofocus>
                            </div>
                        </div>
                    </div>
                    {{-- COLISEO --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('coliseo_id') ? ' has-error' : '' }}">
                        <label for="coliseo_id" class="col-form-label fw-bold">
                            {{ __('Coliseum') }}
                        </label>
                        <div class="col-auto text-danger">
                            <select class="select2 form-select" id="coliseo_id" name="coliseo_id"
                                placeholder="{{ __('Coliseum') }}" required autofocus>
                                @foreach ($coliseos as $coliseo)
                                    <option value="{{ $coliseo->id }}" @if (old('coliseo_id') == $coliseo->id) selected @endif>
                                        {{ $coliseo->nombre }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('coliseo_id'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('coliseo_id') }}
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
                                <option value="cmp" @if (old('tevent') == 'cmp') selected @endif>
                                    {{ __('Championship') }}
                                </option>
                                <option value="cct" @if (old('tevent') == 'cct') selected @endif>
                                    {{ __('Concentration') }}
                                </option>
                                <option value="chk" @if (old('tevent') == 'chk') selected @endif>
                                    {{ __('Chuzk') }}
                                </option>
                                <option value="drb" @if (old('tevent') == 'drb') selected @endif>
                                    {{ __('Derby') }}
                                </option>
                                <option value="prt" @if (old('tevent') == 'prt') selected @endif>
                                    {{ __('Party') }}
                                </option>
                                <option value="thr" @if (old('tevent') == 'thr') selected @endif>
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
                                <option class="text-danger fw-bold" value="cls"
                                    @if (old('trl') == 'cls') selected @endif>
                                    {{ __('Coliseum') }}</option>
                                <option class="text-danger fw-bold" value="dpt"
                                    @if (old('trl') == 'dpt') selected @endif>
                                    {{ __('Departmental') }}</option>
                                <option class="text-danger fw-bold" value="nac"
                                    @if (old('trl') == 'nac') selected @endif>
                                    {{ __('National') }} </option>
                                <option class="text-danger fw-bold" value="inc"
                                    @if (old('trl') == 'inc') selected @endif>
                                    {{ __('International') }}
                                </option>
                            </select>
                            @if ($errors->has('trl'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('trl') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- ESPUELAS --}}
                    <div class="col-6 col-lg-2 mb-3 form-group{{ $errors->has('spl') ? ' has-error' : '' }}">
                        <label for="spl" class="col-form-label fw-bold">
                            {{ __('ESPUELAS') }}
                        </label>
                        <div class="col-auto">
                            <div class="form-check form-switch">
                                <input class="checkboxes form-check-input" type="checkbox" value="lbr" name="spl[]" required
                                    @if (is_array(old('spl')) && in_array('lbr', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">{{ __('Free') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="checkboxes form-check-input" type="checkbox" value="fbr" name="spl[]" required
                                    @if (is_array(old('spl')) && in_array('fbr', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">{{ __('Fiber') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="checkboxes form-check-input" type="checkbox" value="plt" name="spl[]" required
                                    @if (is_array(old('spl')) && in_array('plt', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">{{ __('Plastic') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="checkboxes form-check-input" type="checkbox" value="cry" name="spl[]" required
                                    @if (is_array(old('spl')) && in_array('cry', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">{{ __('Shell') }}</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="checkboxes form-check-input" type="checkbox" value="spn" name="spl[]" required
                                    @if (is_array(old('spl')) && in_array('spn', old('spl'))) checked @endif>
                                <label class="form-check-label" for="switch">{{ __('Thorn') }}</label>
                            </div>
                            @if ($errors->has('spl'))
                                <span class="text-danger text-fs6">
                                    {{ __('This field is required.') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row col-6 col-lg-2">
                        {{-- SIZE --}}
                        <div class="form-group{{ $errors->has('sz') ? ' has-error' : '' }}">
                            <label for="sz" class="col-form-label fw-bold">
                                {{ __('Size') }}
                            </label>
                            <div class="col-auto">
                                <select class="form-control form-select text-danger fw-bold" id="sz" name="sz"
                                    value="{{ old('sz') }}" required autofocus>
                                    <option class="text-danger fw-bold" value="5"
                                        @if (old('sz') == '5') selected @endif>5
                                    </option>
                                    <option class="text-danger fw-bold" value="8"
                                        @if (old('sz') == '8') selected @endif>8
                                    </option>
                                    <option class="text-danger fw-bold" value="lbr"
                                        @if (old('sz') == 'lbr') selected @endif>
                                        Libre</option>
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
                                    <option class="text-danger fw-bold" value="4"
                                        @if (old('sz') == '4') selected @endif>4
                                    </option>
                                    <option class="text-danger fw-bold" value="6"
                                        @if (old('sz') == '6') selected @endif>6
                                    </option>
                                    <option class="text-danger fw-bold" value="8"
                                        @if (old('sz') == '8') selected @endif>8
                                    </option>
                                    <option class="text-danger fw-bold" value="10"
                                        @if (old('sz') == '10') selected @endif>10
                                    </option>
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
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div
                                class="col-sm-12 col-md-5 mb-3 form-group{{ $errors->has('miw') || $errors->has('maw') ? ' has-error' : '' }}">
                                <label for="weight" class="col-form-label fw-bold">
                                    {{ __('Weight') }}
                                </label>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <span class="input-group-text text-danger fw-bold">
                                            {{ __('MIN.') }}</span>
                                        <select class="form-control text-danger" name="miw" id="miw">
                                            <option value="300">300</option>
                                            <option value="400">400</option>
                                            <option value="500">500</option>
                                        </select>
                                        <span class="input-group-text text-danger fw-bold">{{ __('MAX.') }}</span>
                                        <select class="form-control text-danger" name="maw" id="maw">
                                            <option data="300" value="315">315</option>
                                            <option data="400" value="415">415</option>
                                            <option data="500" value="505">505</option>
                                        </select>

                                    </div>
                                    @if ($errors->has('miw') || $errors->has('maw'))
                                        <span class="text-danger text-fs6">
                                            {{ __('Enter correct Weights') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-3 mb-3  form-group{{ $errors->has('ctr') ? ' has-error' : '' }}">
                                <label for="ctr" class="col-form-label fw-bold">
                                    {{ __('Country') }}
                                </label>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <select class="form-control text-danger fw-bold" id="ctr" name="ctr"
                                            value="{{ old('ctr') }}" disabled autofocus>
                                            <option class="text-danger fw-bold" value="PER">PER - Perú</option>
                                            {{-- <option class="text-danger fw-bold" value="ARG" @if (old('ctr') == 'ARG')
                                            selected @endif>Argentina</option>
                                        <option class="text-danger fw-bold" value="ECU" @if (old('ctr') == 'ECU')
                                            selected @endif>Ecuador</option> --}}
                                            {{-- <option class="text-danger fw-bold" value="CHL" @if (old('ctr') == 'CHL')
                                            selected @endif>Chile</option> --}}
                                        </select>
                                    </div>
                                    @if ($errors->has('ctr'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('ctr') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6 col-md-4 mb-3 form-group{{ $errors->has('stt') ? ' has-error' : '' }}">
                                <label for="stt" class="col-form-label fw-bold">
                                    {{ __('State') }}
                                </label>
                                <div class="col-auto">
                                    <div class="input-group">
                                        <select class="form-control text-danger fw-bold" name="stt" id="stt"
                                            value="{{ old('stt') }}" disabled autofocus>
                                            <option class="text-danger fw-bold" value="AM">AM - Amazonas</option>
                                            <option class="text-danger fw-bold" value="AN">AN - Ancash</option>
                                            <option class="text-danger fw-bold" value="AP">AP - Apurímac
                                            </option>
                                            <option class="text-danger fw-bold" value="AR">AR - Arequipa
                                            </option>
                                            <option class="text-danger fw-bold" value="AY">AY - Ayacucho
                                            </option>
                                            <option class="text-danger fw-bold" value="CJ">CJ - Cajamarca
                                            </option>
                                            <option class="text-danger fw-bold" value="CZ">CZ - Cuzco</option>
                                            <option class="text-danger fw-bold" value="HC">HC - Huancavelica
                                            </option>
                                            <option class="text-danger fw-bold" value="HU">HU - Huánuco</option>
                                            <option class="text-danger fw-bold" value="IC">IC - Ica</option>
                                            <option class="text-danger fw-bold" value="JU">JU - Junín</option>
                                            <option class="text-danger fw-bold" value="LL">LL - La Libertad
                                            </option>
                                            <option class="text-danger fw-bold" value="LB">LB - Lambayeque
                                            </option>
                                            <option class="text-danger fw-bold" value="LM">LM - Lima</option>
                                            <option class="text-danger fw-bold" value="LO">LO - Loreto</option>
                                            <option class="text-danger fw-bold" value="MD">MD - Madre de Dios
                                            </option>
                                            <option class="text-danger fw-bold" value="MQ">MQ - Moquegua
                                            </option>
                                            <option class="text-danger fw-bold" value="PA">PA - Pasco</option>
                                            <option class="text-danger fw-bold" value="PI">PI - Piura</option>
                                            <option class="text-danger fw-bold" value="PU">PU - Puno</option>
                                            <option class="text-danger fw-bold" value="SM">SM - San Martín
                                            </option>
                                            <option class="text-danger fw-bold" value="TA">TA - Tacna</option>
                                            <option class="text-danger fw-bold" value="TU">TU - Tumbes</option>
                                            <option class="text-danger fw-bold" value="UC">UC - Ucayali
                                            </option>
                                            {{-- CHILE --}}
                                            {{-- <option data="CHL" class="text-danger fw-bold" value="CL-AI" @if (old('stt') == 'CL-AI') selected @endif>Aysén</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-AN" @if (old('stt') == 'CL-AN') selected @endif>Antofagasta</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-AP" @if (old('stt') == 'CL-AP') selected @endif>Arica y Parinacota
                                        </option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-AR" @if (old('stt') == 'CL-AR') selected @endif>Araucanía</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-AT" @if (old('stt') == 'CL-AT') selected @endif>Atacama</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-BI" @if (old('stt') == 'CL-BI') selected @endif>Biobío</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-CO" @if (old('stt') == 'CL-CO') selected @endif>Coquimbo</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-LI" @if (old('stt') == 'CL-LI') selected @endif>O'Higgins</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-LL" @if (old('stt') == 'CL-LL') selected @endif>Los Lagos</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-LR" @if (old('stt') == 'CL-LR') selected @endif>Los Ríos</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-MA" @if (old('stt') == 'CL-MA') selected @endif>Magallanes y Antártica
                                        </option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-ML" @if (old('stt') == 'CL-ML') selected @endif>Maule</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-NB" @if (old('stt') == 'CL-NB') selected @endif>Ñuble</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-RM" @if (old('stt') == 'CL-RM') selected @endif>Santiago</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-TA" @if (old('stt') == 'CL-TA') selected @endif>Tarapacá</option>
                                        <option data="CHL" class="text-danger fw-bold" value="CL-VS" @if (old('stt') == 'CL-VS') selected @endif>Valparaíso</option> --}}
                                        </select>
                                    </div>
                                    @if ($errors->has('stt'))
                                        <span class="text-danger text-fs6">
                                            {{ $errors->first('stt') }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9 form-group{{ $errors->has('rfr') ? ' has-error' : '' }}">
                                    <label for="rfr" class="form-label fw-bold">
                                        {{ __('Direction') }}
                                    </label>
                                    <input id="rfr" type="text" class="form-control text-danger fw-bold" readonly>
                                </div>
                                <div class="col-sm-3 form-group{{ $errors->has('drt') ? ' has-error' : '' }}">
                                    <label for="drt" class="form-label fw-bold">
                                        {{ __('District') }}
                                    </label>
                                    <input id="drt" type="text" class="form-control text-danger fw-bold" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- 1 TIME WEIGHT PESO --}}
                    <div class="col-4 form-group{{ $errors->has('ftw') ? ' has-error' : '' }}">
                        <label for="ftw" class="col-form-label fw-bold">
                            {{ __('1st WEIGH') }}
                        </label>
                        <div class="col-auto">
                            <input id="ftw" type="time" class="form-control text-danger fw-bold" name="ftw"
                                value=@if (!empty(old('ftw'))) "{{ old('ftw') }}" @else "01:23" @endif
                                required autofocus step="0">
                            {{-- <select class="form-control form-select text-danger fw-bold" id="ftw" name="ftw"
                                value="{{ old('ftw') }}" required autofocus>
                                <option class="text-danger fw-bold" value="00:00"
                                    @if (old('ftw') == '00:00') selected @endif>00:00</option>
                                <option class="text-danger fw-bold" value="01:00"
                                    @if (old('ftw') == '01:00') selected @endif>01:00</option>
                                <option class="text-danger fw-bold" value="02:00"
                                    @if (old('ftw') == '02:00') selected @endif>02:00</option>
                                <option class="text-danger fw-bold" value="03:00"
                                    @if (old('ftw') == '03:00') selected @endif>03:00</option>
                                <option class="text-danger fw-bold" value="04:00"
                                    @if (old('ftw') == '04:00') selected @endif>04:00</option>
                                <option class="text-danger fw-bold" value="05:00"
                                    @if (old('ftw') == '05:00') selected @endif>05:00</option>
                                <option class="text-danger fw-bold" value="06:00"
                                    @if (old('ftw') == '06:00') selected @endif>06:00</option>
                                <option class="text-danger fw-bold" value="07:00"
                                    @if (old('ftw') == '07:00') selected @endif>07:00</option>
                                <option class="text-danger fw-bold" value="08:00"
                                    @if (old('ftw') == '08:00') selected @endif>08:00</option>
                                <option class="text-danger fw-bold" value="09:00"
                                    @if (old('ftw') == '09:00') selected @endif>09:00</option>
                                <option class="text-danger fw-bold" value="10:00"
                                    @if (old('ftw') == '10:00') selected @endif>10:00</option>
                                <option class="text-danger fw-bold" value="11:00"
                                    @if (old('ftw') == '11:00') selected @endif>11:00</option>
                                <option class="text-danger fw-bold" value="12:00"
                                    @if (old('ftw') == '12:00') selected @endif>12:00</option>
                                <option class="text-danger fw-bold" value="13:00"
                                    @if (old('ftw') == '13:00') selected @endif>13:00</option>
                                <option class="text-danger fw-bold" value="14:00"
                                    @if (old('ftw') == '14:00') selected @endif>14:00</option>
                                <option class="text-danger fw-bold" value="15:00"
                                    @if (old('ftw') == '15:00') selected @endif>15:00</option>
                                <option class="text-danger fw-bold" value="16:00"
                                    @if (old('ftw') == '16:00') selected @endif>16:00</option>
                                <option class="text-danger fw-bold" value="17:00"
                                    @if (old('ftw') == '17:00') selected @endif>17:00</option>
                                <option class="text-danger fw-bold" value="18:00"
                                    @if (old('ftw') == '18:00') selected @endif>18:00</option>
                                <option class="text-danger fw-bold" value="19:00"
                                    @if (old('ftw') == '19:00') selected @endif>19:00</option>
                                <option class="text-danger fw-bold" value="20:00"
                                    @if (old('ftw') == '20:00') selected @endif>20:00</option>
                                <option class="text-danger fw-bold" value="21:00"
                                    @if (old('ftw') == '21:00') selected @endif>21:00</option>
                                <option class="text-danger fw-bold" value="22:00"
                                    @if (old('ftw') == '22:00') selected @endif>22:00</option>
                                <option class="text-danger fw-bold" value="23:00"
                                    @if (old('ftw') == '23:00') selected @endif>23:00</option>
                            </select> --}}
                            @if ($errors->has('ftw'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('ftw') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- 2 TIME WEIGHT --}}
                    <div class="col-4 form-group{{ $errors->has('stw') ? ' has-error' : '' }}">
                        <label for="stw" class="col-form-label fw-bold">
                            {{ __('2nd WEIGH') }}
                        </label>
                        <div class="col-auto">
                            <input id="stw" type="time" class="form-control text-danger fw-bold" name="stw"
                                value=@if (!empty(old('stw'))) "{{ old('stw') }}" @else "01:23" @endif
                                required autofocus step="0">
                            {{-- <select class="form-control form-select text-danger fw-bold" id="stw" name="stw"
                                value="{{ old('stw') }}" required autofocus>
                                <option class="text-danger fw-bold" value="00:00"
                                    @if (old('stw') == '00:00') selected @endif>00:00</option>
                                <option class="text-danger fw-bold" value="01:00"
                                    @if (old('stw') == '01:00') selected @endif>01:00</option>
                                <option class="text-danger fw-bold" value="02:00"
                                    @if (old('stw') == '02:00') selected @endif>02:00</option>
                                <option class="text-danger fw-bold" value="03:00"
                                    @if (old('stw') == '03:00') selected @endif>03:00</option>
                                <option class="text-danger fw-bold" value="04:00"
                                    @if (old('stw') == '04:00') selected @endif>04:00</option>
                                <option class="text-danger fw-bold" value="05:00"
                                    @if (old('stw') == '05:00') selected @endif>05:00</option>
                                <option class="text-danger fw-bold" value="06:00"
                                    @if (old('stw') == '06:00') selected @endif>06:00</option>
                                <option class="text-danger fw-bold" value="07:00"
                                    @if (old('stw') == '07:00') selected @endif>07:00</option>
                                <option class="text-danger fw-bold" value="08:00"
                                    @if (old('stw') == '08:00') selected @endif>08:00</option>
                                <option class="text-danger fw-bold" value="09:00"
                                    @if (old('stw') == '09:00') selected @endif>09:00</option>
                                <option class="text-danger fw-bold" value="10:00"
                                    @if (old('stw') == '10:00') selected @endif>10:00</option>
                                <option class="text-danger fw-bold" value="11:00"
                                    @if (old('stw') == '11:00') selected @endif>11:00</option>
                                <option class="text-danger fw-bold" value="12:00"
                                    @if (old('stw') == '12:00') selected @endif>12:00</option>
                                <option class="text-danger fw-bold" value="13:00"
                                    @if (old('stw') == '13:00') selected @endif>13:00</option>
                                <option class="text-danger fw-bold" value="14:00"
                                    @if (old('stw') == '14:00') selected @endif>14:00</option>
                                <option class="text-danger fw-bold" value="15:00"
                                    @if (old('stw') == '15:00') selected @endif>15:00</option>
                                <option class="text-danger fw-bold" value="16:00"
                                    @if (old('stw') == '16:00') selected @endif>16:00</option>
                                <option class="text-danger fw-bold" value="17:00"
                                    @if (old('stw') == '17:00') selected @endif>17:00</option>
                                <option class="text-danger fw-bold" value="18:00"
                                    @if (old('stw') == '18:00') selected @endif>18:00</option>
                                <option class="text-danger fw-bold" value="19:00"
                                    @if (old('stw') == '19:00') selected @endif>19:00</option>
                                <option class="text-danger fw-bold" value="20:00"
                                    @if (old('stw') == '20:00') selected @endif>20:00</option>
                                <option class="text-danger fw-bold" value="21:00"
                                    @if (old('stw') == '21:00') selected @endif>21:00</option>
                                <option class="text-danger fw-bold" value="22:00"
                                    @if (old('stw') == '22:00') selected @endif>22:00</option>
                                <option class="text-danger fw-bold" value="23:00"
                                    @if (old('stw') == '23:00') selected @endif>23:00</option>
                            </select> --}}

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
                    <div class="col-4 form-group{{ $errors->has('hstart') ? ' has-error' : '' }}">
                        <label for="hstart" class="col-form-label fw-bold text-uppercase">
                            {{ __('Start') }}
                        </label>
                        <div class="col-auto">
                            <input id="hstart" type="time" class="form-control text-danger fw-bold" name="hstart"
                                value=@if (!empty(old('hstart'))) "{{ old('hstart') }}" @else "01:23" @endif
                                required autofocus step="0">
                            @if ($errors->has('hstart'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('hstart') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- MESA DE CONTROL, JUEZ Y ASISTENTE --}}
                    {{-- MESA DE CONTROL --}}
                    <div class="col-4 form-group{{ $errors->has('mcontrol_id') ? ' has-error' : '' }}">
                        <label for="mcontrol_id" class="col-form-label fw-bold">
                            {{ __('Control desk') }}
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
                    <div class="col-4 form-group{{ $errors->has('judge_id') ? ' has-error' : '' }}">
                        <label for="judge_id" class="col-form-label fw-bold">
                            {{ __('Judge') }}
                        </label>
                        <div class="col-auto">
                            <select class="form-select text-danger fw-bold" id="judge_id" name="judge_id"
                                value="{{ old('judge_id') }}" required autofocus>
                                @foreach ($users as $judge)
                                    <option value="{{ $judge->id }}"
                                        @if (old('judge_id') == $judge->id) selected @endif>
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
                    <div class="col-4 form-group{{ $errors->has('assistent_id') ? ' has-error' : '' }}">
                        <label for="assistent_id" class="col-form-label fw-bold">
                            {{ __('Assistant') }}
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
        <div class="card mx-auto bg-black border border-danger mb-3">
            <div class="card-body border border-danger">
                {{-- BANNER --}}
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($banners as $banner)
                            <div class="carousel-item @if ($banner->nombre = 'bcreate1.png') active @endif"
                                data-bs-interval="1000">
                                <a href="{{ $banner->url }}">
                                    <img src="{{ asset($banner->ruta) }}" class="img-fluid mx-auto d-block">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-auto bg-black text-white border border-danger mb-3">
            <div class="card-body border border-danger">
                <div class="row">
                    {{-- AWARDS --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('awards') ? ' has-error' : '' }}">
                        <label for="awards" class="col-form-label fw-bold">
                            {{ __('Award') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="awards" type="number" class="form-control text-danger fw-bold" name="awards"
                                    value="{{ old('awards') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==5) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
                                @if ($errors->has('awards'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('awards') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- TROPHYS --}}
                    <div class="col-6 col-md-2 mb-3 form-group{{ $errors->has('trophys') ? ' has-error' : '' }}">
                        <label for="trophys" class="col-form-label fw-bold">
                            {{ __('Trophys') }}
                        </label>
                        <div class="col-auto">
                            <input id="trophys" type="number" class="form-control text-danger fw-bold" name="trophys"
                                value="{{ old('trophys') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;"
                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                            @if ($errors->has('trophys'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('trophys') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- ROOSTER 30 OR 60 --}}
                    <div class="col-6 col-md-4 mb-3 form-group{{ $errors->has('rooster') ? ' has-error' : '' }}">
                        <label for="rooster" class="col-form-label fw-bold">
                            {{ __('Rooster') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="rooster" type="number" class="form-control text-danger fw-bold" name="rooster"
                                    value="{{ old('rooster') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
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
                    <div class="col-6 col-md-3 my-auto mb-3 form-group{{ $errors->has('rten') ? ' has-error' : '' }}">
                        <label for="rten" class="col-form-label fw-bold">
                            Super {{ __('Rooster') }} (10 {{ __('seconds') }})
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="rten" type="number" class="form-control text-danger fw-bold" name="rten"
                                    value="{{ old('rten') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189">

                                @if ($errors->has('rten'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('rten') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- 1 FRENTE --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('fft') ? ' has-error' : '' }}">
                        <label for="fft" class="col-form-label fw-bold">
                            {{ __('1er Frente') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="fft" type="number" class="form-control text-danger fw-bold" name="fft"
                                    value="{{ old('fft') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                                @if ($errors->has('fft'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('fft') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- 2 FRENTE --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('sft') ? ' has-error' : '' }}">
                        <label for="sft" class="col-form-label fw-bold">
                            {{ __('2do Frente') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="sft" type="number" class="form-control text-danger fw-bold" name="sft"
                                    value="{{ old('sft') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                                @if ($errors->has('sft'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('sft') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- 3 FRENTE --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('tft') ? ' has-error' : '' }}">
                        <label for="tft" class="col-form-label fw-bold">
                            {{ __('3er Frente') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="tft" type="number" class="form-control text-danger fw-bold" name="tft"
                                    value="{{ old('tft') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                                @if ($errors->has('tft'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('tft') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- Pelea de Calidad --}}
                    <div class="col-6 col-md-3 col-md-3 mb-3 form-group{{ $errors->has('fcd') ? ' has-error' : '' }}">
                        <label for="fcd" class="col-form-label fw-bold">
                            {{ __('Fight quality') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="fcd" type="number" class="form-control text-danger fw-bold" name="fcd"
                                    value="{{ old('fcd') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                                @if ($errors->has('fcd'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('fcd') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- PAVOS --}}
                    <div class="col-6 col-md-3 col-lg-2 mb-3 form-group{{ $errors->has('pvs') ? ' has-error' : '' }}">
                        <label for="pvs" class="col-form-label fw-bold">
                            {{ __('Turkeys') }}
                        </label>
                        <div class="col-auto">
                            <input id="pvs" type="number" class="form-control text-danger fw-bold" name="pvs"
                                value="{{ old('pvs') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;"
                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                            @if ($errors->has('pvs'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('pvs') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- Lechones --}}
                    <div class="col-6 col-md-3 col-lg-4 mb-3 form-group{{ $errors->has('lch') ? ' has-error' : '' }}">
                        <label for="lch" class="col-form-label fw-bold">
                            {{ __('Piglets') }}
                        </label>
                        <div class="col-auto">
                            <input id="lch" type="number" class="form-control text-danger fw-bold" name="lch"
                                value="{{ old('lch') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;" }
                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                            @if ($errors->has('lch'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('lch') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- CANASTA --}}
                    <div class="col-5 col-md-3 mb-3 form-group{{ $errors->has('cnt') ? ' has-error' : '' }}">
                        <label for="cnt" class="col-form-label fw-bold">
                            {{ __('Baskets') }}
                        </label>
                        <div class="col-auto">
                            <input id="cnt" type="number" class="form-control text-danger fw-bold" name="cnt"
                                value="{{ old('cnt') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;"
                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                            @if ($errors->has('cnt'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('cnt') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- SACO 20 KG --}}
                    <div class="col-7 col-md-3 mb-3 form-group{{ $errors->has('skg') ? ' has-error' : '' }}">
                        <label for="skg" class="col-form-label fw-bold">
                            {{ __('Bags') }}
                        </label>
                        <div class="row">
                            <input id="skg" type="number" class="col form-control text-danger fw-bold" name="skg"
                                value="{{ old('skg') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==1) return false;"
                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
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
                    <label for="egn" class="col-form-label fw-bold text-uppercase">
                        {{ __('Tickets') }}
                    </label>
                    {{-- GENERAL --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('egn') ? ' has-error' : '' }}">
                        <label for="egn" class="col-form-label fw-bold">
                            {{ __('GENERAL') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="egn" type="number" class="form-control text-danger fw-bold" name="egn"
                                    value="{{ old('egn') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==3) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
                            </div>

                            @if ($errors->has('egn'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('egn') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- VIP --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('evp') ? ' has-error' : '' }}">
                        <label for="evp" class="col-form-label fw-bold">
                            {{ __('VIP') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="evp" type="number" class="form-control text-danger fw-bold" name="evp"
                                    value="{{ old('evp') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==3) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
                            </div>
                            @if ($errors->has('evp'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('evp') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- PACTADO --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('pct') ? ' has-error' : '' }}">
                        <label for="pct" class="col-form-label fw-bold">
                            {{ __('Pact') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="pct" type="number" class="form-control text-danger fw-bold" name="pct"
                                    value="{{ old('pct') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==3) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
                            </div>
                            @if ($errors->has('pct'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('pct') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- BASE --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('bs') ? ' has-error' : '' }}">
                        <label for="bs" class="col-form-label fw-bold">
                            {{ __('BASE') }}
                        </label>
                        <div class="col-auto">
                            <input id="bs" type="number" class="form-control text-danger fw-bold" name="bs"
                                value="{{ old('bs') }}" required autofocus min="0"
                                onKeyPress="if(this.value.length==4) return false;"
                                onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />

                            @if ($errors->has('bs'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('bs') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <label for="ift" class="col-form-label fw-bold text-uppercase">
                        {{ __('inscriptions') }}
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
                            {{ __('Cock') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="gll" type="number" class="form-control text-danger fw-bold" name="gll"
                                    value="{{ old('gll') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
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
                            {{ __('Shed') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="glp" type="number" class="form-control text-danger fw-bold" name="glp"
                                    value="{{ old('glp') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==4) return false;"
                                    onkeydown="return event.keyCode !== 69 && event.keyCode !== 189" />
                            </div>
                            @if ($errors->has('glp'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('glp') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <h6>*{{ __('People with disabilities and women pass free') }}</h6>
                        <h6>{{ __('LAW 28683 Preferential attention and LAW 29973 rights of people with disabilities.') }}
                        </h6>
                        <h6>*{{ __('Old people just pay 50') }}%</h6>
                    </div>
                    {{-- BOTON DE REGISTRO --}}
                    <div class="col-md-12 ">
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary" id="submit">
                                {{ __('Add Event') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script type="text/javascript">
        /* ADD DATE */
        $("#adddates").click(function() {
            $(".form_dates").append(
                '<div id="dfechas" class="col-6 col-md"><input id="fechas" type="date" class="form-control text-danger fw-bold" name="fechas[]" min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" max = "{{ \Carbon\Carbon::now()->addMonths(6)->format('Y-m-d') }}" required autofocus></div>'
            );
            var n = $("div[id='dfechas']").length;
            if (n == 9) {
                $('#adddates').attr("disabled", true);
                $('#adddates').hide(500);
            }
            if (n == 1) {
                $('#removedate').attr("disabled", false);
                $('#removedate').show(500);
            }

        });
        $('#removedate').hide(400); //HIDE DEFAULT
        /* DELETE DATE */
        $("#removedate").click(function() {
            $('#dfechas').last().remove();
            var n = $("div[id='dfechas']").length;
            if (n <= 8) {
                $('#adddates').attr("disabled", false);
                $('#adddates').show(500);
            }
            if (n < 1) {
                $('#removedate').attr("disabled", true);
                $('#removedate').hide(500);
            }
        });

        /* STATE -  */
        var $select1 = $('#ctr'),
            $select2 = $('#stt'),
            $options = $select2.find('option');
        /* MIN - MAX WEIGHT -  */
        var $select1 = $('#miw'),
            $select2 = $('#maw'),
            $options = $select2.find('option');

        $select1.on('change', function() {
            $select2.html($options.filter('[data="' + this.value + '"]'));
        }).trigger('change');
        /*  SOLO NUMEROS */
        $(document).ready(function() {
            $('input').bind('copy paste', function(e) {
                e.preventDefault();
            });
        });
    </script>
    {{-- COLISEO --}}
    <script>
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
    </script>

    <link rel="stylesheet" href="{{ asset('css/select2/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select2/select2-bootstrap-5-theme.min.css') }}" />

    <!-- Scripts -->
    <script src="{{ asset('js/select2/select2.min.js') }}"></script>
    <script>
        $('.select2').select2({
            theme: 'bootstrap-5',
            width: "resolve"
        });
    </script>
    <script type="text/javascript">
        /* CHECKBOX */
        $(document).ready(function() {
            var checkboxes = $('.checkboxes');
            checkboxes.change(function() {
                if ($('.checkboxes:checked').length > 0) {
                    if ($('.checkboxes:checked').val() == "lbr") {
                        checkboxes.not(this).prop({
                            disabled: true,
                            checked: false
                        });
                    }
                    checkboxes.removeAttr('required');
                } else {
                    checkboxes.prop({
                        disabled: false,
                        checked: false
                    });
                    checkboxes.attr('required', 'required');
                }
            });
        });
    </script>
    <style>
        .select2-container {
            color: rgb(210, 0, 0);
        }

    </style>
@endsection
