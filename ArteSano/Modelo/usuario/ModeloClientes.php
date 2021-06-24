<?php
 
 

require_once("../../Conexion/conexion.php");

class Clientes{

    public function __construct(){
        $this->db=Conectar::conexion();
        
    }



    

    public function Listar(){
        


        $query1=Mysqli_query($this->db,"SELECT * FROM usuarios join estado on estado.idEstado=usuarios.idEstado join roles on usuarios.idRoles=roles.idRoles where usuarios.idRoles=2 and usuarios.idEstado=0");
        while($filas=mysqli_fetch_assoc($query1)){
             echo    "<td style='color:black'> ".$filas['T_documento']."</td>".
                     "<td style='color:black'>".$filas['Doc']."</td>".
                     "<td style='color:black'>".$filas['Nombres']."</td>".
                     "<td style='color:black'>".$filas['Apellidos']."</td>".
                     "<td style='color:black'>".$filas['Direccion']."</td>".
                     "<td style='color:black'>".$filas['Correo']."</td>".
                     "<td style='color:black'>".$filas['Estados']."</td>".
                     
                     "</tr>" ;
            //"<td align='center'>
                   // <a href='../../vistas/VistaAd/ModificarC.php?ID=".$filas['Doc']."'><i class='fa fa-edit' data-toggle='tooltip' title='Edit' value='' style='color:blue;font-size:30px;margin-right:10px'></i></a></td>".
        }


    }

   





}
 


?>