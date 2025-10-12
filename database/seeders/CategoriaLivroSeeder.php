<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaLivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_categoria_livro')->insert([
            [
                'nome' => 'Antigo Testamento',
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'nome' => 'Novo Testamento',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
