<?php
include "conexao.php";
include_once 'templatePages.php';
$erro = 0;
if (isset($_GET['id_usu'])) {
  $id = $_GET['id_usu'];

  $sql = "SELECT * FROM usuario WHERE id_usu = $id";
  $seleciona = mysqli_query($conexao, $sql);
  $banco = mysqli_fetch_array($seleciona);
  // Armazenar os dados do banco em variáveis
  $nome = $banco['nome_usu'];
  $email =  $banco['email_usu'];
  $senha =  $banco['pass_usu'];
  $nivel = $banco['nivel_usu'];
  $ativo = $banco['ativo_usu'];
 
} else {
  $erro++;
}

?>
<h3 class="page-header">Editar Usuário</h3>
<form class="form row col-6 m-auto mt-4" name="form" method="post" action="editar_usuario.php">
    <input type="hidden" class="form-control" id="id_usu" name="id_usu" value="<?php echo $id ?>">

    <div class="col-md-12">
        <label for="nome_usu" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nome_usu" name="nome_usu" value="<?php echo $nome ?>">
    </div>

    <div class="col-md-6 mb-2">
        <label for="email_usu" class="form-label">E-mail:</label>
        <input type="email" class="form-control" id="email_usu" name="email_usu" value="<?php echo $email ?>">
    </div>
    <div class="col-md-6">
        <label for="pass_usu" class="form-label">Senha:</label>
        <input type="password" class="form-control" id="pass_usu" name="pass_usu" value="<?php echo $senha ?>">
    </div>

    <div class="col-md-6 mb-2">
        <label for="nivel_usu" class="form-label">Nível:</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_1" value="1"
                <?php echo ($nivel == '1') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="nivel_1">1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_2" value="2"
                <?php echo ($nivel == '2') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="nivel_2">2</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_3" value="3"
                <?php echo ($nivel == '3') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="nivel_3">3</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_4" value="4"
                <?php echo ($nivel == '4') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="nivel_4">4</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="nivel_usu" id="nivel_5" value="5"
                <?php echo ($nivel == '5') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="nivel_5">5</label>
        </div>
    </div>

    <div class="col-md-6">
        <label for="ativo_usu" class="form-label">Ativo:</label>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_sim" name="ativo_usu" value="s"
                <?php echo ($ativo == 's') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="nivel_sim">Sim</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="nivel_nao" name="ativo_usu" value="n"
                <?php echo ($ativo == 'n') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="nivel_nao">Não</label>
        </div>
    </div>

    <hr>
    <div id="actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-warning">Editar</button>
            <a href="listarUsuarios.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</form>


<?php
include_once 'templateFooter.php';
?>