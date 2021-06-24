<?php

require_once("../../Conexion/conexion.php");

class comprar{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function comprar($nombre, $tel,$doc,$cantidad,$valor,$id_producto)
    {

        
        Mysqli_query($this->db,"INSERT INTO `compras_productos` (`nombre`, `telefono`, `cantidad`, `valor`, `doc`, `id_producto`, `id_estado`) VALUES ('$nombre', $tel, $cantidad, $valor, $doc, $id_producto, 2);");
        

    }   





}