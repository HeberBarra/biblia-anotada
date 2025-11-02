@if(session()->has('success'))
  <script>
    window.alert('{{ session()->get('success') }}');
  </script>
@endif
