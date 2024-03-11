<?php
//Inclui o arquivo e tudo que tiver no arquivo connect.php
include "banco/connect.php";

//Verifica se o houve algum formulário enviado via POST e se tiver sido verifica os campos inseridos
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nomeProduto = isset($_POST["nome-prod"]) ? $_POST["nome-prod"] : "";
    $marcaProduto = isset($_POST["marca-prod"]) ? $_POST["marca-prod"] : "";
    $baseProduto = isset($_POST["base-prod"]) ? $_POST["base-prod"] : "";
    $tipoProduto = isset($_POST["tipo-prod"]) ? $_POST["tipo-prod"] : "";
    $validadeProduto = isset($_POST["validade-prod"]) ? $_POST["validade-prod"] : "";
    $estadoProduto = isset($_POST["estado-prod"]) ? $_POST["estado-prod"] : "";

    $sql = "SELECT id_produto FROM produto WHERE nome_produto = '$nomeProduto' AND base = '$baseProduto' AND marca = '$marcaProduto' AND tipo = '$tipoProduto'";
    $resul = $conn->query($sql);
    $validadeDB = array();
    if ($resul->num_rows > 0) {
        while ($row = $resul->fetch_assoc()) {
            $validadeDB[] = $row;
        }
        foreach($validadeDB as $validade){
            $sql = "INSERT INTO validade (id_produto_fk, validade, estado) VALUES (".$validade['id_produto'].",'$validadeProduto','$estadoProduto')";
            $resul = $conn->query($sql);
            }
    }
}

VerificaUser();
$nome = procuraProduto('nome',$conn);
$marca = procuraProduto('marca',$conn);
$base = procuraProduto('base',$conn);
$tipo = procuraProduto('tipo',$conn);

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
                <form action="logout.php" method="get">
                    <input type="hidden" name="sair" value="sair">
                    <button type="submit" class="btn" id="logoff">Sair</button>
                </form>
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
                <a href="calendario.php">
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


    <div class="container-form-cadastro">
        
        <div class="label-cadastro">
            <p>Cadastro:</p>
        </div>

        <form action="cadastro.php" method="post">
            <div class="container-input">
                <label for="nome-prod">Nome:<input list="produtos" id="nome-prod" name="nome-prod" />
                    <datalist id="produtos">
                            <?php
                            foreach ($nome as $n){
                                echo "<option value='".$n['nome_produto']."'></option>";
                            }
                            ?>
                    </datalist>    
                </label>
                <label for="marca-prod">Marca:<select id="marca-prod" name="marca-prod">
                            <?php
                            foreach ($marca as $m){
                                echo "<option value='".$m['marca']."'>".$m['marca']."</option>";
                            }
                            ?>
                    </select>
                </label>
            </div>
            <div class="pausa"></div>
            <div class="container-input">
                 <label for="base-prod">Base:<select id="base-prod" name="base-prod">
                            <?php
                            foreach ($base as $b){
                                echo "<option value='".$b['base']."'>".$b['base']."</option>";
                            }
                            ?>
                        </select>
                    </label>
                    <label for="tipo-prod">Tipo:<select id="tipo-prod" name="tipo-prod">
                             <?php
                            foreach ($tipo as $t){
                                echo "<option value='".$t['tipo']."'>".$t['tipo']."</option>";
                            }
                            ?>
                        </select>
                    </label>
            </div>
            <div class="pausa"></div>
            <div class="container-input">
                <label for="estado-prod">Estado:<select id="estado-prod" name="estado-prod">
                        <option value="aberto">Aberto</option>
                        <option value="fechado">Fechado</option>
                    </select>
                </label>
                <label for="validade-prod">Validade:<input type="date" id="validade-prod" name="validade-prod"></label>
            </div>
            <div class="pausa"></div>
            <div class="container-input">
                <input type="submit" id="cadastro-enviar">
            </div>
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