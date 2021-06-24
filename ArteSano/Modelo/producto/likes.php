<?php



require_once("../../Conexion/conexion.php");

class like
{


    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function like($producto, $doc, $id_reaccion)
    {

        $query = Mysqli_query($this->db, "SELECT * FROM reacciones_productos where id_producto = $producto and doc= $doc");
        $id = 0;
        while ($fila = mysqli_fetch_assoc($query)) {
            $id = 1;
            $id_reaccion_base = $fila['id_reaccion'];
        }
       

        if ($doc != NULL) {



            if ($id == 0) {

                
                Mysqli_query($this->db, "INSERT INTO reacciones_productos (id_reaccion, id_producto, doc) VALUES ($id_reaccion,$producto, $doc)");

                header('location:../../comunidad.php');

              
            
            
            } 
            
            else {
                if ($id_reaccion != $id_reaccion_base) {

                    Mysqli_query($this->db, "UPDATE reacciones_productos SET id_reaccion=$id_reaccion where id_producto = $producto and doc= $doc");
                    header('location:../../comunidad.php');
                } else {
                    
                    header('location:../../comunidad.php');
                }


            }
        } else {
            header('location:../../comunidad.php?alerta=0');
        }
    }
}
