<?php
include_once 'templatePages.php';
?>
<h3 class="page-header">Cadstrar Produto</h3>
<form class="form row col-6 m-auto mt-4" name="form" method="post" action="cad_produto.php">
    <div class="col-md-12">
        <label for="nome_prod" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome_prod" name="nome_prod" placeholder="Digite o nome do produto">
    </div>
    <div class="col-md-4">
        <label for="val_prod" class="form-label">Valor:</label>
        <input type="number" step="0.01" class="form-control" id="val_prod" name="val_prod">
    </div>
    <div class="col-md-4 mb-2">
        <label for="qtd_prod" class="form-label">Quantidade:</label>
        <input type="number" class="form-control" id="qtd_prod" name="qtd_prod">
    </div>
    <div class="col-md-4 mb-2">
        <label for="dt_val_prod" class="form-label">Data de Cadastro:</label>
        <input type="date" class="form-control" id="dt_val_prod" name="dt_val_prod">
    </div>

    <hr>
    <div id=" actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="cad_aproduto.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>


<?php
include_once './templateFooter.php';
?>