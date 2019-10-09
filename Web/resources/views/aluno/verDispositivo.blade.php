@can('isUser')
@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
  <h2>Dispositivo disponivél</h2>
  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">#
        </th>
        <th class="th-sm">Tipo
        </th>
        <th class="th-sm">Curso
        </th>
        <th class="th-sm">Opções
        </th>
      </tr>
    </thead>
    <tbody>
      @if(!empty($dispositivos)>0)
      @foreach($dispositivos as $dispositivo)
      <tr>
        <td>{{$dispositivo->id}}</td>
        <td>{{$dispositivo->tipo}}</td>
        <td>{{$dispositivo->curso}}</td>
        <td>
          <a href="/home/dispositivo/requisitar?d={{$dispositivo->id}}" class="label bg-green">Escolher</a>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
      <td>Só pode requisitar um equipamento por vez.</td>
      </tr>
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