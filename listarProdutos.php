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
$sql = "SELECT * FROM produto ORDER BY id_prod LIMIT $itensPorPagina OFFSET $offset";
$seleciona = mysqli_query($conexao, $sql);

// Consulta SQL para contar o número total de produtos
$totalProdutos = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM produto"));

// Calcula o número total de páginas
$totalPaginas = ceil($totalProdutos / $itensPorPagina);
?>

<h3 class="page-header">Lista de Produtos</h3>

<div id="top" class="row">
    <div class="col-md-3">
        <h2>Produtos</h2>
    </div>
    <div class="col-md-6">
        <div class="input-group h2">
            <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar produtos...">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <a href="cadProduto.php" class="btn btn-primary float-end h2">Novo Produto</a>
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
                    <th>Valor</th>
                    <th>Quantidade</th>
                    <th>Validade</th>
                    <th class="actions">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($banco = mysqli_fetch_array($seleciona)) { ?>
                <tr>
                    <td><?php echo $banco['id_prod']?></td>
                    <td><?php echo $banco['nome_prod']?></td>
                    <td><?php echo $banco['val_prod']?></td>
                    <td><?php echo $banco['qtd_prod']?></td>
                    <td><?php echo $banco['dt_val_prod']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs"
                            href="listaProduto.php?id_prod=<?php echo $banco['id_prod'] ?>">Visualisar</a>
                        <a class="btn btn-warning btn-xs"
                            href="editaProduto.php?id_prod=<?php echo $banco['id_prod'] ?>">Editar</a>
                        <a class="btn btn-danger btn-xs"
                            href="excluir_produto.php?id_prod=<?php echo $banco['id_prod'] ?>">Excluir</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
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
</div>

<?php include_once 'templateFooter.php'; ?>