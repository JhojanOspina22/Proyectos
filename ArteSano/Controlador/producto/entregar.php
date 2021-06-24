<?php

require_once("../../Modelo/producto/entregar.php");

$entregar = New entregar();

$id_compra=$_GET["id_compra"];



$entregar->Entregar($id_compra);

header('location:../../mis_pedidos.php');

?>


