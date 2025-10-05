@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/users.scss"])
@endsection

@section("content")
  <div>
    <h1>Usuários</h1>
    <table>
      <thead>
      <tr>
        <th scope="col">Nome de Usuário</th>
        <th scope="col">E-Mail</th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
        <tr>
          <th scope="row">{{ $user->username }}</th>
          <td>{{ $user->email }}</td>
          <td>
            <a href="mailto:{{ $user->email }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                   class="feather feather-mail">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
            </a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
    <button>
      <a href="/">VOLTAR</a>
    </button>
  </div>
@endsection
