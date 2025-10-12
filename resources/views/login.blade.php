@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/login.scss", "resources/typescript/login.ts"])
@endsection

@section("content")
  <div id="wrapper-forms">
    <div id="form-login">
      <form action="/loginSubmit" method="post">
        @csrf
        <h2>Login</h2>
        <label>Nome de usuário: <input type="text" name="username-login" required
                                       value="{{ old('username-login') }}"></label>
        @error('username-login')
        <div class="error-form">{{ $message  }}</div>
        @enderror
        <label>Senha: <input type="password" name="password-login" required value="{{ old('password-login') }}"
                             minlength="8"
                             maxlength="32"></label>
        @error('password-login')
        <div class="error-form">{{ $message  }}</div>
        @enderror
        <button type="submit">ENVIAR</button>
      </form>
    </div>
    <div id="form-cadastro">
      <form action="/registerSubmit" method="post">
        @csrf
        <h2>Registrar-se</h2>
        <label>Nome de usuário: <input type="text" name="username" required
                                       value="{{ old('username') }}"></label>
        @error('username')
        <div class="error-form">{{ $message  }}</div>
        @enderror
        <label>E-Mail: <input type="email" name="email" required value="{{ old('email') }}"></label>
        @error('email')
        <div class="error-form">{{ $message  }}</div>
        @enderror
        <label>Senha: <input type="password" name="password" required value="{{ old('password') }}"
                             minlength="8"
                             maxlength="32"></label>
        @error('password')
        <div class="error-form">{{ $message  }}</div>
        @enderror
        <label>Confirmar senha: <input type="password" name="password_confirmation" required
                                       value="{{ old("password_confirmation") }}" minlength="8"
                                       maxlength="32"></label>
        @error('confirm-password')
        <div class="error-form">{{ $message  }}</div>
        @enderror
        <button type="submit">ENVIAR</button>
      </form>
    </div>
    <div id="overlay">
      <div id="aviso-cadastro">
        <h2>Olá!</h2>
        <p>Ainda não possui uma conta?</p>
        <button type="button" id="mudar-aviso-cadastro">CADASTRE-SE</button>
      </div>
      <div id="aviso-login">
        <h2>Que bom vê-lo(a)!</h2>
        <p>Já possui uma conta? Seja bem-vindo de volta!</p>
        <button type="button" id="mudar-aviso-login">LOGIN</button>
      </div>
    </div>
  </div>
@endsection
