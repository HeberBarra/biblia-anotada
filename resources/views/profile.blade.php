@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/profile.scss", "resources/typescript/profile.ts"])
@endsection

@section("content")
  <form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PATCH')
    <h2>Perfil</h2>
    <x-alert.success />
    <div id="info-wrapper">
      <label>
        Nome de Usuário:
        <input type="text" name="username" value="{{ old('username', $user->username) }}" required>
      </label>
      <x-alert.error input-name="username" />
      <label>E-Mail: <input type="email" name="email" value="{{ old('email', $user->email) }}" required></label>
      <x-alert.error input-name="email" />
    </div>
    <fieldset>
      <legend>Alterar senha</legend>
      <label>Senha atual: <input type="password" name="password" minlength="8" maxlength="32"></label>
      <x-alert.error input-name="password" />
      <label>Nova senha: <input type="password" name="new-password" minlength="8" maxlength="32"></label>
      <x-alert.error input-name="new-password" />
      <label>
        Confirmar nova senha:
        <input type="password" name="new-password_confirmation" minlength="8" maxlength="32">
      </label>
      <x-alert.error input-name="confirm-new-password" />
    </fieldset>
    <div id="buttons-wrapper">
      <button type="button" id="btn-cancelar">
        <a href="/">CANCELAR</a>
      </button>
      @if($user->admin == 0)
        <button type="button" id="btn-apagar">APAGAR CONTA</button>
      @endif
      <button type="submit" id="btn-salvar">SALVAR MUDANÇAS</button>
    </div>
  </form>
@endsection
