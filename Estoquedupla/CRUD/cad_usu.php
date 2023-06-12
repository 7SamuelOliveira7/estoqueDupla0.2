<?php
    require('../conn.php');
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    if(empty($nome) || empty($email) || empty($cpf) || empty($senha)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_usu = $pdo->prepare("INSERT INTO usuario(nome, email, cpf, senha)
        VALUES(:nome, :email, :cpf, :senha)");
        $cad_usu->execute(array(
            ':nome'=> $nome,
            ':email'=> $email,
            ':cpf'=> $cpf,
            ':senha'=> $senha
        ));
        header('Location: ../login.php');
    }

?>

