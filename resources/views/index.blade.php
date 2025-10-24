@php use App\Models\User; @endphp
@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/index.scss"])
@endsection

@section("content")
  <header>
    <h1>Bíblia Anotada</h1>
    <button>
      <a href="/logout">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-log-out">
          <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
          <polyline points="16 17 21 12 16 7"></polyline>
          <line x1="21" y1="12" x2="9" y2="12"></line>
        </svg>
      </a>
    </button>
  </header>
  <main>
    @if(User::find(Auth::user()->id)->admin == 1)
      <button><a href="/categorias">CATEGORIAS</a></button>
      <button><a href="/livros">LIVROS</a></button>
    @endif
    <button><a href="/users">USUÁRIOS</a></button>
    <button><a href="/profile">PERFIL</a></button>
  </main>
@endsection
