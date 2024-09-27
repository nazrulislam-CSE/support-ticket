@extends('layouts.user.auth', ['pageTitle' => 'Signin'])
<style>
    .border-radius-20 {
        border-radius: 20px;
    }
</style>
@section('content')
<div class="col-md-10 px-0 shadow d-flex border-radius-20 border border-white overflow-hidden bg-white">
    <div class="wd-md-70p login d-none d-md-flex page-signin-style p-0 text-white border-radius-20 overflow-hidden">
        <div class="my-auto authentication-pages">
            <img src="{{ asset('dashboard/img/banner.png') }}" class="w-100 h-100" alt="logo">
        </div>
    </div>
    <div class="p-lg-5 p-3 wd-md-50p">
        <div>
            <div class="main-signin-header">
                <h2 class="text-center">Welcome To Support Ticket.</h2>
                <h4 class="text-center">{{ __('Please sign in to continue') }}</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <label>{{ __('Email or Username') }}</label>
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Enter email login or username">
                            @error('login')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="*******">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <div class="form-check my-0">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block mt-2">{{ __('Sign In') }}</button>
                </form>
            </div>
            <div class="main-signin-footer mt-3 mg-t-5">
                <p>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                    @endif
                </p>
                <p>{{ __("Don't have an account?") }} <a href="{{ route('register') }}">{{ __('Create an Account') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection