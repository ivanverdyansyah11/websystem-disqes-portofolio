@extends('templates.main')

@section('container')
    <div class="col auth">
        <div class="auth-card d-flex flex-column align-items-center">
            <div class="brand-logo"></div>
            <form class="form d-flex flex-column">
                @csrf
                <div class="input-wrapper">
                    <label for="email">Email</label>
                    <input type="email" id="email">
                    @error('email')
                        <p class="caption-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-wrapper">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                    @error('password')
                        <p class="caption-error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-wrapper">
                    <label for="password_verify">Password Verification</label>
                    <input type="password" id="password_verify">
                    @error('password_verify')
                        <p class="caption-error">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit">Reset Password</button>
            </form>
            <p>This site is protected by reCAPTCHA and the Google <a href="#">Privacy Policy</a> and <a
                    href="#">Terms of Service</a> apply.</p>

            {{-- <p class="redirect-link">Remember your account? <a href="{{ route('login') }}">Login
                    Now</a></p> --}}
        </div>
    </div>
@endsection
