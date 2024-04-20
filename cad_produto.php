<?php
include "conexao.php";
include "templateLogin.php";


if (isset($_POST['nome_prod'])) {
    $nome = trim($_POST['nome_prod']);
    $valor = trim($_POST['val_prod']);
    $qtd = trim($_POST['qtd_prod']);
    $dataCadastro = trim($_POST['dt_val_prod']);


    $sql = "INSERT INTO produto (nome_prod, val_prod, qtd_prod, dt_val_prod) 
        VALUES ('$nome', '$valor', '$qtd', '$dataCadastro')";

    $incluir = mysqli_query($conexao, $sql);


    if ($incluir) {
        // Alerta de sucesso
        echo "<script>
                        Swal.fire({
                            text: 'Produto cadastrado com sucesso',
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
                            text: 'Erro ao cadastrar produto. Tente novamente',
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