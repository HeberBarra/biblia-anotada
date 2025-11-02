@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss', 'resources/scss/nota.scss', 'resources/typescript/notes-user.ts'])
@endsection

@section('content')
  <main id="notes">
    <h2>NOTAS:</h2>
    @foreach($notas as $nota)
      <div class="nota">
        <h3>{{ $nota->nome }} - Capítulo {{ $nota->capitulo_livro }}</h3>
        <p>{{ $nota->texto }}</p>
        <span>
          Criado em: {{ $nota->created_at->format('d/m/Y')  }}
          @if($nota->updated_at != null)
            - Última modificação: {{ $nota->updated_at->format('d/m/Y') }}
          @endif
        </span>
        <div class="controls">
          <button>
            <a href="{{ route('notas.edit', $nota) }}">
              @include('icons.edit')
            </a>
          </button>
          <form action="{{ route('notas.destroy', $nota) }}" method="post" class="form-control">
            @csrf
            @method('DELETE')
            <button type="button">
              @include('icons.delete')
            </button>
          </form>
        </div>
      </div>
    @endforeach
  </main>
  <form action="{{ route('notas.store') }}" method="post">
    @csrf
    <h2>CRIAR NOVA NOTA</h2>
    <label>Nome: <input type="text" name="name" maxlength="30" required></label>
    <x-alert.error input-name="name" />
    <label>
      Texto:
      <textarea name="note-text" maxlength="256" required></textarea>
    </label>
    <x-alert.error input-name="note-text" />
    <label>
      Capítulo:
      <select name="chapter-number" required>
        @for($i = 1; $i <= $quantidadeCapitulos; $i++)
          <option value="{{$i}}">Capítulo {{ $i }}</option>
        @endfor
      </select>
    </label>
    <x-alert.error input-name="chapter-number" />
    <input value="{{ Auth::user()->id }}" style="display: none" name="user-id">
    <x-alert.error input-name="user-id" />
    <input value="{{ $codigoLivro }}" style="display: none" name="book-id">
    <x-alert.error input-name="book-id" />
    <div id="btns-wrapper">
      <button type="button">
        <a href="{{ route('index') }}">
          VOLTAR
        </a>
      </button>
      <button type="reset">LIMPAR</button>
      <button type="submit">SALVAR</button>
    </div>
  </form>
@endsection
