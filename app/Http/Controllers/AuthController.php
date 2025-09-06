<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function loginSubmit(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'username-login' => 'required',
                'password-login' => 'required|min:8|max:32',
            ],
            [
                'username-login.required' => 'O campo de nome de usuário é obrigatório.',
                'password-login.required' => 'O campo de senha é obrigatório.',
                'password-login.min' => 'A senha precisa ter no mínimo :min caracteres.',
                'password-login.max' => 'A senha pode ter no máximo :max caracteres.',
            ],
        );

        $username = trim($request->input('username-login'));
        $password = trim($request->input('password-login'));

        if (
            Auth::attempt([
                'username' => $username,
                'password' => $password,
                fn(Builder $query) => $query->whereNull('deleted_at'),
            ])
        ) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()
            ->withErrors([
                'username-login' => 'Nome de usuário e/ou senha inválidos.',
            ])
            ->onlyInput('username-login');
    }

    public function registerSubmit(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8|max:32',
                'confirm-password' => 'required|min:8|max:32',
            ],
            [
                'username.required' => 'O campo de nome de usuário é obrigatório.',
                'email.required' => 'O campo de e-mail é obrigatório.',
                'email.email' => 'O campo de e-mail deve conter um endereço de e-mail válido',
                'password.required' => 'O campo de senha é obrigatório.',
                'password.min' => 'A senha precisa ter no mínimo :min caracteres.',
                'password.max' => 'A senha pode ter no máximo :max caracteres.',
                'confirm-password.required' => 'O campo de confirmação de senha é obrigatório.',
            ],
        );

        $username = trim($request->input('username'));
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $passwordConfirmation = trim($request->input('confirm-password'));

        if ($password != $passwordConfirmation) {
            return back()
                ->withErrors([
                    'password' => 'As senhas não coincidem',
                ])
                ->onlyInput('password');
        }

        try {
            User::create([
                'username' => $username,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
        } catch (QueryException $e) {
            // Duplicated Unique Key Error
            if ($e->errorInfo[1] == 1062) {
                if (str_contains($e->errorInfo[2], 'username')) {
                    return back()
                        ->withErrors(['username' => 'Este nome de usuário já está sendo utilizado'])
                        ->onlyInput('username');
                }

                return back()
                    ->withErrors(['email' => 'Este e-mail já está sendo utilizado'])
                    ->onlyInput('email');
            }
        }

        return redirect()->intended();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
