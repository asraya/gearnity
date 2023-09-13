@extends('layouts.guest.app')
@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h3 class="auth-title">Log in.</h3>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden"  class="form-control" name="token" value="{{ $request->route('token') }}">
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control" placeholder="Email" name="email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control" placeholder="Password"
                        name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control" placeholder="Confirm Password"
                        name="password_confirmation">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">{{ __('Reset Password') }}</button>
            </form>
            <br>
            <center>
                <a class="btn btn-border btn-google-login" href="{{ route('user.login.google') }}">
                    <img src="{{ asset('web') }}/assets/images/ic_google.svg" class="img-fluid" alt="login google"> Sign In with Google
                </a>
            </center>
            <div class="text-center mt-5 text-lg fs-5">
                <p class="text-gray-600">Don't have an account?<a href="{{ route('register') }}" class="font-bold">Sign up</a></p>
                <p><a class="font-bold" href="{{ route('forgot-password') }}">Forgot password?</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <img class="img-fluid" src="{{ asset('web') }}/assets/img/login.png" alt="">

    </div>

</div>
@endsection
{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
