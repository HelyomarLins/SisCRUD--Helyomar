<?php
include_once 'conexao.php';
include_once 'templatePages.php';

// Definir a consulta SQL padrão
$sql = "SELECT * FROM alunos ORDER BY nome_alu";
// Verificar se a pesquisa foi enviada
if (isset($_GET['search']) && !empty($_GET['search'])) {
    // Obter o termo de pesquisa
    $search = $_GET['search'];
    // Adicionar a condição de pesquisa à consulta SQL
    $sql = "SELECT * FROM alunos WHERE nome_alu LIKE '%$search%' ORDER BY nome_alu";
}
// Executar a consulta SQL
$seleciona = mysqli_query($conexao, $sql);
?>

<h3 class="page-header">Pesquis de Aluno</h3>

<div id="top" class="row">
    <div class="col-md-3">
        <h2>Aluno</h2>
    </div>
    <div class="col-md-6">
        <div class="input-group h2">
            <!-- Adicionar um formulário para pesquisa -->
            <div class="input-group h2">
                <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar aluno...">
                <button class=" btn btn-primary" id="searchButton" type="button">
                    Pesquisar
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <a href="cadAluno.php" class="btn btn-primary float-end h2">Novo Aluno</a>
    </div>
</div>
<hr />

<div id="list" class="row">
    <div class="table-responsive col-md-12">
        <table class="table table-striped" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>Sexo</th>
                    <th>Nascimento</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <?php
            while ($banco = mysqli_fetch_array($seleciona)) {
                $matricula = $banco['mat_alu'];
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $banco['mat_alu'] ?></td>
                        <td><?php echo $banco['nome_alu'] ?></td>
                        <td><?php echo $banco['sexo_alu'] ?></td>
                        <td><?php echo $banco['dt_nasc'] ?></td>
                        <td class="actions">
                            <a class="btn btn-success btn-xs" href="listaAluno.php?mat_alu=<?php echo $matricula ?>">Visualizar</a>
                            <a class="btn btn-warning btn-xs" href="editaAluno.php?mat_alu=<?php echo $matricula ?>">Editar</a>
                            <a class="btn btn-danger btn-xs" href="excluir_aluno.php?mat_alu=<?php echo $matricula ?>" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                        </td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<div id="bottom" class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav><!-- /.pagination -->
    </div>
</div>

<?php
include_once './templateFooter.php';
?>