@extends('backend::layouts.base.master.auth')
@section('content')
    <h2 class="h3 text-center mb-3">

        {{ trans('backend::auth.forgot_your_password', ['app' => get_config('title', 'Mojar CMS')]) }}
    </h2>
    <form class="form-ajax-handle" action="{{ route('admin.forgot-password') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label required" for="emailField">
                {{ trans('backend::auth.email') }}
            </label>
            <input class="form-control" placeholder="{{ trans('backend::auth.email_placeholder') }}" autocomplete="on"
                type="email" name="email" id="emailField" value="{{ old('email') }}" required>
            <div class="invalid-feedback" id="emailFieldFeedback"></div>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100 auth-form-btn" data-loading-text="Loading...">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z"></path>
                    <path d="M3 7l9 6l9 -6"></path>
                </svg>
                {{ trans('backend::auth.send_me_new_password') }}
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
