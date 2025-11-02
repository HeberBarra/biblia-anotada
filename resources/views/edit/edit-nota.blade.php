@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('notas.update', $nota) }}" method="post">
    @csrf
    @method('PATCH')
    <x-alert.success />
    <label>
      Nome: <input type="text" name="name" maxlength="30" value="{{ old('name', $nota->nome) }}" required>
    </label>
    <x-alert.error input-name="name" />
    <label>
      Texto: <textarea name="note-text" maxlength="256" required>{{ old('text-note', $nota->texto) }}</textarea>
    </label>
    <x-alert.error input-name="note-text" />
    <label>
      Capítulo:
      <select name="chapter-number" required>
        @for($i = 1; $i <= $quantidadeCapitulos; $i++ )
          <option value="{{ $i }}" {{ $nota->capitulo_livro == $i ? 'selected' : '' }}>Capítulo - {{ $i }}</option>
        @endfor
      </select>
    </label>
    <x-alert.error input-name="chapter-number" />
    <input value="{{ $nota->codigo_usuario }}" style="display: none" name="user-id">
    <input value="{{ $nota->codigo_livro }}" style="display: none" name="book-id">
    <div id="btns-wrapper">
      <button type="button">
        <a href="{{ route('user.notes', $nota->codigo_usuario) }}">CANCELAR</a>
      </button>
      <button type="submit">
        SALVAR
      </button>
    </div>
  </form>
@endsection
