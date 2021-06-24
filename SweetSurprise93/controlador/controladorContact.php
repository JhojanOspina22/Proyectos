<?php
  $nombre=$_POST['name'];
  $from=$_POST['email'];
  $mensaje=$_POST['message'];
  $asunto= $_POST['subject'];
 ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $to ="camilom661@gmail.com";
    $message = "Hola soy ".$nombre.", ".$mensaje;
    $headers = "From:" . $from;
    mail($to,$asunto,$message, $headers);
    echo "Mensaje enviado correctamente";