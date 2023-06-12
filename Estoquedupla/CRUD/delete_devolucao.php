<?php
require('../conn.php');
if (isset($_GET['id_devolucao'])) {
    $id_devolucao = $_GET['id_devolucao'];
} else {
    #header("Location: ../tabela_devolucao.php");
}

$del_devolucao = $pdo->prepare('DELETE FROM devolucao WHERE id_devolucao=:devolucao');
$del_devolucao->execute(array(':devolucao'=>$id_devolucao));

echo "<script>
    alert('id_devolucao deletada com sucesso!');
    window.location.href = '../index_devolucao.php'; // Redireciona para a página inicial após o alerta
</script>";
?>
