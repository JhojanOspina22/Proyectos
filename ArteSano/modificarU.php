<?php 
require_once('../../Controlador/Seguridad.php'); 
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
    <title>Registro</title>
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
    <?php
    include('navbar.php')
    ?>

    <div class="containerfluid">



        <br>
        <center>
            <div class="card" style="background-color: rgba(15, 14, 14, 0.521); width: 700px">
                <article class="card-body mx-auto" style="width:  500px;">
                    <h4 class="card-title mt-3 text-center" style="color: white;">Editar Usuario</h4>
                    <hr>
                    <?php include('Controlador/administrador/listar.php');

                    ?>
                    <form action="Controlador/administrador/modificar.php" method="POST" enctype="multipart/form-data">

                        <label for="" style="color: white;">Tipo de documento</label>
                        <div class="form-group input-group">

                            <select name="td" class="form-control" value="" id="">

                                <option value="1" <?php if ($listar_usuario['id_tipo_doc'] == "1") {
                                                        echo "selected";
                                                    } ?>> Cédula de ciudadanía</option>
                                <option value="2" <?php if ($listar_usuario['id_tipo_doc'] == "2") {
                                                        echo "selected";
                                                    } ?>>Pasaporte</option>
                                <option value="3" <?php if ($listar_usuario['id_tipo_doc'] == "3") {
                                                        echo "selected";
                                                    } ?>>Cédula de Extranjería</option>

                            </select>
                        </div>
                        <div class="form-group input">
                            <label for="" style="color: white;"> Numero Documento</label>
                            <input class="form-control" name="nd" value="<?php echo $listar_usuario['num_doc']; ?>" type="text" id="pa" required="required">
                        </div>
                        <div class="form-group input">
                            <label for="" style="color: white;">nombres:</label>
                            <input class="form-control" name="pn" value="<?php echo $listar_usuario['nombre']; ?>" type="text" id="pa" required="required">
                        </div>
                        <div class="form-group input">
                            <label for="" style="color: white;">Apellido:</label>
                            <input class="form-control" name="pa" value="<?php echo $listar_usuario['apellido']; ?>" type="text" id="pa" required="required">
                        </div>
                        <div class="form-group input">
                            <label for="" style="color: white;"> Direccion:</label>
                            <input class="form-control" name="direccion" value="<?php echo $listar_usuario['direccion']; ?>" type="text" id="pa" required="required">
                        </div>
                        <div class="form-group input">
                            <label for="" style="color: white;"> Telefono</label>
                            <input class="form-control" name="telefono" value="<?php echo $listar_usuario['telefono']; ?>" type="text" id="pa" required="required">
                        </div>
                        <div class="form-group input">
                            <label for="" style="color: white;">Correo</label>
                            <input class="form-control" name="correo" value="<?php echo $listar_usuario['correo']; ?>" type="text" id="pa" required="required">
                        </div>
                        <div class="form-group input">
                            <label for="" style="color: white;"> contraseña</label>
                            <input class="form-control" name="contra" value="<?php echo $listar_usuario['contra']; ?>" type="text" id="pa" required="required">
                        </div>
                        <label for="" style="color: white;">Estado</label>
                        <div class="form-group input-group">

                            <select name="estado" class="form-control" value="" id="">

                                <option value="0" <?php if ($listar_usuario['id_estado'] == "0") {
                                                        echo "selected";
                                                    } ?>> Activo</option>
                                <option value="1" <?php if ($listar_usuario['id_estado'] == "1") {
                                                        echo "selected";
                                                    } ?>>Inactivo</option>

                            </select>
                        </div>
                        <label for="" style="color: white;">Rol</label>
                        <div class="form-group input-group">
                            <select name="rol" class="form-control" value="" id="">
                                <?php
                                while ($filas = mysqli_fetch_assoc($listar_rol)) {

                                ?>
                                    <option value="<?php echo $filas['id_rol'] ?>" <?php if ($listar_usuario['id_rol'] == $filas['id_rol']) {
                                                                                        echo "selected";
                                                                                    } ?>> <?php echo $filas['nom_rol'] ?> </option>
                                <?php
                                }
                                ?>
                            </select>
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