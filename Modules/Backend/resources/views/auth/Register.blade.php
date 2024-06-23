@extends('backend::layouts.base.master.auth')
@section('content')
    <h2 class="h3 text-center mb-3">

        {{ trans('backend::auth.register_to_your_account', ['app' => get_config('title', 'Mojar CMS')]) }}
    </h2>
    <form class="form-ajax-handle" action="{{ route('admin.register') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label required" for="nameField">
                {{ trans('backend::auth.name') }}
            </label>
            <input class="form-control" placeholder="{{ trans('backend::auth.name_placeholder') }}" autocomplete="off"
                type="text" name="name" id="nameField" value="{{ old('name') }}" required>
            <div class="invalid-feedback" id="nameFieldFeedback"></div>
        </div>
        <div class="mb-3">
            <label class="form-label required" for="emailField">
                {{ trans('backend::auth.email') }}
            </label>
            <input class="form-control" placeholder="{{ trans('backend::auth.email_placeholder') }}" autocomplete="on"
                type="email" name="email" id="emailField" value="{{ old('email') }}" required>
            <div class="invalid-feedback" id="emailFieldFeedback"></div>
        </div>
        <div class="mb-2">
            <label class="form-label required" for="passwordField">
                {{ trans('backend::auth.password') }}
            </label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="{{ trans('backend::auth.password_placeholder') }}"
                    autocomplete="off" name="password" id="passwordField" required>
                <div class="invalid-feedback" id="passwordFieldFeedback"></div>
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
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
        {{-- password confirmation  --}}
        <div class="mb-2">
            <label class="form-label required" for="confirmPasswordField">
                {{ trans('backend::auth.password_confirmation') }}
            </label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control"
                    placeholder="{{ trans('backend::auth.password_confirmation') }}" autocomplete="off"
                    name="password_confirmation" id="confirmPasswordField" required>
                <div class="invalid-feedback" id="confirmPasswordFieldFeedback"></div>
                <span class="input-group-text">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
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

        @if (get_config('user_keep_signed_in', true))
            <div class="mb-2">
                <label class="form-check">
                    <input type="checkbox" name="remember" class="form-check-input" />
                    <span class="form-check-label">{{ trans('backend::auth.agree_the') }}
                        <a href="./terms-of-service.html" tabindex="-1">
                            {{ trans('backend::auth.terms_and_conditions') }}
                        </a>.</span>
                </label>
            </div>
        @endif
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100 auth-form-btn" data-loading-text="Loading...">
                {{ trans('backend::auth.sign_up') }}
            </button>
        </div>
    </form>
    @isset($socialites)
        <div class="social_login mt-4 mb-3">
            <div class="row">
                @foreach ($socialites as $key => $socialite)
                    <div class="col">
                        <a href="#" class="btn w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5">
                                </path>
                            </svg>
                            {{ trans('cms::app.socials.login_with', ['name' => ucfirst($key)]) }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endisset
    @if (get_config('user_registration', true))
        <div class="text-center text-muted mt-3">
            {{ trans('backend::auth.already_have_an_account') }} <a href="{{ route('admin.login') }}"
                tabindex="-1">{{ trans('backend::auth.sign_in') }}</a>
        </div>
    @endif
@endsection
