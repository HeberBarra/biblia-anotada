<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoggedInUpdateRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
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
        $is_admin = User::find(Auth::user()->id)->admin == 1;

        if ($is_admin) {
            $users = User::withTrashed()->get();
        } else {
            $users = User::withoutTrashed()->get();
        }

        return view('users', compact('users', 'is_admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegisterRequest $request)
    {
        try {
            User::create([
                'username' => trim($request->input('username')),
                'email' => trim($request->input('email')),
                'password' => Hash::make(trim($request->input('password'))),
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

        return redirect()->route('users.index');
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
        return view('edit-user', compact('user'));
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
        if ($user->admin == 1) {
            return redirect()->back();
        }

        if ($user->delete()) {
            return redirect()->back()->with('success', 'Usuário deletado');
        }

        return redirect()->back();
    }

    public function destroyLoggedUser(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if ($user->admin == 1) {
            return response("Can't deleted logged in admin user", 400);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if ($user->delete()) {
            return response("No Content", 204);
        }

        return response("User Not Found", 404);
    }

}
