<?php
include_once 'templatePages.php';
?>
<h3 class="page-header">Cadstrar Funcionário</h3>
<form class="form row col-8 m-auto mt-4" name="form" method="post" action="cad_funcionario.php">
    <div class="col-md-8">
        <label for="nome_func" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome_func" name="nome_func"
            placeholder="Digite o nome do funcionario">
    </div>
    <div class="col-md-4">
        <label for="sexo_func" class="form-label">Sexo:</label><br>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_sim" name="sexo_func" value="M">
            <label class="form-check-label" for="nivel_sim">Masculino</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_nao" name="sexo_func" value="F">
            <label class="form-check-label" for="nivel_nao">Feminino</label>
        </div>
    </div>
    <div class="col-md-8">
        <label for="sal_func" class="form-label">Salário:</label>
        <input type="number" step="0.01" class="form-control" id="sal_func" name="sal_func"
            placeholder="Informe o salário">
    </div>
    <div class="col-md-4 mb-2">
        <label for="escolaridade_func" class="form-label">Escolaridade:</label>
        <select class="form-select" id="escolaridade_func" name="escolaridade_func">
            <option value="">Escolha a escolaridade</option>
            <option value="Ensino Fundamental 1">Ensino Fundamental 1 (1º ao 5º ano)</option>
            <option value="Ensino Fundamental 2">Ensino Fundamental 2 (6º ao 9º ano)</option>
            <option value="Ensino Médio">Ensino Médio</option>
            <option value="Ensino Médio Técnico">Ensino Médio Técnico</option>
            <option value="Ensino Superior">Ensino Superior</option>
            <option value="Ensino Superior Bacharelado">Ensino Superior Bacharelado</option>
            <option value="Mestrado">Mestrado</option>
            <option value="Pós-Graduação">Pós-Graduação</option>
        </select>
    </div>
    <div class="col-md-4 mb-2">
        <label for="status_func" class="form-label">Status da Escolaridade:</label>
        <div>
            <input type="radio" id="concluido" name="status_func" value="Concluído">
            <label for="concluido">Concluído</label>
        </div>
        <div>
            <input type="radio" id="trancado" name="status_func" value="Trancado">
            <label for="trancado">Trancado</label>
        </div>
        <div>
            <input type="radio" id="em_curso" name="status_func" value="Em Curso">
            <label for="em_curso">Em Curso</label>
        </div>
    </div>
    <hr>
    <div id=" actions" class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="cad_aluno.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>


<?php
include_once './templateFooter.php';
?>