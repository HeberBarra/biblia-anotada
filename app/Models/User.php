<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser
{
    use SoftDeletes;

    protected $fillable = ['username', 'email', 'password'];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
