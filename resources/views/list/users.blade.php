@extends("layouts.main_layout")

@section("head")
  @vite(["resources/scss/table.scss"])
@endsection

@section("content")
  <main>
    @if($is_admin)
      <h1>Administração: Usuários</h1>
    @else
      <h1>Usuários</h1>
    @endif
    <x-alert.success />
    <table>
      @php
        $headerNames = ['id', 'nome de usuário', 'e-mail', 'contactar'];
        $colSizes = [5, 10, 15, 8];

        if ($is_admin)
        {
            array_push($headerNames, 'editar', 'deletar', 'deletado?');
            array_push($colSizes, 5, 5, 5);
        }
      @endphp

      <x-table.header
        :header-names="$headerNames"
        :col-sizes="$colSizes"
      />
      <tbody>
      <tr>
        <td {{ $is_admin ? 'colspan=7' : 'colspan=4' }}>
          <div>
            <table>
              @foreach($users as $user)
                <tr class="wrapper">
                  <th scope="row" style="width: 5rem">{{ $user->id }}</th>
                  <td style="width: 10rem">{{ $user->username }}</td>
                  <td style="width: 15rem">{{ $user->email }}</td>
                  <td style="width: 8rem" class="td-btn">
                    <a href="mailto:{{ $user->email }}">
                      @include('icons.email')
                    </a>
                  </td>
                  @if($is_admin)
                    <td class="td-btn" style="width: 5rem">
                      <form action="{{ route('users.edit', $user) }}" method="get">
                        <button style="background: none; border: none">
                          @include('icons.edit')
                        </button>
                      </form>
                    </td>
                    <td class="td-btn" style="width: 5rem">
                      @if($user->deleted_at == null && $user->email != config('admin.email'))
                        <form action="{{ route('users.destroy', $user) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button style="background: none; border: none">
                            @include('icons.edit')
                          </button>
                        </form>
                      @endif
                    </td>
                    <td style="width: 5rem">
                      {{ $user->deleted_at != null ? 'SIM' : 'NÃO' }}
                    </td>
                  @endif
                </tr>
              @endforeach
            </table>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
    <x-table.footer create-label="CRIAR NOVO USUÁRIO" create-route-name="users.create" :show-create="$is_admin" />
  </main>
@endsection
