<?php 
require_once('Controlador/Seguridad.php');
if($_SESSION['rol']!=1){
    header('location:inicio.php'); 
}

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500%7COpen+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Nueva publicacion</title>
    <style>
        .btn-google {
            background-color: rgb(236, 86, 66);
            color: #fff;
        }

        h1 {
            color: aliceblue
        }

        h2 {
            color: rgb(255, 255, 255);
        }

        p {
            color: black;
        }

        h4 {
            color: rgb(255, 255, 255);
        }

        hr {
            height: 1px;
            background-color: gray;
            border: 0;
        }

        h6 {
            color: gray
        }

        .iniciar {
            background: url("images/fondo.jpg") no-repeat fixed center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
            width: 100%;
            text-align: center;
            margin-top: -20px;

        }
    </style>

</head>

<body class="iniciar">


    <div class="containerfluid">

        <div class="top-bar-w3layouts pt-4">
            <div class="container-fluid px-lg-5">
                <?php
                include('navbar.php');
                ?>
          
            </div>
        </div>
        <br>
        <center>
            <div class="card" style="background-color: rgba(15, 14, 14, 0.521); width: 700px">
                <article class="card-body mx-auto" style="width:  500px;">
                    <h4 class="card-title mt-3 text-center" style="color: white;">Nueva publicación</h4>
                    <hr>
                    <form action="Controlador/administrador/agregarnoticias.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group input">
                            <label for="" style="color: white;">Titulo</label>
                            <input class="form-control" placeholder="" name="titulo_noticia" type="text" id="pa" required="required">
                        </div>
                        <label for="" style="color: white;">Contenido de la noticia</label>
                        <div class="form-group input-group">
                            <textarea name="contenido_noticia" cols="30" rows="10" class="form-control" placeholder="" type="text" required="required"></textarea>
                        </div>
                        <label for="" style="color: white;">video</label>
                        <div class="form-group input-group">
                            <input name="video" type="file">
                        </div>
                        <label for="" style="color: white;">Imagen</label>
                        <div class="form-group input-group">
                            <input name="Img" type="file" id="Img" accept="image/*">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Registrar </button>
                        </div>
                    </form>
                </article>
            </div>
        </center>

    </div>
</body>

</html>