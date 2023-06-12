<?php
require('../conn.php');
if (isset($_GET['item'])) {
    $item_id = $_GET['item'];
} else {
    #header("Location: menu.php");
}

$del_item = $pdo->prepare('DELETE FROM item WHERE id_item = :item');
$del_item->bindParam(':item', $item_id); // Corrigindo a atribuição do parâmetro
$del_item->execute();
echo "<script>
    alert('Item deletado com sucesso!');
    window.location.href = '../tabela_entrada.php'; // Redireciona para a página inicial após o alerta
</script>";
?>