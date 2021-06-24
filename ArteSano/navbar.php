<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Arte Sano</title>
  <!-- Meta tag Keywords -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8" />
  <meta name="keywords" content="Stalled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
  <script>
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- //Meta tag Keywords -->
  <!-- Custom-Files -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Bootstrap-Core-CSS -->
  <link rel="stylesheet" href="css/tejedores.css" type="text/css" media="all" />
  <!-- Style-CSS -->
  <!-- font-awesome-icons -->
  <link href="css/font-awesome.css" rel="stylesheet">

  <!-- //font-awesome-icons -->
  <!-- /Fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800" rel="stylesheet">
  <!-- //Fonts -->

</head>

<body>
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: transparent !important;" id="nav">
      <div class="container-fluid">
        <a class="navbar-brand" href="Index.php">Arte Sano</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav">
            <li class="nav-item">


              <a class="nav-link" href="inicio.php">Inicio</a>



            <li class="nav-item">
              <?php
              $contenido = isset($_SESSION['login']) ? $_SESSION['login'] : null;
              if ($contenido == TRUE) {
                if ($_SESSION['rol'] == 1) {
              ?>
                  <a class="nav-link" href="mis_publicaciones.php">Mis publicaciones</a>
                <?php
                }
                ?>

                <?php if ($_SESSION['rol'] == 2) {
                ?>
                  <a class="nav-link" href="mis_creaciones.php">Mis creaciones</a>
                <?php
                }
                ?>

                <?php if ($_SESSION['rol'] == 3) {
                ?>
                 
                <?php
                }
                ?>


              <?php } else { ?>
                <a class="nav-link" href="IniciarSesion.php">Iniciar sesion</a>
              <?php } ?>
            </li>

            <li class="nav-item">
              <?php 
              if ($contenido == TRUE) {
                if ($_SESSION['rol'] == 1) {
              ?>
                <?php
                }
                ?>

                <?php if ($_SESSION['rol'] == 2) {
                ?>
                  <a class="nav-link" href="mis_pedidos.php">Mis pedidos</a>
                <?php
                }
                ?>

                <?php if ($_SESSION['rol'] == 3) {
                ?>
                  <a class="nav-link" href="mis_compras.php">Mis compras</a>
                <?php
                }
                ?>
              <?php } else { ?>
               
              <?php } ?>
            </li>

            <li class="nav-item">
              <?php 
              if ($contenido == TRUE) {
                if ($_SESSION['rol'] == 1) {
              ?>
                  <a class="nav-link" href="admin_usuarios.php">Administrar usuarios</a>
                <?php
                }
                ?>

                <?php if ($_SESSION['rol'] == 2) {
                ?>
                  <a class="nav-link" href="comunidad.php">Comunidad</a>
                <?php
                }
                ?>

                <?php if ($_SESSION['rol'] == 3) {
                ?>
                  <a class="nav-link" href="comunidad.php">Comunidad</a>
                <?php
                }
                ?>
              <?php } else { ?>
                <a class="nav-link" href="registro.php">Registrarse</a>
              <?php } ?>
            </li>


            <li class="nav-item">
              <?php 
            
               if ($contenido == TRUE) {
                 if ($_SESSION['rol'] == 1) {
               ?>
                   <a class="nav-link" href="comunidad.php">Comunidad</a>
                 <?php
                 }
                 ?>
 
                 <?php if ($_SESSION['rol'] == 2) {
                 ?>
                   <a class="nav-link" href="noticias.php">Noticias</a>
                 <?php
                 }
                 ?>
 
                 <?php if ($_SESSION['rol'] == 3) {
                 ?>
                   <a class="nav-link" href="noticias.php">Noticias</a>
                 <?php
                 }
                 ?>
              <?php } else { ?>
                <a class="nav-link" href="comunidad.php">Comunidad</a>
              <?php } ?>
            </li>

            <li class="nav-item">
              <?php if ($contenido == TRUE) {   
                
                if ($_SESSION['rol'] == 1) {
               ?>
                   <a class="nav-link" href="noticias.php">Noticias</a>
                 <?php
                 }
                 ?>

              <?php } else { ?>
              
              <?php } ?>
            </li>

            <li class="nav-item">
              <?php if ($contenido == TRUE) {    ?>
                <a class="nav-link" href="Controlador/Cerrar_Sesion.php">Cerrar Sesion</a>
              <?php } else { ?>
                <a class="nav-link" href="noticias.php">Noticias</a>
              <?php } ?>
            </li>

          </ul>

        </div>
      </div>
    </nav>
  </div>

</body>

</html>