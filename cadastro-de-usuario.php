<?php
include "banco/connect.php";

if (isset($_SESSION["id_usuario"]) AND $_SESSION["id_usuario"] =! 1){
    $msg = "Sentimos muito, mas infelizmente você não possui autorização de acesso para acessar a página usuários.";
    $_SESSION["texto_alerta"] = $msg;
    header("Location: home.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $enviarEmail = isset($_POST["email"]) ? $_POST["email"] : "";
    if($enviarEmail != '' AND filter_var($enviarEmail, FILTER_VALIDATE_EMAIL)){
        mail($enviarEmail,"Convite de cadastro no sistema",random_int());
    } else {
        echo "olá mundo";
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $alterarUser = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $alterarSenha = isset($_POST["senha"]) ? $_POST["senha"] : "";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            background-color: white;
        }
    </style>
</head>
<body>
    
    <div class="container-modal" id="janela-modal">
        <div class="janela-modal">
            <p>Deseja Realmente sair?</p>
            <div class="container-btn">
                <button class="btn" id="fechar" onclick="fecharPopup()">Voltar</button>
                <button class="btn" id="logoff">Sair</button>
            </div>
        </div>
    </div>

    <!-- Barra de navegação lateral -->
    <nav class="sidebar">
       
        <div class="btn-expandir">
            <i class='bx bx-menu' id="btn-exp"></i>
        </div>

        <!-- lista de itens dentro da barra lateral -->
        <ul>
            <li class="item-menu">
                <a href="home.php">
                    <span class="icon"><i class='bx bx-home-alt' ></i></span>
                    <span class="txt-link">Inicio</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="cadastro.php">
                    <span class="icon"><i class='bx bx-log-in-circle'></i></span>
                    <span class="txt-link">Cadastro</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="estoque.php">
                    <span class="icon"><i class='bx bx-cube-alt'></i></span>
                    <span class="txt-link">Estoque</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="#">
                    <span class="icon"><i class='bx bx-calendar'></i></span>
                    <span class="txt-link">Vencimentos</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="cadastro-de-usuario.php">
                    <span class="icon"><i class='bx bx-user-plus bx-flip-horizontal' ></i></span>
                    <span class="txt-link">Cadastro de Usuario</span>
                </a>
            </li>
        </ul>
    
    </nav>

    <!-- Header -->
    <header>
        <div class="container-header">
            <div class="container-user-box">
                <i class='bx bx-user-circle' id="btn-usuario" onclick="abrirPopup()"></i>
            </div>
        </div>
        <div class="container-logoff" id="janela-popup">
            <i class='bx bxs-up-arrow'></i>
            <div class="container-box-logoff">
                <a href="#" class="btn-sair" onclick="abrirModal()">Sair</a>
            </div>
        </div>
    </header>

    <div class="container-cadastro-usuario">
        
        <div class="label-cadastro-usuario">
            <p>Cadastro de Usuario:</p>
        </div>

        <div class="container-forms-cadastro-usuario">
            <form action="cadastro-de-usuario.php" method="get">
            <h2 class="login-text-2">Convidar:</h2>
               <input type="email" name="email" id="email" placeholder="Email..." class="inputUser" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                    <div class="box-user-ico-2">
                        <i class='bx bx-envelope'></i>
                    </div>
                <input type="submit" id="email-convidado">
            </form>
            <div class="container-divisao"></div>
            <form action="cadastro-de-usuario.php" method="post">
            <h2 class="login-text-2">Alterar estado de usuario:</h2>
               <input type="text" name="" id="" placeholder="Usuario..." class="inputUser" required>
                    <div class="box-user-ico-2">
                        <i class='bx bx-user' id="user-icon"></i>
                    </div>
                <select id="estado-usuario" name="estado-usuario">
                    <option value="ativo">ativo</option>
                    <option value="desligado">desligado</option>
                <input type="submit" value="alterar" id="alterar-usuario">
            </form>
        </div>

    </div>

    <footer>
        <div class="container-footer">
            <a>Todos os direitos reservados &copy; Can Say | 2024 - &infin;</a>
        </div>
    </footer>
 
<script src="https://unpkg.com/scrollreveal"></script>

<script src="js/script.js"></script>

</body>
</html>