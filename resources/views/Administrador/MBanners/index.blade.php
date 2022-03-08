@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>{{ __('Banners') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div style="margin-bottom:1vh">
            <a class="btn btn-primary" href="{{ route('mbanners.create') }}">{{ __('Create') }}</a>
        </div>
        <div class="table-responsive">
            <table id="datatable" class="table table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Photo') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $banner->type }}</td>
                            <td>{{ $banner->name }}</td>
                            <td>{{ $banner->ruta }}</td>
                            <td>
                                <form method="POST" action="{{ route('mbanners.destroy', $banner->id) }}">
                                    {!! method_field('delete') !!}
                                    {!! csrf_field() !!}
                                    <button type="submit" class="col btn btn-danger">{{ __('Delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>{{ __('Type') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Photo') }}</th>
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
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
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

    {{-- STYLE --}}
    <style>
        .mb {
            margin-bottom: 4px;
        }

    </style>

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
        /* ERROR */
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 5000);
    </script>
@stop
