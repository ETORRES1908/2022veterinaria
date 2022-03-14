@extends('layouts.app')

@section('content')
    <div class="card bg-dark text-white">
        <img src=" {{ url('storage/img/dog.jpg') }}" class="<ñimg-fluid" alt="...">
        <div class="card-img-overlay">
            <div class="mx-auto my-auto">
                <div class="my-5" style="border-left:solid #ec660e 1px;">
                    <div class="ms-5 text-sm-start fw-lighter" style="font-family: Times New Roman;font-size: 3vw;">
                        <span style="color: #222930;">
                            {{ __('Cats, Dogs and Even Raccoons') }}
                        </span>
                    </div>
                    <div class="ms-5 text-sm-start fw-bolder" style="font-size: 5vw;">
                        <strong>
                            <span style="color: #ec660e;">{{ __('Adopt') }}</span>
                            <span style="color: #222930;">{{ __('Any Pet You Like') }}!</span>
                        </strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
