<?php
    require("conn.php");

    $tabela = $pdo->prepare("SELECT id_usuario, nome, email, senha, cpf 
    FROM usuario;");
    // $tabela->execute();
    // $rowTabela = $tabela->fetchAll();
    
    if (empty($rowTabela)){
        echo "<script>
        alert('Tabela atualizada!!!');
        </script>";
    }
    if(!empty($_GET['search'])){
        $search = $_GET['search'];
        $tabela = $pdo->prepare("SELECT id_usuario, nome, email, senha, cpf
        FROM usuario WHERE id_usuario = :search OR nome LIKE :searchTerm OR email LIKE :searchTerm");
        $tabela->bindValue(':search', $search);
        $tabela->bindValue(':searchTerm', "%$search%");
        $tabela->execute();
        $rowTabela = $tabela->fetchAll();
    }
    else{
        $tabela = $pdo->prepare("SELECT id_usuario, nome, email, senha, cpf
        FROM usuario;");
        $tabela->execute();
        $rowTabela = $tabela->fetchAll();
    }
?>



<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/menu.css"/>
        <title>Tabela de Usuarios</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <style>
        body{
            background: linear-gradient(to right, rgb(fff), rgb(17, 54, 71));
            color: black;
            text-align: center;
        }
        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
        }

        .box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
        }

        .navbar-brand {
            margin-left: 10px;
        }

        .d-flex {
            margin-left: auto;
        }

        .botaosair {
            margin-right: 10px;
        }
    </style>
    </head>
    <body style="background-color: #C7C7B5;">
    <nav class="navbar navbar-expand-lg bg-faded" style="background-color: #FADDD7; border-color: #000;">
        <a class="navbar-brand" href="tabela_usu.php" style="color: #BF7590;"><b>USUÁRIOS CADASTRADOS</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="menu.php">Menu Principal <span class="sr-only"></span></a>
                    </li>
                </ul>
            </div>
        <div class="d-flex">
            <a href="logout.php" class="botaosair">SAIR</a>
        </div>
    </nav>
    <br><br>

        <h1 style="text-align:center; color: white;">USUÁRIOS CADASTRADOS</h1>
        <br>
        <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-outline-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
        </div>
        <br><br>

        <div class="container" style="background-color: white; padding: 20px; border-radius: 10px;">
            <br>  
        <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID USUÁRIO</th>
            <th scope="col">NOME</th>
            <th scope="col">EMAIL</th>
            <th scope="col">SENHA</th>
            <th scope="col">CPF</th>
            <th scope="col">EDITAR USUÁRIO</th>
            <th scope="col">EXCLUIR USUÁRIO</th>
            </tr>
        </thead>
        <tbody>
        <?php
            
            foreach ($rowTabela as $linha){
                echo '<tr>';
                echo "<th scope='row'>".$linha['id_usuario']."</th>";
                echo "<td>".$linha['nome']."</td>";
                echo "<td>".$linha['email']."</td>";
                echo "<td>".$linha['senha']."</td>";
                echo "<td>".$linha['cpf']."</td>";
                echo '<td><a href=CRUD\update_usu.php?usuario='.$linha['id_usuario'].' class="btn btn-warning">Editar</a></td>';
                echo '<td><a href="CRUD\delete_usu.php?usuario='.$linha['id_usuario'].'" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                </svg></a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
        </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
    <script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'tabela_usu.php?search='+search.value;
    }
</script>
</html>