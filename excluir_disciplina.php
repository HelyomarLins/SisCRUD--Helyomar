<?php
    include_once "conexao.php";
    include_once "templateLogin.php";
    
    if (isset($_GET['id_disc'])){
        $id = $_GET['id_disc'];
     
        $sql = "DELETE FROM disciplina WHERE id_disc = $id";
        $excluir = mysqli_query($conexao, $sql);
        
        if ($excluir) {
            // Alerta de sucesso
            echo "<script>
            Swal.fire({
                text: 'Disciplina excluido com sucesso',
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
                text: 'Erro ao exluir a disciplina. Tente novamente',
                icon: 'error',
                confirmButtonColor: '#3085d6',
            });
            </script>";
            }
            } else {
            // Mensagem de erro se os dados do usuário não foram recebidos corretamente
            echo "<script>
            Swal.fire({
                text: 'Disdiplina não existe',
                icon: 'error',
                confirmButtonColor: '#3085d6',
            });
            </script>";
        }
        ?>