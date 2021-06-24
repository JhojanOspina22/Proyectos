<?php

require_once("../../Conexion/conexion.php");

class eliminar{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function eliminar($doc)
    {

        
        Mysqli_query($this->db,"UPDATE usuario SET id_estado = 1 where num_doc=$doc");
        

    }   




}