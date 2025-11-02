@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/table.scss'])
@endsection

@section('content')
  <main>
    <h1>LIVROS</h1>
    <x-alert.success />
    <table>
      <x-table.header :header-names="['id', 'nome', 'CAPÍTULOS', 'categoria', 'editar', 'deletar']"
                      :col-sizes="[5, 10, 10, 10, 5, 5]" />
      <tbody>
      <tr>
        <td colspan="6">
          <div>
            <table>
              @foreach($livros as $livro)
                <tr id="wrapper">
                  <th style="width: 5rem" scope="row">{{ $livro->id }}</th>
                  <td style="width: 10rem">{{ $livro->nome }}</td>
                  <td style="text-align: center; width: 10rem">{{ $livro->qntd_capitulos }}</td>
                  <td style="width: 10rem">{{ $livro->categoriaLivro->nome}}</td>
                  <td style="width: 5rem" class="td-btn">
                    <form action="{{ route('livros.edit', $livro) }}" method="get">
                      <button style="background: none; border: none">
                        @include('icons.edit')
                      </button>
                    </form>
                  </td>
                  <td style="width: 5rem" class="td-btn">
                    <form action="{{ route('livros.destroy', $livro) }}" method="post">
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
    <x-table.footer create-route-name="livros.create" create-label="CRIAR NOVO LIVRO"
                    :show-create="true"></x-table.footer>
  </main>
@endsection
