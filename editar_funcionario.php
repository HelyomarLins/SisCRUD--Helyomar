<?php
include "conexao.php";
include "templateLogin.phpphp";

if(isset($_POST['id_func'], $_POST['nome_func'], $_POST['sexo_func'], $_POST['sal_func'], $_POST['escolaridade_func'],
 $_POST['status_func'])) {
    $id = $_POST['id_func'];
    $nome = trim($_POST['nome_func']);
    $sexo = trim($_POST['sexo_func']);
    $salario = trim($_POST['sal_func']);
    $escolaridade = trim($_POST['escolaridade_func']);
    $status = trim($_POST['status_func']);
    
    // Evitar injeção de SQL escapando os valores
    $nome = mysqli_real_escape_string($conexao, $nome);
    $sexo = mysqli_real_escape_string($conexao, $sexo);
    $salario = mysqli_real_escape_string($conexao, $salario);
    $escolaridade = mysqli_real_escape_string($conexao, $escolaridade);
    $status = mysqli_real_escape_string($conexao, $status);
    
    // Atualizar registro no banco de dados
    $sql = "UPDATE funcionario SET nome_func = '$nome', sexo_func = '$sexo', sal_func = '$salario', escolaridade_func = '$escolaridade',
            status_func = '$status' WHERE id_func = $id";
    $alterar = mysqli_query($conexao, $sql);

    if ($alterar) {
        // Alerta de sucesso
        echo "<script>
        Swal.fire({
            text: 'Funcionário editado com sucesso',
            icon: 'success',
            confirmButtonColor: '#3085d6',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'listarFuncionarios.php';
            }
        });
        </script>";
        } else {
        // Alerta de erro
        echo "<script>
        Swal.fire({
            text: 'Erro ao editar funcionário. Tente novamente',
            icon: 'error',
            confirmButtonColor: '#3085d6',
        });
        </script>";
        }
        } else {
        // Mensagem de erro se os dados do usuário não foram recebidos corretamente
        echo "<script>
        Swal.fire({
            text: 'Funcionário não existe',
            icon: 'error',
            confirmButtonColor: '#3085d6',
        });
        </script>";
    }
    ?>