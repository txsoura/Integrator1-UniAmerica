@can('isUser')
@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
  <h2>Requisição</h2>
  <table id="myTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">#
        </th>
        <th class="th-sm">Dispositivo
        </th>
        <th class="th-sm">Estado
        </th>
        <th class="th-sm">Data
        </th>
      </tr>
    </thead>
    <tbody>
      @if(count($requisicoes)>0)
      @foreach($requisicoes as $requisicao)
      <tr>
        <td>{{$requisicao->id}}</td>
        <td>{{$requisicao->dispositivo_id}}</td>
        <td>@if($requisicao->estado=1)
              Não devolvido
            @else
              Devolvido
            @endif
        </td>
        <td>{{$requisicao->data}}</td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
@endsection
@endcan