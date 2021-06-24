<?php

require_once("../../Conexion/conexion.php");

class eliminar{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function eliminar($id_producto)
    {

        
        Mysqli_query($this->db,"UPDATE producto SET id_estado = 1 where id_producto=$id_producto");
        

    }   




}