<?php
//Inclui o arquivo e tudo que tiver no arquivo connect.php
include "banco/connect.php";

//Seleciona o nome, validade e estado de todos os produtos da tabela estoque onde o id do usuario for igual o id
//armazenado pela sesão.
$sql = "SELECT nome_produto, validade, estado FROM estoque WHERE id_usuario = '{$_SESSION['id_usuario']}'";
//Executa o comando acima
$resul = $conn->query($sql);

//Cria um array de produtos e para cada resultado do select adiciona os dados dentro do array.
$produtosBD = array();
if ($resul->num_rows > 0) {
    while ($row = $resul->fetch_assoc()) {
        $produtosBD[] = $row;
    }
}
?>

