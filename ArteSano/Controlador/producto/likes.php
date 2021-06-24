<?php
 session_start();
require_once("../../Modelo/producto/likes.php");
$doc = isset($_SESSION['Doc']) ? $_SESSION['Doc'] : NULL;
$id_reaccion= $_GET['id_reaccion'];

$listar = new like();

$id_producto = $_GET['id_producto'];


$listar->like($id_producto,$doc,$id_reaccion);
