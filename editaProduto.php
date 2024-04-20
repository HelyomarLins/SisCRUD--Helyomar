<?php
include "conexao.php";
include_once 'templatePages.php';
$erro = 0;
if (isset($_GET['id_prod'])) {
  $id = $_GET['id_prod'];

  $sql = "SELECT * FROM produto WHERE id_prod = $id";
  $seleciona = mysqli_query($conexao, $sql);
  $banco = mysqli_fetch_array($seleciona);
  // Armazenar os dados do banco em variáveis
  $nome = $banco['nome_prod'];
  $valor =  $banco['val_prod'];
  $qtd =  $banco['qtd_prod'];
  $dataCadastro = $banco['dt_val_prod'];
  
} else {
  $erro++;
}
?>
<h3 class="page-header">Cadstrar Produto</h3>
<form class="form row col-6 m-auto mt-4" name="form" method="post" action="editar_produto.php">
    <div class="col-md-2">
        <input type="text" style="display: none;" class=" form-control" id="id_prod" name="id_prod"
            value="<?php echo $id ?>">
    </div>
    <div class="col-md-12">
        <label for="nome_prod" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome_prod" name="nome_prod" value="<?php echo $nome ?>">
    </div>
    <div class="col-md-4">
        <label for="val_prod" class="form-label">Valor:</label>
        <input type="number" step="0.01" class="form-control" id="val_prod" name="val_prod"
            value="<?php echo $valor ?>">
    </div>
    <div class="col-md-4 mb-2">
        <label for="qtd_prod" class="form-label">Quantidade:</label>
        <input type="number" class="form-control" id="qtd_prod" name="qtd_prod" value="<?php echo $qtd ?>">
    </div>
    <div class="col-md-4 mb-2">
        <label for="dt_val_prod" class="form-label">Data de Cadastro:</label>
        <input type="date" class="form-control" id="dt_val_prod" name="dt_val_prod" value="<?php echo $dataCadastro ?>">
    </div>

    <hr>
    <div id=" actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-warning">Editar</button>
            <a href="listarProdutos.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</form>


<?php
include_once './templateFooter.php';
?>