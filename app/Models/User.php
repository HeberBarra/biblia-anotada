<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser
{

    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }

}
