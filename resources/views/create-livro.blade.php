@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('livros.store') }}" method="post">
    @csrf
    <h2>CRIAR NOVO LIVRO</h2>
    <label>Nome: <input type="text" name="name" value="{{ old('name') }}"></label>
    @error('name')
    <div class="error-form">{{$message}}</div>
    @enderror
    <label>Quantidade de capítulos: <input type="number" name="quantidadeCapitulos" step="1"
                                           value="{{ old('quantidadeCapitulos') }}"></label>
    @error('quantidadeCapitulos')
    <div class="error-form">{{$message}}</div>
    @enderror
    <label>
      Categoria:
      <select name="codigoCategoria">
        @foreach($categorias as $categoria)
          <option
            value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
        @endforeach
      </select>
    </label>
    @error('codigoCategoria')
    <div class="error-form">{{$message}}</div>
    @enderror
    <div id="btns-wrapper">
      <button type="button">
        <a href="{{ route('livros.index') }}">CANCELAR</a>
      </button>
      <button type="submit">SALVAR MUDANÇAS</button>
    </div>
  </form>
@endsection
