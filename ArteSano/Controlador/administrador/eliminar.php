<?php

require_once("../../Modelo/usuario/eliminar.php");

$eliminar = New eliminar();

$doc=$_GET["doc"];



$eliminar->Eliminar($doc);

header('location:../../admin_usuarios.php?id_producto');

?>


