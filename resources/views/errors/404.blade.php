    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    {{-- CSSS --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- BOOTSTRAPP ICONS --}}
    <link rel="stylesheet" href="{{ asset('font/bootstrap-icons.css') }}">
    <div class="bg-black w-100 h-100 position-relative">
        <div class="position-absolute h-50 top-50 start-50 translate-middle">
            <div class="text-center">
                <div class="mb-4 text-white">

                    <h1><i class="bi bi-x-circle text-danger"></i> Oops!</h1>
                    <h2>404 Not Found</h2>
                    <h3>{{-- Sorry, an error has occured, Requested page not found! --}}</h3>
                </div>
                <div class="mb-3">
                    <a href="{{ route('welcome') }}" class="btn btn-outline-success btn-lg fs-4 text-nowrap">
                        <i class="bi bi-house-fill"></i>{{-- {{ __('Home') }} --}}
                    </a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-lg fs-4 text-nowrap">
                        <i class="bi bi-journal-bookmark-fill"></i>{{-- {{ __('Contact us') }} --}}
                    </a>
                </div>
            </div>
        </div>
    </div>
