<?php
    include_once "conexao.php";
    include_once "templateLogin.php";
    
    if (isset($_GET['id_usu'])){
        $id = $_GET['id_usu'];
     
        $sql = "DELETE FROM usuario WHERE id_usu = $id";
        $excluir = mysqli_query($conexao, $sql);
        
        if ($excluir) {
            // Alerta de sucesso
            echo "<script>
            Swal.fire({
                text: 'Usuário Excluido com sucesso',
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
                text: 'Erro ao exluir o usuário. Tente novamente',
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