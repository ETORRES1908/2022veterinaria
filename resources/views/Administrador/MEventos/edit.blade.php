@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>{{ __('EVENT') }}</h1>
@stop

@section('content')
    {{ $evento }}
    <form method="POST" action="{{ route('MEventos.update', ['id' => $evento->id]) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label>{{ __('Status') }}</label>
        <select class="form-control text-danger" name="status" style="width: 40%;margin:auto">
            <option value="0" @if ($evento->status == '0') selected @endif>
                {{ __('Inactived') }}
            </option>
            <option value="1" @if ($evento->status == '1') selected @endif>
                {{ __('Actived') }}
            </option>
            <option value="2" @if ($evento->status == '2') selected @endif>
                {{ __('Suspended') }}
            </option>
        </select><br>
        <button type="submit" class="btn btn-primary">{{ __('Change status') }}</button>
    </form>
@endsection
