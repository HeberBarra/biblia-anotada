@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/users.scss"])
@endsection

@section("content")
  <div>
    @if($is_admin)
      <h1>Administração: Usuários</h1>
    @else
      <h1>Usuários</h1>
    @endif
    @if(session()->has('success'))
      <script>
        window.alert('{{ session()->get('success') }}');
      </script>
    @endif
    <table>
      <thead>
      <tr>
        <th scope="col">Nome de Usuário</th>
        <th scope="col">E-Mail</th>
        <th scope="col">Mandar E-Mail</th>
        @if($is_admin)
          <th scope="col">Editar</th>
          <th scope="col">Deletar</th>
          <th scope="col">Deletado</th>
        @endif
      </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <th scope="row">{{ $user->username }}</th>
          <td>{{ $user->email }}</td>
          <td class="td-btn">
            <a href="mailto:{{ $user->email }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-mail">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
            </a>
          </td>
          @if($is_admin)
            <td class="td-btn">
              <form action="{{ route('users.edit', $user) }}" method="get">
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
              @if($user->deleted_at == null && $user->email != config('admin.email'))
                <form action="{{ route('users.destroy', $user) }}" method="post">
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
              @endif
            </td>
            <td>
              {{ $user->deleted_at != null ? 'SIM' : 'NÃO' }}
            </td>
          @endif
        </tr>
      @endforeach
      </tbody>
    </table>
    <div id="wrapper-buttons">
      <button>
        <a href="/">VOLTAR</a>
      </button>
      @if($is_admin)
        <button>
          <a href="{{ route('users.create') }}">CRIAR NOVO USUÁRIO</a>
        </button>
      @endif
    </div>
  </div>
@endsection
