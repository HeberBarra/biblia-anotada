@extends('layouts.main_layout')

@section('head')
  @vite(['resources/scss/form.scss', 'resources/scss/nota.scss'])
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
    <label>Nome: <input type="text" name="name"></label>
    @error('name')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>
      Texto:
      <textarea name="note-text"></textarea>
    </label>
    @error('note-text')
    <div class="error-form">{{ $message }}</div>
    @enderror
    <label>
      Capítulo:
      <select name="chapter-number">
        @for($i = 1; $i <= $quantidadeCapitulos; $i++)
          <option value="{{$i}}">Capítulo {{ $i }}</option>
        @endfor
      </select>
    </label>
    @error('chapter-number')
    <div class="error-form">{{ $message }}</div>
    @enderror
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
