<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Mail\ForgotPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth as Authentication;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authentication(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4|max:20',
        ]);

        if (auth()->attempt($credentials, $request->remember_me)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        } else {
            return redirect(route('login'))->with('failed', "Email or Password Does't Match!");
        }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    public function registration(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:20',
            'email' => 'required|email|unique:email',
            'password' => 'required|string|min:4|max:20',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'owner';

        $auth = Auth::create($validatedData);

        if ($auth) {
            return redirect(route('login'))->with('success', 'Successfully Register Account!');
        } else {
            return redirect(route('register'))->with('failed', 'Failed Register Account!');
        }
    }

    public function forgotPassword()
    {
        return view('auth.forgot', [
            'title' => 'Forgot Password',
        ]);
    }

    public function submitForgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:auths',
        ]);

        $token = Str::random(64);

        PasswordReset::create([
            'email' => $request->email,
            'token' => $token,
        ]);

        Mail::to($request->email)->send(new ForgotPasswordMail($token));

        return back()->with('success', 'We have e-mailed your password reset link!');
    }

    public function resetPassword($token)
    {
        $user = PasswordReset::where('token', $token)->first();
        if ($user) {
            return view('auth.reset', [
                'title' => 'Reset Password',
                'token' => $token,
                'user' => $user,
            ]);
        } else {
            return redirect()->route('forgot-password')->with('danger', 'Token Invalid Can"t to Reset Password!');
        }
    }

    public function logout(Request $request)
    {
        Authentication::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'))->with('success', 'Successfully Logout Account!');
    }
}
