<?php
    include "conexao.php";
    include "templateLogin.php";

    if(isset($_POST['nome_alu'])){
        $nome = trim($_POST['nome_alu']);
        $pai = trim($_POST['nome_pai']);
        $mae = trim($_POST['nome_mae']);
        $nasc = trim($_POST['dt_nasc']);
        $sexo = trim($_POST['sexo_alu']);
        $rg = trim($_POST['rg_alu']);
        $cpf = trim($_POST['cpf_alu']);
        $sql = "INSERT INTO alunos (nome_alu, nome_pai, nome_mae, dt_nasc, sexo_alu, rg_alu, cpf_alu) 
        VALUES ('$nome', '$pai', '$mae', '$nasc', '$sexo', '$rg', '$cpf')";

        $incluir = mysqli_query($conexao,$sql);
    
        if($incluir){
            // Alerta de sucesso
            echo "<script>
                    Swal.fire({
                        text: 'Aluno cadastrado com sucesso',
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
                        text: 'Erro ao cadastrar aluno. Tente novamente',
                        icon: 'error',
                        confirmButtonColor: '#3085d6',
                    });
                  </script>";
        }
    }else{
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