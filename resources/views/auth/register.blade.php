@extends('templates.main')

@section('container')
    <div class="col auth">
        <div class="auth-card d-flex flex-column align-items-center">

            @if (session()->has('failed'))
                <div class="alert alert-danger mb-4" role="alert">
                    {{ session('failed') }}
                </div>
            @endif

            <div class="brand-logo"></div>
            <form class="form d-flex flex-column" action="{{ route('register.registration') }}" method="POST">
                @csrf
                <div class="input-wrapper">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username">
                    @error('username')
                        <p class="caption-error">{{ $message }}</p>
                    @enderror
                </div>
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
                <button type="submit">Register</button>
            </form>
            <p>This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a
                    href="#">Terms of Service</a> apply.</p>

            <p class="redirect-link">Already have an account? <a href="{{ route('login') }}">Login
                    Now</a></p>
        </div>
    </div>
@endsection
