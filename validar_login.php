<?php
include_once "conexao.php";

// Captura os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($dados['email_usu'])) {
        $retorna = ['status' => false, 'msg' => "Preencha o campo e-mail"];
    } elseif (empty($dados['pass_usu'])) {
        $retorna = ['status' => false, 'msg' => "Erro: Preencha o campo senha!"];
    } else {
        // Consulta SQL para verificar o login
        $email = $_POST["email_usu"];
        $senha = $_POST["pass_usu"];
        $sql = "SELECT * FROM usuario WHERE email_usu = '$email' AND pass_usu = '$senha'";
        $resultado = mysqli_query($conexao, $sql);

        // Verifica se o usuário foi encontrado no banco de dados
        if (mysqli_num_rows($resultado) == 1) {
            
            // Inicia a sessão e redireciona para a página listaraluario.php
            session_start();
            $_SESSION["logged_in"] = true;
            $retorna = ['status' => true, 'msg' => "Login realizado com sucesso!"];
        } else {
            // Caso contrário, retorna uma mensagem de erro
            $retorna = ['status' => false, 'msg' => "E-mail ou senha incorretos. Por favor, tente novamente."];
        }
    }

    // Retorna os dados JSON
    header('Content-Type: application/json');
    echo json_encode($retorna);
}
?>