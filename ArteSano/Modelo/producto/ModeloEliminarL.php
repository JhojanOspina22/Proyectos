<?php

require_once("../Conexion/conexion.php");

class Eliminar{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function Eliminar($Id)
    {

        $query1=Mysqli_query($this->db,"DELETE from libros where id_libro=$Id");
        
                    echo '<script language="javascript">alert("Libro Eliminado");window.location.href="http://localhost/Biblioteca/Vistas/VistaAd/Libros.php"</script>';

            



    }   




}