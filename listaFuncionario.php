<?php
include_once 'conexao.php';
include_once 'templatePages.php';

// Verificar se o ID do funcionário foi enviada na URL
if (isset($_GET['id_func'])) {
    // Atribuir a ID do funcionário a uma variável
    $id = $_GET['id_func'];

    // Preparar a consulta SQL para obter os dados do funcionário no ID
    $sql = "SELECT * FROM funcionario WHERE id_func = '$id'";
    $seleciona = mysqli_query($conexao, $sql);

    // Verificar se a consulta retornou algum resultado
    if ($seleciona && mysqli_num_rows($seleciona) > 0) {
        // Se a disiplinac existe no banco de dados, exibir os detalhes
        $banco = mysqli_fetch_array($seleciona);
?>
<h3 class="page-header">Detalhes do Funcionário</h3>
<div id="top" class="row">
    <div class="col-md-3">
        <h2>Funcionário</h2>
    </div>
</div>
<hr />
<div id="list" class="row">
    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Escolaridade</th>
                    <th>Situação</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $banco['id_func']; ?></td>
                    <td><?php echo $banco['nome_func']; ?></td>
                    <td><?php echo $banco['escolaridade_func']; ?></td>
                    <td><?php echo $banco['status_func']; ?></td>
                    <td class="actions">
                        <!-- Adicione aqui os botões de ações específicas  -->
                        <a class="btn btn-secondary btn-xs" href="listarFuncionarios.php">Voltar</a>
                        <a class="btn btn-warning btn-xs"
                            href="editaFuncionario.php?id_func=<?php echo $id ?>">Editar</a>
                        <a class="btn btn-danger btn-xs" href="excluir_funcionario.php?id_func=<?php echo $id ?>"
                            data-toggle="modal" data-target="#delete-modal">Excluir</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
    } else {
        // Se a matrícula do aluno não foi encontrada no banco de dados, exibir uma mensagem de erro
        echo "<p>Matrícula do funcionário não encontrada.</p>";
    }
} else {
    // Se a matrícula do aluno não foi fornecida na URL, exibir uma mensagem de erro
    echo "<p>Matrícula do funcionário não fornecida.</p>";
}

include_once './templateFooter.php';
?>