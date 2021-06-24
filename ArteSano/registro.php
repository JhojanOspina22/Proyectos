<?php
session_start();
if (isset($_SESSION['login'])) {
    header('location:inicio.php');
}
?>

<?php require_once  'errores/errores.php'; ?>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
            color: white;
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
            background: url("images/login-img.jpg") no-repeat fixed center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
            width: 100%;
            text-align: center;


        }
    </style>

</head>

<body class="iniciar">

    <div class="containerfluid">
        <?php include 'navbar.php'; ?>
        <br>
        <center>
            <div class="card" style="background-color: rgba(15, 14, 14, 0.521); width: 500px">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center" style="color: white;">Crea tu cuenta ahora</h4>

                    <hr>
                    <?php

                    if (isset($_SESSION['formulario'])) {
                        $TD = isset($_SESSION['formulario']['td']) ? $_SESSION['formulario']['td'] : NULL;
                        $Doc = isset($_SESSION['formulario']['nd']) ? $_SESSION['formulario']['nd'] : NULL;
                        $Nombre = isset($_SESSION['formulario']['pn']) ? $_SESSION['formulario']['pn'] : NULL;
                        $Apellidos = isset($_SESSION['formulario']['pa']) ? $_SESSION['formulario']['pa'] : NULL;
                        $Direccion = isset($_SESSION['formulario']['Direccion']) ? $_SESSION['formulario']['Direccion'] : NULL;
                        $tel = isset($_SESSION['formulario']['tel']) ? $_SESSION['formulario']['tel'] : NULL;
                        $Correo = isset($_SESSION['formulario']['correo']) ? $_SESSION['formulario']['correo'] : NULL;
                        $Clave = isset($_SESSION['formulario']['pass']) ? $_SESSION['formulario']['pass'] : NULL;
                        $Rol = isset($_SESSION['formulario']['rol']) ? $_SESSION['formulario']['rol'] : NULL;
                    }

                    ?>
                    <form action="Controlador/registrar_tejedor.php" method="post">

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
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'td');
                        }
                        ?>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="nd" class="form-control" placeholder="Numero de Documento *" type="text" id="nd" value="<?php if (isset($Doc)) echo $Doc ?>">

                        </div>
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'nd');
                        }
                        ?>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Nombres *" name="pn" type="text" id="pn" value="<?php if (isset($Nombre)) echo $Nombre ?>">

                        </div>
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'pn');
                        }
                        ?>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Apellidos *" name="pa" type="text" id="pa" value="<?php if (isset($Apellidos)) echo $Apellidos ?>">

                        </div>
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'pa');
                        }
                        ?>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user "></i> </span>
                            </div>

                            <input name="Direccion" class="form-control" placeholder="Dirección *" type="text" id="Direccion" value="<?php if (isset($Direccion)) echo $Direccion ?>">

                        </div>
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'Direccion');
                        }
                        ?>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user "></i> </span>
                            </div>

                            <input name="tel" class="form-control" placeholder="Telefono *" type="text" id="tel" value="<?php if (isset($tel)) echo $tel ?>">

                        </div>
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'tel');
                        }
                        ?>


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
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'rol');
                        }
                        ?>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="correo" class="form-control" placeholder="Correo Electronico *" type="email" id="correo" value="<?php if (isset($Correo)) echo $Correo ?>">

                        </div>
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'correo');
                        }
                        ?>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Contraseña *" type="password" id="pass" name="pass">

                        </div>
                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'pass');
                        }
                        ?>

                        <div class="form-group input-group">
                            <div class="g-recaptcha" name="captcha" data-sitekey="6Lc1jrkaAAAAABnWtcyJSCfqYJCvqsr4LDt3ed-P"></div>


                        </div>

                        <?php if (isset($_SESSION['error'])) {

                            echo     mostrarerrores($_SESSION['error'], 'captcha');
                        }
                        ?>



                        <br>


                        <div class="form-group">

                            <a href="Controlador/registrar_tejedor.php"><button name="btn" type="submit" class="btn btn-primary  btn-block"> Crear
                                    Cuenta </button></a>
                        </div>
                        <?php if (isset($_SESSION['error']['btn'])) { ?>

                            <script>
                                swal("¡Error!", "Documento o email en uso", "error")
                            </script>
                        <?php } ?>
                        <p class="text-center" style="color: rgb(114, 114, 114)">¿Tienes una cuenta? <a href="IniciarSesion.php" style="color: aliceblue">Iniciar sesión</a> </p>
                        <?php borrar() ?>
                    </form>
                </article>
            </div>
        </center>

    </div>
</body>

</html>