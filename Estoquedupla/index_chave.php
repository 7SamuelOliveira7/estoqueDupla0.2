<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu.css">
    <title>Estoque de Chaves</title>
</head>
<body style="background-color: #C7C7B5;">
    <br><br>

    <div class="container">
        <h1 style="text-align: center; font-weight: bold; color: white;">ESTOQUE DE CHAVES</h1>
        <br>
        <form action="edit_chave.php" method="post" id="formulario">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" style="font-weight: bold; color: white">SALA</label>
                        <input type="text" name="sala" id="sala" class="form-control">
                    </div>
                    
                    <br></br>
                    <div class="botoes">
                        <input type="submit" class="button2" value="CADASTRAR" style="margin-right: 10px">
                        <a href="tabela_chave.php" type="button" class="button2" style="text-align: center;">TABELA</a>
                    </div>
                </div>
            </div>
        </form>
        <div id="resultado"></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>
        $("#formulario").submit(function(event){
            event.preventDefault();
            var dados =  $(this).serialize();
            $.ajax({
                type:'POST',
                url:'CRUD/cad_chave.php',
                data: dados,
                success: function(data){
                    $("#resultado").html(data);
                }
            });
        });
    </script>
</body>
</html>
