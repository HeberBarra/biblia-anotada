@php use App\Models\User; @endphp
@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/index.scss"])
@endsection

@section("content")
  <main>
    <h1>Bíblia Anotada</h1>
    @if(User::find(Auth::user()->id)->admin == 1)
      <button><a href="/categorias">CATEGORIAS</a></button>
      <button><a href="/livros">LIVROS</a></button>
    @endif
    <button><a href="/users">USUÁRIOS</a></button>
    <button><a href="/profile">PERFIL</a></button>
    <button><a href="/logout">LOGOUT</a></button>
  </main>
@endsection
