<?php
include "conexao.php";
include_once "templateLogin.php";

if(isset($_POST['nome_usu'], $_POST['email_usu'], $_POST['pass_usu'], $_POST['nivel_usu'], $_POST['ativo_usu'])){
    // Receber e limpar os dados do formulário
    $nome = trim($_POST['nome_usu']);
    $email = trim($_POST['email_usu']);
    $senha = trim($_POST['pass_usu']);
    $nivel = trim($_POST['nivel_usu']);
    $ativo = trim($_POST['ativo_usu']);
    
    // Verificar se os campos obrigatórios foram preenchidos
    if(empty($nome) || empty($email) || empty($senha) || empty($nivel) || empty($ativo)){
        echo "<script>
                Swal.fire({
                    text: 'Por favor, preencha todos os campos',
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                });
            </script>";
        exit; // Encerrar o script se algum campo estiver vazio
    }

    // Preparar a query SQL usando prepared statements
    $sql = "INSERT INTO usuario (nome_usu, email_usu, pass_usu, nivel_usu, ativo_usu) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $nome, $email, $senha, $nivel, $ativo);
    
    // Executar a query
    if(mysqli_stmt_execute($stmt)){
        // Alerta de sucesso
        echo "<script>
                Swal.fire({
                    text: 'Usuário cadastrado com sucesso',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
             </script>";
    } else {
       // Alerta de erro ao inserir no banco de dados
        echo "<script>
                Swal.fire({
                    text: 'Erro ao cadastrar usuário. Tente novamente',
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                });
            </script>"; 
    }

    // Fechar a declaração e conexão
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
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