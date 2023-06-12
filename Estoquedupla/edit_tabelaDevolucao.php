<?php
    require ("conn.php");
    
    if (isset($_GET['devolucao'])){
        $devolucao = $_GET['devolucao'];
    }
    else{
        #header("Location: menu.php");
    }
    
    $tabela = $pdo->prepare("SELECT * FROM devolucao WHERE id_devolucao=:devolucao;");
    $tabela->execute(array(':devolucao'=>$devolucao));
    $rowTable = $tabela->fetchAll();
?>



<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css" rel="stysheet" >
        <link rel="stylesheet" type="text/css" href=".css" />
        <title>Estoque de devolucaos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1 style="text-align:center;">Edição de Devolução</h1>
            <br>
            <form action="CRUD/update_devolucao.php" method="post" id="formulario">
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <label for="">Data devolução: </label>
                        <input type="date" name="dataDevolucao" id="" class="form-control" value=<?php echo $rowTable[0]['dataDevolucao']?>>
                    </div>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <label for="">Item da devolução: </label>
                        <input type="text" name="itemDevolucao" id="" class="form-control" value=<?php echo $rowTable[0]['itemDevolucao']?>>
                    </div>
                </div>
                <div class="form-group">
                        <label for="unidadeDevolucao">Unidade:</label>
                        <select name="unidadeDevolucao" class="form-control">
                            <option value="caixa">Caixa</option>
                            <option value="pacote">Pacote</option>
                            <option value="avulso">Avulso</option>
                        </select>
                    </div>
                <br>
                <div class="form-group">
                        <label for="">Quantidade:</label>
                        <input type="number" name="qntdDevolucao" id="" class="form-control" value=<?php echo $rowTable[0]['qntdDevolucao']?>>
                    </div>
                    <div class="form-group">
                        <label for="categoriaDevolucao">Categoria:</label>
                        <select name="categoriaDevolucao" class="form-control">
                            <option value="ferramenta">Ferramentas</option>
                            <option value="limpeza">Limpeza</option>
                            <option value="pedagogica">Pedagógico</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Motivo da Devolução:</label>
                        <input type="text" name="dataRetirada" id="" class="form-control" value=<?php echo $rowTable[0]['motivoDevolucao']?>>
                    </div>
                    <br></br>
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <input type="submit" class="btn btn-outline-success" value="SALVAR ALTERAÇÕES">
                        <a href="tabela_devolucao.php" type="button" class="btn btn-outline-info float-end">Tabela Devoluções</a>
                    </div>
                </div>
                <input type="hidden" name='id_devolucao' value=<?php echo $rowTable[0]['id_devolucao']?>>
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