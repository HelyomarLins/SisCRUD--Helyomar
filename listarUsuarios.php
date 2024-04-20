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
$sql = "SELECT * FROM usuario ORDER BY id_usu LIMIT $itensPorPagina OFFSET $offset";
$seleciona = mysqli_query($conexao, $sql);

// Consulta SQL para contar o número total de produtos
$totalProdutos = mysqli_num_rows(mysqli_query($conexao, "SELECT * FROM usuario"));

// Calcula o número total de páginas
$totalPaginas = ceil($totalProdutos / $itensPorPagina);
?>

<h3 class="page-header">Lista de Usuários</h3>

<div id="top" class="row">
    <div class="col-md-3">
        <h2>Usuários</h2>
    </div>
    <div class="col-md-6">
        <div class="input-group h2">
            <input name="data[search]" class="form-control" id="search" type="text" placeholder="Pesquisar usuário...">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </div>
    <div class="col-md-3">
        <a href="cadUsuario.php" class="btn btn-primary float-end h2">Novo Usuário</a>
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
            <?php
                while($banco = mysqli_fetch_array($seleciona)){
                    $id = $banco['id_usu'];
            ?>
            <tbody>
                <tr>
                    <td><?php echo $banco ['id_usu']?></td>
                    <td><?php echo $banco['nome_usu']?></td>
                    <td><?php echo $banco['email_usu']?></td>
                    <td><?php echo $banco['nivel_usu']?></td>
                    <td class="actions">
                        <a class="btn btn-success btn-xs"
                            href="listaUsuario.php?id_usu=<?php echo $id ?>">Visualisar</a>
                        <a class="btn btn-warning btn-xs" href="editaUsuario.php?id_usu=<?php echo $id ?>">Editar</a>
                        <a class="btn btn-danger btn-xs" href="excluir_usuario.php?id_usu=<?php echo $id ?>"
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
</div>

<?php
include_once './templateFooter.php';
?>