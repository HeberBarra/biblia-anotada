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
      Nome <input type="text" name="name" maxlength="30" value="{{ old('name', $nota->nome) }}">
    </label>
    <x-alert.error input-name="name" />
  </form>
@endsection
