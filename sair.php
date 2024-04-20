<?php
// Inicialize a sessão
session_start();

// Limpar todas as variáveis de sessão
$_SESSION = array();

// Apagando cookie de sessão.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finaliza a sessão
session_destroy();

// Redireciona para a página inicial
header("Location: index.php");
exit;
?>