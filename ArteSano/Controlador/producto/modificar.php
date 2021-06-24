<?php

require_once("../../Modelo/producto/modificarP.php");
$Modificar= new ModiP;
$Nombre=$_POST["Nombre"];
$descripcion=$_POST["descripcion"];
$valor=$_POST["valor"];
$categoria=$_POST["categoria"];

$Img= isset($_FILES['Img']['tmp_name'])?$_FILES['Img']['tmp_name']:NULL;
if($Img!=NULL){
    $Img= addslashes(file_get_contents($_FILES['Img']['tmp_name']));
}



$Id=$_POST["ID"];

$estado=$_POST["estado"];

$Modificar->Modificar($Nombre,$descripcion,$valor,$categoria,$Img,$estado,$Id);   



