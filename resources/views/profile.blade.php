@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/profile.scss", "resources/typescript/profile.ts"])
@endsection

@section("content")
  <form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PATCH')
    <h2>Perfil</h2>
    @if(session()->has('success'))
      <script>
        window.alert('{{ session()->get('success') }}');
      </script>
    @endif
    <div id="info-wrapper">
      <label>Nome de Usuário: <input type="text" name="username" value="{{ old('username', $user->username) }}"></label>
      @error('username')
      <div class="error-form">{{ $message }}</div>
      @enderror
      <label>E-Mail: <input type="email" name="email" value="{{ old('email', $user->email) }}"></label>
      @error('email')
      <div class="error-form">{{ $message }}</div>
      @enderror
    </div>
    <fieldset>
      <legend>Alterar senha</legend>
      <label>Senha atual: <input type="password" name="password" minlength="8" maxlength="32"></label>
      @error('password')
      <div class="error-form">{{ $message }}</div>
      @enderror
      <label>Nova senha: <input type="password" name="new-password" minlength="8" maxlength="32"></label>
      @error('new-password')
      <div class="error-form">{{ $message }}</div>
      @enderror
      <label>Confirmar nova senha: <input type="password" name="new-password_confirmation" minlength="8"
                                          maxlength="32"></label>
      @error('confirm-new-password')
      <div class="error-form">{{ $message }}</div>
      @enderror
    </fieldset>
    <div id="buttons-wrapper">
      <button type="button" id="btn-cancelar">
        <a href="/">CANCELAR</a>
      </button>
      <button type="button" id="btn-apagar">APAGAR CONTA</button>
      <button type="submit" id="btn-salvar">SALVAR MUDANÇAS</button>
    </div>
  </form>
@endsection
