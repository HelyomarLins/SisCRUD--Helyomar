<?php
include_once 'templatePages.php';
?>
<h3 class="page-header">Cadstrar Disciplina</h3>
<form class="form col-4 m-auto mt-4" name="form" method="post" action="cad_disciplina.php">
    <div class="col-md-12">
        <label for="nome_disc" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome_disc" name="nome_disc" placeholder="Nome da disciplina">
    </div>

    <div class="col-md-10 mb-2">
        <label for="sigla_disc" class="form-label">Sigla:</label>
        <input type="text" class="form-control" id="sigla_disc" name="sigla_disc" placeholder="Sigla">
    </div>
    <div class="col">
        <label for="ch_disc" class="form-label">Check:</label>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="ch_sim" name="ch_disc" value="S">
            <label class="form-check-label" for="ch_sim">Sim</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="ch_nao" name="ch_disc" value="S">
            <label class="form-check-label" for="ch_nao">Não</label>
        </div>
    </div>

    <hr>
    <div id="actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="listarDisciplinas.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</form>


<?php
include_once 'templateFooter.php';
?>