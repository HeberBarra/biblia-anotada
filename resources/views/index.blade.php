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
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-user">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
            <circle cx="12" cy="7" r="4"></circle>
          </svg>
        </a>
      </button>
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
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                   stroke-linejoin="round" class="feather feather-file-text">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                              </svg>
                            </a>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-plus-square">
                              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                              <line x1="12" y1="8" x2="12" y2="16"></line>
                              <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-minus-square">
                              <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                              <line x1="8" y1="12" x2="16" y2="12"></line>
                            </svg>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-bookmark">
                              <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
                            </svg>
                          </button>
                        </td>
                        <td style="width: 5rem">
                          <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-refresh-cw">
                              <polyline points="23 4 23 10 17 10"></polyline>
                              <polyline points="1 20 1 14 7 14"></polyline>
                              <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                            </svg>
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
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-archive">
              <polyline points="21 8 21 21 3 21 3 8"></polyline>
              <rect x="1" y="3" width="22" height="5"></rect>
              <line x1="10" y1="12" x2="14" y2="12"></line>
            </svg>
          </a>
        </button>
        <button title="Livros">
          <a href="/livros">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-book">
              <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
              <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
          </a>
        </button>
      @endif
      <button title="Usuários">
        <a href="/users">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-users">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
            <circle cx="9" cy="7" r="4"></circle>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
          </svg>
        </a>
      </button>
    </div>
  </main>
@endsection
