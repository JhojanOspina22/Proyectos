<?php
 
 

require_once("../Conexion/conexion.php");

class Infolibro{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }



    

    public function Listar($id_libro){
        
                    $con= new Conectar();
                    $conexion=$con->conexion();
                    $query1=("SELECT * FROM libros where id_libro=$id_libro");
                    
                     header('Location: ../vistas/VistaC/InformacionL.php');

    }

   





}
 


?>