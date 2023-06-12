<?php

function popUp($titulo, $texto, $botao, $sucesso){

if($sucesso = true){
    $icon = 'success';

}else{
    $icon = 'error';
}

    echo "
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: ".$titulo.",
                text: ".$texto.",
                icon: ".$icon.",
                confirmButtonText: ".$botao."
            });
        });
    </script>
    ";
    
    $_SESSION['popup_exibido'] = true;
};

    session_start();

    if (isset($_SESSION['nome'])) {
        if (!isset($_SESSION['popup_exibido'])) {
            
            popUp('Bem-vindo!','Seja bem-vindo,'.$_SESSION['nome'].' :)','Fechar', true);
            
            // echo "
            // <script>
            //     document.addEventListener('DOMContentLoaded', function() {
            //         Swal.fire({
            //             title: 'Bem-vindo!',
            //             text: 'Seja bem-vindo, {]}! :)',
            //             icon: 'error',
            //             confirmButtonText: 'Fechar'
            //         });
            //     });
            // </script>
            // ";

            $_SESSION['popup_exibido'] = true;
        }
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="CSS/menu.css" />
        <style>
        body {
            background-color: #C7C7B5;
        }
        .navbar-nav .nav-link {
            color: #BF7590;
        }
        .btn {
            background-color: #F2CCB6;
        }
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
    </head>
    <title>MENU</title>
    <body>
      
    <!--Barra de navegação-->
    <nav class="navbar navbar-expand-lg bg-faded" style="background-color: #FADDD7; border-color: #000;">
            <a class="navbar-brand" href="menu.php" style="color: #BF7590;"><b>MENU PRINCIPAL</b></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            </div>
            <div class="d-flex">
                <a href="logout.php" class="botaosair" style="text-align: center;">SAIR</a>
            </div>
        </nav>
<br><br>

        <div class="d-flex justify-content-center align-items-center" style="height: 75vh; font-weight: bold;">
            <div>
                <form method="post" action="tabela_entrada.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px; background-color: #FADDD7; color:#BF7590; font-weight: bold;" value="ESTOQUE GERAL">
                </form>

                <br>
                <form method="post" action="tabela_chave.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px; background-color: #FADDD7; color:#BF7590; font-weight: bold;" value="ESTOQUE DE CHAVES">
                </form>
                <br>
                <form method="post" action="tabela_devolucao.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px; background-color: #FADDD7; color:#BF7590; font-weight: bold;" value="DEVOLUÇÃO DE ESTOQUE">
                </form>
                <br>
                <form method="post" action="tabela_usu.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px; background-color: #FADDD7; color:#BF7590; font-weight: bold;" value="USUÁRIOS CADASTRADOS">
                </form>
                <br>
                <form method="post" action="historico.php">
                    <input type="submit" class="btn btn-secondary btn-lg btn-block" style="width: 450px; height: 70px; background-color: #FADDD7; color:#BF7590; font-weight: bold;" value="HISTÓRICO DE ITENS">
                </form>
            </div>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    <!-- script do Bootstrap -->
   <script src="js/bootstrap.bundle.min.js"></script>
   
  </body>
  
</html>