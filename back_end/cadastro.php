<?php
//Inclui o arquivo e tudo que tiver no arquivo connect.php
include "connect.php";

//Verifica se o houve algum formulário enviado via POST e se tiver sido verifica os campos inseridos
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nomeProduto = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $validadeProduto = isset($_POST["validade"]) ? $_POST["validade"] : "";
    $estadoProduto = isset($_POST["estado"]) ? $_POST["estado"] : "";
    $idProfessor = isset($_POST["id"]) ? $_POST["id"] : "";

    //Caso todos os campos estejam certos insere os dados na banco de dados e emite uma mensagem.
    if ($nomeProduto != "" and $validadeProduto != "" and $estadoProduto != "" and $idProfessor != "") {
        $sql = "INSERT INTO estoque (nome_produto, validade, estado, id_usuario) VALUES ('$nomeProduto', '$validadeProduto', '$estadoProduto', '$idProfessor')";
        $result = $conn->query($sql);
        echo "<div class='btn btn-outline-success' role='success'>Dados inseridos com sucesso.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Houve um erro ao inserir os dados.</div>";
    }
}
?>