@can('isAdmin')
@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
  <h2>Dispositivo</h2>
  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">#
        </th>
        <th class="th-sm">Tipo
        </th>
        <th class="th-sm">Curso
        </th>
        <th class="th-sm">Estado
        </th>
        <th class="th-sm">Opções
        </th>
      </tr>
    </thead>
    <tbody>
      @if(count($dispositivos)>0)
      @foreach($dispositivos as $dispositivo)
      <tr>
        <td>{{$dispositivo->id}}</td>
        <td>{{$dispositivo->tipo}}</td>
        <td>{{$dispositivo->curso}}</td>
        <td>
          @if($dispositivo->disponivel ==0)
          Em manutenção
          @elseif($dispositivo->disponivel ==1)
          Disponivél
          @else
          Requisitado
          @endif
        </td>
        <td>
          @if($dispositivo->disponivel !=2)
          <a href="/home/dispositivo/editar?d={{$dispositivo->id}}" class="label bg-green">Editar</a>
          <a href="/home/dispositivo/apagar?d={{$dispositivo->id}}" class="label bg-red">Apagar</a>
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