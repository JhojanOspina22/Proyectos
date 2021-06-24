<?php

include("../../Conexion/conexion.php");

class ModiP{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
   
    public function Modificar($Nombre,$descripcion,$Img,$estado,$id)
    {   

        if($Img==''){
            Mysqli_query($this->db,"UPDATE publicaciones SET titulo_publicacion='$Nombre',descripcion='$descripcion', id_estado = $estado where id_publicacion=$id");

        }
        else{
            Mysqli_query($this->db,"UPDATE publicaciones SET titulo_publicacion='$Nombre',descripcion='$descripcion',imagen='$Img', id_estado = $estado where id_publicacion=$id");

        }
        

header('location:../../mis_publicaciones.php');
    }   


}