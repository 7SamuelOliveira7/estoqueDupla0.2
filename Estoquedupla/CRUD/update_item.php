<?php
require('../conn.php');

$material = $_POST['material'];
$unidade = $_POST['unidade'];
$quantidade = $_POST['quantidade'];
$fornecedor = $_POST['fornecedor'];
$tipo = $_POST['tipo'];
$categoria = $_POST['categoria'];
$id_item = $_POST['id_item'];

if (empty($material) || empty($unidade) || empty($quantidade) || empty($fornecedor) || empty($tipo) || empty($categoria)) {
    echo "Os valores não podem ser vazios";
} else {
    $update_item = $pdo->prepare("UPDATE item SET
        material = :material, 
        unidade = :unidade, 
        quantidade = :quantidade, 
        fornecedor = :fornecedor,
        tipo = :tipo,
        categoria = :categoria 
        WHERE id_item = :id_item;");

    $update_item->execute(array(
        ':material' => $material,
        ':unidade' => $unidade,
        ':quantidade' => $quantidade,
        ':fornecedor' => $fornecedor,
        ':tipo' => $tipo,
        ':categoria' => $categoria,
        ':id_item' => $id_item
    ));

    header("Location: ../tabela_entrada.php");
    exit();
}
?>