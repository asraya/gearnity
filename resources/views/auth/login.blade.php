@extends('layouts.guest.app')
@section('content')
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h3 class="auth-title">Log in.</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control" placeholder="Email"
                        name="email">
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
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
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
        <img class="img-fluid" src="{{ asset('web') }}/assets/images/bg/metaverse.png" alt="">

    </div>

</div>
@endsection