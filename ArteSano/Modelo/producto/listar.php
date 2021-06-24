<?php
 
 

require_once("Conexion/conexion.php");
$likes=0;
       $dislikes=0;
class producto{
   
    
    public function __construct(){
        $this->db=Conectar::conexion();
        
    }


    public function Listar($doc){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM producto join estado on estado.id_estado=producto.id_estado join categoria on categoria.id_categoria= producto.id_categoria where producto.id_tejedor=$doc order by producto.id_estado ASC");
  

        return($query1);
    }
    public function Listar_pedidos($doc){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM compras_productos join estado on estado.id_estado=compras_productos.id_estado join producto on producto.id_producto=compras_productos.id_producto  where producto.id_tejedor=$doc order by compras_productos.id_estado ASC");
  

        return($query1);
    }
    public function Listar_compras($doc){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM compras_productos join estado on estado.id_estado=compras_productos.id_estado join producto on producto.id_producto=compras_productos.id_producto join usuario on producto.id_tejedor=usuario.num_doc  where compras_productos.doc=$doc order by compras_productos.id_estado ASC");
  

        return($query1);
    }

    public function listar_destacados(){
        


        $query1=Mysqli_query($this->db,"SELECT *,(SELECT COUNT(id_reaccion) from reacciones_productos WHERE reacciones_productos.id_producto=producto.id_producto and reacciones_productos.id_reaccion=1) as likes FROM producto join estado on estado.id_estado=producto.id_estado where producto.id_estado=0 ORDER by likes DESC limit 6");
        
      
        return($query1);
    }

    public function listar_producto($id_producto){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM producto join estado on estado.id_estado=producto.id_estado where id_producto= $id_producto");
        $filas = mysqli_fetch_assoc($query1);
      
        return($filas);
    }
    public function listar_categorias(){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM categoria join estado on estado.id_estado=categoria.id_estado where categoria.id_estado= 0");
        
        return($query1);
    }
    public function Reaccion_productos($id_producto){       
        
      
        $query1=Mysqli_query($this->db,"SELECT count(id_producto) from reacciones_productos where id_producto=$id_producto and id_reaccion=1");
        $query2=Mysqli_query($this->db,"SELECT count(id_producto) from reacciones_productos where id_producto=$id_producto and id_reaccion=2");

        $filas = mysqli_fetch_row($query1);
        $GLOBALS['likes']=$filas[0];
       
        $filas2 = mysqli_fetch_row($query2);
        $GLOBALS['dislikes']=$filas2[0];
       
    }







}
