<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nota extends Model
{
    protected $table = "tb_nota";

    protected $fillable = ['nome', 'capitulo_livro', 'texto', 'codigo_livro', 'codigo_usuario'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'codigo_usuario');
    }

    public function livro(): BelongsTo
    {
        return $this->belongsTo(Livro::class, 'codigo_livro');
    }

}
