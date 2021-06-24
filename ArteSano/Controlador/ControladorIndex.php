<?php
session_start();
require_once("../Modelo/usuario/ModeloIniciarSesion.php");

$Login= new Login();



if(isset($_POST))
{
    $Usuario = isset($_POST['user'])?$_POST['user']:false;
    $Password = isset($_POST['password'])?$_POST['password']:false;

    //errores
    $errores = array();
// valida el correo si es valido o no 
    if(!empty($Usuario) && filter_var($Usuario, FILTER_VALIDATE_EMAIL))
    {
        $usuario_validado = true;
    }
    else{
        $usuario_validado = false;
        $errores['user'] = "Correo no valido";
    }

    // valida la contrasena 
    if(!empty($Password))
    {
        $password_validado = true;
    }
    else{
        $password_validado = false;
        $errores['password'] = "Este campo no puede estar vacio";
    }

    if(count($errores) == 0){

       

        // envia datos al modelo 
        $validado=$Login->Inicio($Usuario,$Password);
        
        if($validado == true) {
            
            header('location:../inicio.php');
        }
       
        else{
            $errores['password'] = "Correo o contraseña incorrecta";
            $_SESSION['error']=$errores;
            header('location: ../IniciarSesion.php');
        }
        
    }
    else{

        $_SESSION['error']=$errores;
        header('location: ../IniciarSesion.php');
    }

    
   
}
?>