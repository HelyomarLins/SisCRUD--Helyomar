<?php
include_once 'templatePages.php';
?>
<h3 class="page-header">Cadstrar Usuário</h3>
<form id="cadUsuarioForm" class=" form row col-6 m-auto mt-4" name="form" method="post" action="cad_usuario.php">
    <div class="col-md-12">
        <label for="nome_usu" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome_usu" name="nome_usu" placeholder="Nome do usuário">
    </div>

    <div class=" col-md-6 mb-2">
        <label for="email_usu" class="form-label">E-mail:</label>
        <input type="email" class="form-control" id="email_usu" name="email_usu" placeholder="E-mail do usuário">
    </div>
    <div class=" col-md-6">
        <label for="pass_usu" class="form-label">Senha:</label>
        <input type="password" class="form-control" id="pass_usu" name="pass_usu" placeholder="Digite a senha">
    </div>

    <div class="col-md-6 mb-2">
        <label for="nivel_usu" class="form-label">Nível:</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_1" value="1">
            <label class="form-check-label" for="nivel_1$n">1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_2" value="2">
            <label class="form-check-label" for="nivel_2">2</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_3" value="3">
            <label class="form-check-label" for="nivel_3">3</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_4" value="4">
            <label class="form-check-label" for="nivel_4">4</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_5" value="5">
            <label class="form-check-label" for="nivel_5">5</label>
        </div>
    </div>

    <div class="col-md-6">
        <label for="ativo_usu" class="form-label">Ativo:</label>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_sim" name="ativo_usu" value="s">
            <label class="form-check-label" for="nivel_sim">Sim</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_nao" name="ativo_usu" value="n">
            <label class="form-check-label" for="nivel_nao">Não</label>
        </div>
    </div>

    <hr>
    <div id="actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="listarUsuarios.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</form>


<?php
include_once 'templateFooter.php';
?>