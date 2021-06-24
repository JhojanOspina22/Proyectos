<?php



class ModiC{

    public function __construct(){
        
        
    }
   
    public function Modificar($Nombres,$Apellidos,$Td,$Dire,$Correo,$Estado,$Doc)
    {
        include("../Conexion/conexion.php");
        $con=new Conectar;
        $conexion=$con->conexion();
        $conexion->query("UPDATE usuarios SET Nombres='$Nombres',Apellidos='$Apellidos',T_documento='$Td',Correo='$Correo',Direccion='$Dire',idEstado=$Estado where Doc=$Doc");
        
        
                    echo '<script language="javascript">alert("Cliente Actualizado");window.location.href="http://localhost/Biblioteca/Vistas/VistaAd/Clientes.php"</script>';

    }   

}