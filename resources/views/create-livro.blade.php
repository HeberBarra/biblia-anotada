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
    <label>Código categoria: <input type="number" name="codigoCategoria" step="1" value="{{ old('codigoCategoria') }}"></label>
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
