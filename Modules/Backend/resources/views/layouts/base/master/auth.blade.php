<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sign in with illustration - Tabler - Premium and Open Source dashboard template with responsive and high
        quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('base/assets') }}/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="{{ asset('base/assets') }}/css/demo.min.css?1684106062" rel="stylesheet" />
    @stack('adminStyle')

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column bg-white">
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-6 col-xl-4 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center mb-4">

                    @if ($message = Session::get('success'))
                        {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ trans('backend::auth.success') }} </strong> {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> --}}

                        {{-- <div class="alert alert-success alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    <svg>...</svg>
                                </div>
                                <div>
                                    <h4 class="alert-title">Wow! Everything worked!</h4>
                                    <div class="text-secondary">Your account has been saved!</div>
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div> --}}

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="d-flex">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-circle-check" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M9 12l2 2 4-4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="alert-title text-success"> {{ trans('backend::auth.success') }} </h4>
                                    <div class="text-secondary"> {{ $message }} </div>
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    @elseif($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ trans('backend::auth.error') }}</strong> {{ $message }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (auth()->user())
                        {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>{{ trans('backend::auth.warning') }}</strong>
                            {{ trans('backend::auth.your_already_logged_in') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div> --}}

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <div class="d-flex">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-circle-x" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15"></line>
                                        <line x1="9" y1="9" x2="15" y2="15"></line>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="alert-title text-warning" style="color: #f8d7da !important;">
                                        {{ trans('backend::auth.warning') }}
                                    </h4>
                                    <div class="text-secondary" style="color: #f8d7da !important;">
                                        {{ trans('backend::auth.your_already_logged_in') }}
                                    </div>
                                </div>
                            </div>
                            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                        </div>
                    @endif

                    @if ($logo = get_config('logo'))
                        <a href="{{ route('backend.dashboard') }}" class="navbar-brand navbar-brand-autodark">
                            <img src="{{ upload_url(get_config('logo')) }}" height="36"
                                alt="{{ get_config('title', 'Inter Test') }}">
                        </a>
                    @else
                        <div class="brand-logo">
                            <a href="." class="navbar-brand navbar-brand-autodark"><img
                                    src="{{ asset('base/assets') }}/static/logo.svg" height="36" alt=""></a>
                            {{-- <h2>{{ get_config('title', 'Mojar Cms') }}</h2> --}}
                        </div>
                    @endif

                </div>

                @yield('content')
            </div>
        </div>
        <div class="col-12 col-lg-6 col-xl-8 d-none d-lg-block">
            <!-- Photo -->
            <div class="bg-cover h-100 min-vh-100"
                style="background-image: url({{ asset('base/assets') }}/static/photos/finances-us-dollars-and-bitcoins-currency-money-2.jpg)">
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('base/assets') }}/js/tabler.min.js" defer></script>
    <script src="{{ asset('base/assets') }}/js/jquery.min.js" defer></script>
    <script src="{{ asset('cms/js/form-handle.js') }}" defer></script>
    @stack('adminScripts')
</body>

</html>
