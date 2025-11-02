@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/table.scss'])
@endsection

@section('content')
  <main>
    <h1>NOTAS</h1>
    <x-alert.success />
    <table>
      <x-table.header :header-names="['id', 'nome', 'texto', 'USUÁRIO', 'livro', 'CAPÍTULO', 'deletar']"
                      :col-sizes="[5, 10, 10, 10, 12, 5, 5]" />
      <tbody>
      <tr>
        <td colspan="7">
          <div>
            <table>
              @foreach($notas as $nota)
                <tr id="wrapper">
                  <th style="width: 5rem" scope="row">{{ $nota->id }}</th>
                  <td style="width: 10rem">{{ $nota->nome }}</td>
                  <td style="width: 10rem">
                    <details>
                      <summary>Conteúdo</summary>
                      {{ $nota->texto }}
                    </details>
                  </td>
                  <td style="width: 10rem">
                    {{ $nota->usuario->username }}
                  </td>
                  <td style="width: 12rem">
                    {{ $nota->livro->nome }}
                  </td>
                  <td style="width: 5rem">
                    {{ $nota->capitulo_livro }}
                  </td>
                  <td style="width: 5rem" class="td-btn">
                    <form action="{{ route('notas.destroy', $nota) }}" method="post">
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
    <x-table.footer :show-create="false" create-label="" create-route-name="" />
  </main>
@endsection
