@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1 class="text-uppercase">{{ $user->nombre }} {{ $user->apellido }}</h1>
@stop

@section('content')
    <div class="container-fluid bg-black">
        <br>
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        <div class="row" style="font-size: 1.3em">
            <div class="col-md-5">
                <div class="text-center">
                    <div class="mb">
                        <img width="100%" src="{{ asset($user->foto) }}"><br>
                    </div>
                    <div class="mb">{{ $user->name }}
                        (
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
                        } ?>)
                    </div>
                    <div class="mb">{{ $user->email }}</div>
                    @can('chngs')
                        @if (Auth::user()->usert == 'webmaster')
                            <form class="form-horizontal text-uppercase" method="POST"
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
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">{{ __('Change status') }}</button>
                                    </div>
                                </div>

                            </form>
                            <form class="form-horizontal text-uppercase" method="POST"
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
                        @endif
                    @endcan
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
                    <div class="col-xs-6">
                        <label>{{ __('Disability') }}</label>
                        <select id="discapacidad" class="form-control mb text-capitalize" style="-webkit-appearance: none;" disabled>
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
                    {{-- FOTOS DE DISABILITY --}}
                    <div class="row" id="fdb" style="display: none">
                        {{-- FOTO DE DISABILITY --}}
                        <div class="col-xs-6 mb">
                            <a for="fdpt" class="col-form-label fw-bold" href="{{asset($user->fdpt)}}">
                                {{ __('document') }} {{ __('Disability') }}
                            </a>
                            <div class="col-auto bg-black rounded">
                                <div style="clear:both">
                                    <iframe id="viewer"
                                        src="@if (isset($user->fdpt)) {{ asset($user->fdpt) }}@else @endif"
                                        frameborder="0" scrolling="no" height="200" width="100%"></iframe>
                                </div>
                                <input type="file" id="fdpt" class="form-control" value="{{ old('fdpt') }}"
                                    accept=".pdf">
                            </div>
                            @if ($errors->has('fdpt'))
                                <span class="text-danger fs-6">
                                    {{ $errors->first('fdpt') }}
                                </span>
                            @endif
                        </div>
                        {{-- FOTO DE DISABILITY 2 --}}
                        <div class="col-xs-6 mb">
                            <label for="sdpt" class="col-form-label fw-bold">
                                {{ __('Photo') }} {{ __('Disability') }}
                            </label>
                            <div class="col-auto m-1 bg-black rounded">
                                <img id="sdview"
                                    src="@if (isset($user->sdpt)) {{ asset($user->sdpt) }}@else @endif"
                                    class="mx-auto d-block" height="200" width="180" />
                                <input id="sdpt" type="file" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
                    @if ($user->usert == 'own')
                        <div class="col-xs-6 mb"><label>{{ __('Shed') }}</label>
                            <input type="text" class="form-control" value="{{ $user->galpon }}" readonly>
                        </div>
                        <div class="col-xs-6 mb"><label> {{ __('Preparer') }}</label>
                            <input type="text" class="form-control" value="{{ $user->prepa }}" readonly>
                        </div>
                    @endif
                    <div class="col-xs-6 mb"><label> {{ __('Operator') }}</label>
                        <input type="text" class="form-control" value="{{ $user->company }}" readonly>
                    </div>
                    <div class="col-xs-6 mb"><label> {{ __('Phone') }}</label>
                        <input type="number" class="form-control" value="{{ $user->celular }}" readonly>
                    </div>
                    <div class="col-xs-4 mb"><label> {{ __('Country') }}</label>
                        <select class="select2 form-control form-select text-danger fw-bold" id="country"
                            value="{{ $user->country }}" disabled>
                            <option class="text-danger fw-bold" value="PER"
                                @if ($user->country == 'PER') selected @endif>
                                PER - Perú
                            </option>
                            <option class="text-danger fw-bold" value="CHI"
                                @if ($user->country == 'CHI') selected @endif>
                                CHI - Chile
                            </option>
                            <option class="text-danger fw-bold" value="COL"
                                @if ($user->country == 'COL') selected @endif>
                                COL - Colombia
                            </option>
                            <option class="text-danger fw-bold" value="ECU"
                                @if ($user->country == 'ECU') selected @endif>
                                ECU - Ecuador
                            </option>
                            <option class="text-danger fw-bold" value="MEX"
                                @if ($user->country == 'MEX') selected @endif>
                                MEX - Mexico
                            </option>
                            <option class="text-danger fw-bold" value="PRI"
                                @if ($user->country == 'PRI') selected @endif>
                                PRI - Puerto Rico
                            </option>
                            <option class="text-danger fw-bold" value="DOM"
                                @if ($user->country == 'DOM') selected @endif>
                                DOM - Rep. Dominicana
                            </option>
                            <option class="text-danger fw-bold" value="OTR"
                                @if ($user->country == 'OTR') selected @endif>
                                OTR - Otros
                            </option>
                        </select>
                    </div>
                    <div class="col-xs-8 col-lg-4 mb"><label> {{ __('State') }}</label>
                        <select class="form-control text-danger fw-bold text-uppercase" id="state"
                            value="{{ $user->state }}"  disabled>
                            {{-- PERÚ --}}
                            <option data="PER" class="text-danger fw-bold" value="LM"
                                @if ($user->state == 'LM') selected @endif>
                                LM - Lima
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="AM"
                                @if ($user->state == 'AM') selected @endif>
                                AM - Amazonas
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="AN"
                                @if ($user->state == 'AN') selected @endif>
                                AN - Ancash
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="AP"
                                @if ($user->state == 'AP') selected @endif>
                                AP - Apurímac
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="AR"
                                @if ($user->state == 'AR') selected @endif>
                                AR - Arequipa
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="AY"
                                @if ($user->state == 'AY') selected @endif>
                                AY - Ayacucho
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="CJ"
                                @if ($user->state == 'CJ') selected @endif>
                                CJ - Cajamarca
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="CZ"
                                @if ($user->state == 'CZ') selected @endif>
                                CZ - Cuzco
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="HC"
                                @if ($user->state == 'HC') selected @endif>
                                HC - Huancavelica
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="HU"
                                @if ($user->state == 'HU') selected @endif>
                                HU - Huánuco
                            </option>
                            <option data=" PER" class="text-danger fw-bold" value="IC"
                                @if ($user->state == 'IC') selected @endif>
                                IC - Ica
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="JU"
                                @if ($user->state == 'JU') selected @endif>
                                JU - Junín
                            </option>
                            <option data=" PER" class="text-danger fw-bold" value="LL"
                                @if ($user->state == 'LL') selected @endif>
                                LL - La Libertad
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="LB"
                                @if ($user->state == 'LB') selected @endif>
                                LB - Lambayeque
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="LO"
                                @if ($user->state == 'LO') selected @endif>
                                LO - Loreto
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="MD"
                                @if ($user->state == 'MD') selected @endif>
                                MD - Madre de Dios
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="MQ"
                                @if ($user->state == 'MQ') selected @endif>
                                MQ - Moquegua
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="PA"
                                @if ($user->state == 'PA') selected @endif>
                                PA - Pasco
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="PI"
                                @if ($user->state == 'PI') selected @endif>
                                PI - Piura
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="PU"
                                @if ($user->state == 'PU') selected @endif>
                                PU - Puno
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="SM"
                                @if ($user->state == 'SM') selected @endif>
                                SM - San Martín</option>
                            <option data="PER" class="text-danger fw-bold" value="TA"
                                @if ($user->state == 'TA') selected @endif>
                                TA - Tacna
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="TU"
                                @if ($user->state == 'TU') selected @endif>
                                TU - Tumbes
                            </option>
                            <option data="PER" class="text-danger fw-bold" value="UC"
                                @if ($user->state == 'UC') selected @endif>
                                UC - Ucayali
                            </option>
                            {{-- CHILE --}}
                            <option data="CHI" class="text-danger fw-bold" value="RM"
                                @if ($user->state == 'RM') selected @endif>
                                RM - Santiago de Chile
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="AI"
                                @if ($user->state == 'AI') selected @endif>
                                AI - Aysén
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="AN"
                                @if ($user->state == 'AN') selected @endif>
                                AN - Antofagasta
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="AP"
                                @if ($user->state == 'AP') selected @endif>
                                AP - Arica y Parinacota
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="AT"
                                @if ($user->state == 'AT') selected @endif>
                                AT - Atacama
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="BI"
                                @if ($user->state == 'BI') selected @endif>
                                BI - Biobío
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="CO"
                                @if ($user->state == 'CO') selected @endif>
                                CO - Coquimbo
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="AR"
                                @if ($user->state == 'AR') selected @endif>
                                AR - La Araucanía
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="LI"
                                @if ($user->state == 'LI') selected @endif>
                                LI - O'Higgins
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="LL"
                                @if ($user->state == 'LL') selected @endif>
                                LL - Los Lagos
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="LR"
                                @if ($user->state == 'LR') selected @endif>
                                LR - Los Ríos
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="MA"
                                @if ($user->state == 'MA') selected @endif>
                                MA - Magallanes
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="ML"
                                @if ($user->state == 'ML') selected @endif>
                                ML - Maule
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="TA"
                                @if ($user->state == 'TA') selected @endif>
                                TA - Tarapacá
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="VS"
                                @if ($user->state == 'VS') selected @endif>
                                VS - Valparaíso
                            </option>
                            <option data="CHI" class="text-danger fw-bold" value="NB"
                                @if ($user->state == 'NB') selected @endif>
                                NB - Ñuble
                            </option>
                            {{-- COLOMBIA --}}
                            <option data="COL" class="text-danger fw-bold" value="BO"
                                @if ($user->state == 'BO') selected @endif>
                                BO - Bogotá
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="AM"
                                @if ($user->state == 'AM') selected @endif>
                                AM - Amazonas
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="AT"
                                @if ($user->state == 'AT') selected @endif>
                                AT - Antioquia
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="AR"
                                @if ($user->state == 'ARA') selected @endif>
                                ARA - Arauca
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="AT"
                                @if ($user->state == 'AT') selected @endif>
                                AT - Atlántico
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="BL"
                                @if ($user->state == 'BL') selected @endif>
                                BL - Bolívar
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="BY"
                                @if ($user->state == 'BY') selected @endif>
                                BY - Boyacá
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CL"
                                @if ($user->state == 'CL') selected @endif>
                                CL - Caldas
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CQ"
                                @if ($user->state == 'CQ') selected @endif>
                                CQ - Caquetá
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CS"
                                @if ($user->state == 'CS') selected @endif>
                                CS - Casanare
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CU"
                                @if ($user->state == 'CU') selected @endif>
                                CU - Cauca
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CS"
                                @if ($user->state == 'CS') selected @endif>
                                CS - Cesar
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CH"
                                @if ($user->state == 'CH') selected @endif>
                                CH - Chocó
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CU"
                                @if ($user->state == 'CU') selected @endif>
                                CU - Cundinamarca
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="CR"
                                @if ($user->state == 'CR') selected @endif>
                                CR - Córdoba
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="GU"
                                @if ($user->state == 'GU') selected @endif>
                                GU - Guainía
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="GV"
                                @if ($user->state == 'GV') selected @endif>
                                GV - Guaviare
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="HU"
                                @if ($user->state == 'HU') selected @endif>
                                HU - Huila
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="LG"
                                @if ($user->state == 'LG') selected @endif>
                                LG - La Guajira
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="MG"
                                @if ($user->state == 'MG') selected @endif>
                                MG - Magdalena
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="MT"
                                @if ($user->state == 'MT') selected @endif>
                                MT - Meta
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="NR"
                                @if ($user->state == 'NR') selected @endif>
                                NR - Nariño
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="NS"
                                @if ($user->state == 'NS') selected @endif>
                                NS - Norte de Santander
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="PT"
                                @if ($user->state == 'PT') selected @endif>
                                PT - Putumayo
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="QU"
                                @if ($user->state == 'QUI') selected @endif>
                                QU - Quindío
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="RS"
                                @if ($user->state == 'RS') selected @endif>
                                RS - Risaralda
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="SP"
                                @if ($user->state == 'SP') selected @endif>
                                SP - San Andrés, Providencia y Santa Catalina
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="SN"
                                @if ($user->state == 'SN') selected @endif>
                                SN - Santander
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="SC"
                                @if (old('SC') == 'SC') selected @endif>
                                SC - Sucre
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="TL"
                                @if ($user->state == 'TL') selected @endif>
                                TL - Tolima
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="VC"
                                @if ($user->state == 'VC') selected @endif>
                                VC - Valle del Cauca
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="VU"
                                @if ($user->state == 'VU') selected @endif>
                                VU - Vaupés
                            </option>
                            <option data="COL" class="text-danger fw-bold" value="VD"
                                @if ($user->state == 'VD') selected @endif>
                                VD - Vichada
                            </option>
                            {{-- ECUADOR --}}
                            <option data="ECU" class="text-danger fw-bold" value="AZ"
                                @if ($user->state == 'AZ') selected @endif>
                                AZ - Azuay
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="BL"
                                @if ($user->state == 'BL') selected @endif>
                                BL - Bolívar
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="CA"
                                @if ($user->state == 'CA') selected @endif>
                                CA - Carchi
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="CÑ"
                                @if ($user->state == 'CÑ') selected @endif>
                                CÑ - Cañar
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="CH"
                                @if ($user->state == 'CH') selected @endif>
                                CH - Chimborazo
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="CO"
                                @if ($user->state == 'CO') selected @endif>
                                CO - Cotopaxi
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="EO"
                                @if ($user->state == 'EO') selected @endif>
                                EO - El Oro
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="ES"
                                @if ($user->state == 'ES') selected @endif>
                                ES - Esmeraldas
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="GA"
                                @if ($user->state == 'GA') selected @endif>
                                GA - Galápagos
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="GU"
                                @if ($user->state == 'GU') selected @endif>
                                GU - Guayas
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="IM"
                                @if ($user->state == 'IM') selected @endif>
                                IM - Imbabura
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="LO"
                                @if ($user->state == 'LO') selected @endif>
                                LO - Loja
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="LR"
                                @if ($user->state == 'LR') selected @endif>
                                LR - Los Ríos
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="MA"
                                @if ($user->state == 'MA') selected @endif>
                                MA - Manabí
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="MS"
                                @if ($user->state == 'MS') selected @endif>
                                MS - Morona Santiago
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="NA"
                                @if ($user->state == 'NA') selected @endif>
                                NA - Napo
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="OR"
                                @if ($user->state == 'OR') selected @endif>
                                OR - Orellana
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="PA"
                                @if ($user->state == 'PA') selected @endif>
                                PA - Pastaza
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="PI"
                                @if ($user->state == 'PI') selected @endif>
                                PI - Pichincha
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="SE"
                                @if ($user->state == 'SE') selected @endif>
                                SE - Santa Elena
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="ST"
                                @if ($user->state == 'ST') selected @endif>
                                ST - Santo Domingo de los Tsáchilas
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="SU"
                                @if ($user->state == 'SU') selected @endif>
                                SU - Sucumbíos
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="TU"
                                @if ($user->state == 'TU') selected @endif>
                                TU - Tungurahua
                            </option>
                            <option data="ECU" class="text-danger fw-bold" value="ZC"
                                @if ($user->state == 'ZC') selected @endif>
                                ZC - Zamora Chinchipe
                            </option>
                            {{-- MEX --}}
                            <option data="MEX" class="text-danger fw-bold" value="CX"
                                @if ($user->state == 'CX') selected @endif>
                                CX - Ciudad de México
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="AG"
                                @if ($user->state == 'AG') selected @endif>
                                AG - Aguascalientes
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="BC"
                                @if ($user->state == 'BC') selected @endif>
                                BC - Baja California
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="BS"
                                @if ($user->state == 'BS') selected @endif>
                                BS - Baja California Sur
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="CM"
                                @if ($user->state == 'CM') selected @endif>
                                CM - Campeche
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="CS"
                                @if ($user->state == 'CS') selected @endif>
                                CS - Chiapas
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="CH"
                                @if ($user->state == 'CH') selected @endif>
                                CH - Chihuahua
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="CO"
                                @if ($user->state == 'CO') selected @endif>
                                CO - Coahuila
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="CL"
                                @if ($user->state == 'CL') selected @endif>
                                CL - Colima
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="DG"
                                @if ($user->state == 'DG') selected @endif>
                                DG - Durango
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="GT"
                                @if ($user->state == 'GT') selected @endif>
                                GT - Guanajuato
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="GR"
                                @if ($user->state == 'GR') selected @endif>
                                GR - Guerrero
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="HG"
                                @if ($user->state == 'HG') selected @endif>
                                HG - Hidalgo
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="JC"
                                @if ($user->state == 'JC') selected @endif>
                                JC - Jalisco
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="EM"
                                @if ($user->state == 'EM') selected @endif>
                                EM - México
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="MI"
                                @if ($user->state == 'MI') selected @endif>
                                MI - Michoacán
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="MO"
                                @if ($user->state == 'MO') selected @endif>
                                MO - Morelos
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="NA"
                                @if ($user->state == 'NA') selected @endif>
                                NA - Nayarit
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="NL"
                                @if ($user->state == 'NL') selected @endif>
                                NL - Nuevo León
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="OA"
                                @if ($user->state == 'OA') selected @endif>
                                OA - Oaxaca
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="PU"
                                @if ($user->state == 'PU') selected @endif>
                                PU - Puebla
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="QT"
                                @if ($user->state == 'QT') selected @endif>
                                QT - Querétaro
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="QR"
                                @if ($user->state == 'QR') selected @endif>
                                QR - Quintana Roo
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="SL"
                                @if ($user->state == 'SL') selected @endif>
                                SL - San Luis Potosí
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="SI"
                                @if ($user->state == 'SI') selected @endif>
                                SI - Sinaloa
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="SO"
                                @if ($user->state == 'SO') selected @endif>
                                SO - Sonora
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="TB"
                                @if ($user->state == 'TB') selected @endif>
                                TB - Tabasco
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="TL"
                                @if ($user->state == 'TL') selected @endif>
                                TL - Tlaxcala
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="TM"
                                @if ($user->state == 'TM') selected @endif>
                                TM - Tamaulipas
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="TL"
                                @if ($user->state == 'TL') selected @endif>
                                TL - Tlaxcala
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="VE"
                                @if ($user->state == 'VE') selected @endif>
                                VE - Veracruz
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="YU"
                                @if ($user->state == 'YU') selected @endif>
                                YU - Yucatán
                            </option>
                            <option data="MEX" class="text-danger fw-bold" value="ZA"
                                @if ($user->state == 'ZA') selected @endif>
                                ZA - Zacatecas
                            </option>
                            {{-- PUERTO RICO --}}
                            <option data="PRI" class="text-danger fw-bold" value="SJ"
                                @if ($user->state == 'SJ') selected @endif>
                                SJ - San Juan
                            </option>
                            <option data="PRI" class="text-danger fw-bold" value="BY"
                                @if ($user->state == 'BY') selected @endif>
                                BY - Bayamón
                            </option>
                            <option data="PRI" class="text-danger fw-bold" value="AB"
                                @if ($user->state == 'AB') selected @endif>
                                AB - Arecibo
                            </option>
                            <option data="PRI" class="text-danger fw-bold" value="AM"
                                @if ($user->state == 'AM') selected @endif>
                                AM - Aguadilla/ Mayagüez
                            </option>
                            <option data="PRI" class="text-danger fw-bold" value="GY"
                                @if ($user->state == 'GY') selected @endif>
                                GY - Guayama
                            </option>
                            <option data="PRI" class="text-danger fw-bold" value="PN"
                                @if ($user->state == 'PN') selected @endif>
                                PN - Ponce
                            </option>
                            <option data="PRI" class="text-danger fw-bold" value="HO"
                                @if ($user->state == 'HO') selected @endif>
                                HO - Humacao
                            </option>
                            <option data="PRI" class="text-danger fw-bold" value="CN"
                                @if ($user->state == 'CN') selected @endif>
                                CN - Carolina
                            </option>
                            {{-- REPUBLICA DOMINICANA --}}
                            <option data="DOM" class="text-danger fw-bold" value="SJ"
                                @if ($user->state == 'SJ') selected @endif>
                                SJ - San Juan
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="AZ"
                                @if ($user->state == 'AZ') selected @endif>
                                AZ - Azua
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="AG"
                                @if ($user->state == 'AG') selected @endif>
                                AG - La Altagracia
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="BH"
                                @if ($user->state == 'BH') selected @endif>
                                BH - Barahona
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="DT"
                                @if ($user->state == 'DT') selected @endif>
                                DT - Duarte
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="EP"
                                @if ($user->state == 'EP') selected @endif>
                                EP - Elías Piña
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="ES"
                                @if ($user->state == 'ES') selected @endif>
                                ES - El Seibo
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="HM"
                                @if ($user->state == 'HM') selected @endif>
                                HM - Hato Mayor
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="IP"
                                @if ($user->state == 'IP') selected @endif>
                                IP - Independencia
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="LV"
                                @if ($user->state == 'LV') selected @endif>
                                LV - La Vega
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="MC"
                                @if ($user->state == 'MC') selected @endif>
                                MC - Monte Cristi
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="MP"
                                @if ($user->state == 'MP') selected @endif>
                                MP - Monte Plata
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="PD"
                                @if ($user->state == 'PD') selected @endif>
                                PD - Pedernales
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="PP"
                                @if ($user->state == 'PP') selected @endif>
                                PP - Puerto Plata
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="SD"
                                @if ($user->state == 'SD') selected @endif>
                                SD - Santo Domingo
                            </option>
                            <option data="DOM" class="text-danger fw-bold" value="SA"
                                @if ($user->state == 'SA') selected @endif>
                                SA - Santiago
                            </option>
                            {{-- OTHER --}}
                            <option target="OTR" class="text-danger fw-bold" value="OTR"
                                @if ($user->state == 'OTR') selected @endif>
                                OTR - {{ __('Other') }}
                            </option>
                        </select>
                    </div>
                    <div class=" col-lg-4 mb"><label> {{ __('District') }}</label>
                        <input type="text" class="form-control" value="{{ $user->district }}"readonly >
                    </div>
                    <div class="col-lg-7 mb"><label> {{ __('Direction') }}</label>
                        <input type="text" class="form-control" value="{{ $user->direction }}" >
                    </div>
                    <div class="col-lg-5 mb"><label> {{ __('Profession or Trade') }}</label>
                        <input type="text" class="form-control" value="{{ $user->job }}" readonly>
                    </div>

                </div>
            </div>
        </div>
        <div class="text-center">
            <form class="formulario-eliminar form-horizontal text-uppercase" method="POST"
                action="{{ route('usuarios.destroy', ['id' => $user->id]) }}">
                {!! csrf_field() !!}
                {{ method_field('DELETE') }}
                <input type="submit" id="delete" class="btn btn-danger" value="{{ __('Delete') }}">
            </form>
        </div>
        <br>
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
        /* STATE -  */
        var $select1 = $('#country'),
            $select2 = $('#state'),
            $options = $select2.find('option');

        $select1.on('change', function() {
            $select2.html($options.filter('[data="' + this.value + '"],[target="OTR"]'));
        }).trigger('change');

        /* DISABILITY */
        $("#discapacidad").change(function() {
            if ($("#discapacidad").val() != 'No') {
                $('#fdb').show(600);
            }
            if ($("#discapacidad").val() == 'No') {
                $('#fdb').hide(600);
            }
            /* PREVIEW */
            sdpt.onchange = evt => {
                const [file] = sdpt.files
                if (file) {
                    sdview.src = URL.createObjectURL(file)
                }
            };
            /* DISABILITY DOCUMENT */
            fdpt.onchange = evt => {
                pdffile = document.getElementById("fdpt").files[0];
                pdffile_url = URL.createObjectURL(pdffile);
                $('#viewer').attr('src', pdffile_url);
            };
        }).change();


        /* FORMULARIO ELIMINAR */
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
