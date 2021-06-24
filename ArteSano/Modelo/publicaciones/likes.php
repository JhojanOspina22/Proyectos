<?php



require_once("../../Conexion/conexion.php");

class like
{


    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function like($publicacion, $doc, $id_reaccion)
    {

        $query = Mysqli_query($this->db, "SELECT * FROM reacciones_publicaciones where id_publicacion = $publicacion and doc= $doc");
        $id = 0;
        while ($fila = mysqli_fetch_assoc($query)) {
            $id = 1;
            $id_reaccion_base = $fila['id_reaccion'];
        }
       

        if ($doc != NULL) {


            
            if ($id == 0) {

                
                Mysqli_query($this->db, "INSERT INTO reacciones_publicaciones (id_reaccion, id_publicacion, doc) VALUES ($id_reaccion,$publicacion, $doc)");

                header('location:../../noticias.php');

              
            
            
            } 
            
            else {
                if ($id_reaccion != $id_reaccion_base) {

                    Mysqli_query($this->db, "UPDATE reacciones_publicaciones SET id_reaccion=$id_reaccion where id_publicacion= $publicacion and doc= $doc");
                    
                    header('location:../../noticias.php');
                } else {
                    
                    header('location:../../noticias.php');
                }


            }
        } else {
            header('location:../../noticias.php?alerta=0');
        }
    }
}
