@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/table.scss'])
@endsection

@section('content')
  <main>
    <h2>LIVROS</h2>
    @if(session()->has('success'))
      <script>
        window.alert('{{ session()->get('success') }}');
      </script>
    @endif
    <table>
      <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
        <th scope="col">QUANTIDADE DE CAPÍTULOS</th>
        <th scope="col">CATEGORIA</th>
        <th scope="col">EDITAR</th>
        <th scope="col">DELETAR</th>
      </tr>
      </thead>
      <body>
      @foreach($livros as $livro)
        <tr>
          <th scope="row">{{ $livro->id }}</th>
          <td>{{ $livro->nome }}</td>
          <td>{{ $livro->qntd_capitulos }}</td>
          <td>{{ $livro->categoriaLivro->nome}}</td>
          <td class="td-btn">
            <form action="{{ route('livros.edit', $livro) }}" method="get">
              <button style="background: none; border: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-edit">
                  <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                  <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
              </button>
            </form>
          </td>
          <td class="td-btn">
            <form action="{{ route('livros.destroy', $livro) }}" method="post">
              @csrf
              @method('DELETE')
              <button style="background: none; border: none">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-trash-2">
                  <polyline points="3 6 5 6 21 6"></polyline>
                  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                  <line x1="10" y1="11" x2="10" y2="17"></line>
                  <line x1="14" y1="11" x2="14" y2="17"></line>
                </svg>
              </button>
            </form>
          </td>
        </tr>
      @endforeach
      </body>
    </table>
    <div id="wrapper-buttons">
      <button type="button">
        <a href="{{ route('index') }}">VOLTAR</a>
      </button>
      <button>
        <a href="{{ route('livros.create') }}">CRIAR NOVO LIVRO</a>
      </button>
    </div>
  </main>
@endsection
