@extends('layouts.app')


@section('content')
    @if (session('mensaje'))
        <div class="alert btn alert-warning" id="mensaje">
            {{ __('YOUR EVENT IS WAITING FOR APPROVAL FROM THE ADMINISTRATOR, YOU WILL BE SENT AN EMAIL.') }}
        </div>
    @endif

    <div class="card bg-black border border-danger">
        @can('addevent')
            <div class="card-header border border-danger">
                <a href="{{ route('events.create') }}" class="btn btn-success" style="font-size: 95%">
                    {{ __('Create your event') }}</a>
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
                        <th class="nowrap">{{ __('Reference') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->fechas[0] }}</td>
                            <td>{{ $evento->coliseum->district }}</td>
                            <td>
                                <select class="form-control text-white" style="background:none;border:none;" disabled>
                                    <option @if ($evento->coliseum->state == 'AM') selected @endif>AM - Amazonas</option>
                                    <option @if ($evento->coliseum->state == 'AN') selected @endif>AN - Ancash</option>
                                    <option @if ($evento->coliseum->state == 'AP') selected @endif>AP - Apurímac</option>
                                    <option @if ($evento->coliseum->state == 'AR') selected @endif>AR - Arequipa</option>
                                    <option @if ($evento->coliseum->state == 'AY') selected @endif>AY - Ayacucho</option>
                                    <option @if ($evento->coliseum->state == 'CJ') selected @endif>CJ - Cajamarca</option>
                                    <option @if ($evento->coliseum->state == 'CZ') selected @endif>CZ - Cuzco</option>
                                    <option @if ($evento->coliseum->state == 'HC') selected @endif>HC - Huancavelica</option>
                                    <option @if ($evento->coliseum->state == 'HU') selected @endif>HU - Huánuco</option>
                                    <option @if ($evento->coliseum->state == 'IC') selected @endif>IC - ICA</option>
                                    <option @if ($evento->coliseum->state == 'JU') selected @endif>JU - Junín</option>
                                    <option @if ($evento->coliseum->state == 'LL') selected @endif>LL - La Libertad</option>
                                    <option @if ($evento->coliseum->state == 'LB') selected @endif>LB - Lambayeque</option>
                                    <option @if ($evento->coliseum->state == 'LM') selected @endif>LM - Lima</option>
                                    <option @if ($evento->coliseum->state == 'LO') selected @endif>LO - Loreto</option>
                                    <option @if ($evento->coliseum->state == 'MD') selected @endif>MD - Madre de Dios</option>
                                    <option @if ($evento->coliseum->state == 'MQ') selected @endif>MQ - Moquegua</option>
                                    <option @if ($evento->coliseum->state == 'PA') selected @endif>PA - Pasco</option>
                                    <option @if ($evento->coliseum->state == 'PI') selected @endif>PI - Piura</option>
                                    <option @if ($evento->coliseum->state == 'PU') selected @endif>PU - Puno</option>
                                    <option @if ($evento->coliseum->state == 'SM') selected @endif>SM - San Martín</option>
                                    <option @if ($evento->coliseum->state == 'TA') selected @endif>TA - Tacna</option>
                                    <option @if ($evento->coliseum->state == 'TU') selected @endif>TU - Tumbes</option>
                                    <option @if ($evento->coliseum->state == 'UC') selected @endif>UC - Ucayali</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control text-white" style="background:none;border:none;" disabled>
                                    <option @if ($evento->coliseum->country == 'PER') selected @endif>PER - Perú</option>
                                </select>
                            </td>
                            <td class="nowrap">{{ $evento->coliseum->reference }}</td>
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
                        <th class="nowrap">{{ __('Reference') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable/buttons.dataTables.min.css') }}">
    {{-- JS --}}
    <script src="{{ asset('js/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/ajax/jszip.min.js') }}"></script>
    <script src="{{ asset('js/ajax/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/ajax/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/datatable/sorting/date-eu.js') }}"></script>

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
            bInfo: false,
            lengthChange: false,
            pageLength: 10,
            lengthMenu: [
                [10],
                [10]
            ]
        });

        //HIDE
        setTimeout(function() {
            $('.alert').fadeOut(4000);
        });
    </script>
@endsection
