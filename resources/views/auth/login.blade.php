@extends('templates.main')

@section('container')
    <div class="col auth">
        <div class="auth-card d-flex flex-column align-items-center">

            @if (session()->has('success'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('failed'))
                <div class="alert alert-danger mb-4" role="alert">
                    {{ session('failed') }}
                </div>
            @endif

            <div class="brand-logo"></div>
            <form class="form d-flex flex-column" action="{{ route('login.authentication') }}" method="POST">
                @csrf
                <div class="input-wrapper">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    @error('email')
                        <p class="caption-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    @error('password')
                        <p class="caption-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="wrapper d-flex align-items-center justify-content-between">
                    <div class="checkbox-wrapper d-flex align-items-center">
                        <input type="checkbox" id="rememberMe" name="remember_me">
                        <label for="rememberMe">Remember me</label>
                    </div>
                    <a href="{{ route('forgot-password') }}" class="forgot-link">Forgot Password</a>
                </div>
                <button type="submit">Login</button>
            </form>
            <p>This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a
                    href="#">Terms of Service</a> apply.</p>

            <p class="redirect-link">Don't have an account? <a href="{{ route('register') }}">Register
                    Now</a></p>
        </div>
    </div>
@endsection
