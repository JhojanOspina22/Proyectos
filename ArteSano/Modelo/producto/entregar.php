<?php

require_once("../../Conexion/conexion.php");

class entregar{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function Entregar($id_compra)
    {

        
        Mysqli_query($this->db,"UPDATE compras_productos SET id_estado = 3 where id_compra=$id_compra");
        

    }   




}