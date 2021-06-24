<?php

require_once("../../Conexion/conexion.php");

class Lista{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function Agregar($Nombre,$descripcion,$valor,$categoria,$Img,$doc)
    {

        
        Mysqli_query($this->db,"INSERT INTO producto (nom_producto,descripcion,valor_producto,imagen,id_categoria,id_tejedor,id_estado)VALUES('$Nombre','$descripcion',$valor,'$Img',$categoria,$doc,0)");
        header('location:../../mis_creaciones.php');


    }   




}