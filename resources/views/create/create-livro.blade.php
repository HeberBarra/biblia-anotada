@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('livros.store') }}" method="post">
    @csrf
    <h2>CRIAR NOVO LIVRO</h2>
    <label>Nome: <input type="text" maxlength="50" name="name" value="{{ old('name') }}"></label>
    <x-alert.error input-name="name" />
    <label>
      Quantidade de capítulos:
      <input type="number" name="quantidadeCapitulos" step="1" value="{{ old('quantidadeCapitulos') }}">
    </label>
    <x-alert.error input-name="quantidadeCapitulos" />
    <label>
      Categoria:
      <select name="codigoCategoria">
        @foreach($categorias as $categoria)
          <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach
      </select>
    </label>
    <x-alert.error input-name="codigoCategoria" />
    <x-form.editing-controls cancel-route-name="livros.index" />
  </form>
@endsection
