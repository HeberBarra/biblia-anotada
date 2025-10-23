@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss'])
@endsection

@section('content')
  <form action="{{ route('admin.update', $user) }}" method="post">
    @csrf
    @method('PATCH')
    <h2>EDITAR USUÁRIO</h2>
    @if(session()->has('success'))
      <script>
        window.alert('{{ session()->get('success') }}');
      </script>
    @endif
    <label>Nome de usuário: <input type="text" name="username" value="{{ old('username', $user->username) }}"></label>
    @error('username')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>E-Mail: <input type="email" name="email" value="{{ old('email', $user->email) }}"></label>
    @error('email')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>Admin: <input type="checkbox" name="admin" {{ $user->admin == 1 ? 'checked' : '' }}></label>
    <label>Nova senha: <input type="password" name="new_password" value="{{ old('new_password') }}"></label>
    @error('new_password')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>Confirmar nova senha: <input type="password" name="new_password_confirmation"
                                        value="{{ old('password') }}"></label>
    <div id="btns-wrapper">
      <button type="button" id="btn-cancelar"><a href="{{ route('users.index') }}">CANCELAR</a></button>
      @if($user->admin == 0)
        <button type="button" id="btn-apagar">APAGAR USUÁRIO</button>
      @endif
      <button type="submit" id="btn-salvar">SALVAR MUDANÇAS</button>
    </div>
  </form>
@endsection
