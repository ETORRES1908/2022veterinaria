@extends('adminlte::page')

@section('title')

@section('content_header')
    <h1>{{ __('Banners') }}</h1>
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">
    <div class="container-fluid">
        <form class="text-uppercase" method="POST" action="{{ route('mbanners.store') }}" enctype="multipart/form-data">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="type">{{ __('Type Banner') }}</label>
                <select class="form-control" name="type">
                    <option value="blogin">{{ __('Banner in') . ' ' . __('Login') }}</option>
                    <option value="bregister">{{ __('Banner in') . ' ' . __('Register') }}</option>
                    <option value="bcreate">{{ __('Banner in') . ' ' . __('Create your event') }}</option>
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
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
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
                <label>{{ __('Photo') }}</label>
                <img id="preview" class="mx-auto d-block" height="200" width="180" />
                <div for="foto" onclick="getFile()" id="v" class="btn btn-white">
                    <div><i class="bi bi-cloud-upload"></i>{{ __('Upload') }}</div>
                    <div id="yourBtn"> ...{{ __('there is no picture') }}
                    </div>
                    <div hidden>
                        <input id="foto" type="file" name="foto" required autofocus accept="image/*" onchange="sub(this)">
                    </div>
                    <script>
                        function getFile() {
                            document.getElementById("foto").click();
                        }

                        function sub(obj) {
                            var file = obj.value;
                            var fileName = file.split("\\");
                            document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
                            event.preventDefault();
                            /* FOTO */
                            if (foto.files) {
                                preview.src = URL.createObjectURL(foto.files[0])
                            }
                        }
                    </script>

                    @if ($errors->has('foto'))
                        <span class="">
                            {{ $errors->first('foto') }}
                        </span>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn btn-default">{{ __('Create') }}</button>
        </form>
    </div>

    {{-- SCRIPTS --}}
    <script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
@endsection
