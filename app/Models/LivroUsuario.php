<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LivroUsuario extends Model
{
    protected $table = 'tb_livro_usuario';

    protected $fillable = ['codigo_livro', 'codigo_usuario', 'qntd_vezes_lidas'];

}
