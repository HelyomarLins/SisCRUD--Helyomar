<?php
include_once 'conexao.php';
include_once 'templatePages.php';

// Define o número de itens por página
$itensPorPagina = 4;

// Verifica a página atual
$paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcula o deslocamento (offset)
$offset = ($paginaAtual - 1) * $itensPorPagina;

// Consulta SQL para recuperar os produtos com limite e deslocamento
$sql = "SELECT * FROM alunos ORDER BY mat_alu LIMIT $itensPorPagina OFFSET $offset";
$seleciona = mysqli_query($conexao, $sql);

// Consulta SQL para contar o número total de produtos
$totalProdutos = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM alunos"));

// Calcula o número total de páginas
$totalPaginas = ceil($totalProdutos / $itensPorPagina);
?>

<h3 class="page-header">Lista de Alunos</h3>

<div id="top" class="row">
    <div class="col-md-3">
        <h2>Alunos</h2>
    </div>
    <div class="col-md-6">
        <div class="input-group h2">
            <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar aluno...">
            <button class=" btn btn-primary" id="searchButton" type="button">
                Pesquisar
            </button>
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
                while($banco = mysqli_fetch_array($seleciona)){
                    $matricula = $banco['mat_alu'];
            ?>
            <tbody>
                <tr>
                    <td><?php echo $banco ['mat_alu']?></td>
                    <td><?php echo $banco['nome_alu']?></td>
                    <td><?php echo $banco['sexo_alu']?></td>
                    <td><?php echo $banco['dt_nasc']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs"
                            href="listaAluno.php?mat_alu=<?php echo $matricula ?>">Visualisar</a>
                        <a class="btn btn-warning btn-xs"
                            href="editaAluno.php?mat_alu=<?php echo $matricula ?>">Editar</a>
                        <a class="btn btn-danger btn-xs" href="excluir_aluno.php?mat_alu=<?php echo $matricula ?>"
                            data-toggle="modal" data-target="#delete-modal">Excluir</a>
                    </td>
                </tr>
            </tbody>
            <?php 
                }
            ?>
        </table>
    </div>

</div> <!-- /#list -->
<div id="bottom" class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $paginaAtual <= 1 ? 'disabled' : ''; ?>"><a class="page-link"
                        href="?pagina=<?php echo $paginaAtual - 1; ?>">Previous</a></li>
                <?php for($i = 1; $i <= $totalPaginas; $i++) { ?>
                <li class="page-item <?php echo $paginaAtual == $i ? 'active' : ''; ?>"><a class="page-link"
                        href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php } ?>
                <li class="page-item <?php echo $paginaAtual >= $totalPaginas ? 'disabled' : ''; ?>"><a
                        class="page-link" href="?pagina=<?php echo $paginaAtual + 1; ?>">Next</a></li>
            </ul>
        </nav>
    </div>
</div> <!-- /#bottom -->

<?php
include_once './templateFooter.php';
?>