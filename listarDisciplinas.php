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
$sql = "SELECT * FROM disciplina ORDER BY id_disc LIMIT $itensPorPagina OFFSET $offset";
$seleciona = mysqli_query($conexao, $sql);

// Consulta SQL para contar o número total de produtos
$totalProdutos = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM disciplina"));

// Calcula o número total de páginas
$totalPaginas = ceil($totalProdutos / $itensPorPagina);
?>

<h3 class="page-header">Lista de Disciplinas</h3>

<div id="top" class="row">
    <div class="col-md-3">
        <h2>Disciplinas</h2>
    </div>
    <div class="col-md-6">
        <div class="input-group h2">
            <input name="data[search]" class="form-control" id="search" type="text"
                placeholder="Pesquisar disciplina...">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <a href="cadDisciplina.php" class="btn btn-primary float-end h2">Nova Disciplina</a>
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
            <?php
                while($banco = mysqli_fetch_array($seleciona)){
                    $id = $banco['id_disc'];
            ?>
            <tbody>
                <tr>
                    <td><?php echo $banco ['id_disc']?></td>
                    <td><?php echo $banco['nome_disc']?></td>
                    <td><?php echo $banco['sigla_disc']?></td>
                    <td><?php echo $banco['ch_disc']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs"
                            href="listaDisciplina.php?id_disc=<?php echo $id ?>">Visualisar</a>
                        <a class="btn btn-warning btn-xs"
                            href="editaDisciplina.php?id_disc=<?php echo $id ?>">Editar</a>
                        <a class="btn btn-danger btn-xs" href="excluir_disciplina.php?id_disc=<?php echo $id ?>"
                            data-toggle="modal" data-target="#delete-modal">Excluir</a>
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
</div <?php
    include_once 'templateFooter.php';
?>