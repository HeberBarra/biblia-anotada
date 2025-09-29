<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::get('/', function () {
            return view('index');
        });
        Route::get('/profile', function () {
            return view('profile');
        });
    }
);

/* AuthController Routes */

Route::middleware(['guest'])->group(
    function () {
        Route::get('login', [AuthController::class, 'login'])->name('login');
        Route::post('loginSubmit', [AuthController::class, 'loginSubmit'])->name('login.submit');
        Route::post('registerSubmit', [AuthController::class, 'registerSubmit'])->name('register.submit');
    }
);

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
