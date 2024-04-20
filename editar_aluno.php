<?php
include "conexao.php";
include "templateLogin.php";

if(isset($_POST['mat_alu'], $_POST['nome_alu'], $_POST['nome_pai'], $_POST['nome_mae'], $_POST['dt_nasc'],
 $_POST['sexo_alu'], $_POST['rg_alu'], $_POST['cpf_alu'])) {
    $matricula = $_POST['mat_alu'];
    $nome = trim($_POST['nome_alu']);
    $pai = trim($_POST['nome_pai']);
    $mae = trim($_POST['nome_mae']);
    $nasc = trim($_POST['dt_nasc']);
    $sexo = trim($_POST['sexo_alu']);
    $rg = trim($_POST['rg_alu']);
    $cpf = trim($_POST['cpf_alu']);

    // Evitar injeção de SQL escapando os valores
    $nome = mysqli_real_escape_string($conexao, $nome);
    $pai = mysqli_real_escape_string($conexao, $pai);
    $mae = mysqli_real_escape_string($conexao, $mae);
    $nasc = mysqli_real_escape_string($conexao, $nasc);
    $sexo = mysqli_real_escape_string($conexao, $sexo);
    $rg = mysqli_real_escape_string($conexao, $rg);
    $cpf = mysqli_real_escape_string($conexao, $sexo);

    // Atualizar registro no banco de dados
    $sql = "UPDATE alunos SET nome_alu = '$nome', nome_pai = '$pai', nome_mae = '$mae', dt_nasc = '$nasc',
            sexo_alu = '$sexo',  rg_alu = '$rg',  cpf_alu = '$cpf',  WHERE mat_alu = $matricula";
    $alterar = mysqli_query($conexao, $sql);
    
    if ($alterar) {
    // Alerta de sucesso
    echo "<script>
    Swal.fire({
        text: 'Aluno editado com sucesso',
        icon: 'success',
        confirmButtonColor: '#3085d6',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'listarAlunos.php';
        }
    });
    </script>";
    } else {
    // Alerta de erro
    echo "<script>
    Swal.fire({
        text: 'Erro ao editar aluno. Tente novamente',
        icon: 'error',
        confirmButtonColor: '#3085d6',
    });
    </script>";
    }
    } else {
    // Mensagem de erro se os dados do usuário não foram recebidos corretamente
    echo "<script>
    Swal.fire({
        text: 'Aluno não existe',
        icon: 'error',
        confirmButtonColor: '#3085d6',
    });
    </script>";
}
?>