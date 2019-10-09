@can('isAdmin')
@extends('layouts.app')

@section('content')
<style>
    #ya {
        display: none;
    }
</style>
<main role="main" class="container" style="padding-top:80px;">
    <h4 class="mb-3">Dados do Aluno</h4>
    <ul class="list-group mb-8">
        <li class="list-group-item  lh-condensed">
            <form method="POST" action="/home/aluno/criar" enctype="multipart/form-data">
            @csrf
                <div class="mb-3">
                    <label for="nome">Nome</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" id="name" placeholder="Digite o nome do aluno" name="name" required>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Contato</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="contato" placeholder="Digite o contato do aluno" name="contato" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="email" placeholder="Digite o email do aluno" name="email" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Senha</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Digite a senha do aluno" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Confirmação Senha</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Confirme a senha do aluno" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                <label class="custom-file-label" for="customFile">Escolher</label>
                            </div>
                            <small class="form-text text-muted">
                                Resolucao mínima recomendada (180 x 180 px).<br />
                                Formato recomendado: JPG ou PNG.
                            </small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Impressão Digital</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="digital" name="digital">
                                <label class="custom-file-label" for="customFile">Escolher</label>
                            </div>
                            <small class="form-text text-muted">
                                Ponha o dedo no sensor<br />
                                Verifique, se o mesmo esta limpo.
                            </small>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="endereco">Endereço</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" id="endereco" placeholder="Digite o endereço do aluno" name="endereco" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Estado</label>
                            <div class="form-group">
                                <select class="form-control" name="estado" id="estado">
                                    <option>Paraná</option>
                                    <option>Estrangeiro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Cidade</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="cidade" placeholder="Digite a cidade do aluno" name="cidade" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Curso</label>
                            <div class="form-group">
                                <select class="form-control" name="curso" id="curso">
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