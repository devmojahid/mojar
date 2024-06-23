@extends('backend::layouts.base.master.auth')
@section('content')
    <h2 class="h3 text-center mb-3">

        {{ trans('backend::auth.reset_password', ['app' => get_config('title', 'Mojar CMS')]) }}
    </h2>
    <form class="form-ajax-handle" action="{{ route('admin.reset-password', [$email, $token]) }}" method="POST">
        @csrf
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
                <input type="password" class="form-control" placeholder="{{ trans('backend::auth.password_confirmation') }}"
                    autocomplete="off" name="password_confirmation" id="confirmPasswordField" required>
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

        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100 auth-form-btn" data-loading-text="Loading...">
                {{ trans('backend::auth.password_reset') }}
            </button>
        </div>
    </form>
    @if (get_config('user_registration', true))
        <div class="text-center text-muted mt-3">
            {{ trans('backend::auth.forgot_it_and_send_me_back') }} <a href="{{ route('admin.login') }}"
                tabindex="-1">{{ trans('backend::auth.sign_in') }}</a>
        </div>
    @endif
@endsection
