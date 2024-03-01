<?php
session_start();

$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "estetica_v1_0";

$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

function logout(){
    session_unset();
    session_destroy();
    
    header("Location: login.php");
    exit();
}
?>