<?php
 
 

require_once("Conexion/conexion.php");

class usuario{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }


    public function Listar(){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM usuario join estado on estado.id_estado=usuario.id_estado join tipo_doc on tipo_doc.id_tipo_doc=usuario.id_tipo_doc join rol on rol.id_rol=usuario.id_rol");
     

        return($query1);
    }

    public function listar_usuario($doc){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM usuario join estado on estado.id_estado=usuario.id_estado join tipo_doc on tipo_doc.id_tipo_doc=usuario.id_tipo_doc join rol on rol.id_rol=usuario.id_rol where num_doc= $doc");
        $filas = mysqli_fetch_assoc($query1);
      
        return($filas);
    }

    public function listar_rol(){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM rol");
        
        return($query1);
    }







}
 


?>