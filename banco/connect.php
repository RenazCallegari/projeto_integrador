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

function estoqueCritico($conn){
    //Seleciona o nome, validade e estado de todos os produtos da tabela estoque onde o id do usuario for igual o id
    //armazenado pela sesão.
    $sql = "SELECT * FROM produto, estoque WHERE id_produto= id_produto_fk;";
    //Executa o comando acima
    $resul = $conn->query($sql);

    //Cria um array de produtos e para cada resultado do select adiciona os dados dentro do array.
    $produtosBD = array();
    if ($resul->num_rows > 0) {
        while ($row = $resul->fetch_assoc()) {
            $produtosBD[] = $row;
        }
    }
    return $produtosBD;
}

function VerificaUser($conn){
    if (!isset($_SESSION["id_usuario"])){
        $msg = "Antes de usar nosso serviço por gentileza se conecte normalmente.";
        $_SESSION["texto_alerta"] = $msg;
        header("Location: index.php");
        exit();
    }
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