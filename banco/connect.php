<?php
//Inicia a sessão (cookies).
session_start();

//Configurações para acessar o SGBD
$host = "127.0.0.1";
$user = "root";
$password = "";
$db = "estetica_v1_0";

//Tenta realizar a conexão com o SGBD
$conn = new mysqli($host, $user, $password, $db);

//Caso tenha alguma falha encerra o script (die == exit) e emite uma mensagem de erro
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

//Inicia uma função que conta em quanto tempo um determinado produto vai vencer.
function vencimentoEm($dias, $conn){

    //Seleciona todos os produtos que irão vencer entre o dia atual e quantidade de dias inseridas pelo usuário.
    $sql = "SELECT * FROM validade WHERE validade BETWEEN CURRENT_DATE AND DATE_ADD(CURRENT_DATE, INTERVAL $dias DAY)";
    $resul = $conn->query($sql);
    //Inicia um contador que define quantos produtos irão vencer nesse intervalo de tempo.
    $count = 0;
    //Analisa quantas linhas serão retornadas pelo Banco de dados.
    if ($resul->num_rows > 0) {
        //Enquanto houver linhas adiciona mais 1 para o contador.
        while ($row = $resul->fetch_assoc()) {
            $count = $count + 1;
        }
    }
    //retorna o contador.
    return $count;
}

//Inicializa uma função que não precisa de parâmetros e primeiro desvincula todos os dados dos cookies(da sessão)
//depois destroi os cookies (apaga a sessão) e redireciona o usuário a página login. 
function logout(){
    session_unset();
    session_destroy();
    
    header("Location: index.php");
    exit();
}
?>