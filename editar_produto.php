<?php
include "conexao.php";
include "templateLogin.php";

if(isset($_POST['id_prod'], $_POST['nome_prod'], $_POST['val_prod'], $_POST['qtd_prod'], $_POST['dt_val_prod'])) {
    $id = $_POST['id_prod'];
    $nome = trim($_POST['nome_prod']);
    $valor = trim($_POST['val_prod']);
    $qtd = trim($_POST['qtd_prod']);
    $validade = trim($_POST['dt_val_prod']);
       
    // Evitar injeção de SQL escapando os valores
    $nome = mysqli_real_escape_string($conexao, $nome);
    $valor = mysqli_real_escape_string($conexao, $valor);
    $qtd = mysqli_real_escape_string($conexao, $qtd);
    $validade = mysqli_real_escape_string($conexao, $validade);
    
    // Atualizar registro no banco de dados
    $sql = "UPDATE produto SET nome_prod = '$nome', val_prod = '$valor', qtd_prod = '$qtd', dt_val_prod = '$validade' WHERE id_prod = $id";
    $alterar = mysqli_query($conexao, $sql);

    if ($alterar) {
        // Alerta de sucesso
        echo "<script>
        Swal.fire({
            text: 'Produto editado com sucesso',
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
            text: 'Erro ao editar o produto. Tente novamente',
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