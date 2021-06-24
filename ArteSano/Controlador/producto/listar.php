<?php

require_once("Modelo/producto/listar.php");
$doc = isset($_SESSION['Doc']) ? $_SESSION['Doc'] : NULL;
$id_producto= isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
$listar = new producto();

$lista_destacada = $listar->listar_destacados();

if ($doc != NULL) {

    $lista_por_doc = $listar->Listar($doc);
    $listar_pedidos = $listar->Listar_pedidos($doc);
    $listar_compras = $listar->Listar_compras($doc);
}

if ($id_producto != NULL) {
    $listar_producto = $listar->listar_producto($id_producto);
}

$listar_categoria = $listar->listar_categorias();
