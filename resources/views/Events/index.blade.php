@extends('layouts.app')
@extends('layouts.datatable')

@section('content')
    @if (session('mensaje'))
        <div class="alert btn alert-warning" id="mensaje">
            {{ __('YOUR EVENT IS WAITING FOR APPROVAL FROM THE ADMINISTRATOR, YOU WILL BE SENT AN EMAIL.') }}
        </div>
    @endif

    <div class="card bg-black border border-danger">
        @can('events.create')
            <div class="card-header border border-danger">
                <a href="{{ route('events.create') }}" class="btn btn-success" style="font-size: 95%">
                    {{ __('Add Event') }}</a>

            </div>
        @endcan
        <div class="card-body table-responsive border border-danger">
            <table id="datatable" class="table table-dark table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('City') }}</th>
                        <th>{{ __('State') }}</th>
                        <th>{{ __('Country') }}</th>
                        <th class="nowrap">{{ __('Direction') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->fechas[0] }}</td>
                            <td>{{ $evento->drc }}</td>
                            <td><select disabled class="text-white"
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
                                </select></td>
                            <td>
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
                                } ?>
                            </td>
                            <td class="nowrap">{{ $evento->drc }}</td>
                            <td>
                                <a href="{{ route('events.show', $evento->id) }}" class="btn btn-warning">
                                    {{ __('View') }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('City') }}</th>
                        <th>{{ __('State') }}</th>
                        <th>{{ __('Country') }}</th>
                        <th class="nowrap">{{ __('Direction') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    {{-- JS --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https:////cdn.datatables.net/plug-ins/1.11.5/sorting/date-eu.js"></script>
    {{-- SCRIPTS --}}
    <script type="text/javascript">
        function getLanguage() {
            var lang = $('html').attr('lang');
            if (lang == 'es') {
                lng = "es-ES";
            } else if (lang == 'en') {
                lng = "en-GB";
            }
            var result = null;
            var path = 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/';
            result = path + lng + ".json";
            return result;
        }
        // Build Datatable
        $('#datatable').DataTable({
            language: {
                "url": getLanguage()
            },
            "columnDefs": [{
                "targets": 0,
                "type": "date-eu"
            }],
        });

        $(document).ready(function() {
            $('#datatable').DataTable();
        });
        //HIDE
        setTimeout(function() {
            $('.alert').fadeOut(5000);
        });
    </script>
@endsection
