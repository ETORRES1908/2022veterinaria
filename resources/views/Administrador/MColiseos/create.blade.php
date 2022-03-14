@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>{{ __('Coliseum') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <form action="{{ route('mcoliseos.store') }}" method="POST">
            {!! csrf_field() !!}
            {{ method_field('POST') }}
            <div class="form-group">
                <label class="form-label">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="nombre" id="nombre" minlength="5" maxlength="30">
            </div>
            <div class="form-inline form-group">
                <div class="form-group">
                    <label for="country">{{ __('Country') }}</label>
                    <select class="form-control text-danger fw-bold" id="country" name="country" value="{{ old('country') }}" required
                        autofocus>
                        <option class="text-danger fw-bold" value="PER" @if (old('country') == 'PER') selected @endif>
                            PER - Perú
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="state">{{ __('State') }}</label>
                    <select class="form-control text-danger fw-bold" name="state" id="state" value="{{ old('state') }}" required
                        autofocus>
                        <option data="PER" class="text-danger fw-bold" value="AM"
                            @if (old('state') == 'AM') selected @endif>
                            AM - Amazonas</option>
                        <option data="PER" class="text-danger fw-bold" value="AN"
                            @if (old('state') == 'AN') selected @endif>
                            AN - Ancash
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="AP"
                            @if (old('state') == 'AP') selected @endif>
                            AP - Apurímac
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="AR"
                            @if (old('state') == 'AR') selected @endif>
                            AR - Arequipa
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="AY"
                            @if (old('state') == 'AY') selected @endif>
                            AY - Ayacucho
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="CJ"
                            @if (old('state') == 'CJ') selected @endif>
                            CJ - Cajamarca
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="CZ"
                            @if (old('state') == 'CZ') selected @endif>
                            CZ - Cuzco
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="HC"
                            @if (old('state') == 'HC') selected @endif>
                            HC - Huancavelica</option>
                        <option data="PER" class="text-danger fw-bold" value="HU"
                            @if (old('state') == 'HU') selected @endif>
                            HU - Huánuco
                        </option>
                        <option data=" PER" class="text-danger fw-bold" value="IC"
                            @if (old('state') == 'IC') selected @endif>
                            IC - Ica
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="JU"
                            @if (old('state') == 'JU') selected @endif>
                            JU - Junín
                        </option>
                        <option data=" PER" class="text-danger fw-bold" value="LL"
                            @if (old('state') == 'LL') selected @endif>
                            LL - La Libertad</option>
                        <option data="PER" class="text-danger fw-bold" value="LB"
                            @if (old('state') == 'LB') selected @endif>
                            LB - Lambayeque</option>
                        <option data="PER" class="text-danger fw-bold" value="LM"
                            @if (old('state') == 'LM') selected @endif selected>
                            LM - Lima
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="LO"
                            @if (old('state') == 'LO') selected @endif>
                            LO - Loreto
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="MD"
                            @if (old('state') == 'MD') selected @endif>
                            MD - Madre de Dios</option>
                        <option data="PER" class="text-danger fw-bold" value="MQ"
                            @if (old('state') == 'MQ') selected @endif>
                            MQ - Moquegua</option>
                        <option data="PER" class="text-danger fw-bold" value="PA"
                            @if (old('state') == 'PA') selected @endif>
                            PA - Pasco
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="PI"
                            @if (old('state') == 'PI') selected @endif>
                            PI - Piura
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="PU"
                            @if (old('state') == 'PU') selected @endif>
                            PU - Puno
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="SM"
                            @if (old('state') == 'SM') selected @endif>
                            SM - San Martín</option>
                        <option data="PER" class="text-danger fw-bold" value="TA"
                            @if (old('state') == 'TA') selected @endif>
                            TA - Tacna
                        </option>
                        <option data="PER" class="text-danger fw-bold" value="TU"
                            @if (old('state') == 'TU') selected @endif>
                            TU - Tumbes
                        </option>
                        <option data=" PER" class="text-danger fw-bold" value="UC"
                            @if (old('state') == 'UC') selected @endif>
                            UC - Ucayali</option>
                    </select>
                    <div class="form-group">
                        <label class="form-label">{{ __('District') }}</label>
                        <input type="text" class="form-control" name="district" id="district" minlength="3" maxlength="30">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label">{{ __('Reference') }}</label>
                <input type="text" class="form-control" name="reference" id="rfr" minlength="5" maxlength="60">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">{{ __('Add coliseum') }}</button>
            </div>
        </form>
    </div>
@stop
