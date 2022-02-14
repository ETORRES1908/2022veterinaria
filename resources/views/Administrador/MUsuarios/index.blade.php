@extends('adminlte::page')

@section('title')

@section('content_header')
<h1>Mantenimiento de Usuarios</h1>
@stop

@section('content')

@section('content')
<div class="table-responsive pb-1">
    <table id="datatable" class="table table-hover">
        <thead>
            <tr>
                <th>{{ __('Username')}}</th>
                <th>{{ __('Name')}}</th>
                <th>{{ __('Surname')}}</th>
                <th>{{ __('DNI')}}</th>
                <th>{{ __('E-Mail Address')}}</th>
                <th>{{ __('Country')}},&nbsp{{ __('State')}}&nbsp-&nbsp{{ __('District')}}</th>
                {{-- <th>{{ __('Direction')}}</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->nombre}}</td>
                <td>{{$user->apellido}}</td>
                <td>{{$user->dni}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->country}},&nbsp{{$user->state}}&nbsp-&nbsp{{$user->district}}</td>
                {{-- <td>{{$user->direction}}</td> --}}
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>{{ __('Username')}}</th>
                <th>{{ __('Name')}}</th>
                <th>{{ __('Surname')}}</th>
                <th>{{ __('DNI')}}</th>
                <th>{{ __('E-Mail Address')}}</th>
                <th>{{ __('Country')}},&nbsp{{ __('State')}}&nbsp-&nbsp{{ __('District')}}</th>
                {{-- <th>{{ __('Direction')}}</th> --}}
            </tr>
        </tfoot>
    </table>
</div>

@extends('layouts.datatable')

@endsection