<?php
    include_once "conexao.php";
    include_once "templateLogin.php";
    
    if (isset($_GET['id_prod'])){
        $id = $_GET['id_prod'];
     
        $sql = "DELETE FROM produto WHERE id_prod = $id";
        $excluir = mysqli_query($conexao, $sql);
        
        if ($excluir) {
            // Alerta de sucesso
            echo "<script>
            Swal.fire({
                text: 'Produo excluido com sucesso',
                icon: 'success',
                confirmButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'listarProdutos.php';
                }
            });
            </script>";
            } else {
            // Alerta de erro
            echo "<script>
            Swal.fire({
                text: 'Erro ao exluir o produto. Tente novamente',
                icon: 'error',
                confirmButtonColor: '#3085d6',
            });
            </script>";
            }
            } else {
            // Mensagem de erro se os dados do usuário não foram recebidos corretamente
            echo "<script>
            Swal.fire({
                text: 'Produto não existe',
                icon: 'error',
                confirmButtonColor: '#3085d6',
            });
            </script>";
        }
        ?>