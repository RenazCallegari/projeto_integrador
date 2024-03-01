<?php
include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userDigitado = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $passwordDigitado = isset($_POST["senha"]) ? $_POST["senha"] : "";

    if($userDigitado != "" && $passwordDigitado != ""){
        $sql = "SELECT * FROM usuario WHERE usuario = '$userDigitado' AND password = PASSWORD('$passwordDigitado')";
        $result = $conn->query($sql);

            if($result && $result->num_rows > 0){
            $row = $result->fetch_assoc();
            $_SESSION["id_usuario"] = $row["id_usuario"];
            $_SESSION["usuario_autenticado"] = $row["usuario"];
            header("Location: home.php");
            exit();
        } else {
            echo "<div class='alert alert-danger' role='alert'>Usuário ou senha incorretos.</div>";
        }
    }
}
if(isset($_SESSION["id_usuario"])){
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="container-inicio">
        <div class="container-simbolo">
            <img src="simbolo.png" alt="logo padrão da estética" class="estetica-logo">
            <h1 class="estetica-texto">ESTÉTICA</h1>
        </div>

        <div class="container-login">
            <h2 class="login-text">Login</h2>
            <form action="" method="post">
                    <div class="box-user-ico">
                        <i class='bx bx-user'></i>
                    </div>
                <input type="text" name="usuario" id="usuario" placeholder="Usuário...">
                    <div class="box-lock-ico">
                        <i class='bx bx-lock-alt'></i>
                    </div>
                <input type="text" name="senha" id="senha" placeholder="Senha...">
                <input type="submit" value="Entrar" id="logar">
            </form>
            <div class="div-line"></div>
            <h4 class="prod-by">Uma produção Can Say</h4>
        </div>
    </div>

    <audio id="som" src="som.mp3" preload="auto"></audio>

    <script src="https://unpkg.com/scrollreveal"></script>

    <script src="script.js"></script>
</body>
</html>

<!--INTEGRAR COM A LOGIN ATUALIZADA!-->