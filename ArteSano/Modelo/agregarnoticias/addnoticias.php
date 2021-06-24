<?php

require_once("../../Conexion/conexion.php");

class noticia{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }
    
    public function Agregar($Titulo_noticia,$contenido_noticia,$Img,$ruta_video)
    {      
        
        $fecha = date('Y-m-d');

        
        $fecha_actual = date("d-m-Y");
        //sumo 1 día
        $fecha_final = date("Y-m-d",strtotime($fecha_actual."+ 15 days"));
       
    
        Mysqli_query($this->db,"INSERT INTO publicaciones (titulo_publicacion,descripcion,imagen,ruta_video,fecha_publicacion,fecha_fin,id_estado)
        VALUES('$Titulo_noticia','$contenido_noticia','$Img','$ruta_video','$fecha','$fecha_final',0)");
    }  
}

?>