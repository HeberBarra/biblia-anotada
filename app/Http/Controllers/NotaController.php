<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotaRequest;
use App\Models\Livro;
use App\Models\Nota;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function indexUserNotes(int $codigoLivro)
    {
        $quantidadeCapitulos = Livro::find($codigoLivro)->qntd_capitulos;
        $notas = Nota::where('codigo_usuario', Auth::user()->id)->where('codigo_livro', $codigoLivro)->get();
        return view('list.notes-user', compact('notas', 'quantidadeCapitulos', 'codigoLivro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotaRequest $request)
    {
        $nome = trim($request->get('name'));
        $texto = trim($request->get('note-text'));
        $codigoCapitulo = trim($request->get('chapter-number'));
        $codigoUsuario = trim($request->get('user-id'));
        $codigoLivro = trim($request->get('book-id'));

        try {
            Nota::create(
                [
                    'nome' => $nome,
                    'texto' => $texto,
                    'capitulo_livro' => $codigoCapitulo,
                    'codigo_usuario' => $codigoUsuario,
                    'codigo_livro' => $codigoLivro
                ]
            );
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1452) {
                if (str_contains($e->errorInfo[2], 'livro')) {
                    return back()->withErrors(['book-id' => 'Livro inexistente'])->withInput();
                }

                return back()->withErrors(['user-id' => 'Usuário inexistente'])->withInput();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
