<?php
require("conn.php");


if (isset($_GET['item'])) {
    $item = $_GET['item'];
} else {
    header("Location: tabela_entrada.php");
    exit();
}

$tabela = $pdo->prepare("SELECT * FROM item WHERE id_item=:item;");
$tabela->execute(array(':item' => $item));
$rowTable = $tabela->fetchAll();

?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>EDIÇÃO DE ITEM</title>
    <link rel="stylesheet" href="css/menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
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
    </style>

<body>
<nav class="navbar navbar-expand-lg bg-faded" style="background-color: #FADDD7; border-color: #000;">
            <a class="navbar-brand" href="menu.php" style="color: #BF7590;"><b>MENU PRINCIPAL</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            </div>
            <div class="d-flex">
                <a href="logout.php" class="botaosair">SAIR</a>
            </div>
        </nav>
    <br><br>
    <div class="container">
        <h1 style="text-align:center; font-weight: bold; color: white;">EDIÇÃO DE ITENS</h1>
        <br>
        <form action="CRUD/update_item.php" method="post" id="formulario" action="editar">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" style=" font-weight: bold; color: white;">MATERIAL </label>
                        <input type="text" name="material" id="" class="form-control" value="<?php echo $rowTable[0]['material']; ?>">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label for="unidade" style=" font-weight: bold; color: white;">UNIDADE</label>
                    <select name="unidade" id="" class="form-control">
                        <option value="caixa" <?php if ($rowTable[0]['unidade'] === 'caixa') echo 'selected'; ?>>Caixa</option>
                        <option value="pacote" <?php if ($rowTable[0]['unidade'] === 'pacote') echo 'selected'; ?>>Pacote</option>
                        <option value="avulso" <?php if ($rowTable[0]['unidade'] === 'avulso') echo 'selected'; ?>>Avulso</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" style=" font-weight: bold; color: white;">QUANTIDADE</label>
                        <input type="number" name="quantidade" id="" class="form-control" value="<?php echo $rowTable[0]['quantidade']; ?>">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" style=" font-weight: bold; color: white;">FORNECEDOR</label>
                        <input type="text" name="fornecedor" id="" class="form-control" value="<?php echo $rowTable[0]['fornecedor']; ?>">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label for="tipo" style=" font-weight: bold; color: white;">TIPO</label>
                    <select name="tipo" id="" class="form-control">
                        <option value="emprestimo" <?php if ($rowTable[0]['tipo'] === 'emprestimo') echo 'selected'; ?>>Emprestimo</option>
                        <option value="nao Emprestimo" <?php if ($rowTable[0]['tipo'] === 'nao Emprestimo') echo 'selected'; ?>>Não emprestimo</option>
                    </select>
                </div>    
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label for="categoria" style=" font-weight: bold; color: white;">CATEGORIA</label>
                    <select name="categoria" id="" class="form-control">
                        <option value="ferramenta" <?php if ($rowTable[0]['categoria'] === 'ferramenta') echo 'selected'; ?>>Ferramentas</option>
                        <option value="limpeza" <?php if ($rowTable[0]['categoria'] === 'limpeza') echo 'selected'; ?>>Limpeza</option>
                        <option value="pedagogica" <?php if ($rowTable[0]['categoria'] === 'pedagogica') echo 'selected'; ?>>Pedagógico</option>
                    </select>
                </div>    
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="botoes">
                        <input type="submit" class="button2" value="SALVAR" style="margin-right: 10px">
                        <a href="tabela_entrada.php" type="button" class="button2">TABELA</a>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_item" value="<?php echo $rowTable[0]['id_item']; ?>">
        </form>
        <div id="resultado"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
