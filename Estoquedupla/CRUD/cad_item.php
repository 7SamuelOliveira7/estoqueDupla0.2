<?php
    require('../conn.php');

    $dataEntrada = $_POST['dataEntrada'];
    $material = $_POST['material'];
    $unidade = $_POST['unidade'];
    $quantidade = $_POST['quantidade'];
    $fornecedor = $_POST['fornecedor'];
    $tipo = $_POST['tipo'];
    $categoria = $_POST['categoria'];
   
    if(empty($dataEntrada) || empty($material) || empty($unidade) || empty($quantidade) || empty($fornecedor) || empty($tipo) || empty($categoria)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_item = $pdo->prepare("INSERT INTO item(dataEntrada, material, unidade, quantidade, fornecedor, tipo, categoria) 
        VALUES(:dataEntrada, :material, :unidade, :quantidade, :fornecedor, :tipo, :categoria)");
        $cad_item->execute(array(
            ':dataEntrada'=> $dataEntrada,
            ':material'=> $material,
            ':unidade'=> $unidade,
            ':quantidade'=> $quantidade,
            ':fornecedor'=> $fornecedor,
            ':tipo'=> $tipo,
             ':categoria'=> $categoria    
        ));

        echo "<script>
        alert('Item Cadastrada com sucesso!');
        </script>";
    }
?>