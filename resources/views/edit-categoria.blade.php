@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('categorias.update', $categoria) }}" method="post">
    @csrf
    @method('PATCH')
    <h2>EDITAR CATEGORIA</h2>
    @if(session()->has('success'))
      <script>
        window.alert('{{ session()->get('success') }}');
      </script>
    @endif
    <label>
      Nome: <input type="text" name="name" maxlength="256" value="{{old('name', $categoria->nome)}}">
    </label>
    @error('name')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <div id="btns-wrapper">
      <button type="button"><a href="{{ route('categorias.index') }}">CANCELAR</a></button>
      <button type="submit">SALVAR MUDANÇAS</button>
    </div>
  </form>
@endsection
