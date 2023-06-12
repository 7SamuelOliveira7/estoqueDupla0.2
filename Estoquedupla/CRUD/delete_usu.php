<?php
require('../conn.php');

if (isset($_GET['usuario'])) {
    $usuario = $_GET['usuario'];

    $del_usuario = $pdo->prepare('DELETE FROM usuario WHERE id_usuario = :usuario');
    $del_usuario->bindParam(':usuario', $usuario);

    if ($del_usuario->execute()) {
        echo "<script>
            alert('usuario deletado com sucesso!');
            window.location.href = '../tabela_usu.php'; // Redireciona para a página inicial após o alerta
        </script>";
    } else {
        echo "Erro ao deletar o usuario.";
    }
     } else {
     header("Location: ../menu.php");
     }
?>

