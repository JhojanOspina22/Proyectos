<?php

include("../../Conexion/conexion.php");

class ModiP{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
   
    public function Modificar($Nombre,$descripcion,$valor,$categoria,$Img,$estado,$id)
    {   
      
        if($Img==''){
            Mysqli_query($this->db,"UPDATE producto SET nom_producto='$Nombre',descripcion='$descripcion',valor_producto=$valor, id_categoria =$categoria , id_estado = $estado where id_producto=$id");

        }
        else{
            Mysqli_query($this->db,"UPDATE producto SET nom_producto='$Nombre',descripcion='$descripcion',valor_producto=$valor,imagen='$Img', id_categoria =$categoria , id_estado = $estado where id_producto=$id");

        }
        

header('location:../../mis_creaciones.php');
    }   


}