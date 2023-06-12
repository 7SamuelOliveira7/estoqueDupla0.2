<?php
require("conn.php");

if (isset($_GET['item'])) {
    $item_id = $_GET['item']; // ID do item a ser retirado

    // Verificar se o item existe no banco de dados
    $item_query = "SELECT * FROM item WHERE id_item = :item_id";
    $item_stmt = $pdo->prepare($item_query);
    $item_stmt->bindParam(':item_id', $item_id);
    $item_stmt->execute();

    if ($item_stmt->rowCount() == 0) {
        echo "<script>alert('Item não encontrado.');</script>";
        exit;
    }

    $item = $item_stmt->fetch();
}

if (isset($_POST['retirar'])) {
    $quantidade = $_POST['quantidade'];

    // Verificar se a quantidade é válida (maior que zero)
    if ($quantidade <= 0) {
        echo "<script>alert('Quantidade inválida.');</script>";
    } else {
        $quantidade_atual = $item['quantidade'];

        // Verificar se a quantidade a ser retirada é maior do que a quantidade atual
        if ($quantidade > $quantidade_atual) {
            echo "<script>alert('A quantidade a ser retirada é maior do que a quantidade disponível.');</script>";
        } else {
            // Atualizar a quantidade no banco de dados
            $nova_quantidade = $quantidade_atual - $quantidade;

            $update_query = "UPDATE item SET quantidade = :nova_quantidade WHERE id_item = :item_id";
            $update_stmt = $pdo->prepare($update_query);
            $update_stmt->execute(['nova_quantidade' => $nova_quantidade, 'item_id' => $item_id]);

            if ($update_stmt->rowCount() > 0) {
                // Inserir o item retirado na tabela "itens_retirados"
                $insert_query = "INSERT INTO itens_retirados (id_item, material, quantidade_retirada, resp_material) VALUES (?, ?, ?, ?)";
                $insert_stmt = $pdo->prepare($insert_query);
                $insert_stmt->execute([$item_id, $item['material'], $quantidade, $resp_material]);

                if ($insert_stmt->rowCount() > 0) {
                    echo "<script>
                    alert('Item retirado com sucesso!');
                    window.location.href = 'tabela_entrada.php'; // Redireciona para a página inicial após o lacre
                    </script>";

                    exit;
                } else {
                    echo "<script>alert('Erro ao inserir na tabela de itens retirados.');</script>";
                }
            } else {
                echo "<script>alert('Erro ao atualizar a quantidade.');</script>";
            }
            
        }
    }
}
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css" />
    <title>Retirar Entrada</title>
    <style>
        body {background-color: #473959;}
        .navbar-nav .nav-link {color: #BF7590;}
        .btn {background-color: #918D8A;}

        .button {
            display: inline-block;
            background-color: #4CAF50;
            border: none;
            color: white;
            text-align: center;
            font-size: 16px;
            padding: 10px;
            width: 120px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            position: relative;
            overflow: hidden;
        }

        .button span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .button:hover span {
            padding-right: 25px;
        }

        .button:hover span:after {
            opacity: 1;
            right: 0;
        }

        .botaosair {
            text-align: center;
        }

    </style>
</head>

<body style="background-color: #473959;">
    <nav class="navbar navbar-expand-lg bg-faded" style="background-color: #FADDD7; border-color: #000;">
        <a class="navbar-brand" href="menu.php" style="color: #BF7590;"><b>MENU PRINCIPAL</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
           
        <div class="d-flex">
            <a href="logout.php" class="botaosair">SAIR</a>
        </div>
    </nav>
    <br><br>

    <div class="row justify-content-center">
        <h2 style="text-align: center; font-weight: bold; color: white;">RETIRAR ENTRADA</h2>
        <form method="POST" action="" class="col-md-6">
            <div class="form-group">
                <label for="material" style=" font-weight: bold; color: white;">MATERIAL</label>
                <input type="text" class="form-control" id="material" name="material" value="<?php echo $item['material']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="quantidade_estoque" style=" font-weight: bold; color: white;">QUANTIDADE EM ESTOQUE</label>
                <input type="text" class="form-control" id="quantidade_estoque" name="quantidade_estoque" value="<?php echo $item['quantidade']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="quantidade" style=" font-weight: bold; color: white;">QUANTIDADE A RETIRAR</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" max="<?php echo $item['quantidade']; ?>" required>
            </div>
            <br>
            <div class="form-group">
            <label for="resp_material" style=" font-weight: bold; color: white;">RESPONSÁVEL</label>
                <input type="text" class="form-control" id="resp_material" name="resp_material" min="1" max="<?php echo $item['resp_material']; ?>" required>
            </div>

            <div class="botoes" style="text-align">
                <button type="submit" name="retirar" class="button2" href="tabela_venda.php" style="margin-right: 10px;">RETIRAR</button>
                <a href="tabela_entrada.php" type="button" class="button2" style="text-align: center;">ESTOQUE</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>