@can('isAdmin')
@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:100px;">
  <h2>Aluno</h2>
  <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th class="th-sm">#
        </th>
        <th class="th-sm">Nome
        </th>
        <th class="th-sm">Email
        </th>
        <th class="th-sm">Contato
        </th>
        <th class="th-sm">Endereço
        </th>
        <th class="th-sm">Estado
        </th>
        <th class="th-sm">Cidade
        </th>
        <th class="th-sm">Curso
        </th>
        <th class="th-sm">Opções
        </th>
      </tr>
    </thead>
    <tbody>
      @if(count($alunos)>0)
      @foreach($alunos as $aluno)
      <tr>
        <td>{{$aluno->id}}</td>
        <td>{{$aluno->name}}</td>
        <td>{{$aluno->email}}</td>
        <td>{{$aluno->contato}}</td>
        <td>{{$aluno->endereco}}</td>
        <td>{{$aluno->estado}}</td>
        <td>{{$aluno->cidade}}</td>
        <td>{{$aluno->curso}}</td>
        <td>
          <a href="/home/aluno/editar?a={{$aluno->id}}" class="label bg-green">Editar</a>
          <a href="/home/aluno/apagar?a={{$aluno->id}}" class="label bg-red">Apagar</a>
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