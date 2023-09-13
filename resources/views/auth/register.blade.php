 
@extends('layouts.guest.app')
@section('content')
           
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <h3>Sign Up</h3>
            <p class="auth-subtitle mb-5">Input your data to register to our website.</p>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="name">
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    <p> Minimal 8 Digit password </p>
                    <p> Gabungan huruf dan angka </p>
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Buat Akun</button>
            </form>
            <center>
                <a class="btn btn-border btn-google-login" href="{{ route('user.login.google') }}">
                    <img src="{{ asset('web') }}/assets/images/ic_google.svg" class="img-fluid" alt="login google"> Sign Up with Google
                </a>
            </center>
            <div class="text-center mt-5 text-lg fs-4">
                <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold">Log
                        in</a>.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <img class="img-fluid" src="{{ asset('elearning') }}/assets/images/bg/metaverse.png" alt="">

    </div>
</div>
@endsection