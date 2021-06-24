<?php

require_once("../Conexion/conexion.php");

class Login{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }

    public function Inicio($Usuario,$Contra){

        $result=Mysqli_query($this->db,"SELECT * FROM usuario WHERE correo= '$Usuario' and contra = '$Contra' and id_estado=0");

        $linea=mysqli_fetch_assoc($result);
        
        $usuario=$linea['correo'];
        $contra=$linea['contra'];

        if(!empty($usuario) && !empty($contra)){
            if($Usuario==$usuario && $Contra==$contra){
            
         $_SESSION['login']=true;
         $_SESSION['correo']=$usuario;
         $_SESSION['nombre']=$linea['nombre'] ." ". $linea['apellido'] ;
         $_SESSION['Doc']=$linea['num_doc'];
         $_SESSION['Tel']=$linea['telefono'];
         $_SESSION['rol']=$linea['id_rol'];
         
          
         $validado = true;
            }
                
      else{
            
           $validado = false;
           
        
        }
        return $validado;

        }

    


    }












}


?>