<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'user01',
                    'email' => 'user01@example.com',
                    'password' => Hash::make('abcdefgh'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'username' => 'user02',
                    'email' => 'user02@example.com',
                    'password' => Hash::make('abcdefgh'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'username' => 'user03',
                    'email' => 'user03@example.com',
                    'password' => Hash::make('abcdefgh'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'username' => 'user04',
                    'email' => 'user04@example.com',
                    'password' => Hash::make('abcdefgh'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'username' => 'user05',
                    'email' => 'user05@example.com',
                    'password' => Hash::make('abcdefgh'),
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            ]
        );
    }
}
