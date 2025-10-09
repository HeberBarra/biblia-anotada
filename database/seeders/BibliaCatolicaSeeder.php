<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BibliaCatolicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('livro')->insert([
            [
                ['nome' => 'Gênesis', 'qntd_capitulos' => 50, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Êxodo', 'qntd_capitulos' => 40, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Levítico', 'qntd_capitulos' => 27, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Números', 'qntd_capitulos' => 36, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Deuteronômio', 'qntd_capitulos' => 34, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Josué', 'qntd_capitulos' => 24, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Juízes', 'qntd_capitulos' => 21, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Rute', 'qntd_capitulos' => 4, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Samuel', 'qntd_capitulos' => 31, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Samuel', 'qntd_capitulos' => 24, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Reis', 'qntd_capitulos' => 22, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Reis', 'qntd_capitulos' => 25, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Crônicas', 'qntd_capitulos' => 29, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Crônicas', 'qntd_capitulos' => 36, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Esdras', 'qntd_capitulos' => 10, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Neemias', 'qntd_capitulos' => 13, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Tobias', 'qntd_capitulos' => 14, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Judite', 'qntd_capitulos' => 16, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Ester', 'qntd_capitulos' => 10, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Macabeus', 'qntd_capitulos' => 16, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Macabeus', 'qntd_capitulos' => 15, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Jó', 'qntd_capitulos' => 42, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Salmos', 'qntd_capitulos' => 150, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Provérbios', 'qntd_capitulos' => 31, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Eclesiastes', 'qntd_capitulos' => 12, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Cântico dos Cânticos', 'qntd_capitulos' => 8, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Sabedoria', 'qntd_capitulos' => 19, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Eclesiástico', 'qntd_capitulos' => 51, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Isaías', 'qntd_capitulos' => 66, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Jeremias', 'qntd_capitulos' => 52, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Lamentações de Jeremias', 'qntd_capitulos' => 5, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Baruque', 'qntd_capitulos' => 6, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Ezequiel', 'qntd_capitulos' => 48, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Daniel', 'qntd_capitulos' => 14, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Oséias', 'qntd_capitulos' => 14, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Joel', 'qntd_capitulos' => 3, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Amós', 'qntd_capitulos' => 9, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Obadias', 'qntd_capitulos' => 1, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Jonas', 'qntd_capitulos' => 4, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Miquéias', 'qntd_capitulos' => 7, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Naum', 'qntd_capitulos' => 3, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Habacuque', 'qntd_capitulos' => 3, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Sofonias', 'qntd_capitulos' => 3, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Ageu', 'qntd_capitulos' => 2, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Zacarias', 'qntd_capitulos' => 14, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Malaquias', 'qntd_capitulos' => 4, 'codigo_categoria' => 1, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Mateus', 'qntd_capitulos' => 28, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Marcos', 'qntd_capitulos' => 16, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Lucas', 'qntd_capitulos' => 24, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'João', 'qntd_capitulos' => 21, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Atos dos Apóstolos', 'qntd_capitulos' => 28, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Romanos', 'qntd_capitulos' => 16, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Coríntios', 'qntd_capitulos' => 16, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Coríntios', 'qntd_capitulos' => 13, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Gálatas', 'qntd_capitulos' => 6, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Efésios', 'qntd_capitulos' => 6, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Filipenses', 'qntd_capitulos' => 4, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Colossenses', 'qntd_capitulos' => 4, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Tessalonicenses', 'qntd_capitulos' => 5, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Tessalonicenses', 'qntd_capitulos' => 3, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Timóteo', 'qntd_capitulos' => 6, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Timóteo', 'qntd_capitulos' => 4, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Tito', 'qntd_capitulos' => 3, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Filemom', 'qntd_capitulos' => 1, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Hebreus', 'qntd_capitulos' => 13, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Tiago', 'qntd_capitulos' => 5, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 Pedro', 'qntd_capitulos' => 5, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 Pedro', 'qntd_capitulos' => 3, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '1 João', 'qntd_capitulos' => 5, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '2 João', 'qntd_capitulos' => 1, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => '3 João', 'qntd_capitulos' => 1, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Judas', 'qntd_capitulos' => 1, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Apocalipse', 'qntd_capitulos' => 22, 'codigo_categoria' => 2, 'created_at' => now(), 'updated_at' => now()]
            ]
        ]);
    }
}
