<?php
 
 

require_once("Conexion/conexion.php");

class publicacion{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }


    public function Listar(){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM publicaciones join estado on estado.id_estado=publicaciones.id_estado");
     

        return($query1);
    }

    public function listar_destacados(){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM publicaciones join estado on estado.id_estado=publicaciones.id_estado where publicaciones.id_estado=0 order by fecha_publicacion desc LIMIT 4");
        
      
        return($query1);
    }

    public function listar_publicacion($id_publicacion){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM publicaciones join estado on estado.id_estado=publicaciones.id_estado where id_publicacion= $id_publicacion");
        $filas = mysqli_fetch_assoc($query1);
      
        return($filas);
    }

    public function Reaccion_publicaciones($id_publicacion){       
        
      
        $query1=Mysqli_query($this->db,"SELECT count(id_publicacion) from reacciones_publicaciones where id_publicacion=$id_publicacion and id_reaccion=1");
        $query2=Mysqli_query($this->db,"SELECT count(id_publicacion) from reacciones_publicaciones where id_publicacion=$id_publicacion and id_reaccion=2");

        $filas = mysqli_fetch_row($query1);
        $GLOBALS['likes']=$filas[0];
       
        $filas2 = mysqli_fetch_row($query2);
        $GLOBALS['dislikes']=$filas2[0];
       
    }






}
 


?>