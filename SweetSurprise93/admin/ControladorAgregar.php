<?php

require_once('ModeloAgregar.php');

$Agregar = New Lista();

$Nombre=$_POST["Nombre"];
$descrip=$_POST["descrip"];
$preci=$_POST["preci"];
$catego=$_POST["catego"];
$Img= addslashes(file_get_contents($_FILES['Img']['tmp_name']));


$Agregar->Agregar($Nombre,$descrip,$Img,$preci,$catego);



