<?php
 session_start();
require_once("../../Modelo/publicaciones/likes.php");
$doc = isset($_SESSION['Doc']) ? $_SESSION['Doc'] : NULL;
$id_reaccion= $_GET['id_reaccion'];

$listar = new like();

$id_publicacion = $_GET['id_publicacion'];


$listar->like($id_publicacion,$doc,$id_reaccion);
