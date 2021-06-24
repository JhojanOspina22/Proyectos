<?php

require_once("../../Conexion/conexion.php");

class cancelar{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function Cancelar($id_compra)
    {

        
        Mysqli_query($this->db,"DELETE from compras_productos  where id_compra=$id_compra");
        

    }   




}