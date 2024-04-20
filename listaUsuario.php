<?php
include_once 'conexao.php';
include_once 'templatePages.php';

// Verificar se a matrícula do aluno foi enviada na URL
if (isset($_GET['id_usu'])) {
    // Atribuir a matrícula do aluno a uma variável
    $id = $_GET['id_usu'];

    // Preparar a consulta SQL para obter os dados do aluno com base na matrícula
    $sql = "SELECT * FROM usuario WHERE id_usu = '$id'";
    $seleciona = mysqli_query($conexao, $sql);

    // Verificar se a consulta retornou algum resultado
    if ($seleciona && mysqli_num_rows($seleciona) > 0) {
        // Se a matrícula do aluno existe no banco de dados, exibir os detalhes do aluno
        $banco = mysqli_fetch_array($seleciona);
?>
<h3 class="page-header">Detalhes do Usuário</h3>
<div id="top" class="row">
    <div class="col-md-3">
        <h2>Usuário</h2>
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
                    <th>E.mail</th>
                    <th>Nível</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $banco['id_usu']; ?></td>
                    <td><?php echo $banco['nome_usu']; ?></td>
                    <td><?php echo $banco['email_usu']; ?></td>
                    <td><?php echo $banco['nivel_usu']; ?></td>
                    <td class="actions">
                        <!-- Adicione aqui os botões de ações específicas para este aluno -->
                        <a class="btn btn-secondary btn-xs" href="listarUsuarios.php">Voltar</a>
                        <a class="btn btn-warning btn-xs" href="editaUsuario.php?id_usu=<?php echo $id ?>">Editar</a>
                        <a class="btn btn-danger btn-xs" href="excluir_usuario.php?id_usu=<?php echo $id ?>"
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