<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::get('/', function () {
            return view('index');
        })->name('index');
        Route::get('/profile', function () {
            $user = Auth::user();
            return view('profile', compact('user'));
        })->name('profile');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        /* UserController Routes */
        Route::resource('users', UserController::class);
        Route::get('/user-current-delete', [UserController::class, 'destroyLoggedUser'])->name('user-current-delete');
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
