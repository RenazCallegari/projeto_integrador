<?php
include "connect.php";

$sql = "SELECT * FROM estoque";
$resul = $conn->query($sql);

$countQuant = 0;
if ($resul->num_rows > 0) {
    while ($row = $resul->fetch_assoc()) {
        $countQuant = $countQuant + 1;
    }
}

date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'ptb');


$sql2 = "SELECT * FROM produto WHERE validade BETWEEN CURRENT_DATE AND DATE_ADD(CURRENT_DATE, INTERVAL 90 DAY)";

$resul2 = $conn->query($sql2);

$countNoventa = 0;
if ($resul2->num_rows > 0) {
    while ($row = $resul2->fetch_assoc()) {
        $countNoventa = $countNoventa + 1;
    }
}

$sql3 = "SELECT * FROM produto WHERE validade BETWEEN CURRENT_DATE AND DATE_ADD(CURRENT_DATE, INTERVAL 30 DAY)";
$resul3 = $conn->query($sql3);

$countTrinta = 0;
if ($resul3->num_rows > 0) {
    while ($row = $resul3->fetch_assoc()) {
        $countTrinta = $countTrinta + 1;
    }
}
/*
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