<?php
include_once 'conexao.php';
include_once 'templatePages.php';

// Verificar se o ID da disciplina foi enviada na URL
if (isset($_GET['id_disc'])) {
    // Atribuir a ID da disciplina a uma variável
    $id = $_GET['id_disc'];

    // Preparar a consulta SQL para obter os dados da disciplina no ID
    $sql = "SELECT * FROM disciplina WHERE id_disc = '$id'";
    $seleciona = mysqli_query($conexao, $sql);

    // Verificar se a consulta retornou algum resultado
    if ($seleciona && mysqli_num_rows($seleciona) > 0) {
        // Se a disiplinac existe no banco de dados, exibir os detalhes
        $banco = mysqli_fetch_array($seleciona);
?>
<h3 class="page-header">Detalhes da Disciplina</h3>
<div id="top" class="row">
    <div class="col-md-3">
        <h2>Disciplina</h2>
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
                    <th>Sigla</th>
                    <th>Check</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $banco['id_disc']; ?></td>
                    <td><?php echo $banco['nome_disc']; ?></td>
                    <td><?php echo $banco['sigla_disc']; ?></td>
                    <td><?php echo $banco['ch_disc']; ?></td>
                    <td class="actions">
                        <!-- Adicione aqui os botões de ações específicas para este aluno -->
                        <a class="btn btn-secondary btn-xs" href="listarDisciplinas.php">Voltar</a>
                        <a class="btn btn-warning btn-xs"
                            href="editaDisciplina.php?id_disc=<?php echo $id ?>">Editar</a>
                        <a class="btn btn-danger btn-xs" href="excluir_disciplina.php?id_disc=<?php echo $id ?>"
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
        echo "<p>Matrícula do aluno não encontrada.</p>";
    }
} else {
    // Se a matrícula do aluno não foi fornecida na URL, exibir uma mensagem de erro
    echo "<p>Matrícula do aluno não fornecida.</p>";
}

include_once './templateFooter.php';
?>