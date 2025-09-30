<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'nullable|min:8|max:32|current_password:',
                'new-password' => 'nullable|min:8|max:32',
                'confirm-new-password' => 'nullable|min:8|max:32'
            ],
            [
                'username.required' => 'O campo de nome de usuário não pode ser deixado em branco',
                'email.required' => 'O campo de e-mail não pode ser ser deixado em branco',
                'email.email' => 'O campo de e-mail deve conter um e-mail válido',
                'password.min' => 'A senha precisa ter no mínimo :min caracteres',
                'password.max' => 'A senha precisa ter no máximo :max caracteres',
                'password.current_password' => 'A senha atual não bate com o registrado',
                'new-password.min' => 'A nova senha precisa ter no mínimo :min caracteres',
                'new-password.max' => 'A nova senha precisa ter no máximo :max caracteres',
                'confirm-new-password.min' => 'A confirmação da nova senha precisa ter no mínimo :min caracteres',
                'confirm-new-password.max' => 'A confirmação da nova senha precisa ter no máximo :max caracteres',
            ]
        );

        $username = trim($request->input('username'));
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $newPassword = trim($request->input('new-password'));
        $confirmNewPassword = trim($request->input('confirm-new-password'));

        if (empty($password) && (!empty($newPassword) || !empty($confirmNewPassword))) {
            return back()->withErrors(['password' => 'O campo de senha atual é obrigatório para alterar a senha'])->withInput();
        }

        if ($newPassword != $confirmNewPassword) {
            return back()->withErrors(['new-password' => 'As novas senhas não coincidem'])->withInput();
        }

        if (!empty($newPassword)) {
            $password = $newPassword;
        }

        $novosDados = [
            'username' => $username,
            'email' => $email,
            'password' => Hash::make($password)
        ];

        $user->update($novosDados);
        $user->save();

        return redirect()->route('profile')->with('success', 'Dados Atualizados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function destroyLoggedUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user->delete()) {
            return response("No Content", 204);
        }

        return response("User Not Found", 404);
    }

}
