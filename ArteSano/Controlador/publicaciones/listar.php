<?php

require_once("Modelo/publicaciones/listar.php");

$id_publicacion= isset($_GET['id_publicacion']) ? $_GET['id_publicacion'] : NULL;

$listar = New publicacion();
if ($id_publicacion != NULL) {
    $listar_publicacion = $listar->listar_publicacion($id_publicacion);
}
$lista=$listar->listar_destacados();
$lista2=$listar->Listar();
?>


