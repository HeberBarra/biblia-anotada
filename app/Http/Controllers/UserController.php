<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoggedInUpdateRequest;
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
        $users = User::withoutTrashed()->get();
        return view('users', compact('users'));
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
    public function update(UserLoggedInUpdateRequest $request, User $user)
    {
        $username = trim($request->input('username'));
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $newPassword = trim($request->input('new-password'));
        $confirmNewPassword = trim($request->input('confirm-new-password'));

        if (empty($password) && (!empty($newPassword) || !empty($confirmNewPassword))) {
            return back()->withErrors(['password' => 'O campo de senha atual é obrigatório para alterar a senha'])->withInput();
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
        if ($user->delete()) {
            return response("No Content", 204);
        }

        return response("User Not Found", 404);
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
