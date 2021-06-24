<?php

require_once("../config/conexion.php");

class Lista{
    public function __construct(){
        $this->db=Conectar::conexion();
    }
    public function Agregar($Nombre,$descrip,$Img,$preci,$catego)
    
    {
        
   
        $sentencia=Mysqli_query($this->db,"INSERT INTO `productos` (`nombre_producto`, `descripcion_producto`, `imagen_producto`, `precio_producto`, `recomendado`, `estado_producto`, `id_categoria`) VALUES ('$Nombre', '$descrip', '$Img', $preci, 0, 'Activo', $catego);");
       

    }
}