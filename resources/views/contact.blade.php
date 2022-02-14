@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-xs-12 col-md-6 col-sm-6 mb-4">
        <div class="h1 mb-3 py-3">
            {{__('Contact us')}}
        </div>

        <div class="h5">{{__('Phone Number')}}: </div>
        <div class="h6 fw-lighter"><strong>(01)</strong> 444 4444</div>


        <div class="h5">{{__('Mobile Phone Number')}}: </div>
        <div class="h6 fw-lighter">999-999-999 / 999-999-999</div>

        <div class="h5">{{__('E-Mail Address')}}: </div>
        <a class="h6 fw-lighter" href="#">Example@gmail.com</a>

        <div class="h5 fw-lighter text-start">
            Si surgen preguntas adicionales,
            ¡Todo nuestro personal estará inmensamente feliz de responderle!
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-sm-6 py-auto">
        <img src="{{ url('storage/img/dogcorrea.jpg') }}" class="img-fluid" alt="...">
    </div>
</div>
@endsection