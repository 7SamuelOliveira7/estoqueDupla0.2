<?php
    require('../conn.php');

    $sala = $_POST['sala'];
   
    if(empty($sala)){
        echo "Os valores não podem ser vazios";
    }else{
        $cad_chave = $pdo->prepare("INSERT INTO chave(sala) 
        VALUES(:sala)");
        $cad_chave->execute(array(
            ':sala'=> $sala
        ));

        echo "<script>
        alert('Chave nova Cadastrada com sucesso!');
        </script>";
    }
?>


