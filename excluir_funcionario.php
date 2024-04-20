<?php
    include_once "conexao.php";
    include_once "templateLogin.php";
    
    if (isset($_GET['id_func'])){
        $matricula = $_GET['id_func'];
     
        $sql = "DELETE FROM funcionario WHERE id_func = $matricula";
        $excluir = mysqli_query($conexao, $sql);
        
        if ($excluir) {
            // Alerta de sucesso
            echo "<script>
            Swal.fire({
                text: 'Funcionário excluido com sucesso',
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
                text: 'Erro ao exluir o funcionário. Tente novamente',
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