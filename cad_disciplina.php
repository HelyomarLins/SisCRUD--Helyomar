<?php
include "conexao.php";
include "templateLogin.php";

if (isset($_POST['nome_disc'])) {
    $nome = trim($_POST['nome_disc']);
    $sigla = trim($_POST['sigla_disc']);
    $check = trim($_POST['ch_disc']);


    $sql = "INSERT INTO disciplina (nome_disc, sigla_disc, ch_disc) 
        VALUES ('$nome', '$sigla', '$check')";

    $incluir = mysqli_query($conexao, $sql);

    if ($incluir) {
        // Alerta de sucesso
        echo "<script>
                Swal.fire({
                    text: 'Disciplina cadastrado com sucesso',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'listarDisciplinas.php';
                    }
                });
            </script>";
    } else {
        // Alerta de erro
        echo "<script>
                Swal.fire({
                    text: 'Erro ao cadastrar disciplina. Tente novamente',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                });
            </script>";
    }
} else {
    // Mensagem de erro se os dados do usuário não foram recebidos corretamente
    echo "<script>
            Swal.fire({
                text: 'Disciplina não existe',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
            });
        </script>";
}