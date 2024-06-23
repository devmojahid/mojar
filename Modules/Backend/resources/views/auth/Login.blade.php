@extends('backend::layouts.base.master.auth')
@section('content')
    <h2 class="h3 text-center mb-3">
        Login to your account
    </h2>
    <form action="./" method="get" autocomplete="off" novalidate>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" placeholder="your@email.com" autocomplete="off">
        </div>
        <div class="mb-2">
            <label class="form-label">
                Password
                <span class="form-label-description">
                    <a href="./forgot-password.html">I forgot password</a>
                </span>
            </label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="Your password" autocomplete="off">
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password"
                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                            <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                        </svg>
                    </a>
                </span>
            </div>
        </div>
        <div class="mb-2">
            <label class="form-check">
                <input type="checkbox" class="form-check-input" />
                <span class="form-check-label">Remember me on this device</span>
            </label>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
    </div>
    {{-- <div class="auth-form-light text-left p-5">
        @if ($logo = get_config('logo'))
            <div class="brand-logo">
                <img src="{{ upload_url(get_config('logo')) }}" alt="{{ get_config('title', 'Inter Test') }}">
            </div>
        @else
            <div class="brand-logo">
                <h2>{{ get_config('title', 'Inter Test') }}</h2>
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (auth()->user())
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Warning!</strong> You are already logged in.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <h4>{{ trans('backend::auth.hello_lets_started', ['app' => get_config('title', 'Inter Test')]) }}</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
        <form class="pt-3 form-ajax-handle" action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control form-control-lg" id="emailField"
                    placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-lg" id="passwordField" name="password"
                    placeholder="Password">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                    data-loading-text="Loading...">SIGN IN</button>
            </div>
            <div class="my-2 d-flex justify-content-between align-items-center">
                @if (get_config('user_keep_signed_in', true))
                    <div class="form-check">
                        <label class="form-check-label text-muted">
                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                @endif
                @if (get_config('user_forgot_password', true))
                    <a href="{{ route('admin.forgot-password') }}" class="auth-link text-black">Forgot password?</a>
                @endif
            </div>
            <div class="mb-2">
                <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="mdi mdi-facebook mr-2"></i>Connect using facebook </button>
            </div>
            @if (get_config('user_registration'))
                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a
                        href="{{ route('admin.register') }}" class="text-primary">Create</a>
                </div>
            @endif
        </form>
    </div> --}}
@endsection
