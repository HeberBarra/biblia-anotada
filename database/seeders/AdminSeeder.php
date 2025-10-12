<?php

namespace Database\Seeders;

use Config;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => config('admin.email'),
            'password' => Hash::make(config('admin.password')),
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
