<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(): View|Application|Factory
    {
        return view("login");
    }

    public function loginSubmit(Request $request): void
    {
        $request->validate(
            [
                "username" => "required",
                "password" => "required|min:8|max:32"
            ]
        );
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
    }

}
