<?php
session_start();

require_once("../Modelo/usuario/registrar_tejedor.php");
include '../Conexion/conexion.php';


$Agregar = New model();
// si se reciben variables se guardan.
if(isset($_POST)){
$TD= isset($_POST["td"])?$_POST["td"]:false;
$Doc=isset($_POST["nd"])?$_POST["nd"]:false;
$Nombre=isset($_POST['pn'])?$_POST['pn']:false;
$Apellidos=isset($_POST["pa"])?$_POST["pa"]:false;
$Direccion=isset($_POST["Direccion"])?$_POST["Direccion"]:false;
$tel=isset($_POST["tel"])?$_POST["tel"]:false;
$Correo=isset($_POST["correo"])?$_POST["correo"]:false;
$Clave=isset($_POST["pass"])?$_POST["pass"]:false;
$Rol=isset($_POST["rol"])?$_POST["rol"]:false;
$captcha= isset($_POST['g-recaptcha-response'])?$_POST['g-recaptcha-response']:NULL;

//errores
$errores = array();
$formu = array();
// valida el correo si es valido o no 
    if($TD!=0)
    {   $formu['td'] = $TD;
        $usuario_validado = true;
    }
    else{
        $usuario_validado = false;
        $errores['td'] = "Tipo de documento erroneo";
    }
    // # documento
    if(!empty($Doc) && is_numeric($Doc) && preg_match("/[0-9]/", $Doc))
    {   $formu['nd'] = $Doc;
        $usuario_validado = true;
    }
    else{
        $usuario_validado = false;
        $errores['nd'] = "número de documento erroneo";
    }
    // Nombre
    if(!empty($Nombre) && !is_numeric($Nombre) && !preg_match("/[0-9]/", $Nombre))
    {   $formu['pn'] = $Nombre;
        $usuario_validado = true;
    }
    else{
        $usuario_validado = false;
        $errores['pn'] = "verifique su nombre";
    }
    // apellido
    if(!empty($Apellidos) && !is_numeric($Apellidos) && !preg_match("/[0-9]/", $Apellidos))
    {   $formu['pa'] = $Apellidos;
        $usuario_validado = true;
    }
    else{
        $usuario_validado = false;
        $errores['pa'] = "verifique su apellido";
    }
    // direccion
    if(!empty($Direccion))
    {   $formu['Direccion'] = $Direccion;
        $usuario_validado = true;
    }
    else{
        $usuario_validado = false;
        $errores['Direccion'] = "verifique su direccion";
    }

  // # telefono
  if(!empty($tel) && is_numeric($tel) && preg_match("/[0-9]/", $tel))
  {   $formu['tel'] = $tel;
      $usuario_validado = true;
  }
  else{
      $usuario_validado = false;
      $errores['tel'] = "Numero de telefono erroneo";
  }
    // rol
    if($Rol!=0)
    {   $formu['rol'] = $Rol;
        $usuario_validado = true;
    }
    else{
        $usuario_validado = false;
        $errores['rol'] = "verifique su rol";
    }
     // correo
     if(!empty($Correo))
     {  $formu['correo'] = $Correo;
         $usuario_validado = true;
     }
     else{
         $usuario_validado = false;
         $errores['correo'] = "verifique su EMAIL";
     }


    // valida la contrasena 
    if(!empty($Clave))
    {   $formu['pass'] = $Clave;
        $password_validado = true;
    }
    else{
        $password_validado = false;
        $errores['pass'] = "Este campo no puede estar vacio";
    }
     // valida la captcha
     if(!empty($captcha))
     {   
         $captcha_validado = true;
     }
     else{
         $captcha_validado = false;
         $errores['captcha'] = "Verifica la captcha nuevamente";
     }
 

    if(count($errores) == 0){

       

        // envia datos al modelo 
        $validado=$Agregar->Agregar($TD,$Doc,$Nombre,$Apellidos,$Direccion,$tel,$Correo,$Clave,$Rol);;
        
        if($validado == true){
            
            header('location:../IniciarSesion.php');
        }
        else{
            $errores['btn'] = "Documento o correo en uso";
            $_SESSION['error']=$errores;
            $_SESSION['formulario']=$formu;
            header('location: ../Registro.php');
        }
        
    }
    else{

        $_SESSION['error']=$errores;
        $_SESSION['formulario']=$formu;
        header('location: ../registro.php');
    }

    
   
}



?>


