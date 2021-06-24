<?php

include("../../Conexion/conexion.php");

class Modi{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
   
    public function Modificar($td,$nd,$pn,$pa,$direccion,$telefono,$correo,$contra,$rol,$estado)
    {   

    
       
            Mysqli_query($this->db,"UPDATE usuario SET id_tipo_doc=$td, num_doc=$nd, nombre='$pn', apellido = '$pa', direccion = '$direccion', telefono = $telefono, correo = '$correo', contra = '$contra', id_rol = $rol, id_estado = $estado  where num_doc=$nd");

        

header('location:../../admin_usuarios.php');
    }   


}