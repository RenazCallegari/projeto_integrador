<?php
include "banco/Connect.php";

if (isset($_SESSION["id_usuario"]) AND $_SESSION["id_usuario"] =! 1){
    $msg = "Sentimos muito, mas infelizmente você não possui autorização de acesso para acessar a página usuários.";
    $_SESSION["texto_alerta"] = $msg;
    header("Location: home.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "GET"){
    $enviarEmail = isset($_POST["email"]) ? $_POST["email"] : "";
    if($enviarEmail != '' AND filter_var($enviarEmail, FILTER_VALIDATE_EMAIL)){
        mail($enviarEmail,"Convite de cadastro no sistema",random_int())
    } else {
        
    }
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $alterarUser = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $alterarSenha = isset($_POST["senha"]) ? $_POST["senha"] : "";
}
?>