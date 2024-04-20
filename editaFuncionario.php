<?php
include "conexao.php";
include_once 'templatePages.php';
$erro = 0;
if (isset($_GET['id_func'])) {
    $id = $_GET['id_func'];

    $sql = "SELECT * FROM funcionario WHERE id_func = $id";
    $seleciona = mysqli_query($conexao, $sql);
    $banco = mysqli_fetch_array($seleciona);
    // Armazenar os dados do banco em variáveis
    $nome = $banco['nome_func'];
    $sexo =  $banco['sexo_func'];
    $salario =  $banco['sal_func'];
    $escolaridade = $banco['escolaridade_func'];
    $status =  $banco['status_func'];
} else {
    $erro++;
}

?>
<h3 class="page-header">Editar Funcionário</h3>
<form class="form row col-8 m-auto mt-4" name="form" method="post" action="editar_funcionario.php">
    <div class="col-md-8">
        <input type="text" style="display: none;" class=" form-control" id="id_func" name="id_func"
            value="<?php echo $id ?>">
    </div>
    <div class="col-md-8">
        <label for="nome_func" class="form-label">Nome:</label>
        <input type="text" class="form-control" id="nome_func" name="nome_func" value="<?php echo $nome ?>">
    </div>
    <div class=" col-md-4">
        <label for="sexo_func" class="form-label">Sexo:</label><br>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="sexo_sim" name="sexo_func" value="M"
                <?php echo ($sexo == 'M') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="sexo_sim">Masculino</label>
        </div>
        <div class="form-check form-switch form-check-inline">
            <input class="form-check-input" type="checkbox" id="sexo_nao" name="sexo_func" value="F"
                <?php echo ($sexo == 'F') ? 'checked' : ''; ?>>
            <label class="form-check-label" for="sexo_nao">Feminino</label>
        </div>
    </div>

    <div class="col-md-8">
        <label for="sal_func" class="form-label">Salário:</label>
        <input type="number" step="0.01" class="form-control" id="sal_func" name="sal_func"
            value="<?php echo $salario ?>">
    </div>
    <div class="col-md-4 mb-2">
        <label for="escolaridade_func" class="form-label">Escolaridade:</label>
        <select class="form-select" id="escolaridade_func" name="escolaridade_func">
            <option value="">Escolha a escolaridade</option>
            <option value="Ensino Fundamental 1"
                <?php echo ($escolaridade == "Ensino Fundamental 1") ? ' selected' : ''; ?>>Ensino Fundamental 1 (1º ao
                5º ano)</option>
            <option value="Ensino Fundamental 2"
                <?php echo ($escolaridade == "Ensino Fundamental 2") ? ' selected' : ''; ?>>Ensino Fundamental 2 (6º ao
                9º ano)</option>
            <option value="Ensino Médio" <?php echo ($escolaridade == "Ensino Médio") ? ' selected' : ''; ?>>Ensino
                Médio</option>
            <option value="Ensino Médio Técnico"
                <?php echo ($escolaridade == "Ensino Médio Técnico") ? ' selected' : ''; ?>>Ensino Médio Técnico
            </option>
            <option value="Ensino Superior" <?php echo ($escolaridade == "Ensino Superior") ? ' selected' : ''; ?>>
                Ensino Superior</option>
            <option value="Ensino Superior Bacharelado"
                <?php echo ($escolaridade == "Ensino Superior Bacharelado") ? ' selected' : ''; ?>>Ensino Superior
                Bacharelado</option>
            <option value="Mestrado" <?php echo ($escolaridade == "Mestrado") ? ' selected' : ''; ?>>Mestrado</option>
            <option value="Pós-Graduação" <?php echo ($escolaridade == "Pós-Graduação") ? ' selected' : ''; ?>>
                Pós-Graduação</option>
        </select>
    </div>

    <div class="col-md-4 mb-2">
        <label for="status_func" class="form-label">Status da Escolaridade:</label>
        <div>
            <input type="radio" id="concluido" name="status_func" value="Concluído"
                <?php echo ($status == "Concluído") ? ' checked' : ''; ?>>
            <label for="concluido">Concluído</label>
        </div>
        <div>
            <input type="radio" id="trancado" name="status_func" value="Trancado"
                <?php echo ($status == "Trancado") ? ' checked' : ''; ?>>
            <label for="trancado">Trancado</label>
        </div>
        <div>
            <input type="radio" id="em_curso" name="status_func" value="Em Curso"
                <?php echo ($status == "Em Curso") ? ' checked' : ''; ?>>
            <label for="em_curso">Em Curso</label>
        </div>
    </div>

    <hr>
    <div id=" actions" class="row text-end">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <a href="listarFuncionarios.php" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</form>


<?php
include_once './templateFooter.php';
?>