<?php
    require('../conn.php');

    $dataDevolucao = $_POST['dataDevolucao'];
    $itemDevolucao = $_POST['itemDevolucao'];
    $unidadeDevolucao = $_POST['unidadeDevolucao'];
    $qntdDevolucao = $_POST['qntdDevolucao'];
    $categoriaDevolucao = $_POST['categoriaDevolucao'];
    $motivoDevolucao = $_POST['motivoDevolucao'];

   
    if(empty($dataDevolucao) || empty($itemDevolucao) || empty($unidadeDevolucao) || empty($qntdDevolucao) || empty($categoriaDevolucao) || empty($motivoDevolucao)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_devolucao = $pdo->prepare("INSERT INTO devolucao(dataDevolucao, itemDevolucao, unidadeDevolucao, qntdDevolucao, categoriaDevolucao, motivoDevolucao) 
        VALUES(:dataDevolucao, :itemDevolucao, :unidadeDevolucao, :qntdDevolucao, :categoriaDevolucao, :motivoDevolucao)");
        $cad_devolucao->execute(array(
            ':dataDevolucao'=> $dataDevolucao,
            ':itemDevolucao'=> $itemDevolucao,
            ':unidadeDevolucao'=> $unidadeDevolucao,
            ':qntdDevolucao'=> $qntdDevolucao,
            ':categoriaDevolucao'=> $categoriaDevolucao,
             ':motivoDevolucao'=> $motivoDevolucao   
        ));

        echo "<script>
        alert('Devolução nova Cadastrado com sucesso!');
        window.location.href = 'tabela_devolucao.php'; // Redireciona para a página inicial após o alerta
        </script>";
    }
?>
