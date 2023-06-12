<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/menu.css"/>
    <title>ENTRADA DE ESTOQUE</title>
    <style>
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
<body style="background-color: #BFB7A8;">
<br>
    <div class="container">
        <h1 class="text-center" style="font-weight: bold; color: white">ENTRADA DE ESTOQUE</h1>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post" id="formulario">
                    <div class="form-group">
                        <label for="" style=" font-weight: bold; color: white;">DATA DE ENTRADA</label>
                        <input type="date" name="dataEntrada" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" style=" font-weight: bold; color: white;">MATERIAL</label>
                        <input type="text" name="material" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="unidade" style=" font-weight: bold; color: white;">UNIDADE</label>
                        <select name="unidade" id="" class="form-control">
                            <option value="caixa">Caixa</option>
                            <option value="pacote">Pacote</option>
                            <option value="avulso">Avulso</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" style=" font-weight: bold; color: white;">QUANTIDADE</label>
                        <input type="number" name="quantidade" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" style=" font-weight: bold; color: white;">FORNECEDOR</label>
                        <input type="text" name="fornecedor" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tipo" style=" font-weight: bold; color: white;">TIPO</label>
                        <select name="tipo" id="" class="form-control">
                            <option value="emprestimo">Emprestimo</option>
                            <option value="naoEmprestimo">Não emprestimo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoria" style=" font-weight: bold; color: white;">CATEGORIA</label>
                        <select name="categoria" id="" class="form-control">
                            <option value="ferramenta">Ferramentas</option>
                            <option value="limpeza">Limpeza</option>
                            <option value="pedagogica">Pedagógico</option>
                        </select>
                    </div>
                    <br>
                    <div class="botoes">
                        <input type="submit" class="button2" value="CADASTRAR" style="margin-right: 10px;">
                        
                        <a href="tabela_entrada.php" type="button" class="button2" style="text-align: center;">ESTOQUE</a>
                    </div>
                </form>
                <div id="resultado"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $("#formulario").submit(function(event){
            event.preventDefault();
            var dados =  $(this).serialize();
            $.ajax({
                type:'POST',
                url:'CRUD/cad_item.php',
                data: dados,
                success: function(data){
                    $("#resultado").html(data);
                }
            });
        });
    </script>
</body>
</html>
