<?php

require_once("Modelo/usuario/listar.php");

$doc= isset($_GET['doc']) ? $_GET['doc'] : NULL;

$listar = New usuario();
if ($doc != NULL) {
    $listar_usuario = $listar->listar_usuario($doc);
}

$lista2=$listar->Listar();

$listar_rol = $listar->listar_rol();
?>


