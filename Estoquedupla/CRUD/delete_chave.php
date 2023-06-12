<?php
    require('../conn.php');

    if (isset($_GET['chave'])) {
        $chave = $_GET['chave'];
    } else {
        #header("Location: ../tabela_chave.php");
    }
    
    $del_chave = $pdo->prepare('DELETE FROM chave WHERE id_chave = :chave');
    $del_chave->bindParam(':chave', $chave); // Corrigindo a atribuição do parâmetro
    $del_chave->execute();
    
    echo "<script>
        alert('Chave deletada com sucesso!');
        window.location.href = '../tabela_chave.php'; // Redireciona para a página inicial após o alerta
    </script>";
?>
