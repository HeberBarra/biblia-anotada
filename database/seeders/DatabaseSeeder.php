<?php

namespace Database\Seeders;

use Config;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([AdminSeeder::class, CategoriaLivroSeeder::class]);

        if (config('admin.tipo-biblia') == 'católica') {
            $this->call(BibliaCatolicaSeeder::class);
        } else {
            $this->call(BibliaEvangelicaSeeder::class);
        }

    }
}
