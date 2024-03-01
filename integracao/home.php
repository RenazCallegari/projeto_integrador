<?php
//Inclui todas as funções e script do arquivo connect.
include "banco/connect.php";

//seleciona tudo da tabela estoque.
$sql = "SELECT * FROM estoque";
//executa o comando acima atribuindo a variável resul
$resul = $conn->query($sql);

//Inicia um contador de quantos produtos tem no banco de dados.
$countQuant = 0;
//Compara se o número de tuplas (linhas de dados) for maior que 0
if ($resul->num_rows > 0) {
    //Enquanto tiver linhas diferentes adicione mais um no contador de quantidade de produtos.
    while ($row = $resul->fetch_assoc()) {
        $countQuant = $countQuant + 1;
    }
}

//Define que o timezone ou melhor que o horário padrão do sistema deve ser o horário de são Paulo
date_default_timezone_set('America/Sao_Paulo');
//Define as regras e símbolos que formatam as informações de tempo e da data e adicionam a linguagem como português/br
setlocale(LC_TIME, 'pt_BR', 'ptb');

//Inicia uma variável que receberá o retorno da função vencimentoEm com seus respectivos parâmetros.
$countNoventa = vencimentoEm(90);
$countTrinta = vencimentoEm(30);

/*
//Devemos reincluir atualizados as funções abaixo.
$sql4 = "SELECT * FROM produto WHERE estado='teste' order by usos DESC LIMIT 1";
$resul4 = $conn->query($sql4);

$produtosMaisUsado = array();
$countMaisUsado = 0;
if ($resul4->num_rows > 0) {
    while ($row = $resul4->fetch_assoc()) {
        $produtosMaisUsado[] = $row;
        $countMaisUsado = $countMaisUsado + 1;
    }
}

$sql5 = "SELECT * FROM produto WHERE estado='teste' order by usos Asc LIMIT 1";
$resul5 = $conn->query($sql5);

$produtosMenosUsado = array();
$countMenosUsado = 0;
if ($resul5->num_rows > 0) {
    while ($row = $resul5->fetch_assoc()) {
        $produtosMenosUsado[] = $row;
        $countMenosUsado = $countMenosUsado + 1;
    }
*/

//Se for acionado algum gatilho de alerta vinculado a sessão atual, o sistema irá apresentar um erro/alerta
//desvinculará o erro/alerta do usuário.
if (isset($_SESSION['texto_alerta'])){
    echo '<div class="">' . $_SESSION['texto_alerta'] . '</div>';
    unset($_SESSION['texto_alerta']);
}

?>

<!--O QUE ESTIVER ABAIXO NÃO FAÇA, APENAS APAGUE!
INTEGRAR COM A GOME ATUALIZADA!-->

<ul class="list-group">
                <?php

                    echo '<li class="list-group-item">';
                    echo '<strong>' . $countQuant . '</strong><br>';
                    echo '<strong>' . $countNoventa . '</strong><br>';
                    echo '<strong>' . $countTrinta . '</strong><br>';
                    /*foreach($produtosMaisUsado as $produto){
                    echo '<strong>' . $produto["nome_produto"] . '</strong><br>';
                    echo '<strong>' . $produto["usos"] . '</strong><br>';
}*/
                    echo '</li>';

                ?>
            </ul>