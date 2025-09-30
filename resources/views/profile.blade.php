@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/profile.scss", "resources/typescript/profile.ts"])
@endsection

@section("content")
  <main>
    <h2>Perfil</h2>
    <div id="info-wrapper">
      <label>Nome de Usuário: <input type="text" name="username" value="{{ Auth::user()->username }}"></label>
      <label>E-Mail: <input type="email" name="email" value="{{ Auth::user()->email }}"></label>
    </div>
    <fieldset>
      <legend>Alterar senha</legend>
      <label>Senha atual: <input type="password" name="current-password" minlength="8" maxlength="32"></label>
      <label>Nova senha: <input type="password" name="new-password" minlength="8" maxlength="32"></label>
      <label>Confirmar nova senha: <input type="password" name="confirm-new-password" minlength="8"
                                          maxlength="32"></label>
    </fieldset>
    <div id="buttons-wrapper">
      <button type="button" id="btn-cancelar">
        <a href="/">CANCELAR</a>
      </button>
      <button type="button" id="btn-apagar">APAGAR CONTA</button>
      <button type="button">SALVAR MUDANÇAS</button>
    </div>
  </main>
@endsection
