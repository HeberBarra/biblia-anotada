@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{route('users.store')}}" method="post">
    @csrf
    <h2>CRIAR NOVO USUÁRIO</h2>
    <label>Username: <input type="text" name="username" required value="{{ old('username') }}"></label>
    <x-alert.error input-name="username" />
    <label>E-Mail: <input type="email" name="email" required value="{{ old('email') }}"></label>
    <x-alert.error input-name="email" />
    <label>
      Senha:
      <input type="password" name="password" required value="{{ old('password') }}" minlength="8" maxlength="32">
    </label>
    <x-alert.error input-name="password" />
    <label>
      Confirmar senha:
      <input type="password" name="password_confirmation" required value="{{ old('password_confirmation') }}"
             minlength="8" maxlength="32">
    </label>
    <x-alert.error input-name="password_confirmation" />
    <x-form.editing-controls cancel-route-name="users.index" />
  </form>
@endsection
