<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaLivroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::get('/', function () {
            return view('index');
        })->name('index');

        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        /* UserController Routes */
        Route::resource('users', UserController::class);
        Route::get('/user-current-delete', [UserController::class, 'destroyLoggedUser'])->name('user-current-delete');

        /* Controllers routes */
        Route::resource('livros', LivroController::class);
        Route::resource('categorias', CategoriaLivroController::class);
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

Route::middleware([CheckUserAdminMiddleware::class])->group(
    function () {
        Route::resource('users', UserController::class)->except(['index', 'update']);
    }
);
