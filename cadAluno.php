<?php
include_once 'templatePages.php';
?>
<h3 class="page-header">Cadstrar Aluno</h3>
<form class="form row col-8 m-auto mt-4" name="form" method="post" action="cad_aluno.php">
    <div class="col-md-8">
        <label for="nome_alu" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome_alu" name="nome_alu" placeholder="Digite o nome do aluno">
    </div>
    <div class="col-md-4 mb-2">
        <label for="dt_nasc" class="form-label">Data de nascimento:</label>
        <input type="date" class="form-control" id="dt_nasc" name="dt_nasc">
    </div>
    <div class="col-md-6 mb-2">
        <label for="nome_pai" class="form-label">Nome do pai:</label>
        <input type="text" class="form-control" id="nome_pai" name="nome_pai" placeholder="Digite o no me do pai">
    </div>
    <div class="col-md-6 mb-2">
        <label for="nome_mae" class="form-label">Nome da mãe:</label>
        <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="Digite o nome da mãe">
    </div>

    <div class="col-md-4">
        <label for="sexo_alu" class="form-label">Sexo:</label><br>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="sexo_sim" name="sexo_alu" value="M">
            <label class="form-check-label" for="sexo_sim">Masculino</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="sexo_nao" name="sexo_alu" value="F">
            <label class="form-check-label" for="sexo_nao">Feminino</label>
        </div>
    </div>

    <div class=" col-md-4 mb-2">
        <label for="rg_alu" class="form-label">Identidade:</label>
        <input type="text" class="form-control" id="rg_alu" name="rg_alu" placeholder="Digite o RG do aluno">
    </div>
    <div class=" col-md-4 mb-2">
        <label for="cpf_alu" class="form-label">CPF:</label>
        <input type="text" class="form-control" id="cpf_alu" name="cpf_alu" placeholder="Digite o CPF do aluno">
    </div>
    <hr>
    <div id=" actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="cad_aluno.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>


<?php
include_once './templateFooter.php';
?>