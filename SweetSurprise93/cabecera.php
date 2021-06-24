
<?php
include 'config/config.php';
include 'controlador/controladorCarrito.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sweet Surprise</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

    <!-- CDN Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
    <!-- SDK PayPal -->
     <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
    <!--<script
    src="https://www.paypal.com/sdk/js?client-id=AWTnpwA0ZoPofh4zts8TBC4PIrKr_HwemJu4yTJwo336mKwqHWTSGFxfla5KzsIPQ66LvGDZwbeN95Q2"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
  </script>-->

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v2.0.2
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-flex align-items-center fixed-top" style="background-color: black">
    <div class="container text-right">
      <i class="icofont-phone"></i> +57 3115662335
      <i class="icofont-clock-time icofont-rotate-180"></i> Lunes-Domingo: 7:00 AM - 7:00 PM
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center" style="background-color: black">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"><span>Sweet Surprise</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block" >
        <ul>
          <li class="active"><a href="index.php">Inicio</a></li>
          <li><a href="#about">Nosotros</a></li>
          <li><a href="productos.php">Productos</a></li>
          <li><a href="#">Entregas</a></li>
          <li><a href="#contact">Contactanos</a></li>

          <li class="book-a-table text-center"><a href="carritocompra.php" name="submit" ><i class="fa fa-shopping-cart" aria-hidden="true" >(<?php echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']) ?>)</i></a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>

  </header><!-- End Header -->