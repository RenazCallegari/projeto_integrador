<?php
include "banco/connect.php";

$sql = "SELECT id, nome_produto, validade, estado, DATEDIFF(validade, CURRENT_DATE()) FROM estoque WHERE validade BETWEEN CURRENT_DATE AND DATE_ADD(CURRENT_DATE, INTERVAL 90 DAY) ORDER BY DATEDIFF(validade, CURRENT_DATE()) ASC";
$resul = $conn->query($sql);

$produtosBD = array();
if ($resul->num_rows > 0) {
    while ($row = $resul->fetch_assoc()) {
        $produtosBD[] = $row;
    }
}


foreach($produtosBD as $produto){
    if($produto['DATEDIFF(validade, CURRENT_DATE())'] < 90 and $produto['DATEDIFF(validade, CURRENT_DATE())'] > 30) {
        echo "Olá mundo";
    } else {
        echo "ferrou";
    }
}

VerificaUser($conn);
?>