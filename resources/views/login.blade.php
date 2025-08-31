@extends("layouts.main_layout")

@section("content")
    <div id="form-login">
        <form action="/loginSubmit" method="post">
            @csrf
            <h2>Login</h2>
            <label>Nome de usuário: <input type="text" name="username" required value="{{ old('username') }}"></label>
            @error('username')
            <div class="error-form">{{ $message  }}</div>
            @enderror
            <label>Senha: <input type="password" name="password" required value="{{ old('password') }}"></label>
            @error('password')
            <div class="error-form">{{ $message  }}</div>
            @enderror
            <button type="submit">ENVIAR</button>
        </form>
        <div id="aviso-login">
            <h2>Que bom vê-lo(a)</h2>
            Já possui uma conta? Seja bem-vindo de volta!
            <button type="button" id="mudar-aviso-login">Faça login.</button>
        </div>
    </div>
    <div id="form-cadastro">
        <form action="/registerSubmit" method="post">
            @csrf
            <h2>Registrar-se</h2>
            <label>Nome de usuário: <input type="text" name="username" required value="{{ old('username') }}"></label>
            @error('username')
            <div class="error-form">{{ $message  }}</div>
            @enderror
            <label>E-Mail: <input type="email" name="email" required value="{{ old('email') }}"></label>
            @error('email')
            <div class="error-form">{{ $message  }}</div>
            @enderror
            <label>Senha: <input type="password" name="password" required value="{{ old('password') }}"></label>
            @error('password')
            <div class="error-form">{{ $message  }}</div>
            @enderror
            <label>Confirmar senha: <input type="password" name="confirm-password" required
                                           value="{{ old("confirm-password") }}"></label>
            @error('confirm-password')
            <div class="error-form">{{ $message  }}</div>
            @enderror
            <button type="submit">ENVIAR</button>
        </form>
        <div id="aviso-cadastro">
            <h2>Olá</h2>
            Ainda não possui uma conta?
            <button type="button" id="mudar-aviso-cadastro">Cadastre-se</button>
        </div>
    </div>
@endsection
