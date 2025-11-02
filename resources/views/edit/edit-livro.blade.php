@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('livros.update', $livro) }}" method="post">
    @csrf
    @method('PATCH')
    <h2>EDITAR LIVRO</h2>
    <x-alert.success />
    <label>Nome: <input type="text" name="name" value="{{ old('name', $livro->nome) }}" required maxlength="50"></label>
    <x-alert.error input-name="name" />
    <label>
      Quantidade de capítulos:
      <input type="number" name="quantidadeCapitulos"
             value="{{ old('quantidadeCapitulos', $livro->qntd_capitulos) }}" required>
    </label>
    <x-alert.error input-name="quantidadeCapitulos" />
    <label>
      Categoria:
      <select name="codigoCategoria" required>
        @foreach($categorias as $categoria)
          <option value="{{ $categoria->id }}" {{ $livro->codigo_categoria == $categoria->id ? 'selected' : '' }}>
            {{ $categoria->nome }}
          </option>
        @endforeach
      </select>
    </label>
    <x-alert.error input-name="codigoCategoria" />
    <x-form.editing-controls cancel-route-name="livros.index" />
  </form>
@endsection
