<?php
    include_once "conexao.php";
    include_once "templateLogin.php";
    
    if (isset($_GET['mat_alu'])){
        $matricula = $_GET['mat_alu'];
     
        $sql = "DELETE FROM alunos WHERE mat_alu = $matricula";
        $excluir = mysqli_query($conexao, $sql);
        
        if ($excluir) {
            // Alerta de sucesso
            echo "<script>
            Swal.fire({
                text: 'Aluno excluido com sucesso',
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
                text: 'Erro ao exluir o aluno. Tente novamente',
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