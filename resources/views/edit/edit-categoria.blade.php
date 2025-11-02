@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('categorias.update', $categoria) }}" method="post">
    @csrf
    @method('PATCH')
    <h2>EDITAR CATEGORIA</h2>
    <x-alert.success />
    <label>
      Nome: <input type="text" name="name" maxlength="30" value="{{ old('name', $categoria->nome)}} ">
    </label>
    <x-alert.error input-name="name" />
    <x-form.editing-controls cancel-route-name="categorias.index" />
  </form>
@endsection
