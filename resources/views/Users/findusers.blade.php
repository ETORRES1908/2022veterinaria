@extends('layouts.app')

@section('content')
    <div class="row">
        {{-- IZQUIERDA --}}
        <div class="col-md-4 mb-3">
            <label class="form-label fs-3 text-uppercase fw-bold">
                {{ __('searcher') }}
            </label>
            <form action="{{ route('findperson') }}" method="get">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-10 col-md-8">
                        <div class="row">
                            {{-- <div class="col-6 col-md-12 mb-3">
                                <select class="form-select text-danger text-uppercase" required>
                                    <option value="" selected hidden>{{ __('SEARCH CRITERIA') }}</option>
                                </select>
                            </div> --}}
                            <div class="col-6 col-md-12 mb-3">
                                <input type="text" class="form-control text-danger text-uppercase" name="username"
                                    value="{{ old('username') }}" placeholder="{{ __('Name') }}">
                            </div>
                            <div class="col-6 col-md-12 mb-3">
                                <input type="text" class="form-control text-danger text-uppercase" name="shed"
                                    value="{{ old('shed') }}" placeholder="{{ __('Shed') }}">
                            </div>
                            {{-- TIPO DE USUARIO TYPE USER --}}
                            <div class="col-6 col-md-12 mb-3">
                                <select name="type" class="form-select text-danger text-uppercase" required>
                                    <option value="" selected hidden>{{ __('Username') }}</option>
                                    <option value="own">{{ __('Owner') }}</option>
                                    <option value="cls">{{ __('Coliseum') }}</option>
                                    <option value="jdg">{{ __('Judge') }}</option>
                                    <option value="cdk">{{ __('Control desk') }}</option>
                                    <option value="asst">{{ __('Assistant') }}</option>
                                    <option value="ppr">{{ __('Preparer') }}</option>
                                    <option value="amt">{{ __('Amateur') }}</option>
                                </select>
                            </div>
                            {{-- PAIS - COUNTRY --}}
                            <div class="col-6 col-md-12 mb-3">
                                <select id="country" name="country" class="form-select text-danger text-uppercase" required>
                                    <option value="" selected hidden>{{ __('COUNTRY') }}</option>
                                    <option value="PER">{{ __('PERÚ') }}</option>
                                    <option value="CHI">{{ __('CHILE') }}</option>
                                    <option value="ECU">{{ __('ECUADOR') }}</option>
                                    <option value="DOM">{{ __('REP. DOMINICANA') }}</option>
                                    <option value="MEX">{{ __('MÉXICO') }}</option>
                                    <option value="PRI">{{ __('PUERTO RICO') }}</option>
                                    <option value="OTR">{{ __('Other') }}</option>
                                </select>
                            </div>
                            {{-- DEPARTAMENTO - STATE --}}
                            <div class="col-6 col-md-12 mb-3">
                                <select id="state" name="state" class="form-select text-danger text-uppercase" required>
                                    <option value="" target="OTR" selected hidden>{{ __('STATE') }}</option>
                                    {{-- PERÚ --}}
                                    <option data="PER" class="text-danger fw-bold" value="LM"
                                        @if (old('state') == 'LM') selected @endif>
                                        LM - Lima
                                    </option>
                                    <option data="PER" class="text-danger fw-bold" value="AM"
                                        @if (old('state') == 'AM') selected @endif>
                                        AM - Amazonas
                                    </option>
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
                                        HC - Huancavelica
                                    </option>
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
                                        LL - La Libertad
                                    </option>
                                    <option data="PER" class="text-danger fw-bold" value="LB"
                                        @if (old('state') == 'LB') selected @endif>
                                        LB - Lambayeque
                                    </option>
                                    <option data="PER" class="text-danger fw-bold" value="LO"
                                        @if (old('state') == 'LO') selected @endif>
                                        LO - Loreto
                                    </option>
                                    <option data="PER" class="text-danger fw-bold" value="MD"
                                        @if (old('state') == 'MD') selected @endif>
                                        MD - Madre de Dios
                                    </option>
                                    <option data="PER" class="text-danger fw-bold" value="MQ"
                                        @if (old('state') == 'MQ') selected @endif>
                                        MQ - Moquegua
                                    </option>
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
                                    <option data="PER" class="text-danger fw-bold" value="UC"
                                        @if (old('state') == 'UC') selected @endif>
                                        UC - Ucayali
                                    </option>
                                    {{-- CHILE --}}
                                    <option data="CHI" class="text-danger fw-bold" value="RM"
                                        @if (old('state') == 'RM') selected @endif>
                                        RM - Santiago de Chile
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="AI"
                                        @if (old('state') == 'AI') selected @endif>
                                        AI - Aysén
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="AN"
                                        @if (old('state') == 'AN') selected @endif>
                                        AN - Antofagasta
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="AP"
                                        @if (old('state') == 'AP') selected @endif>
                                        AP - Arica y Parinacota
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="AT"
                                        @if (old('state') == 'AT') selected @endif>
                                        AT - Atacama
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="BI"
                                        @if (old('state') == 'BI') selected @endif>
                                        BI - Biobío
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="CO"
                                        @if (old('state') == 'CO') selected @endif>
                                        CO - Coquimbo
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="AR"
                                        @if (old('state') == 'AR') selected @endif>
                                        AR - La Araucanía
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="LI"
                                        @if (old('state') == 'LI') selected @endif>
                                        LI - O'Higgins
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="LL"
                                        @if (old('state') == 'LL') selected @endif>
                                        LL - Los Lagos
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="LR"
                                        @if (old('state') == 'LR') selected @endif>
                                        LR - Los Ríos
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="MA"
                                        @if (old('state') == 'MA') selected @endif>
                                        MA - Magallanes
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="ML"
                                        @if (old('state') == 'ML') selected @endif>
                                        ML - Maule
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="TA"
                                        @if (old('state') == 'TA') selected @endif>
                                        TA - Tarapacá
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="VS"
                                        @if (old('state') == 'VS') selected @endif>
                                        VS - Valparaíso
                                    </option>
                                    <option data="CHI" class="text-danger fw-bold" value="NB"
                                        @if (old('state') == 'NB') selected @endif>
                                        NB - Ñuble
                                    </option>
                                    {{-- COLOMBIA --}}
                                    <option data="COL" class="text-danger fw-bold" value="BO"
                                        @if (old('state') == 'BO') selected @endif>
                                        BO - Bogotá
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="AM"
                                        @if (old('state') == 'AM') selected @endif>
                                        AM - Amazonas
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="AT"
                                        @if (old('state') == 'AT') selected @endif>
                                        AT - Antioquia
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="AR"
                                        @if (old('state') == 'ARA') selected @endif>
                                        ARA - Arauca
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="AT"
                                        @if (old('state') == 'AT') selected @endif>
                                        AT - Atlántico
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="BL"
                                        @if (old('state') == 'BL') selected @endif>
                                        BL - Bolívar
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="BY"
                                        @if (old('state') == 'BY') selected @endif>
                                        BY - Boyacá
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CL"
                                        @if (old('state') == 'CL') selected @endif>
                                        CL - Caldas
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CQ"
                                        @if (old('state') == 'CQ') selected @endif>
                                        CQ - Caquetá
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CS"
                                        @if (old('state') == 'CS') selected @endif>
                                        CS - Casanare
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CU"
                                        @if (old('state') == 'CU') selected @endif>
                                        CU - Cauca
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CS"
                                        @if (old('state') == 'CS') selected @endif>
                                        CS - Cesar
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CH"
                                        @if (old('state') == 'CH') selected @endif>
                                        CH - Chocó
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CU"
                                        @if (old('state') == 'CU') selected @endif>
                                        CU - Cundinamarca
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="CR"
                                        @if (old('state') == 'CR') selected @endif>
                                        CR - Córdoba
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="GU"
                                        @if (old('state') == 'GU') selected @endif>
                                        GU - Guainía
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="GV"
                                        @if (old('state') == 'GV') selected @endif>
                                        GV - Guaviare
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="HU"
                                        @if (old('state') == 'HU') selected @endif>
                                        HU - Huila
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="LG"
                                        @if (old('state') == 'LG') selected @endif>
                                        LG - La Guajira
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="MG"
                                        @if (old('state') == 'MG') selected @endif>
                                        MG - Magdalena
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="MT"
                                        @if (old('state') == 'MT') selected @endif>
                                        MT - Meta
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="NR"
                                        @if (old('state') == 'NR') selected @endif>
                                        NR - Nariño
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="NS"
                                        @if (old('state') == 'NS') selected @endif>
                                        NS - Norte de Santander
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="PT"
                                        @if (old('state') == 'PT') selected @endif>
                                        PT - Putumayo
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="QU"
                                        @if (old('state') == 'QUI') selected @endif>
                                        QU - Quindío
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="RS"
                                        @if (old('state') == 'RS') selected @endif>
                                        RS - Risaralda
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="SP"
                                        @if (old('state') == 'SP') selected @endif>
                                        SP - San Andrés, Providencia y Santa Catalina
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="SN"
                                        @if (old('state') == 'SN') selected @endif>
                                        SN - Santander
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="SC"
                                        @if (old('SC') == 'SC') selected @endif>
                                        SC - Sucre
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="TL"
                                        @if (old('state') == 'TL') selected @endif>
                                        TL - Tolima
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="VC"
                                        @if (old('state') == 'VC') selected @endif>
                                        VC - Valle del Cauca
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="VU"
                                        @if (old('state') == 'VU') selected @endif>
                                        VU - Vaupés
                                    </option>
                                    <option data="COL" class="text-danger fw-bold" value="VD"
                                        @if (old('state') == 'VD') selected @endif>
                                        VD - Vichada
                                    </option>
                                    {{-- ECUADOR --}}
                                    <option data="ECU" class="text-danger fw-bold" value="AZ"
                                        @if (old('state') == 'AZ') selected @endif>
                                        AZ - Azuay
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="BL"
                                        @if (old('state') == 'BL') selected @endif>
                                        BL - Bolívar
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="CA"
                                        @if (old('state') == 'CA') selected @endif>
                                        CA - Carchi
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="CÑ"
                                        @if (old('state') == 'CÑ') selected @endif>
                                        CÑ - Cañar
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="CH"
                                        @if (old('state') == 'CH') selected @endif>
                                        CH - Chimborazo
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="CO"
                                        @if (old('state') == 'CO') selected @endif>
                                        CO - Cotopaxi
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="EO"
                                        @if (old('state') == 'EO') selected @endif>
                                        EO - El Oro
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="ES"
                                        @if (old('state') == 'ES') selected @endif>
                                        ES - Esmeraldas
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="GA"
                                        @if (old('state') == 'GA') selected @endif>
                                        GA - Galápagos
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="GU"
                                        @if (old('state') == 'GU') selected @endif>
                                        GU - Guayas
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="IM"
                                        @if (old('state') == 'IM') selected @endif>
                                        IM - Imbabura
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="LO"
                                        @if (old('state') == 'LO') selected @endif>
                                        LO - Loja
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="LR"
                                        @if (old('state') == 'LR') selected @endif>
                                        LR - Los Ríos
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="MA"
                                        @if (old('state') == 'MA') selected @endif>
                                        MA - Manabí
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="MS"
                                        @if (old('state') == 'MS') selected @endif>
                                        MS - Morona Santiago
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="NA"
                                        @if (old('state') == 'NA') selected @endif>
                                        NA - Napo
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="OR"
                                        @if (old('state') == 'OR') selected @endif>
                                        OR - Orellana
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="PA"
                                        @if (old('state') == 'PA') selected @endif>
                                        PA - Pastaza
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="PI"
                                        @if (old('state') == 'PI') selected @endif>
                                        PI - Pichincha
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="SE"
                                        @if (old('state') == 'SE') selected @endif>
                                        SE - Santa Elena
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="ST"
                                        @if (old('state') == 'ST') selected @endif>
                                        ST - Santo Domingo de los Tsáchilas
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="SU"
                                        @if (old('state') == 'SU') selected @endif>
                                        SU - Sucumbíos
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="TU"
                                        @if (old('state') == 'TU') selected @endif>
                                        TU - Tungurahua
                                    </option>
                                    <option data="ECU" class="text-danger fw-bold" value="ZC"
                                        @if (old('state') == 'ZC') selected @endif>
                                        ZC - Zamora Chinchipe
                                    </option>
                                    {{-- MEX --}}
                                    <option data="MEX" class="text-danger fw-bold" value="CX"
                                        @if (old('state') == 'CX') selected @endif>
                                        CX - Ciudad de México
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="AG"
                                        @if (old('state') == 'AG') selected @endif>
                                        AG - Aguascalientes
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="BC"
                                        @if (old('state') == 'BC') selected @endif>
                                        BC - Baja California
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="BS"
                                        @if (old('state') == 'BS') selected @endif>
                                        BS - Baja California Sur
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="CM"
                                        @if (old('state') == 'CM') selected @endif>
                                        CM - Campeche
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="CS"
                                        @if (old('state') == 'CS') selected @endif>
                                        CS - Chiapas
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="CH"
                                        @if (old('state') == 'CH') selected @endif>
                                        CH - Chihuahua
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="CO"
                                        @if (old('state') == 'CO') selected @endif>
                                        CO - Coahuila
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="CL"
                                        @if (old('state') == 'CL') selected @endif>
                                        CL - Colima
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="DG"
                                        @if (old('state') == 'DG') selected @endif>
                                        DG - Durango
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="GT"
                                        @if (old('state') == 'GT') selected @endif>
                                        GT - Guanajuato
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="GR"
                                        @if (old('state') == 'GR') selected @endif>
                                        GR - Guerrero
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="HG"
                                        @if (old('state') == 'HG') selected @endif>
                                        HG - Hidalgo
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="JC"
                                        @if (old('state') == 'JC') selected @endif>
                                        JC - Jalisco
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="EM"
                                        @if (old('state') == 'EM') selected @endif>
                                        EM - México
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="MI"
                                        @if (old('state') == 'MI') selected @endif>
                                        MI - Michoacán
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="MO"
                                        @if (old('state') == 'MO') selected @endif>
                                        MO - Morelos
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="NA"
                                        @if (old('state') == 'NA') selected @endif>
                                        NA - Nayarit
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="NL"
                                        @if (old('state') == 'NL') selected @endif>
                                        NL - Nuevo León
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="OA"
                                        @if (old('state') == 'OA') selected @endif>
                                        OA - Oaxaca
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="PU"
                                        @if (old('state') == 'PU') selected @endif>
                                        PU - Puebla
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="QT"
                                        @if (old('state') == 'QT') selected @endif>
                                        QT - Querétaro
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="QR"
                                        @if (old('state') == 'QR') selected @endif>
                                        QR - Quintana Roo
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="SL"
                                        @if (old('state') == 'SL') selected @endif>
                                        SL - San Luis Potosí
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="SI"
                                        @if (old('state') == 'SI') selected @endif>
                                        SI - Sinaloa
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="SO"
                                        @if (old('state') == 'SO') selected @endif>
                                        SO - Sonora
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="TB"
                                        @if (old('state') == 'TB') selected @endif>
                                        TB - Tabasco
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="TL"
                                        @if (old('state') == 'TL') selected @endif>
                                        TL - Tlaxcala
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="TM"
                                        @if (old('state') == 'TM') selected @endif>
                                        TM - Tamaulipas
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="TL"
                                        @if (old('state') == 'TL') selected @endif>
                                        TL - Tlaxcala
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="VE"
                                        @if (old('state') == 'VE') selected @endif>
                                        VE - Veracruz
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="YU"
                                        @if (old('state') == 'YU') selected @endif>
                                        YU - Yucatán
                                    </option>
                                    <option data="MEX" class="text-danger fw-bold" value="ZA"
                                        @if (old('state') == 'ZA') selected @endif>
                                        ZA - Zacatecas
                                    </option>
                                    {{-- PUERTO RICO --}}
                                    <option data="PRI" class="text-danger fw-bold" value="SJ"
                                        @if (old('state') == 'SJ') selected @endif>
                                        SJ - San Juan
                                    </option>
                                    <option data="PRI" class="text-danger fw-bold" value="BY"
                                        @if (old('state') == 'BY') selected @endif>
                                        BY - Bayamón
                                    </option>
                                    <option data="PRI" class="text-danger fw-bold" value="AB"
                                        @if (old('state') == 'AB') selected @endif>
                                        AB - Arecibo
                                    </option>
                                    <option data="PRI" class="text-danger fw-bold" value="AM"
                                        @if (old('state') == 'AM') selected @endif>
                                        AM - Aguadilla/ Mayagüez
                                    </option>
                                    <option data="PRI" class="text-danger fw-bold" value="GY"
                                        @if (old('state') == 'GY') selected @endif>
                                        GY - Guayama
                                    </option>
                                    <option data="PRI" class="text-danger fw-bold" value="PN"
                                        @if (old('state') == 'PN') selected @endif>
                                        PN - Ponce
                                    </option>
                                    <option data="PRI" class="text-danger fw-bold" value="HO"
                                        @if (old('state') == 'HO') selected @endif>
                                        HO - Humacao
                                    </option>
                                    <option data="PRI" class="text-danger fw-bold" value="CN"
                                        @if (old('state') == 'CN') selected @endif>
                                        CN - Carolina
                                    </option>
                                    {{-- REPUBLICA DOMINICANA --}}
                                    <option data="DOM" class="text-danger fw-bold" value="SJ"
                                        @if (old('state') == 'SJ') selected @endif>
                                        SJ - San Juan
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="AZ"
                                        @if (old('state') == 'AZ') selected @endif>
                                        AZ - Azua
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="AG"
                                        @if (old('state') == 'AG') selected @endif>
                                        AG - La Altagracia
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="BH"
                                        @if (old('state') == 'BH') selected @endif>
                                        BH - Barahona
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="DT"
                                        @if (old('state') == 'DT') selected @endif>
                                        DT - Duarte
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="EP"
                                        @if (old('state') == 'EP') selected @endif>
                                        EP - Elías Piña
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="ES"
                                        @if (old('state') == 'ES') selected @endif>
                                        ES - El Seibo
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="HM"
                                        @if (old('state') == 'HM') selected @endif>
                                        HM - Hato Mayor
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="IP"
                                        @if (old('state') == 'IP') selected @endif>
                                        IP - Independencia
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="LV"
                                        @if (old('state') == 'LV') selected @endif>
                                        LV - La Vega
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="MC"
                                        @if (old('state') == 'MC') selected @endif>
                                        MC - Monte Cristi
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="MP"
                                        @if (old('state') == 'MP') selected @endif>
                                        MP - Monte Plata
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="PD"
                                        @if (old('state') == 'PD') selected @endif>
                                        PD - Pedernales
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="PP"
                                        @if (old('state') == 'PP') selected @endif>
                                        PP - Puerto Plata
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="SD"
                                        @if (old('state') == 'SD') selected @endif>
                                        SD - Santo Domingo
                                    </option>
                                    <option data="DOM" class="text-danger fw-bold" value="SA"
                                        @if (old('state') == 'SA') selected @endif>
                                        SA - Santiago
                                    </option>
                                    {{-- OTHER --}}
                                    <option target="OTR" class="text-danger fw-bold" value="OTR"
                                        @if (old('state') == 'OTR')  @endif>
                                        OTR - {{ __('Other') }}
                                    </option>
                                </select>
                            </div>
                            {{-- <div class="col-6 col-md-12 mb-3">
                                <select class="form-select text-danger text-uppercase" required>
                                    <option value="" selected hidden>{{ __('CITY') }}</option>
                                </select>
                            </div>
                            <div class="col-6 col-md-12 mb-3">
                                <select class="form-select text-danger text-uppercase" required>
                                    <option value="" selected hidden>{{ __('DISTRICT') }}</option>
                                </select>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-2 "><button type="submit" class="btn btn-danger">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        {{-- DERECHA --}}
        <div class="col-md-7 mx-auto">
            @if (count($users) == 0)
                <h2 class="alert alert-danger text-center my-auto">
                    {{ __('USER NOT FOUND') }}
                </h2>
            @endif

            @if (count($users) > 0)
                @foreach ($users->sortBy('name') as $user)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-auto my-auto">
                                <figure class="figure my-auto">
                                    <a href="{{ route('person', ['id' => $user->id]) }}">
                                        <img src="{{ asset($user->foto) }}" class="img-fluid my-auto"
                                            style="max-height: 100px">
                                    </a>
                                </figure>
                            </div>
                            <div class="col-auto">
                                <div class="card-body">
                                    <h4 class="card-title text-black text-uppercase">
                                        {{ $user->name }}
                                        @if ($user->discapacidad != 'No')
                                            - <i class="fas fa-wheelchair"></i>
                                        @endif
                                    </h4>
                                    <p class="card-text text-secondary text-uppercase">
                                        <?php
                                        switch ($user->country) {
                                            case 'PER':
                                                echo 'Peru';
                                                break;
                                            case 'CHL':
                                                echo 'Chile';
                                                break;
                                            case 'COL':
                                                echo 'Colombia';
                                                break;
                                            case 'ECU':
                                                echo 'Ecuador';
                                                break;
                                            case 'PRI':
                                                echo 'PUERTO RICO';
                                                break;
                                            case 'DOM':
                                                echo 'REP. DOMINICANA';
                                                break;
                                            case 'OTR':
                                                echo __('Other');
                                                break;
                                        }
                                        ?>
                                        - {{ $user->state }},
                                        @if ($user->galpon != null)
                                            <span class="">
                                                GLP - {{ $user->galpon }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <nav>
                    <ul class="pagination">
                        <div class="d-flex ms-auto">
                            <li class="page-item @if ($users->currentPage() == 1) disabled @endif">
                                <a class="page-link link-danger w-100"
                                    href="{{ $users->previousPageUrl() }}">{{ __('Previous') }}</a>
                            </li>
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li class="page-item">
                                    <a class="page-link link-danger @if ($i == $users->currentPage()) text-white bg-danger pe-none @endif "
                                        href="{{ $users->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item @if ($users->currentPage() == $users->lastPage()) disabled @endif">
                                <a class="page-link link-danger w-100"
                                    href="{{ $users->nextPageUrl() }}">{{ __('Next') }}</a>
                            </li>
                        </div>
                    </ul>
                </nav>
            @endif
        </div>
    </div>

    <script>
        /* STATE -  */
        var $select1 = $('#country'),
            $select2 = $('#state'),
            $options = $select2.find('option');

        $select1.on('change', function() {
            $select2.html($options.filter('[data="' + this.value + '"],[target="OTR"]'));
        }).trigger('change');
    </script>
@endsection
