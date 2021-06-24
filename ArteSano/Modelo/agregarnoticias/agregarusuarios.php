<?php
require_once("../../Conexion/conexion.php");
class addtejedor{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
        public function Agregar($tipo_documento,$Numero_documento,$nombres,$apellidos,$direccion,$Rol,$Email,$Contra)
    {      
       
        Mysqli_query($this->db, "INSERT INTO `usuario` (`num_doc`, `nombre`, `apellido`, `direccion`, `correo`, `contra`, `id_estado`, `id_rol`,`id_tipo_doc`) 
        VALUES ($Numero_documento, '$nombres', '$apellidos', '$direccion', '$Email', '$Contra', 0,$Rol,$tipo_documento);");
    }  
}
?>