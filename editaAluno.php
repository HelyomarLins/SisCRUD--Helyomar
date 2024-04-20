<?php
include "conexao.php";
include_once 'templatePages.php';
$erro = 0;
if (isset($_GET['mat_alu'])) {
  $matricula = $_GET['mat_alu'];

  $sql = "SELECT * FROM alunos WHERE mat_alu = $matricula";
  $seleciona = mysqli_query($conexao, $sql);
  $banco = mysqli_fetch_array($seleciona);
  // Armazenar os dados do banco em variáveis
  $nome = $banco['nome_alu'];
  $pai =  $banco['nome_pai'];
  $mae =  $banco['nome_mae'];
  $nasc = $banco['dt_nasc'];
  $sexo = $banco['sexo_alu'];
  $rg =   $banco['rg_alu'];
  $cpf =  $banco['cpf_alu'];
} else {
  $erro++;
}

?>
<h3 class="page-header">Editar Aluno</h3>
<form class="form row col-8 m-auto mt-4" name="form" method="post" action="editar_aluno.php">
    <input type="hidden" class="form-control" id="mat_alu" name="mat_alu" value="<?php echo $matricula?>">
    <div class="col-md-8">
        <label for="nome_alu" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome_alu" name="nome_alu" value="<?php echo $nome ?>">
    </div>
    <div class="col-md-4 mb-2">
        <label for="dt_nasc" class="form-label">Data de nascimento:</label>
        <input type="date" class="form-control" id="dt_nasc" name="dt_nasc" value="<?php echo $nasc ?>">
    </div>
    <div class="col-md-6 mb-2">
        <label for="nome_pai" class="form-label">Nome do pai:</label>
        <input type="text" class="form-control" id="nome_pai" name="nome_pai" value="<?php echo $pai ?>">
    </div>
    <div class="col-md-6 mb-2">
        <label for="nome_mae" class="form-label">Nome da mãe:</label>
        <input type="text" class="form-control" id="nome_mae" name="nome_mae" value="<?php echo $mae ?>">
    </div>

    <div class=" col-md-4">
        <label for="sexo_alu" class="form-label">Sexo:</label><br>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="radio" id="sexo_masculino" name="sexo_alu" value="M"
                <?php echo ($sexo == 'M') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="sexo_masculino">Masculino</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="radio" id="sexo_feminino" name="sexo_alu" value="F"
                <?php echo ($sexo == 'F') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="sexo_feminino">Feminino</label>
        </div>
    </div>

    <div class=" col-md-4 mb-2">
        <label for="rg_alu" class="form-label">Identidade:</label>
        <input type="text" class="form-control" id="rg_alu" name="rg_alu" value="<?php echo $rg ?>">
    </div>
    <div class=" col-md-4 mb-2">
        <label for="cpf_alu" class="form-label">CPF:</label>
        <input type="text" class="form-control" id="cpf_alu" name="cpf_alu" value="<?php echo $cpf ?>">
    </div>
    <hr>
    <div id="actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-warning">Editar</button>
            <a href="listarAlunos.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</form>


<?php
include_once './templateFooter.php';
?>