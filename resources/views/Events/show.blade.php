@extends('layouts.app')

@extends('layouts.datatable')

@section('content')
    <div class="card">
        <div class="card-header">
            @if (count($listps) <= 330)
                <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddPet">
                    {{ __('Join') }}
                </button>
            @endif
            @if ($errors->has('mascota_id'))
                <span class="fs-6 text-danger" id="Message">
                    Esta mascota ya participa
                </span>
            @endif
            @if (count($evento->participants) != 0)
                <a type="button" class="btn btn-dark" href="{{ route('Duels.show', $evento->id) }}">
                    {{ __('Duels') }}
                </a>
            @endif
            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#Awards">
                {{ __('Awards') }}
            </button>
        </div>
        <div class="card-body table-responsive">
            <table id="datatable" class="table table-hover nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>REGGAL</th>
                        <th>PESO</th>
                        <th>GALPON</th>
                        <th>DISCAPACIDAD</th>
                        <th>PRECINTO</th>
                        <th>CAJA MIN.</th>
                        <th>CAJA MAX.</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listps as $listp)
                        <tr>
                            <td>{{ $listp->mascota->REGGAL }}</td>
                            <td>{{ $listp->mascota->sss }}</td>
                            <td>{{ $listp->mascota->user->galpon }}</td>
                            <td>{{ $listp->mascota->des }}</td>
                            <td>{{ $listp->mascota->plc }}</td>
                            <td>1</td>
                            <td>2</td>
                            <td>
                                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                    data-bs-target="#Foto{{ $listp->id }}">
                                    Ver
                                </button>
                                <!-- Modal FOTO-->
                                <div class="modal fade" id="Foto{{ $listp->id }}" aria-hidden="true"
                                    aria-labelledby="Foto{{ $listp->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body mx-auto">
                                                <figure class="figure">
                                                    <img src="@if (!empty($listp->mascota->fotos->where('nfoto', 1)->first())) {{ asset($listp->mascota->fotos->where('nfoto', 1)->first()->ruta) }} @else{{ asset('storage/img/pata.jpg') }} @endif"
                                                        class="figure-img d-block mx-auto" width="300vh" height="400vh">
                                                    <figcaption class="figure-caption">
                                                        {{ $listp->mascota->nombre }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>REGGAL</th>
                        <th>PESO</th>
                        <th>GALPON</th>
                        <th>DISCAPACIDAD</th>
                        <th>PRECINTO</th>
                        <th>CAJA MIN.</th>
                        <th>CAJA MAX.</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- MODAL ADD -->
    <div class="modal fade" id="AddPet" aria-hidden="true" aria-labelledby="AddPet" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title text-black fw-bold">{{ __('CHOOSE PET') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('Participants.store') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body text-black">
                        {{-- SELECT MASCOTA --}}
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">MASCOTA:</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="mascota_id" name="mascota_id"
                                    value="{{ old('mascota_id') }}" required>
                                    <option selected disabled>Seleccionar mascota</option>
                                    @foreach (Auth::user()->mascotas as $mascota)
                                        <option value="{{ $mascota->id }}">{{ $mascota->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- EVENTO_ID --}}
                        <div>
                            <input type="text" id="evento_id" name="evento_id" value="{{ $evento->id }}" hidden>
                        </div>
                        {{-- REGGAL --}}
                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">REGGAL:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="mreggal" readonly>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <label class="col-sm-4 col-form-label">PESO:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="mp" name="peso" required>
                            </div>
                        </div>
                        <div class="col-sm-9 mx-auto">
                            {{-- IMAGEN --}}
                            <img id="preview" class="mx-auto d-block bg-black" width="180" height="200" />
                            <input id="foto" type="file" class="orm-control text-danger form-control-sm" name="foto"
                                value="{{ old('foto') }}" required autofocus accept=" image/*">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Add Pet') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL AWARDS -->
    <div class="modal fade" id="Awards" aria-hidden="true" aria-labelledby="AddPet" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title text-black fw-bold">{{ __('Awards') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-black">
                    <div class="form-control m-auto">
                        <div class="mb-3">
                            <label for="TROPHY" class="form-label">{{ __('TROPHY') }}</label>
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input type="text" class="form-control" id="trophy" value="{{ $evento->trophy }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="ROOSTER" class="form-label">{{ __('ROOSTER') }}</label>
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input type="text" class="form-control" id="rooster" value="{{ $evento->rooster }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="DUEL" class="form-label">{{ __('DUEL') }}</label>
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input type="text" class="form-control" id="duel" value="{{ $evento->duel }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- SCRIPTS --}}
    {{-- DATATABLE --}}
    <script type="text/javascript">
        $('#datatable').DataTable({
            responsive: true,
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.4/i18n/es_es.json"
            }
        });
    </script>
    {{-- MASCOTA --}}
    <script>
        function displayVals() {
            var id = $('#mascota_id').val();
            $.ajax({
                type: 'GET', //THIS NEEDS TO BE GET
                url: '/Participants/' + id,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $.each(data, function(i, item) {
                        $("#mreggal").val(item.REGGAL);
                    });
                },
                error: function() {
                    console.log(data);
                }
            });

        }
        $("#mascota_id").change(displayVals);
        displayVals();
    </script>
    <script>
        /*  PREVIEW */
        foto.onchange = evt => {
            const [file] = foto.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
        /* ERROR */
        setTimeout(function() {
            $('#Message').fadeOut('slow');
        }, 2000);
    </script>
@endsection
