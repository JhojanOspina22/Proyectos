<?php

require_once("../../Modelo/producto/eliminar.php");

$eliminar = New eliminar();

$id_producto=$_GET["id_producto"];



$eliminar->Eliminar($id_producto);

header('location:../../mis_creaciones.php?id_producto');

?>


