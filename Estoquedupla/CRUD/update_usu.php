<?php
    require('../conn.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtenha os dados atualizados do formulário
        $id_usuario = $_POST['id_usuario'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $cpf = $_POST['cpf'];
        
        // Atualize os dados no banco de dados
        $update_usuario = $pdo->prepare("UPDATE usuario SET nome = :nome, email = :email, senha = :senha, cpf = :cpf WHERE id_usuario = :id_usuario");
        $update_usuario->bindValue(':nome', $nome);
        $update_usuario->bindValue(':email', $email);
        $update_usuario->bindValue(':senha', $senha);
        $update_usuario->bindValue(':cpf', $cpf);
        $update_usuario->bindValue(':id_usuario', $id_usuario);
        $update_usuario->execute();
    
        // Redirecione de volta para a página tabela_usu.php após a atualização
        header("Location: ../tabela_usu.php");
        exit();
    }
    
    
?>



<!DOCTYPE HTML>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, rgb(fff), rgb(17, 54, 71));
            color: black;
            text-align: center;
        }

        .container {
            width: 50%;
            margin-top: 50px;
        }
    </style>
</head>
<body style="background-color: #473959;">
    <div class="container">
        <h1 style="text-align: center; color: white;">Editar Usuário</h1>
        <br>

        <?php
        // Recuperar os dados do usuário a ser editado
        if (!empty($_GET['usuario'])) {
            $id_usuario = $_GET['usuario'];

            $select_usuario = $pdo->prepare("SELECT id_usuario, nome, email, senha, cpf FROM usuario WHERE id_usuario = :id_usuario");
            $select_usuario->bindValue(':id_usuario', $id_usuario);
            $select_usuario->execute();
            $usuario = $select_usuario->fetch();

            if (!$usuario) {
                echo "<p>Usuário não encontrado.</p>";
            } else {
        ?>
                <form method="POST" action="update_usu.php">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $usuario['nome']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $usuario['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $usuario['senha']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpf" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $usuario['cpf']; ?>" required>
                    </div>
                    <input type="hidden" name="id_usuario" value="<?php echo $usuario['id_usuario']; ?>">
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
        <?php
            }
        } else {
            echo "<p>ID do usuário não fornecido.</p>";
        }
        ?>

    </div>
</body>
</html>