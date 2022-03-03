@extends('layouts.app')

@extends('layouts.datatable')

@section('content')
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
                        <th>{{ __('Organizer') }}</th>
                        <th>{{ __('Control desk') }}</th>
                        <th>{{ __('Judge') }}</th>
                        <th>{{ __('Assistant') }}</th>
                        <th class="nowrap">{{ __('Place') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ str_replace('-', '/', $evento->fechas[0]) }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#Organizador{{ $evento->organizador->id }}">
                                    {{ $evento->organizador->nombre . ' ' . $evento->organizador->apellido }}
                                </button>
                                <!-- Modal 1-->
                                <div class="modal fade" id="Organizador{{ $evento->organizador->id }}"
                                    aria-hidden="true" aria-labelledby="Organizador" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-auto">
                                                <figure class="figure">
                                                    <img src="@if (!empty($evento->organizador->foto)) {{ asset($evento->organizador->foto) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                        class="figure-img d-block mx-auto" height="250vh">
                                                    <figcaption class="figure-caption">
                                                        {{ $evento->organizador->nombre . ' ' . $evento->organizador->apellido }}
                                                        -
                                                        {{ $evento->organizador->country . ' ' . $evento->organizador->state }}
                                                        <br>
                                                        {{ $evento->organizador->direction }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button class="btn btn-primary"
                                                    data-bs-target="#Asistente{{ $evento->assistent->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Assistent') }}
                                                </button>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#MControl{{ $evento->mcontrol->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Desktop Control') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#MControl{{ $evento->mcontrol->id }}">
                                    {{ $evento->mcontrol->nombre . ' ' . $evento->mcontrol->apellido }}
                                </button>
                                <!-- Modal 2-->
                                <div class="modal fade" id="MControl{{ $evento->mcontrol->id }}" aria-hidden="true"
                                    aria-labelledby="MControl" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-auto">
                                                <figure class="figure">
                                                    <img src="@if (!empty($evento->mcontrol->foto)) {{ asset($evento->mcontrol->foto) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                        class="figure-img d-block mx-auto" height="250vh">
                                                    <figcaption class="figure-caption">
                                                        {{ $evento->mcontrol->nombre . ' ' . $evento->mcontrol->apellido }}
                                                        -
                                                        {{ $evento->mcontrol->country . ' ' . $evento->mcontrol->state }}
                                                        <br>
                                                        {{ $evento->mcontrol->direction }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button class="btn btn-primary"
                                                    data-bs-target="#Organizador{{ $evento->organizador->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Organizer') }}
                                                </button>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#Judge{{ $evento->judge->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Judge') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#Judge{{ $evento->judge->id }}">
                                    {{ $evento->judge->nombre . ' ' . $evento->judge->apellido }}
                                </button>
                                <!-- Modal 3-->
                                <div class="modal fade" id="Judge{{ $evento->judge->id }}" aria-hidden="true"
                                    aria-labelledby="Judge" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-auto">
                                                <figure class="figure">
                                                    <img src="@if (!empty($evento->judge->foto)) {{ asset($evento->judge->foto) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                        class="figure-img d-block mx-auto" height="250vh">
                                                    <figcaption class="figure-caption">
                                                        {{ $evento->judge->nombre . ' ' . $evento->judge->apellido }} -
                                                        {{ $evento->judge->country . ' ' . $evento->judge->state }} <br>
                                                        {{ $evento->judge->direction }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button class="btn btn-primary"
                                                    data-bs-target="#MControl{{ $evento->mcontrol->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Desktop Control') }}</button>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#Asistente{{ $evento->assistent->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Assitent') }} </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#Asistente{{ $evento->assistent->id }}">
                                    {{ $evento->assistent->nombre . ' ' . $evento->assistent->apellido }}
                                </button>
                                <!-- Modal 4-->
                                <div class="modal fade" id="Asistente{{ $evento->assistent->id }}" aria-hidden="true"
                                    aria-labelledby="Asistente" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn btn-danger bg-danger btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-auto">
                                                <figure class="figure">
                                                    <img src="@if (!empty($evento->assistent->foto)) {{ asset($evento->assistent->foto) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                        class="figure-img d-block mx-auto" height="250vh">
                                                    <figcaption class="figure-caption">
                                                        {{ $evento->assistent->nombre . ' ' . $evento->assistent->apellido }}
                                                        -
                                                        {{ $evento->assistent->country . ' ' . $evento->assistent->state }}
                                                        <br>
                                                        {{ $evento->assistent->direction }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button class="btn btn-primary"
                                                    data-bs-target="#Judge{{ $evento->mcontrol->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Judge') }}</button>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#Organizador{{ $evento->organizador->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Organizer') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="nowrap">
                                <h6 class="nowrap">
                                    <?php switch ($evento->ctr) {
                                        case 'PE':
                                            echo 'Perú';
                                            break;
                                        case 'ARG':
                                            echo 'Argentina';
                                            break;
                                        case 'EC':
                                            echo 'Ecuador';
                                            break;
                                        case 'CL':
                                            echo 'Chile';
                                            break;
                                    } ?>,
                                    {{ $evento->stt }}<br>{{ $evento->drc }}
                                </h6>
                            </td>
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
                        <th>{{ __('Organizer') }}</th>
                        <th>{{ __('Control desk') }}</th>
                        <th>{{ __('Judge') }}</th>
                        <th>{{ __('Assistant') }}</th>
                        <th class="nowrap">{{ __('Place') }}</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

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
                },
                "columnDefs": [{
                    "targets": 0,
                    "type": "date-eu"
                }],
            });
        });
    </script>
@endsection
