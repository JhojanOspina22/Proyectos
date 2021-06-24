<?php
include '../config/conexion.php';
$nombre=$_POST['name'];
$califi=$_POST['califi'];
$comentario=$_POST['comentario'];

$con = new Conectar();
$conexion = $con->conexion();

    $query1 = ("INSERT INTO `comentarios` (`id_comentario`,`nombre`, `textcomentario`, `estrellas`) VALUES (NULL, '$nombre', '$comentario',$califi)");
  $resultado = $conexion->query($query1);
  header('Location: http://localhost/SweetSurprise93/index.php#testimonials');


?>