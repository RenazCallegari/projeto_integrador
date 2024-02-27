<?php
include "connect.php";

$sql = "SELECT nome_produto, validade, estado FROM estoque WHERE id_usuario = '{$_SESSION['id_usuario']}'";
$resul = $conn->query($sql);

$produtosBD = array();
if ($resul->num_rows > 0) {
    while ($row = $resul->fetch_assoc()) {
        $produtosBD[] = $row;
    }
}
?>

