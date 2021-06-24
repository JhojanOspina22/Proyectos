<?php

require_once("../../Modelo/producto/cancelar.php");

$cancelar = New cancelar();

$id_compra=$_GET["id_compra"];



$cancelar->Cancelar($id_compra);

header('location:../../mis_compras.php');

?>


