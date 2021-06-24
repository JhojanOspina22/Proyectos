<?php

require_once("../../Conexion/conexion.php");

class eliminar{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function eliminar($id_publicacion)
    {

        Mysqli_query($this->db,"UPDATE publicaciones SET id_estado = 1 where id_publicacion=$id_publicacion");
        

    }   




}