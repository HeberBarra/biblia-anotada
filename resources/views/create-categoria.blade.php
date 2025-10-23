@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('categorias.store' )}}" method="post">
    @csrf
    <h2>CRIAR NOVA CATEGORIA</h2>
    <label>
      Nome: <input type="text" name="name" maxlength="256">
    </label>
    @error('name')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <div id="btns-wrapper">
      <button type="submit">
        <a href="{{route('categorias.index') }}">CANCELAR</a>
      </button>
      <button type="submit">SALVAR</button>
    </div>
  </form>
@endsection
