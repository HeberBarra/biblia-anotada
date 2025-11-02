@php use App\Models\User; @endphp
@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/index.scss", "resources/typescript/index.ts"])
  <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section("content")
  <header>
    <h1>Bíblia Anotada</h1>
    <div>
      <button>
        <a href="/profile">
          @include('icons.profile')
        </a>
      </button>
      <button>
        <a href="/logout">
          @include('icons.user')
        </a>
      </button>
    </div>
  </header>
  <main>
    <div id="livros">
      <div id="tab-switcher">
        @foreach($categorias as $categoria)
          <button type="button" class="btn-trocar-aba"
                  data-categoria="{{ $categoria->id }}">{{ strtoupper($categoria->nome) }}</button>
        @endforeach
      </div>
      <div id="data">
        <table>
          <x-table.header
            :header-names="['livro', 'CAPÍTULOS', 'leituras', 'notas', 'adicionar', 'remover', 'marcador', 'reiniciar']"
            :col-sizes="[12, 7, 7, 7, 7, 7, 7, 7]" />
          <tbody>
          <tr>
            <td colspan="8">
              @foreach($categorias as $categoria)
                <div id="livros-{{$categoria->id}}" class="wrapper-livros" style="display: none">
                  <table>
                    @foreach($livrosFiltrados[$categoria->id] as $livro)
                      <tr class="wrapper">
                        <th scope="row" style="width: 12rem">{{ $livro->nome }}</th>
                        <td style="width: 7rem">{{ $livro->qntd_capitulos }}</td>
                        <td style="width: 7rem">{{ $leituras[$livro->id] }}</td>
                        <td style="width: 7rem">
                          <button>
                            <a href="{{ route('user.notes', $livro->id) }}">
                              @include('icons.note')
                            </a>
                          </button>
                        </td>
                        <td style="width: 7rem">
                          <button>
                            <a href="{{ route('contagem.incrementar', $livro->id) }}">
                              @include('icons.add')
                            </a>
                          </button>
                        </td>
                        <td style="width: 7rem">
                          <button>
                            <a href="{{ route('contagem.decrementar', $livro->id) }}">
                              @include('icons.remove')
                            </a>
                          </button>
                        </td>
                        <td style="width: 7rem">
                          <button class="btn-marker" data-book-id="{{ $livro->id }}">
                            @include('icons.marker')
                          </button>
                        </td>
                        <td style="width: 7rem">
                          <button>
                            <a href="{{ route('contagem.reiniciar', $livro->id) }}">
                              @include('icons.reset')
                            </a>
                          </button>
                        </td>
                      </tr>
                    @endforeach
                  </table>
                </div>
              @endforeach
            </td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div id="controls">
      @if(User::find(Auth::user()->id)->admin == 1)
        <button title="Categorias">
          <a href="/categorias">
            @include('icons.categories')
          </a>
        </button>
        <button title="Livros">
          <a href="/livros">
            @include('icons.books')
          </a>
        </button>
        <button title="Notas">
          <a href="/notas">
            @include('icons.folder')
          </a>
        </button>
      @endif
      <button title="Usuários">
        <a href="/users">
          @include('icons.users')
        </a>
      </button>
    </div>
  </main>
@endsection
