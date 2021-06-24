<?php

require_once("../../Modelo/usuario/modificar.php");
$Modificar= new Modi;
$td=$_POST["td"];
$nd=$_POST["nd"];
$pn=$_POST["pn"];
$pa=$_POST["pa"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$correo=$_POST["correo"];
$contra=$_POST["contra"];
$rol=$_POST["rol"];
$estado=$_POST["estado"];

$Modificar->Modificar($td,$nd,$pn,$pa,$direccion,$telefono,$correo,$contra,$rol,$estado);   



