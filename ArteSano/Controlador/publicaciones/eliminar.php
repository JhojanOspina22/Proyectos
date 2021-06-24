<?php

require_once("../../Modelo/publicaciones/eliminar.php");

$eliminar = New eliminar();

$id_publicacion=$_GET["id_publicacion"];


$eliminar->Eliminar($id_publicacion);

header('location:../../mis_publicaciones.php?id_publicacion');

?>


