<?php
require('../conn.php');

$itemDevolucao = $_POST['itemDevolucao'];
$unidadeDevolucao = $_POST['unidadeDevolucao'];
$qntdDevolucao = $_POST['qntdDevolucao'];
$categoriaDevolucao = $_POST['categoriaDevolucao'];
$id_devolucao = $_POST['id_devolucao'];

if (empty($itemDevolucao) || empty($unidadeDevolucao) || empty($qntdDevolucao) || empty($categoriaDevolucao)) {
    echo "Os valores não podem ser vazios";
} else {
    $update_item = $pdo->prepare("UPDATE devolucao SET
        itemDevolucao = :itemDevolucao, 
        unidadeDevolucao = :unidadeDevolucao, 
        qntdDevolucao = :qntdDevolucao,
        categoriaDevolucao = :categoriaDevolucao 
        WHERE id_devolucao = :id_devolucao;");

    $update_item->execute(array(
        ':itemDevolucao' => $itemDevolucao,
        ':unidadeDevolucao' => $unidadeDevolucao,
        ':qntdDevolucao' => $qntdDevolucao,
        ':categoriaDevolucao' => $categoriaDevolucao,
        ':id_devolucao' => $id_devolucao
    ));

    header("Location: ../tabela_devolucao.php");
    exit();
}
?>