<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\LivroUsuario;
use Illuminate\Support\Facades\Auth;

class LivroUsuarioController extends Controller
{

    public function incrementar(int $codigoLivro)
    {
        $codigoUsuario = Auth::user()->id;

        $livroUsuarioQuery = LivroUsuario::where('codigo_usuario', $codigoUsuario)->where('codigo_livro', $codigoLivro);

        if ($livroUsuarioQuery->count() == 0) {
            LivroUsuario::create(
                [
                    'codigo_livro' => $codigoLivro,
                    'codigo_usuario' => $codigoUsuario,
                    'qntd_vezes_lidas' => 1
                ]
            );

            return redirect()->back();
        }

        $livroUsuarioQuery->update(
            ['qntd_vezes_lidas' => $livroUsuarioQuery->first()->qntd_vezes_lidas + 1]
        );

        return redirect()->back();
    }

    public function decrementar(int $codigoLivro)
    {
        $codigoUsuario = Auth::user()->id;

        $livroUsuarioQuery = LivroUsuario::where('codigo_usuario', $codigoUsuario)->where('codigo_livro', $codigoLivro);

        if ($livroUsuarioQuery->count() == 0 || $livroUsuarioQuery->first()->qntd_vezes_lidas == 0) {
            return redirect()-> back();
        }

        $livroUsuarioQuery->update(
            [
                'qntd_vezes_lidas' => $livroUsuarioQuery->first()->qntd_vezes_lidas - 1
            ]
        );

        return redirect()-> back();
    }

    public function reiniciar(int $codigoLivro)
    {
        $codigoUsuario = Auth::user()->id;

        if (LivroUsuario::where('codigo_usuario', $codigoUsuario)->where('codigo_livro', $codigoLivro)->delete()) {
            return redirect()->back()->with('success', 'Contagem reiniciada com sucesso');
        };

        return redirect()->back();
    }

    public static function contagemTotal(): int
    {
        $codigoUsuario = Auth::user()->id;
        $livroUsuarioQuery = LivroUsuario::where('codigo_usuario', $codigoUsuario);
        $quantidadeLivros = Livro::all()->count();

        if ($livroUsuarioQuery->count() != $quantidadeLivros) {
            return 0;
        }

        return $livroUsuarioQuery->min('qntd_vezes_lidas');
    }

}
