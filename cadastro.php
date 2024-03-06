<?php
//Inclui o arquivo e tudo que tiver no arquivo connect.php
include "banco/connect.php";

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

    <div class="container-form-cadastro">
        
        <div class="label-cadastro">
            <p>Cadastro:</p>
        </div>

        <form action="cadastro.html" method="get">
                <label for="nome-prod">Nome:</label>
                <input type="text" id="nome-prod" name="nome-prod">
                <label for="marca-prod">Marca:</label>
                <input type="text" id="marca-prod" name="marca-prod">
            <div class="pausa"></div>
                <label for="base-prod">Base:</label>
                <input type="text" id="base-prod" name="base-prod">
                <label for="tipo-prod">Tipo:</label>
                <input type="text" id="tipo-prod" name="tipo-prod">
            <div class="pausa"></div>
                <label for="estado-prod">Estado:</label>
                <input type="text" id="estado-prod" name="estado-prod">
                <label for="validade-prod">Validade:</label>
                <input type="date" id="validade-prod" name="validade-prod">
            <div class="pausa"></div>
            <input type="submit" id="cadastro-enviar">
            <a href="" id="alterar">Alterar</a>
        </form>

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