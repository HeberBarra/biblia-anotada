@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/table.scss'])
@endsection

@section('content')
  <main>
    <h2>LIVROS</h2>
    <table></table>
    <div id="wrapper-buttons">
      <button type="button">
        <a href="{{ route('index') }}">VOLTAR</a>
      </button>
      <button>
        <a href="{{ route('livros.create') }}">CRIAR NOVO LIVRO</a>
      </button>
    </div>
  </main>
@endsection
