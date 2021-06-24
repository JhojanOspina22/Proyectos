<?php

session_start();
require_once("../../Modelo/producto/agregarP.php");

$Agregar = New Lista();

$Nombre=$_POST["Nombre"];
$descripcion=$_POST["descripcion"];
$valor=$_POST["valor"];
$categoria=$_POST["categoria"];
$Img= isset($_FILES['Img']['tmp_name'])?$_FILES['Img']['tmp_name']:NULL;
if($Img!=NULL){
    $Img= addslashes(file_get_contents($_FILES['Img']['tmp_name']));
}

$doc=$_SESSION['Doc'];


$Agregar->Agregar($Nombre,$descripcion,$valor,$categoria,$Img,$doc);


?>


