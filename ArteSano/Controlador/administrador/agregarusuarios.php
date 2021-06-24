<?php

session_start();
require_once("../../Modelo/agregarnoticias/agregarusuarios.php");
$Agregar = New addtejedor();

$tipo_documento = $_POST["td"]; 
$Numero_documento=$_POST["nd"];
$nombres=$_POST["pn"];
$apellidos=$_POST["pa"];
$direccion=$_POST["Direccion"];
$Rol=$_POST["rol"];
$Email=$_POST["correo"];
$Contra=$_POST["pass"];

$Agregar->Agregar($tipo_documento,$Numero_documento,$nombres,$apellidos,$direccion,$Rol,$Email,$Contra);

?>