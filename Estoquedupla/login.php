<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>TELA DE LOGIN </title>
</head>
<body>
    <form class="login" action="logar.php" method="post">
        <h2>LOGIN</h2>
        <div class="box-user">
            <input type="text" name="nome" required>
            <label>USUÁRIO</label>
        </div>
        <div class="box-user">
            <input type="password" name="senha" required>
            <label>SENHA</label>
        </div>
        <input type="submit" class="btn" value="Entrar">
        <a href="index_usu.php" type="submit" style="color: white;">NOVO CADASTRO</a>
    </form>
</body>
</html>