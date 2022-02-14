@extends('layouts.app')

@section('content')

<div class="position-relative">
    <img src=" {{ url('storage/img/dog.jpg') }}" class="img-fluid" alt="...">

    <div class="position-absolute" style="top: 20px; left: 0;">
        <div class="m-5" style="border-left:solid #ec660e 1px;">

            <div class="ms-5 text-sm-start fw-lighter" style="font-family: Times New Roman;font-size: 4vw;">
                <span style="color: #222930;">
                    Cats, Dogs and Even
                    Raccoons
                </span>
            </div>
            <div class="ms-5 text-sm-start fw-bolder" style="font-size: 6vw;">
                <strong>
                    <span style="color: #ec660e;">Adopt</span>
                    <span style="color: #222930;">Any Pet You Like!</span>
                </strong>
            </div>

        </div>
    </div>
</div>

@endsection