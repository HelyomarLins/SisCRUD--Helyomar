<?php
include "conexao.php";
include "templateLogin.php";

if(isset($_POST['id_usu'], $_POST['nome_usu'], $_POST['email_usu'], $_POST['pass_usu'], $_POST['nivel_usu'],
 $_POST['ativo_usu'])) {
    $id = $_POST['id_usu'];
    $nome = trim($_POST['nome_usu']);
    $email = trim($_POST['email_usu']);
    $pass = trim($_POST['pass_usu']);
    $nivel = trim($_POST['nivel_usu']);
    $ativo = trim($_POST['ativo_usu']);
    
    // Evitar injeção de SQL escapando os valores
    $nome = mysqli_real_escape_string($conexao, $nome);
    $email = mysqli_real_escape_string($conexao, $email);
    $pass = mysqli_real_escape_string($conexao, $pass);
    $nivel = mysqli_real_escape_string($conexao, $nivel);
    $ativo = mysqli_real_escape_string($conexao, $ativo);
    
    // Atualizar registro no banco de dados
    $sql = "UPDATE usuario SET nome_usu = '$nome', email_usu = '$email', pass_usu = '$pass', nivel_usu = '$nivel',
            ativo_usu = '$ativo' WHERE id_usu = $id";
    $alterar = mysqli_query($conexao, $sql);

    if ($alterar) {
        // Alerta de sucesso
        echo "<script>
        Swal.fire({
            text: 'Usuário editado com sucesso',
            icon: 'success',
            confirmButtonColor: '#3085d6',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'listarUsuarios.php';
            }
        });
        </script>";
        } else {
        // Alerta de erro
        echo "<script>
        Swal.fire({
            text: 'Erro ao editar o usuário. Tente novamente',
            icon: 'error',
            confirmButtonColor: '#3085d6',
        });
        </script>";
        }
        } else {
        // Mensagem de erro se os dados do usuário não foram recebidos corretamente
        echo "<script>
        Swal.fire({
            text: 'Usuário não existe',
            icon: 'error',
            confirmButtonColor: '#3085d6',
        });
        </script>";
    }
    ?>