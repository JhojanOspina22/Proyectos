
<?php 
require_once('Controlador/Seguridad.php'); 
if($_SESSION['rol']!=2){
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500%7COpen+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Nuevo Producto</title>
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
    <div class="containerfluid">}
    <br>
      <?php include('navbar.php')?>
        <br>
        <center>
            <div class="card" style="background-color: rgba(15, 14, 14, 0.521); width: 700px">
                <article class="card-body mx-auto" style="width:  500px; color: white;">
                    <h4 class="card-title mt-3 text-center">Nuevo producto</h4>
                <hr>                    
                    <form action="Controlador/producto/agregar.php" method="POST" enctype="multipart/form-data">
                    <label for="">Nombre del producto</label>
                        <div class="form-group input">
                           <input class="form-control" placeholder="Nombre *" name="Nombre" type="text" id="pa" required="required">
                        </div>
                        <label for="">Descripción</label>
                       <div class="form-group input-group">   
                        <textarea name="descripcion" cols="30" class="form-control" placeholder="Descripcion*" type="text-area"  required="required"></textarea> 
                        </div>
                        <label for="">Valor</label>
                        <div class="form-group input-group">
                            <input name="valor" class="form-control" placeholder="Valor en pesos *" type="number" required="required">
                        </div>
                        <div class="form-group input-group">
                            <select name="categoria" class="form-control" value="" id="">
                                <?php
                                include('Controlador/producto/listar.php');
                                while ($filas = mysqli_fetch_assoc($listar_categoria)) {

                                ?>
                                    <option value="<?php echo $filas['id_categoria'] ?>"> <?php echo $filas['nom_categoria'] ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group input-group">
                           <input name="Img" style="color: white;"  type="file" id="Img" accept="image/*" required="required">
                        </div>
                        <div class="form-group">
                            <button  type="submit" class="btn btn-primary btn-block"> Registrar </button>
                        </div>
                    </form>
                </article>
            </div>
        </center>

    </div>
</body> 
</html>