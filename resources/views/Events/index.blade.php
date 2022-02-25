@extends('layouts.app')

@extends('layouts.datatable')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('Events.create') }}" class="btn btn-success" style="font-size: 95%">
                Añadir Nuevo Evento</a>
        </div>
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Organizador</th>
                        <th>Juez A</th>
                        <th>Juez B</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{ $evento->fstart }}</td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle{{ $evento->organizador->id }}">
                                    {{ $evento->organizador->nombre . ' ' . $evento->organizador->apellido }}
                                </button>
                                <!-- Modal 1-->
                                <div class="modal fade" id="exampleModalToggle{{ $evento->organizador->id }}"
                                    aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
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
                                                    data-bs-target="#exampleModalToggle{{ $evento->juezb->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Jugde') }} B</button>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#exampleModalToggle{{ $evento->jueza->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Jugde') }} A</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle{{ $evento->jueza->id }}">
                                    {{ $evento->jueza->nombre . ' ' . $evento->jueza->apellido }}
                                </button>
                                <!-- Modal 2-->
                                <div class="modal fade" id="exampleModalToggle{{ $evento->jueza->id }}"
                                    aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-auto">
                                                <figure class="figure">
                                                    <img src="@if (!empty($evento->jueza->foto)) {{ asset($evento->jueza->foto) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                        class="figure-img d-block mx-auto" height="250vh">
                                                    <figcaption class="figure-caption">
                                                        {{ $evento->jueza->nombre . ' ' . $evento->jueza->apellido }} -
                                                        {{ $evento->jueza->country . ' ' . $evento->jueza->state }} <br>
                                                        {{ $evento->jueza->direction }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button class="btn btn-primary"
                                                    data-bs-target="#exampleModalToggle{{ $evento->organizador->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Organizer') }}</button>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#exampleModalToggle{{ $evento->juezb->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Jugde') }} B</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalToggle{{ $evento->juezb->id }}">
                                    {{ $evento->juezb->nombre . ' ' . $evento->juezb->apellido }}
                                </button>
                                <!-- Modal 3-->
                                <div class="modal fade" id="exampleModalToggle{{ $evento->juezb->id }}"
                                    aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-auto">
                                                <figure class="figure">
                                                    <img src="@if (!empty($evento->juezb->foto)) {{ asset($evento->juezb->foto) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                        class="figure-img d-block mx-auto" height="250vh">
                                                    <figcaption class="figure-caption">
                                                        {{ $evento->juezb->nombre . ' ' . $evento->juezb->apellido }} -
                                                        {{ $evento->juezb->country . ' ' . $evento->juezb->state }} <br>
                                                        {{ $evento->juezb->direction }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-between">
                                                <button class="btn btn-primary"
                                                    data-bs-target="#exampleModalToggle{{ $evento->jueza->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Jugde') }} A
                                                </button>
                                                <button class="btn btn-primary"
                                                    data-bs-target="#exampleModalToggle{{ $evento->organizador->id }}"
                                                    data-bs-toggle="modal">
                                                    {{ __('Organizer') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('Events.show', $evento->id) }}" class="btn btn-warning">
                                    Ver Participantes
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Fecha</th>
                        <th>Organizador</th>
                        <th>Juez A</th>
                        <th>Juez B</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable({
                responsive: true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
                },
                "columnDefs": [{
                    "targets": 0,
                    "type": "date-eu"
                }],
            });
        });
    </script>
@endsection
