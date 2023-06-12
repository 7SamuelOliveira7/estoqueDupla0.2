<?php
    include("conn.php");
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $usuario = $pdo->prepare('SELECT * FROM usuario where nome=:nome 
    AND senha=:senha');
    $usuario->execute(array(':nome'=>$nome,':senha'=>$senha));

    $rowTabela = $usuario->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Usuario e/ou senha invalidos!!!');
        window.location.href = 'login.php';
        </script>";
    }else{
       
    $sessao = $rowTabela[0];

    if(!isset($_SESSION)) {
    session_start();
    }
    $_SESSION['nome'] = $sessao['nome'];
    $_SESSION['senha'] = $sessao['senha'];

    header("Location: menu.php");
    }

?>








