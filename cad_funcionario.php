<?php
include "conexao.php";
include "templateLogin.php";

if (isset($_POST['nome_func'])) {
    $nome = trim($_POST['nome_func']);
    $sexo = trim($_POST['sexo_func']);
    $salario = trim($_POST['sal_func']);
    $escolaridade = trim($_POST['escolaridade_func']);
    $status = trim($_POST['status_func']);

    $sql = "INSERT INTO funcionario (nome_func, sexo_func, sal_func, escolaridade_func, status_func) 
        VALUES ('$nome', '$sexo', '$salario', '$escolaridade', '$status')";

    $incluir = mysqli_query($conexao, $sql);

    if ($incluir) {
        // Alerta de sucesso
        echo "<script>
                            Swal.fire({
                                text: 'Funcionário cadastrado com sucesso',
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
                                text: 'Erro ao cadastrar funcionário. Tente novamente',
                                icon: 'error',
                                confirmButtonColor: '#3085d6',
                            });
                        </script>";
    }
} else {
    // Mensagem de erro se os dados do usuário não foram recebidos corretamente
    echo "<script>
                    Swal.fire({
                        text: 'Funcionario não existe',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                    });
                </script>";
}
?>