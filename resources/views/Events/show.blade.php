@extends('layouts.app')

@extends('layouts.datatable')

@section('content')
    <div class="card bg-black text-white border border-danger">
        <div class="card-header border border-danger">
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
            @if (count($evento->participants) >= 2)
                <a type="button" class="btn btn-dark" href="{{ route('Duels.show', $evento->id) }}">
                    {{ __('Duels') }}
                </a>
            @endif

            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#Event">
                {{ __('Event') }}
            </button>
        </div>
        <div class="card-body border border-danger table-responsive">
            <table id="datatable" class="table table-dark table-hover nowrap" style="width:100%">
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
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title text-black fw-bold">{{ __('CHOOSE PET') }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form-horizontal" method="POST" action="{{ route('Participants.store') }}"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body bg-black">
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
                    <div class="modal-footer p-0">
                        <button type="submit" class="btn btn-primary mx-auto">
                            {{ __('Add Pet') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- MODAL EVENTO -->
    <div class="modal fade" id="Event" aria-hidden="true" aria-labelledby="AddPet" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content bg-black border border-danger">
                <div class="modal-header bg-black border border-danger">
                    <div class="modal-title fw-bold fs-4">{{ __('Event') }} {{ $evento->tevent }}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-black border border-danger">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100 bg-black border border-danger">
                                <div class="card-header border border-danger fw-bold"> {{ __('EVENT') }}</div>
                                <div class="card-body border border-danger">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="title" class="form-label">{{ __('Type Event') }}</label>
                                            <input type="text" class="form-control" id="title"
                                                value="{{ $evento->tevent }}" readonly>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="hours" class="form-label">{{ __('Coliseum') }}</label>
                                            <input type="text" class="form-control" id="hours"
                                                value="{{ $evento->cls }}" readonly>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="title" class="form-label">{{ __('Weights') }}</label>
                                            <div class="col-auto input-group-text">
                                                Min
                                                <div class="form-control form-control-sm m-0">{{ $evento->miw }}</div>
                                                -
                                                <div class="form-control form-control-sm m-0">{{ $evento->maw }}</div>
                                                Max
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mb-3">
                                            <label for="hours" class="form-label">{{ __('Hour Start') }}</label>
                                            <input type="time" class="form-control" id="hours"
                                                value="{{ $evento->hstart }}" readonly>
                                        </div>
                                        <div class="col-sm-8 mb-3">
                                            <label for="dates" class="form-label">{{ __('Dates') }}</label>
                                            <div class="row">
                                                @foreach ($evento->fechas as $fecha)
                                                    <div class="col-6 mb-1">
                                                        <label type="text" class="form-control">
                                                            {{ $fecha }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mb-3">
                                            <label for="dates" class="form-label">{{ __('Espuelas') }}</label>
                                            <ul class="list-group list-group-flush">
                                                @foreach ($evento->spl as $spl)
                                                    <li class="list-group-item">
                                                        @if ($spl == 'lbr')
                                                            Libre
                                                        @elseif($spl == 'fbr')
                                                            Fibra
                                                        @elseif($spl == 'plt')
                                                            Plastica
                                                        @elseif($spl == 'cry')
                                                            Carey
                                                        @elseif($spl == 'spn')
                                                            Espina
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 bg-black border border-danger">
                                <div class="card-header border border-danger fw-bold">
                                    {{ __('AWARDS') . ': ' . $evento->awards }}</div>
                                <div class="card-body border border-danger">
                                    <div class="row">
                                        <div class="col-4 mb-3">
                                            <label for="TROPHY" class="form-label">{{ __('TROPHYS') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text">S/.</div>
                                                <input type="text" class="form-control" id="trophy"
                                                    value="{{ $evento->trophys }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="ROOSTER"
                                                class="form-label">{{ __('ROOSTER') . ' ' . $evento->trooster . ' ' . __('seconds') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text">S/.</div>
                                                <input type="text" class="form-control" id="rooster"
                                                    value="{{ $evento->rooster }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="ROOSTER"
                                                class="form-label">{{ __('ROOSTER') . ' 10 ' . __('seconds') }}
                                            </label>
                                            <div class="input-group">
                                                <div class="input-group-text">S/.</div>
                                                <input type="text" class="form-control" id="rooster"
                                                    value="{{ $evento->rooster }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="fft" class="form-label">{{ __('1er Frente') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text">S/.</div>
                                                <input type="text" class="form-control" id="fft"
                                                    value="{{ $evento->fft }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="sft" class="form-label">{{ __('2do Frente') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text">S/.</div>
                                                <input type="text" class="form-control" id="sft"
                                                    value="{{ $evento->sft }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="tft" class="form-label">{{ __('3er Frente') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text">S/.</div>
                                                <input type="text" class="form-control" id="tft"
                                                    value="{{ $evento->tft }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mb-3">
                                            <label for="pvs" class="form-label">{{ __('Pavos') }}</label>
                                            <input type="number" class="form-control" id="pvs"
                                                value="{{ $evento->pvs }}" readonly>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mb-3">
                                            <label for="lch" class="form-label">{{ __('Lechones') }}</label>
                                            <input type="number" class="form-control" id="lch"
                                                value="{{ $evento->lch }}" readonly>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mb-3">
                                            <label for="cnt" class="form-label">{{ __('Canastas') }}</label>
                                            <input type="number" class="form-control" id="cnt"
                                                value="{{ $evento->cnt }}" readonly>
                                        </div>
                                        <div class="col-sm-6 col-lg-3 mb-3">
                                            <label for="skg" class="form-label">{{ __('Sacos') }}</label>
                                            <input type="number" class="form-control" id="skg"
                                                value="{{ $evento->skg }}" readonly>
                                        </div>
                                    </div>
                                </div>
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
