<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(): View
    {
        return view("login");
    }

    public function loginSubmit(Request $request): RedirectResponse
    {
        $request->validate(
            [
                "username" => "required",
                "password" => "required|min:8|max:32"
            ]
        // TODO: Adicionar mensagens de erro traduzidas
        );

        $username = trim($request->input('username'));
        $password = trim($request->input('password'));


        if (Auth::attempt(
            [
                'username' => $username,
                'password' => $password,
                fn(Builder $query) => $query->whereNull('deleted_at')
            ])
        ) {
            $request->session()->regenerate();

            return redirect()->intended('index');
        }

        return back()->withErrors([
            'username' => 'Nome de usuário e/ou senha inválidos.'
        ])->onlyInput('username');
    }

    public function registerSubmit(Request $request): void
    {
        $request->validate(
            [
                "username" => "required",
                "email" => "required|email",
                "password" => "required|min:8|max:32",
                "confirm-password" => "required|min:8|max:32"
            ]
        );

        // TODO: Fazer sistema de cadastro
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

}
