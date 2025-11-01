@php use App\Models\User; @endphp
@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/index.scss", "resources/typescript/index.ts"])
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
          <thead>
          <tr>
            <th scope="col" style="width: 10rem">LIVRO</th>
            <th scope="col" style="width: 5rem">LEITURAS</th>
            <th scope="col" style="width: 5rem">NOTAS</th>
            <th scope="col" style="width: 5rem">ADICIONAR</th>
            <th scope="col" style="width: 5rem">REMOVER</th>
            <th scope="col" style="width: 5rem">MARCADOR</th>
            <th scope="col" style="width: 5rem">REINICIAR</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td colspan="7">
              @foreach($categorias as $categoria)
                <div id="livros-{{$categoria->id}}" class="wrapper-livros" style="display: none">
                  <table>
                    @foreach($livrosFiltrados[$categoria->id] as $livro)
                      <tr class="wrapper">
                        <th scope="row" style="width: 10rem">{{ $livro->nome }}</th>
                        <td style="width: 5rem">0</td>
                        <td style="width: 5rem">
                          <button>
                            <a>
                              @include('icons.note')
                            </a>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <a>
                              @include('icons.add')
                            </a>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <a>
                              @include('icons.remove')
                            </a>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <a>
                              @include('icons.marker')
                            </a>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <a>
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
      @endif
      <button title="Usuários">
        <a href="/users">
          @include('icons.users')
        </a>
      </button>
    </div>
  </main>
@endsection
