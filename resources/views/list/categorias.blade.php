@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/table.scss'])
@endsection

@section('content')
  <main>
    <h1>CATEGORIAS</h1>
    <x-alert.success />
    <table>
      <x-table.header :header-names="['id', 'nome', 'editar', 'deletar']" :col-sizes="[5, 15, 5, 5]" />
      <tbody>
      <tr>
        <td colspan="4">
          <div>
            <table>
              @foreach($categorias as $categoria)
                <tr id="wrapper">
                  <th scope="row" style="width: 5rem">{{ $categoria->id }}</th>
                  <td style="width: 15rem">{{ $categoria->nome }}</td>
                  <td class="td-btn" style="width: 5rem">
                    <form action="{{ route('categorias.edit', $categoria) }}" method="get">
                      <button style="background: none; border: none">
                        @include('icons.edit')
                      </button>
                    </form>
                  </td>
                  <td class="td-btn" style="width: 5rem">
                    <form action="{{ route('categorias.destroy', $categoria) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button style="background: none; border: none">
                        @include('icons.delete')
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </td>
      </tr>
      </tbody>
    </table>
    <x-table.footer create-label="CRIAR NOVA CATEGORIA" create-route-name="categorias.create" :show-create="true" />
  </main>
@endsection
