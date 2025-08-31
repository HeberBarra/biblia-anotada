<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get("login", [AuthController::class, "login"])->name("login");
Route::post("loginSubmit", [AuthController::class, "loginSubmit"])->name("login.submit");
Route::post("registerSubmit", [AuthController::class, "registerSubmit"])->name("register.submit");
