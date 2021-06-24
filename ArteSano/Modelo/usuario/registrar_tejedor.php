<?php
class model
{

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }





    public function Agregar($TD, $Doc, $Nombre, $Apellidos, $Direccion,$tel,$Correo, $Clave,$Rol)
    {

        $result=Mysqli_query($this->db,"SELECT * FROM usuario WHERE correo= '$Correo' and id_estado=0");
        $result2=Mysqli_query($this->db,"SELECT * FROM usuario WHERE num_doc= $Doc and  id_tipo_doc = $TD and id_estado=0");

        
        if(!empty($result) && !empty($result2)){
            
            $query1 = Mysqli_query($this->db, "INSERT INTO `usuario` (`num_doc`, `nombre`, `apellido`, `direccion`, `telefono`, `correo`, `contra`, `id_estado`, `id_rol`,`id_tipo_doc`) VALUES ($Doc, '$Nombre', '$Apellidos', '$Direccion',$tel, '$Correo', '$Clave', 0,$Rol,$TD);");
  
            if($query1 == true)
            {
                $validado=true;
               return $validado;      
         
            }
            else{
                $validado=false;
               return $validado; 
                }

        }
        else{

            $validado=false;
            
        }
        

        

        
        


    
    }
}
