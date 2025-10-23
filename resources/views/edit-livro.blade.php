@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('livros.update', $livro) }}" method="post">
    @csrf
    @method('PATCH')
    <h2>EDITAR LIVRO</h2>
    @if(session()->has('success'))
      <script>
        window.alert('{{ session()->get('success') }}');
      </script>
    @endif
    <label>Nome: <input type="text" name="name" value="{{ old('name', $livro->nome) }}"></label>
    @error('name')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>Quantidade de capítulos <input type="number" name="quantidadeCapitulos"
                                          value="{{ old('quantidadeCapitulos', $livro->qntd_capitulos) }}"></label>
    @error('quantidadeCapitulos')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>Código categoria: <input type="number" name="codigoCategoria"
                                    value="{{ old('codigoCategoria', $livro->codigo_categoria) }}"></label>
    @error('codigoCategoria')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <div id="btns-wrapper">
      <button type="button">
        <a href="{{route('livros.index')}}">CANCELAR</a>
      </button>
      <button type="submit">SALVAR MUDANÇAS</button>
    </div>
  </form>
@endsection
