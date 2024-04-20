<?php
include "conexao.php";
include "templateLogin.php";

if(isset($_POST['id_disc'], $_POST['nome_disc'], $_POST['sigla_disc'], $_POST['ch_disc'])) {
    $id = $_POST['id_disc'];
    $nome = trim($_POST['nome_disc']);
    $sigla = trim($_POST['sigla_disc']);
    $check = trim($_POST['ch_disc']);
   
    
    // Evitar injeção de SQL escapando os valores
    $nome = mysqli_real_escape_string($conexao, $nome);
    $sigla = mysqli_real_escape_string($conexao, $sigla);
    $check = mysqli_real_escape_string($conexao, $check);
   
    
    // Atualizar registro no banco de dados
    $sql = "UPDATE disciplina SET nome_disc = '$nome', sigla_disc = '$sigla', ch_disc = '$check'
             WHERE id_disc = $id";
    $alterar = mysqli_query($conexao, $sql);

    if ($alterar) {
        // Alerta de sucesso
        echo "<script>
        Swal.fire({
            text: 'Disciplina editada com sucesso',
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
            text: 'Erro ao editar disciplina. Tente novamente',
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
    ?>