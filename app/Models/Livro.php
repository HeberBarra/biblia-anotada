<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livro extends Model
{
    protected $table = 'tb_livro';

    protected $fillable = ['nome', 'qntd_capitulos', 'codigo_categoria'];

    public function categoriaLivro(): BelongsTo
    {
        return $this->belongsTo(CategoriaLivro::class, 'codigo_categoria');
    }

}
