<?php
    require('../conn.php');

    $id_chave = $_POST['id_chave'];
    $sala = $_POST['sala'];
    $pessoaRetirada = isset($_POST['pessoaRetirada']) ? $_POST['pessoaRetirada'] : null; //metodo pra permitir que o dado seja vazio
    $dataRetirada = $_POST['dataRetirada'];
    $estado = $_POST['estado'];

    if(empty($sala) || empty($dataRetirada) || empty($estado) || empty($id_chave)){
        echo "Os valores não podem ser vazios";
    }else{
        $update_chave = $pdo->prepare("UPDATE chave SET 
        sala = :sala, 
        pessoaRetirada = :pessoaRetirada, 
        dataRetirada = :dataRetirada, 
        estado = :estado WHERE 
        id_chave = :id_chave;");
    

    $update_chave->execute(array(
        ':sala'=> $sala,
        ':pessoaRetirada'=> $pessoaRetirada,
        ':dataRetirada'=> $dataRetirada,
        ':estado'=> $estado,
        ':id_chave' => $id_chave,
    ));

    header('Location: ../tabela_chave.php');
    }

?>
