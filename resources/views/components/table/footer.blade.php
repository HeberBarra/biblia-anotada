<div id="wrapper-buttons">
  <button>
    <a href="/">VOLTAR</a>
  </button>
  @if($showCreate)
    <button>
      <a href="{{ route($createRouteName) }}">{{ $createLabel }}</a>
    </button>
  @endif
</div>
