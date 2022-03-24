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
        <div class="card-body table-responsive border border-danger text-uppercase">
            <table id="datatable" class="table table-dark table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Shed') }}</th>
                        <th>{{ __('Award') }}</th>
                        <th>{{ __('Type Event') }}</th>
                        <th>{{ __('State') }}</th>
                        <th>{{ __('Country') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->fechas[0] }}</td>
                            <td>{{ $evento->organizador->galpon }}</td>
                            <td>{{ $evento->awards }}</td>
                            <td> <select class="form-control text-white" disabled
                                    style="-webkit-appearance: none;background: none;border: none">
                                    <option @if ($evento->tevent == 'cmp') selected @endif>
                                        {{ __('Championship') }}
                                    </option>
                                    <option @if ($evento->tevent == 'cct') selected @endif>
                                        {{ __('Concentration') }}
                                    </option>
                                    <option @if ($evento->tevent == 'chk') selected @endif>
                                        {{ __('Chuzk') }}
                                    </option>
                                    <option @if ($evento->tevent == 'drb') selected @endif>
                                        {{ __('Derby') }}
                                    </option>
                                    <option @if ($evento->tevent == 'prt') selected @endif>
                                        {{ __('Party') }}
                                    </option>
                                    <option @if ($evento->tevent == 'thr') selected @endif>
                                        {{ __('Other') }}
                                    </option>
                                </select>

                            </td>
                            <td>
                                {{ $evento->coliseum->state }}
                            </td>
                            <td>
                                {{ $evento->coliseum->country }}
                            </td>
                            <td>
                                @cannot('sentence')
                                    <a href="{{ route('events.show', $evento->id) }}" class="btn btn-warning">
                                        {{ __('participate') }}
                                    </a>
                                @endcan
                                @can('sentence')
                                @if (Auth::user()->id == $evento->judge_id)
                                    <a href="{{ route('pactados.show', $evento->id) }}" class="btn btn-warning">
                                        {{ __('sentence') }}
                                    </a>
                                @endif
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                         <th>{{ __('Date') }}</th>
                        <th>{{ __('Shed') }}</th>
                        <th>{{ __('Award') }}</th>
                        <th>{{ __('Type Event') }}</th>
                        <th>{{ __('State') }}</th>
                        <th>{{ __('Country') }}</th>
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
            $('.alert').fadeOut(6000);
        });
    </script>
@endsection
