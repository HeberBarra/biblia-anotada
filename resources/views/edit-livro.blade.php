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
    <label>
      Categoria:
      <select name="codigoCategoria">
        @foreach($categorias as $categoria)
          <option value="{{ $categoria->id }}" {{$livro->codigo_categoria == $categoria->id ? 'selected' : ''}}>{{ $categoria->nome }}</option>
        @endforeach
      </select>
    </label>
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
