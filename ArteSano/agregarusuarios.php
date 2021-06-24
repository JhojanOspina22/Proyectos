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
    <title>Nuevo usuario</title>
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
<br>
    <div class="containerfluid">
        <?php
        include('navbar.php');
        ?>
        <div class="top-bar-w3layouts pt-4">
            <div class="container-fluid px-lg-5">
                <div class="row">
                    <div class="offset-xl-6">
                    </div>
                    <div class="col-xl-6 top-social-agile text-md-right text-center mt-md-0 mt-2">
                        <div class="row right-top-info">
                            <div class="col-md-6 header-top_w3layouts text-xl-rigth text-center">
                                <a href="Libros.php">
                                    <p class="mr-2" style="margin-left: -1300px;  font-size:30px;color: white">
                                        <i class="fa fa-map-marker mr-2" style="font-size: 30px; color: white"></i> aqui va titulo
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <center>
            <div class="card" style="background-color: rgba(15, 14, 14, 0.521); width: 500px">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center" style="color: white;">Añadir usuario</h4>
                    <hr>
                    <form action="../../Controlador/administrador/agregarusuarios.php" method="post">
                        <label for="" style="color: white;"> Tipo de documento</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <select name="td" style="width:300px;height: 40px;color: #636363">
                                <option value="0">--Seleccione tipo de documento--</option>
                                <option value="1">Cédula de Ciudadanía</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Cédula de Extranjería</option>
                            </select>
                        </div>
                        <label for="" style="color: white;"> Número de documento</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="nd" class="form-control" placeholder="Numero de Documento *" type="text" id="nd" value="<?php if (isset($Doc)) echo $Doc ?>">
                        </div>
                        <label for="" style="color: white;"> Nombres usuario</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Nombres *" name="pn" type="text" id="pn" value="<?php if (isset($Nombre)) echo $Nombre ?>">
                        </div>
                        <label for="" style="color: white;"> Apellidos usuario</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Apellidos *" name="pa" type="text" id="pa" value="<?php if (isset($Apellidos)) echo $Apellidos ?>">
                        </div>
                        <label for="" style="color: white;"> Direccion </label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user "></i> </span>
                            </div>
                            <input name="Direccion" class="form-control" placeholder="Dirección *" type="text" id="Direccion" value="<?php if (isset($Direccion)) echo $Direccion ?>">
                        </div>
                        <label for="" style="color: white;"> Rol</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <select name="rol" style="width:300px;height: 40px;color: #636363">
                                <option value="0">--Seleccione rol--</option>
                                <option value="3">Cliente</option>
                                <option value="2">Artesano</option>
                            </select>
                        </div>
                        <label for="" style="color: white;"> Correo electrónico</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="correo" class="form-control" placeholder="Correo Electronico *" type="email" id="correo" value="<?php if (isset($Correo)) echo $Correo ?>">
                        </div>
                        <label for="" style="color: white;"> Contraseña</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Contraseña *" type="password" id="pass" name="pass">
                        </div>

                        <br>
                        <div class="form-group">
                            <button name="btn" type="submit" class="btn btn-primary  btn-block"> Crear usuario </button></a>
                        </div>
                    </form>
                </article>
            </div>
        </center>

    </div>
</body>

</html>