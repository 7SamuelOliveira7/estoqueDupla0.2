<?php
    require("conn.php");
    

    $tabela = $pdo->prepare("SELECT id_retirada, id_item, material, quantidade_retirada, data_retirada, resp_material
    FROM  itens_retirados;");
    $tabela->execute();
    $rowTabela = $tabela->fetchAll();
    
    if (isset($_SESSION['id'])) {
        $usuarioLogadoId = $_SESSION['id'];
    }
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Histórico de retirada</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
        <h1 style="text-align:center;">Histórico de retirada</h1>
        <br>  
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"><b>PEDINTE</b></th>
                    <th scope="col"><b>PRODUTO RETIRADO</b></th>
                    <th scope="col"><b>QUANTIDADE RETIRADA</b></th>
                    <th scope="col"><b>DATA DA RETIRADA</b></th>
                    <th scope="col"><b>RESPONSÁVEL PELO MATERIAL</b></th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                    foreach ($rowTabela as $linha){
                        echo '<tr>';
                        echo "<td>".$linha['id_item']."</td>";
                        echo "<td>".$linha['material']."</td>";
                        echo "<td>".$linha['quantidade_retirada']."</td>";
                        echo "<td>".$linha['data_retirada']."</td>";
                        echo "<td>".$linha['resp_material']."</td>";
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>