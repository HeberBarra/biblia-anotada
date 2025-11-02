<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaLivroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\LivroUsuarioController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckUserAdminMiddleware;
use App\Models\CategoriaLivro;
use App\Models\Livro;
use App\Models\LivroUsuario;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::get('/', function () {
            $categorias = CategoriaLivro::all();
            $leituras = [];
            $livrosFiltrados = [];

            foreach ($categorias as $categoria) {
                $livros = Livro::where('codigo_categoria', $categoria->id)->get();
                $livrosFiltrados[$categoria->id] = $livros;

                foreach ($livros as $livro) {
                    $livroUsuarioQuery = LivroUsuario::where('codigo_livro', $livro->id)
                        ->where('codigo_usuario', Auth::user()->id);

                    if ($livroUsuarioQuery->count() == 0) {
                        $leituras[$livro->id] = 0;
                    } else {
                        $leituras[$livro->id] = $livroUsuarioQuery->first()->qntd_vezes_lidas;
                    }
                }
            }

            return view('index', compact('categorias', 'livrosFiltrados', 'leituras'));
        })->name('index');

        Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        /* UserController Routes */
        Route::resource('users', UserController::class);
        Route::get('/user-current-delete', [UserController::class, 'destroyLoggedUser'])->name('user-current-delete');

        /* NotaController routes */
        Route::resource('notas', NotaController::class);
        Route::get('/user-notes/{codigoLivro}', [NotaController::class, 'indexUserNotes'])->name('user.notes');

        /* LivroUsuarioController route */
        Route::get('/incrementar/{codigoLivro}', [LivroUsuarioController::class, 'incrementar'])->name('contagem.incrementar');
        Route::get('/decrementar/{codigoLivro}', [LivroUsuarioController::class, 'decrementar'])->name('contagem.decrementar');
        Route::get('/reiniciar/{codigoLivro}', [LivroUsuarioController::class, 'reiniciar'])->name('contagem.reiniciar');
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
        Route::resource('categorias', CategoriaLivroController::class);
        Route::resource('livros', LivroController::class);
        Route::resource('notas', NotaController::class)->only(['index']);
        Route::resource('users', UserController::class)->except(['index', 'update']);
        Route::patch('adminUpdate/{user}', [UserController::class, 'adminUpdate'])->name('admin.update');
    }
);
