@can('isAdmin')
@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
  <h2>Requisição</h2>
  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">#
        </th>
        <th class="th-sm">Aluno
        </th>
        <th class="th-sm">Dispositivo
        </th>
        <th class="th-sm">Estado
        </th>
        <th class="th-sm">Data
        </th>
        <th class="th-sm">Opções
        </th>
      </tr>
    </thead>

    <tbody>
      @if(count($requisicoes)>0)
      @foreach($requisicoes as $requisicao)
      <tr>
        <td>{{$requisicao->id}}</td>
        <td>{{$requisicao->aluno_id}}</td>
        <td>{{$requisicao->dispositivo_id}}</td>
        <td>
          @if($requisicao->estado==1)
          Emprestado
          @else
          Devolvido
          @endif
        </td>
        <td>{{$requisicao->data}}</td>
        <td>
          @if($requisicao->estado==1)
          <a href="/home/dispositivo/devolver?r={{$requisicao->id}}&d={{$requisicao->dispositivo_id}}" class="label bg-green">Devolver</a>
          @endif
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>
@endsection
@endcan