<?php
    require ("conn.php");

    if (isset($_GET['chave'])){
        $chave = $_GET['chave'];
    }
    else{
        header("Location: menu.php");
    }
    
    $tabela = $pdo->prepare("SELECT * FROM chave WHERE id_chave=:chave;");
    $tabela->execute(array(':chave'=>$chave));
    $rowTable = $tabela->fetchAll();
?>



<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stysheet" >
        <link rel="stylesheet" type="text/css" href=".css" />
        <title>Estoque de chaves</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            <h1 style="text-align:center;">Estoque de Chaves</h1>
            <br>
            <form action="CRUD/update_chave.php" method="post" id="formulario">
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <label for="">Sala: </label>
                        <input type="text" name="sala" id="" class="form-control" value=<?php echo $rowTable[0]['sala']?>>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <label for="">Ultima Pessoa Retirar: </label>
                        <input type="text" name="pessoaRetirada" id="" class="form-control" value=<?php echo $rowTable[0]['pessoaRetirada']?>>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <label for="">Data da Ultima Retirada: </label>
                        <input type="date" name="dataRetirada" id="" class="form-control" value=<?php echo $rowTable[0]['dataRetirada']?>>
                    </div>
                </div>
                <br>
                <label for="">Estado da Chave: </label>
                    <select name="estado" id="">
                    <option value="emprestado">emprestado</option>
                    <option value="estoque">no estoque</option>
                </select>
                <br></br>
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-outline-success" value="SALVAR ALTERAÇÕES">
                        <a href="tabela_chave.php" type="button" class="btn btn-outline-info float-end">Tabela de Chaves</a>
                    </div>
                </div>
                <input type="hidden" name='id_chave' value=<?php echo $rowTable[0]['id_chave']?>>
            </form>
            <div id="resultado"></div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.6.4.js"
        integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>