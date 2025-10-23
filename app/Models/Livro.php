<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $table = 'tb_livro';

    protected $fillable = ['nome', 'qntd_capitulos', 'codigo_categoria'];

}
