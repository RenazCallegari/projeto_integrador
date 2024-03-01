<?php
//Variaveis para acessar o SGBD.
$host = "localhost";
//Host ≠ LocalHost. Host e todo e qualquer dispositivo conectado a uma rede, um host nada mais e do que um provedor de servicos.
//LocalHost e um conjunto de faixa de ip (127.0.0.0) cuja funcao e permitir que o computador possa conversar consigo mesmo, isso e disponibilizar servicos para si.
 
$user = "root";
//Root vem de raiz, e o termo adotado pelas S.O linux para definir um administrador, neste contexto o user seria o usuario que tem acesso ao SGBD.
 
$password = "";
//Uma senha vazia.
 
$bd = "estetica_v1_0";
 
$conn = new mysqli($host, $user, $password);
//conn vem de connection.
//mysqli e diferente de mysql que e diferente de sql.
//mysqli e uma melhoria que eventualmente se tornou uma biblioteca propria, i vem de improved(melhorada).
//mysql e o sistema gerenciador de banco de dados.
//sql e vem do ingles structured query language ou linguagem estruturada de consulta.
 
//Testa o estado da conexao.
if($conn->connect_error){
    echo "Voce nao conseguiu acessar o seu $bd" . $conn->connect.error . "<br>";
    //Ecoa uma mensagem caso nao tenha acessado, atribui um valor referente a uma variavel e apresenta o tipo de erro.
    die();
    //Encerra a execucao do programa.
} else {
    echo "Parabens voce acessou o seu $bd <br>";
    //Mostra a mensagem se vc conseguiu conectar
}

//cria uma execucao utilizando a funcao select_db (use do php).
$conn->select_db($bd);
//use em php e uma funcao cuja finalidade e servir para outro proposito.
//para que nao crie um conflito foi criado a funcao select_db cuja finalidade e servir como uma traducao do USE de SQL.

//Cria o nosso usuário admin
$sql = "INSERT INTO usuario (usuario, password, curso, estado) VALUES ('Admin', PASSWORD('159753'), 'T.I', 'Ativo')";

//Executa o comando criado recentemente.
if($conn->query($sql)){
    //-> = insercao ou execute.
    //query = requisicao.
    echo "Deu certo ᕙ(`▿´)ᕗ<br>O Administrador está ON! <br>";
} else {
    echo "Não deu certo ಥ_ಥ<br>O Admin ainda não veio! <br>";
}

//Inicia um contador que irá se aproximar até a quantidade final de tuplas do excel fornecido pela estética
$row = 0;
//Uma condicional que contém a atribuição de uma variável cujo valor é a abertura de um arquivo csv no modo leitura.
if (($estoque = fopen("estoque_2025.csv", "r")) !== FALSE) {
    //Cria uma ocorrencia em forma de array para cada grupo de dados separados por ; dentro de estoque com a quantidade max de 1000 caracteres.
    while (($dados = fgetcsv($estoque, 1000, ";")) !== FALSE) {
        //pula para a próxima linha.
        $row++;
        //inicia um contator de valor 1 cuja função é únicamente executar a atribuição dos valores do array da linha row em um comando sql e os executa.
        for ($c=0; $c < 1; $c++) {
            $sql = "INSERT INTO produto (nome_produto, base, marca, tipo, estado, validade) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','lacrado', '$dados[4]')";
            $resul = $conn->query($sql);
        }
    }
    //fecha o arquivo que estava aberto anteriormente.
    fclose($estoque);
    //reinicia a variável que conta as linhas.
    $row = 0;
}

//Repete o mesmo processo acima mudando apenas o arquivo.
if (($estoque = fopen("estoque_2026.csv", "r")) !== FALSE) {
    while (($dados = fgetcsv($estoque, 1000, ";")) !== FALSE) {
        $row++;
        for ($c=0; $c < 1; $c++) {
            $sql = "INSERT INTO produto (nome_produto, base, marca, tipo, estado, validade) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','lacrado', '$dados[4]')";
            $resul = $conn->query($sql);
        }
    }
    fclose($estoque);
    $row = 0;
}

//Repete o mesmo processo acima mudando apenas o arquivo.
if (($estoque = fopen("estoque_2027.csv", "r")) !== FALSE) {
    while (($dados = fgetcsv($estoque, 1000, ";")) !== FALSE) {
        $row++;
        for ($c=0; $c < 1; $c++) {
            $sql = "INSERT INTO produto (nome_produto, base, marca, tipo, estado, validade) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','lacrado', '$dados[4]')";
            $resul = $conn->query($sql);
        }
    }
    fclose($estoque);
}
$sql
?>