<thead>
<tr>
  @foreach($headerNames as $index => $valor)
    <th scope="col" style="width: {{$colSizes[$index]}}rem;">{{ strtoupper($valor) }}</th>
  @endforeach
</tr>
</thead>
