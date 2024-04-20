<?php
include "conexao.php";
include_once 'templatePages.php';
$erro = 0;
if (isset($_GET['id_disc'])) {
  $id = $_GET['id_disc'];

  $sql = "SELECT * FROM disciplina WHERE id_disc = $id";
  $seleciona = mysqli_query($conexao, $sql);
  $banco = mysqli_fetch_array($seleciona);
  // Armazenar os dados do banco em variáveis
  $nome = $banco['nome_disc'];
  $sigla =  $banco['sigla_disc'];
  $check =  $banco['ch_disc'];

 
} else {
  $erro++;
}

?>
<h3 class="page-header">Editar Disciplina</h3>
<form class="form row col-4 m-auto mt-4" name="form" method="post" action="editar_disciplina.php">
    <input type="hidden" class="form-control" id="id_disc" name="id_disc" value="<?php echo $id ?>">

    <div class="col-md-12">
        <label for="nome_disc" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome_disc" name="nome_disc" value="<?php echo $nome ?>">
    </div>

    <div class="col-md-10 mb-2">
        <label for="sigla_disc" class="form-label">Sigla:</label>
        <input type="text" class="form-control" id="sigla_disc" name="sigla_disc" value="<?php echo $sigla ?>">
    </div>

    <div class="col-md-12">
        <label for="ch_disc" class="form-label">Check:</label>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_sim" name="ch_disc" value="s"
                <?php echo ($check == 's') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="check_sim">Sim</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_nao" name="ch_disc" value="n"
                <?php echo ($check == 'n') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="check_nao">Não</label>
        </div>
    </div>

    <hr>
    <div id="actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-warning">Editar</button>
            <a href="listarDisciplinas.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</form>


<?php
include_once 'templateFooter.php';
?>