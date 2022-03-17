@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>{{ __('Banners') }}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <form method="POST" action="{{ route('mbanners.store') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="type">{{ __('Type Banner') }}</label>
                <select class="form-control" name="type">
                    <option value="blogin">{{ __('Banner in ') . __('Login') }}</option>
                    <option value="bcreate">{{ __('Banner in ') . __('Create your event') }}</option>
                </select>
                @if ($errors->has('type'))
                    <span class="">
                        {{ $errors->first('type') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="number">{{ __('Number') }}</label>
                <select class="form-control" name="number">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                @if ($errors->has('number'))
                    <span class="">
                        {{ $errors->first('number') }}
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="url">{{ __('URL') }}</label>
                <input type="text" class="form-control" name="url" value="{{ old('url') }}" required autofocus>
            </div>
            <div class="form-group">
                <label for="foto">{{ __('Photo') }}</label>
                <img id="preview" class="mx-auto d-block" height="200" width="180" />
                <input id="foto" type="file" class="form-control" name="foto" value="{{ old('foto') }}" required
                    autofocus accept="image/*">
                @if ($errors->has('foto'))
                    <span class="">
                        {{ $errors->first('foto') }}
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
    <script>
        /* PREVIEW */
        foto.onchange = evt => {
            const [file] = foto.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        };
    </script>
@endsection
