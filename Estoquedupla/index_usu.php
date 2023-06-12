
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CADATRAR USUÁRIO</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>
    </style>
</head>
<body>
    <div class="login">
        <form action="CRUD/cad_usu.php" method="post" id="formulario">
            <input type="hidden" name="acao" value="cadastrar"><!--manda o campo oculto  -->
            <div class="quadrado">    
                <legend><h2>CADASTRO DE USUÁRIOS</h2></legend>
                <br>
                <div class="box-user">
                    <input type="text" name="nome" id="" required>
                    <label for="nome">NOME </label>
                </div>
                <br><br>
                <div class="box-user">
                    <input type="text" name="email" id="" required>
                    <label for="" >EMAIL</label>
                </div>
                <br><br>
                <div class="box-user">
                    <input type="number" name="cpf" id="" required>
                    <label for="" >CPF</label>
                </div>
                <br>
                <div class="box-user">
                    <input type="password" name="senha" id="" required>
                    <label for="" >SENHA</label>
                </div>
                <div class="form-group offset-md-3">
                    <div class="col-md-6">
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="CADASTRAR">
                        <a href="login.php" type="submit" style="color: white;">JA É CADASTRADO?</a>
                    </div>
                </div>
                <br><br>
            </div>    
            
            <script>
            $("#formulario").submit(function(){
                event.preventDefault();
                var dados =  $(this).serialize();
                $.ajax({
                    type:'POST',
                    url:'(CRUD/cad_usu.php)',
                    data: dados,
                    success: function(data){
                        $("#resultado").html(data);
                    }
                });
            });
        </script>
        </form>
    </div>
</body>
</html>