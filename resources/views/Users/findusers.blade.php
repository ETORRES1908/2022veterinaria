@extends('layouts.app')

@section('content')
    <div class="row flex-nowrap">
        {{-- IZQUIERDA --}}
        <div class="col-4 col-sm-5">
            <label class="form-label fs-3 text-uppercase fw-bold">
                {{ __('searcher') }}
            </label>
            <form action="{{ route('findperson') }}" method="get">
                {{ csrf_field() }}
                <ul class="list-group">
                    <li class="list-group-item border-0 bg-black">
                        <div class="row g-1">
                            <div class="col-10">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                    placeholder="{{ __('Username') }}">
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <div class="row g-1">
                            <div class="col-10">
                                <input type="text" class="form-control" name="shed" value="{{ old('shed') }}"
                                    placeholder="{{ __('Shed') }}">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="PER" id="per" role="button">
                        <label for="per" class="text-danger" role="button">
                            PERÚ</label>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="CHI" id="chl" role="button">
                        <label for="chl" class="text-danger" role="button">
                            CHILE</label>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="COL" id="col" role="button">
                        <label for="col" class="text-danger" role="button">
                            COLOMBIA</label>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="ECU" id="ecu" role="button">
                        <label for="ecu" class="text-danger" role="button">
                            ECUADOR</label>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="MEX" id="mex" role="button">
                        <label for="mex" class="text-danger" role="button">
                            MÉXICO</label>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="PRI" id="pri" role="button">
                        <label for="pri" class="text-danger" role="button">
                            PUERTO RICO</label>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="DOM" id="dom" role="button">
                        <label for="dom" class="text-danger" role="button">
                            REP. DOMINICANA
                        </label>
                    </li>
                    <li class="list-group-item border-0 bg-black">
                        <input class="form-check-input bg-danger btn-danger border-danger" type="radio" name="country"
                            value="OTR" id="otr" role="button">
                        <label for="otr" class="text-danger" role="button">OTROS</label>
                    </li>

                </ul>
            </form>
        </div>
        {{-- DERECHA --}}
        <div class="col-8 col-sm-7 mt-3 mx-auto">

            @if (count($users) == 0)
                <h2 class="alert alert-danger text-center my-auto">
                    {{ __('USER NOT FOUND') }}
                </h2>
            @endif

            @if (count($users) > 0)
                <nav>
                    <ul class="pagination">
                        <div class="d-flex mx-auto">
                            <li class="page-item @if ($users->currentPage() == 1) disabled @endif">
                                <a class="page-link link-danger w-100" href="{{ $users->previousPageUrl() }}">Previous</a>
                            </li>
                            @for ($i = 1; $i <= $users->lastPage(); $i++)
                                <li class="page-item">
                                    <a class="page-link link-danger @if ($i == $users->currentPage()) text-white bg-danger @endif "
                                        href="{{ $users->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item @if ($users->currentPage() == $users->lastPage()) disabled @endif">
                                <a class="page-link link-danger w-100" href="{{ $users->nextPageUrl() }}">Next</a>
                            </li>
                        </div>
                    </ul>
                </nav>
                @foreach ($users as $user)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-auto my-auto">
                                <figure class="figure my-auto">
                                    <a href="{{ route('person', ['id' => $user->id]) }}">
                                        <img src="{{ asset($user->foto) }}" class="img-fluid my-auto"
                                            style="max-height: 100px">
                                    </a>
                                </figure>
                            </div>
                            <div class="col-auto">
                                <div class="card-body">
                                    <h4 class="card-title text-black text-uppercase">
                                        {{ $user->name }}
                                        @if ($user->discapacidad != 'No')
                                            - <i class="fas fa-wheelchair"></i>
                                        @endif
                                    </h4>
                                    <p class="card-text text-secondary text-uppercase">
                                        <?php
                                        switch ($user->country) {
                                            case 'PER':
                                                echo 'Perú';
                                                break;
                                            case 'CHL':
                                                echo 'Chile';
                                                break;
                                            case 'COL':
                                                echo 'Colombia';
                                                break;
                                            case 'ECU':
                                                echo 'Ecuador';
                                                break;
                                            case 'PRI':
                                                echo 'PUERTO RICO';
                                                break;
                                            case 'DOM':
                                                echo 'REP. DOMINICANA';
                                                break;
                                            case 'OTR':
                                                echo __('Other');
                                                break;
                                        }
                                        ?>
                                        ,{{ $user->state }}
                                        @if ($user->galpon != null)
                                            <span class="">
                                                - {{ $user->galpon }}
                                            </span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    </div>
@endsection
