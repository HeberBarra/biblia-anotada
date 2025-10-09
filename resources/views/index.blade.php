@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/index.scss", "resources/typescript/index.ts"])
@endsection

@section("content")
  <main>
    <h1>Bíblia Anotada</h1>
    <button><a href="/users">USUÁRIOS</a></button>
    <button><a href="/profile">PERFIL</a></button>
    <button><a href="/logout">LOGOUT</a></button>
  </main>
@endsection
