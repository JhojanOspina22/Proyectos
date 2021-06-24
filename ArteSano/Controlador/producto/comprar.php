<?php

require_once("../../Modelo/producto/comprar.php");

$comprar = New comprar();


$nombre=$_POST["pn"];
$tel=$_POST["tel"];
$doc=$_POST["doc"];
$cantidad=$_POST["cantidad"];
$valor=$_POST["valor"];
$id_producto=$_POST["id_producto"];



$comprar->comprar($nombre, $tel,$doc,$cantidad,$valor,$id_producto);

header("location:https://wa.me/+57$tel");

?>
