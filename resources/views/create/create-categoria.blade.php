@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('categorias.store' )}}" method="post">
    @csrf
    <h2>CRIAR NOVA CATEGORIA</h2>
    <label>
      Nome: <input type="text" name="name" maxlength="30" value="{{ old('name') }}">
    </label>
    <x-alert.error input-name="name" />
    <x-form.editing-controls cancel-route-name="categorias.index" />
  </form>
@endsection
