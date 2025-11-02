<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaLivroRequest;
use App\Models\CategoriaLivro;
use Illuminate\Database\QueryException;

class CategoriaLivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = CategoriaLivro::all();
        return view('list.categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.create-categoria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaLivroRequest $request)
    {
        $name = trim($request->get('name'));

        try {
            CategoriaLivro::create(['nome' => $name]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                return back()
                    ->withErrors(['nome' => 'Este nome já está sendo usado'])
                    ->withInput();
            }
        }

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoriaLivro $categoriaLivro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoriaLivro $categoria)
    {
        return view('edit.edit-categoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaLivroRequest $request, CategoriaLivro $categoria)
    {
        $nome = trim($request->get('name'));
        $categoria->update([
            'nome' => $nome
        ]);
        $categoria->save();

        return redirect()->route('categorias.edit', $categoria)->with('success', 'Dados Atualizados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoriaLivro $categoria)
    {
        if ($categoria->delete()) {
            return redirect()->back()->with('success', 'Categoria Deletada');
        }

        return redirect()->back();
    }
}
