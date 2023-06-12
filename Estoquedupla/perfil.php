<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['usuarioLogado']) || !$_SESSION['usuarioLogado']) {
    header("Location: login.php"); // Redireciona para a página de login
    exit();
}

// Obtém as informações do usuário (substitua com sua lógica de obtenção dos dados do banco de dados)
$usuarioNome = $_SESSION['usuarioNome'];

// Exiba as informações do usuário
echo "Bem-vindo, $usuarioNome! Seu perfil está aqui.";
?>