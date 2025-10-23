@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{route('users.store')}}" method="post">
    @csrf
    <h1>Criar Novo Usuário</h1>
    <label>Username: <input type="text" name="username" required></label>
    @error('username')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>E-Mail: <input type="email" name="email" required></label>
    @error('email')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>Senha: <input type="password" name="password" required value="{{ old('password') }}" minlength="8"
                         maxlength="32"></label>
    @error('password')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>Confirmar senha: <input type="password" name="password_confirmation" required
                                   value="{{ old('password_confirmation') }}" minlength="8" maxlength="32"></label>
    @error('password_confirmation')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <div id="btns-wrapper">
      <button type="button"><a href="{{ route('users.index') }}">CANCELAR</a></button>
      <button type="submit">CRIAR</button>
    </div>
  </form>
@endsection
