<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto SiscCRUD</title>

    <!-- Link BootStrapp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Link Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

    <!-- Link CSS Local -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav class="navbar bg-dark navbar-fixed-top">
        <div class="container-fluid d-flex  justify-content-around ">
            <a class="navbar-brand text-bg-dark" href="#">Projeto SisCRUD</a>
            <ul id="nav" class="list">
                <li>
                    <a href="listarAlunos.php">Alunos</a>
                </li>
                <li>
                    <a href="listarDisciplinas.php">Disciplina</a>
                </li>
                <li>
                    <a href="listarFuncionarios.php">Funcionários</a>
                </li>
                <li>
                    <a href="listarProdutos.php">Produtos</a>
                </li>
                <li>
                    <a href="listarUsuarios.php">Usuários</a>
                </li>
                <li>
                    <a href="sair.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="main" class="container-fluid d-flex flex-column align-items-center">



        <!-- AQUI ENTRAM AS PAGINAS EM PHP-->



        <?php
        include_once './templateFooter.php';
        ?>