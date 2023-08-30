<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    return redirect('/login');
});

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login', 'authentication')->name('login.authentication');

        Route::get('/register', 'register')->name('register');
        Route::post('/register', 'registration')->name('register.registration');

        Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
        Route::post('/forgot-password', 'forgotPasswordPost')->name('forgot-password.post');

        Route::get('/reset-password', 'resetPassword')->name('reset-password');
        Route::post('/reset-password', 'resetPasswordPost')->name('reset-password.post');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
});
