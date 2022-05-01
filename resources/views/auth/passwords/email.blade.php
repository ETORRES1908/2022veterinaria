@extends('layouts.app')

@section('content')
    <div class="card bg-black mx-auto w-75">
        <div class="card-header fs-3 fw-bold text-uppercase">
            <i class="bi bi-key text-danger"></i> {{ __('New Password') }}
        </div>
        <div class="card-body">
            <form action="{{ route('reset') }}" method="POST">
                {!! csrf_field() !!}
                {{ method_field('POST') }}
                <div class="mb-3">
                    <label for="email" class="form-label text-uppercase">{{ __('email') }}</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="answer" class="form-label text-uppercase">{{ __('secrect answer') }}</label>
                    <input type="text" class="form-control" name="answer" value="{{ old('answer') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-uppercase">{{ __('New password') }}</label>
                    <input type="text" class="form-control" name="password" required
                        onKeyPress="if(this.value.length==8) return false;" autofocus minlength="8"
                        placeholder="{{ __('8 digits - Minimum 1 letter and 1 number') }}">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation"
                        class="form-label text-uppercase">{{ __('Confirm New Password') }}</label>
                    <input type="text" class="form-control" name="password_confirmation" required
                        onKeyPress="if(this.value.length==8) return false;" autofocus minlength="8"
                        placeholder="{{ __('8 digits - Minimum 1 letter and 1 number') }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Edit') }}</button>
            </form>
        </div>
    </div>
@endsection
