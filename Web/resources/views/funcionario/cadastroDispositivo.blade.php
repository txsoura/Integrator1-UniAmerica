@can('isAdmin')
@extends('layouts.app')

@section('content')
<style>
    #ya {
        display: none;
    }
</style>
<main role="main" class="container" style="padding-top:80px;">
    <h4 class="mb-3">Dados do Dispositivo</h4>
    <ul class="list-group mb-8">
        <li class="list-group-item  lh-condensed">
            <form action="/home/dispositivo/criar" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Tipo</label>
                            <div class="form-group">
                                <select class="form-control" name="tipo">
                                    <option>Tablet</option>
                                    <option>Notebook</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Disponibilidade</label>
                            <div class="form-group">
                                <select class="form-control" name="disponivel">
                                    <option value="1">Disponivél</option>
                                    <option value="0">Em manutenção</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Curso</label>
                            <div class="form-group">
                                <select class="form-control" name="curso">
                                    <option>Todos</option>
                                    <option>Administração</option>
                                    <option>Agronomia</option>
                                    <option>Analise e Desenvolvimento de Sistemas</option>
                                    <option>Arquitetura e Urbanismo</option>
                                    <option>Biomedicina</option>
                                    <option>Ciências Biológicas</option>
                                    <option>Ciências Contábeis</option>
                                    <option>Educação Física</option>
                                    <option>Enfermagem</option>
                                    <option>Engenharia Ambiental</option>
                                    <option>Engenharia Biomédica</option>
                                    <option>Engenharia Civil</option>
                                    <option>Engenharia de Energia</option>
                                    <option>Engenharia de Produção</option>
                                    <option>Engenharia Elétrica</option>
                                    <option>Engenharia Eletrônica</option>
                                    <option>Engenharia Mecânica</option>
                                    <option>Engenharia de Software</option>
                                    <option>Farmácia</option>
                                    <option>Fisioterapia</option>
                                    <option>Jornalismo</option>
                                    <option>Medicina Veterinária</option>
                                    <option>Mídias Digitais</option>
                                    <option>Nutrição</option>
                                    <option>Pedagogia</option>
                                    <option>Psicologia</option>
                                    <option>Publicidade e Propaganda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar</button>
            </form>
        </li>
    </ul>

</main>
@endsection
@endcan