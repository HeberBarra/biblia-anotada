<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\CategoriaLivro;
use App\Models\Livro;
use Illuminate\Database\QueryException;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::with('categoriaLivro')->get();
        return view('livros', compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = CategoriaLivro::all();
        return view('create-livro', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LivroRequest $request)
    {
        $nome = trim($request->get('name'));
        $quantidadeCapitulos = trim($request->get('quantidadeCapitulos'));
        $codigoCategoria = trim($request->get('codigoCategoria'));

        try {
            Livro::create(
                [
                    'nome' => $nome,
                    'qntd_capitulos' => $quantidadeCapitulos,
                    'codigo_categoria' => $codigoCategoria
                ]
            );
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1452) {
                return back()->withErrors(['codigoCategoria' => 'Categoria inexistente'])->withInput();
            }

            if ($e->errorInfo[1] == 1062) {
                return back()
                    ->withErrors(['nome' => 'Este nome já está sendo usado'])
                    ->withInput();
            }
        }

        return redirect()->route('livros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        $categorias = CategoriaLivro::all();
        return view('edit-livro', compact('livro', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LivroRequest $request, Livro $livro)
    {
        $nome = trim($request->get('name'));
        $quantidadeCapitulos = trim($request->get('quantidadeCapitulos'));
        $codigoCategoria = trim($request->get('codigoCategoria'));

        try {
            $livro->update(
                [
                    'nome' => $nome,
                    'qntd_capitulos' => $quantidadeCapitulos,
                    'codigo_categoria' => $codigoCategoria
                ]
            );
            $livro->save();
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1452) {
                return back()->withErrors(['codigoCategoria' => 'Categoria inexistente'])->withInput();
            }

            if ($e->errorInfo[1] == 1062) {
                return back()
                    ->withErrors(['nome' => 'Este nome já está sendo usado'])
                    ->withInput();
            }
        }

        return redirect()->route('livros.edit', $livro)->with('success', 'Dados atualizados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        if ($livro->delete()) {
            return redirect()->back()->with('success', 'Livro Deletado');
        }

        return redirect()->back();
    }
}
