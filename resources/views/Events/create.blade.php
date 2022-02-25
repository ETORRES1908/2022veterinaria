@extends('layouts.app')

@section('content')
    <div class="card mx-auto text-dark">
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ route('Events.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    {{-- ORGANIZADOR ID --}}
                    <input id="organizador_id" type="text" name="organizador_id" value="{{ Auth::user()->id }}" hidden>
                    {{-- JUDGES A-B --}}
                    {{-- JUEZ A --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('jueza_id') ? ' has-error' : '' }}">
                        <label for="jueza_id" class="col-form-label fw-bold">
                            {{ __('Judge') }} A
                        </label>
                        <div class="col-auto">
                            <input id="jueza_id" list="juezas" class="form-control text-danger fw-bold" name="jueza_id"
                                value="{{ old('jueza_id') }}" required autofocus>
                            <datalist id="juezas">
                                @foreach ($judges as $judge)
                                    <option value="{{ $judge->id }}">{{ $judge->nombre . ' ' . $judge->apellidos }}
                                    </option>
                                @endforeach
                            </datalist>

                            @if ($errors->has('jueza_id'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('jueza_id') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- JUEZ B --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('juezb_id') ? ' has-error' : '' }}">
                        <label for="juezb_id" class="col-form-label fw-bold">
                            {{ __('Judge') }} B
                        </label>
                        <div class="col-auto">
                            <input id="juezb_id" list="juezbs" class="form-control text-danger fw-bold" name="juezb_id"
                                value="{{ old('juezb_id') }}" required autofocus>
                            <datalist id="juezbs">
                                @foreach ($judges as $judge)
                                    <option value="{{ $judge->id }}">{{ $judge->nombre . ' ' . $judge->apellidos }}
                                    </option>
                                @endforeach
                            </datalist>

                            @if ($errors->has('juezb_id'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('juezb_id') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- COLISEO --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('coliseum') ? ' has-error' : '' }}">
                        <label for="coliseum" class="col-form-label fw-bold">
                            {{ __('Coliseum') }}
                        </label>
                        <div class="col-auto">
                            <input id="coliseum" type="text" class="form-control text-danger fw-bold" name="coliseum"
                                value="{{ old('coliseum') }}" required autofocus>

                            @if ($errors->has('coliseum'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('coliseum') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- TITULO --}}
                    <div class="col-sm-5 mb-3 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="col-form-label fw-bold">
                            {{ __('Title') }}
                        </label>
                        <div class="col-auto">
                            <input id="title" type="text" class="form-control text-danger fw-bold" name="title"
                                value="{{ old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- TYPE EVENT --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('tevent') ? ' has-error' : '' }}">
                        <label for="tevent" class="col-form-label fw-bold">
                            {{ __('Type Event') }}
                        </label>
                        <div class="col-auto">
                            <input id="tevent" type="text" class="form-control text-danger fw-bold" name="tevent"
                                value="{{ old('tevent') }}" required autofocus>

                            @if ($errors->has('tevent'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('tevent') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- REGULATION --}}
                    <div class="col-sm-3 mb-3 form-group{{ $errors->has('trule') ? ' has-error' : '' }}">
                        <label for="trule" class="col-form-label fw-bold">
                            {{ __('Regulation') }}
                        </label>
                        <div class="col-auto">
                            <select class="form-control form-select text-danger fw-bold" id="trule" name="trule"
                                value="{{ old('trule') }}" required autofocus>
                                <option class="text-danger fw-bold" selected value="Coliseo">Coliseo</option>
                                <option class="text-danger fw-bold" value="Departamental">Departamental </option>
                                <option class="text-danger fw-bold" value="Nacional">Nacional</option>
                                <option class="text-danger fw-bold" value="Internacional">Internacional</option>
                            </select>
                            @if ($errors->has('trule'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('trule') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- FECHA INICIO - FIN --}}
                    {{-- FECHA INICIO --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('fstart') ? ' has-error' : '' }}">
                        <label for="fstart" class="col-form-label fw-bold">
                            {{ __('Start Date') }}
                        </label>
                        <div class="col-auto">
                            <input id="fstart" type="date" class="form-control text-danger fw-bold" name="fstart"
                                value="{{ old('fstart') }}" required autofocus>

                            @if ($errors->has('fstart'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('fstart') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- FECHA FIN --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('fend') ? ' has-error' : '' }}">
                        <label for="fend" class="col-form-label fw-bold">
                            {{ __('End Date') }}
                        </label>
                        <div class="col-auto">
                            <input id="fend" type="date" class="form-control text-danger fw-bold" name="fend"
                                value="{{ old('fend') }}" required autofocus>

                            @if ($errors->has('fend'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('fend') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- HORAS --}}
                    {{-- HORA INICIO --}}
                    <div class="col-6 col-md-3 mb-3 form-group{{ $errors->has('hstart') ? ' has-error' : '' }}">
                        <label for="hstart" class="col-form-label fw-bold">
                            {{ __('Time Start') }}
                        </label>
                        <div class="col-auto">
                            <input id="hstart" type="time" step='1' class="form-control text-danger fw-bold" name="hstart"
                                value="{{ old('hstart') }}" required autofocus>

                            @if ($errors->has('hstart'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('hstart') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- HORA FIN --}}
                    <div class="col-sm-6 col-md-3 form-group{{ $errors->has('hend') ? ' has-error' : '' }}">
                        <label for="hend" class="col-form-label fw-bold">
                            {{ __('Time End') }}
                        </label>
                        <div class="col-auto">
                            <input id="hend" type="time" step='1' class="form-control text-danger fw-bold" name="hend"
                                value="{{ old('hend') }}" required autofocus>

                            @if ($errors->has('hend'))
                                <span class="text-danger text-fs6">
                                    {{ $errors->first('hend') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    {{-- AWARDS --}}
                    <label for="awards" class="col-form-label fw-bold">
                        {{ __('Awards') }}
                    </label>
                    {{-- TROPHY --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('trophy') ? ' has-error' : '' }}">
                        <label for="trophy" class="col-form-label fw-bold">
                            {{ __('Trophy') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="trophy" type="number" class="form-control text-danger fw-bold" name="trophy"
                                    value="{{ old('trophy') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==5) return false;" />

                                @if ($errors->has('trophy'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('trophy') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- ROOSTER --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('rooster') ? ' has-error' : '' }}">
                        <label for="rooster" class="col-form-label fw-bold">
                            {{ __('Rooster') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="rooster" type="number" class="form-control text-danger fw-bold" name="rooster"
                                    value="{{ old('rooster') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==5) return false;">

                                @if ($errors->has('rooster'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('rooster') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- DUEL --}}
                    <div class="col-sm-4 mb-3 form-group{{ $errors->has('duel') ? ' has-error' : '' }}">
                        <label for="duel" class="col-form-label fw-bold">
                            {{ __('Duel') }}
                        </label>
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-text">S/.</div>
                                <input id="duel" type="number" class="form-control text-danger fw-bold" name="duel"
                                    value="{{ old('duel') }}" required autofocus min="0"
                                    onKeyPress="if(this.value.length==5) return false;" />

                                @if ($errors->has('duel'))
                                    <span class="text-danger text-fs6">
                                        {{ $errors->first('duel') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- BOTON DE REGISTRO --}}
                <div class="mx-auto">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add Event') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
