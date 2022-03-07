@extends('adminlte::page')
@extends('layouts.datatable')

@section('title')

@section('content_header')
    <h1>Mantenimiento de Usuarios</h1>
@stop

@section('content')

@section('content')
    <div class="table-responsive pb-1">
        <table id="datatable" class="table table-hover nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>{{ __('Username') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Surname') }}</th>
                    <th>{{ __('DNI') }}</th>
                    <th>{{ __('E-Mail Address') }}</th>
                    <th>{{ __('Country') }},&nbsp{{ __('State') }}&nbsp-&nbsp{{ __('District') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->apellido }}</td>
                        <td>{{ $user->dni }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->country }}, {{ $user->state }}<br>{{ $user->district }}</td>
                        <td>
                            @if ($user->status == 0)
                                <span class="btn btn-primary">{{ __('Inactived') }}</span>
                            @elseif($user->status == 1)
                                <span class="btn btn-success">{{ __('Actived') }}</span>
                            @elseif ($user->status == 2)
                                <span class="btn btn-warning">{{ __('Suspended') }}</span>
                            @elseif ($user->status == 3)
                                <span class="btn btn-danger">{{ __('Cancelled') }}</span>
                            @endif
                        </td>
                        <td><a href="{{ route('usuarios.edit', $user->id) }}">Ver</a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>{{ __('Username') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Surname') }}</th>
                    <th>{{ __('DNI') }}</th>
                    <th>{{ __('E-Mail Address') }}</th>
                    <th>{{ __('Country') }},&nbsp{{ __('State') }}&nbsp-&nbsp{{ __('District') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
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
        $(document).ready(function() {
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
                }
            });
        });
    </script>
@endsection
