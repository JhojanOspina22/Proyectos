<?php

session_start();
require_once("../../Modelo/agregarnoticias/addnoticias.php");
include('confi_agregarnoticias.php');

$Agregar = New noticia();

$Titulo_noticia=$_POST["titulo_noticia"];
$contenido_noticia=$_POST["contenido_noticia"];





    $maxsize = 5242880000; // 5MB
    $nombre_file = $_FILES['video']['name'];

    //
    $image_info = explode(".", $nombre_file); 
    $nombre = format_uri($image_info[0]);
    $image_type = end($image_info);
    $file_video = $nombre."-".rand(10,999).".".$image_type;
    //
    $target_dir = "../../videos/";
    $target_file = $target_dir.$file_video;
    
    
    // Obtenemos la extension del archivo
    $videoFileType = strtolower(pathinfo($nombre_file,PATHINFO_EXTENSION));
    
    // extensiones validados
    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");
    
    // Revisar extension
    
    
    // Revisar el tamaño del archivo
    if(($_FILES['video']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
    $error= "Archivo demasiado grande. El archivo debe ser menor que 5MB.";
    }
    //revisar la imagen

    if($_FILES['Img']['tmp_name']!=NULL){
        $Img= addslashes(file_get_contents($_FILES['Img']['tmp_name']));
    
    }
    else{
    $Img="";


}

if(move_uploaded_file($_FILES['video']['tmp_name'],$target_file)){
    // Insertar registro
    $Agregar->Agregar($Titulo_noticia,$contenido_noticia,$Img,$file_video);
    }
    
    
    
 

    elseif($_FILES['Img']['tmp_name']!=""){
        // Insertar registro
        $file_video=NULL;
        $Agregar->Agregar($Titulo_noticia,$contenido_noticia,$Img,$file_video);
        }
        
        
        
        else{
        $error= "La imagen o video no se pudieron  subir";
        header('location:../../Agregarnoticias.php');
        }


header('location:../../mis_publicaciones.php');
