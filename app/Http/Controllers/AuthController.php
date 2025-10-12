<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
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

    public function loginSubmit(UserLoginRequest $request): RedirectResponse
    {
        $username = trim($request->input('username-login'));
        $password = trim($request->input('password-login'));

        if (
            Auth::attempt([
                'username' => $username,
                'password' => $password,
                fn (Builder $query) => $query->whereNull('deleted_at'),
            ])
        ) {
            $request->session()->regenerate();

            return redirect()->intended();
        }

        return back()
            ->withErrors([
                'username-login' => 'Nome de usuário e/ou senha inválidos.',
            ])
            ->withInput();
    }

    public function registerSubmit(UserRegisterRequest $request): RedirectResponse
    {
        $username = trim($request->input('username'));
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));

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
                        ->withInput();
                }

                return back()
                    ->withErrors(['email' => 'Este e-mail já está sendo utilizado'])
                    ->withInput();
            }
        }

        Auth::attempt([
            'username' => $username,
            'password' => $password
        ]);
        $request->session()->regenerate();

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
