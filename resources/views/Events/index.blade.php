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
                <div class="row">
                    <div class="col-auto">
                        <a href="{{ route('events.create') }}" class="btn btn-success text-uppercase" style="font-size: 95%">
                            {{ __('Create your event') }}</a>
                    </div>
                    <div class="col-auto my-auto">
                        <span class="fs-bold text-danger ms-1">
                            *
                            {{ __('Before creating your event there must be a record as Colosseum, Control table and Judge') }}
                        </span>
                    </div>
                </div>
            </div>
        @endcan
        <div class="card-body table-responsive border border-danger text-uppercase">
            <table id="datatable" class="table table-dark table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>{{ __('Date') }}</th>
                        <th>ORG. {{ __('Shed') }}</th>
                        <th>{{ __('Award') }}</th>
                        <th>{{ __('Event') }}</th>
                        <th>{{ __('Judge') }} A</th>
                        <th>{{ __('Judge') }} B</th>
                        <th>{{ __('Country') }}</th>
                        <th>{{ __('STATE') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ Carbon\Carbon::parse($evento->fechas[0])->format('Y/m/d') }}</td>
                            <td>{{ $evento->organizador->galpon }}</td>
                            <td>{{ $evento->awards }}</td>
                            <td>
                                <?php
                                switch ($evento->tevent) {
                                    case 'cmp':
                                        echo e(__('Championship'));
                                        break;

                                    case 'cct':
                                        echo e(__('Concentration'));
                                        break;

                                    case 'drb':
                                        echo e(__('Derby'));
                                        break;

                                    case 'prt':
                                        echo e(__('Party'));
                                        break;

                                    case 'thr':
                                        echo e(__('Other'));
                                        break;
                                }
                                ?>
                            </td>
                            <td>{{ $evento->judge->name }}</td>
                            <td>
                                @if ($evento->assistent)
                                    {{ $evento->assistent->name }}
                                @endif
                            </td>
                            <td>
                                {{ $evento->coliseum->country }}
                            </td>
                            <td>
                                {{ $evento->coliseum->state }}
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
                                            {{ __('participate') }}
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
                        <th>ORG. {{ __('Shed') }}</th>
                        <th>{{ __('Award') }}</th>
                        <th>{{ __('Event') }}</th>
                        <th>{{ __('Judge') }} A</th>
                        <th>{{ __('Judge') }} B</th>
                        <th>{{ __('Country') }}</th>
                        <th>{{ __('STATE') }}</th>
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
            "order": [0, 'desc'],
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
