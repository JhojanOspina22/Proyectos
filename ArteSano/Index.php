<?php 
session_start();
if(isset($_SESSION['login'])){

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
<html lang="zxx">


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
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
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
<?php include 'navbar.php';?>


  

  <header class="header content">

    <div class="header-video">
      <video src="videos/EXPO ARTESANIA Tejidos.mp4" autoplay muted></video>
    </div>

    <div class="header-overlay">
    </div>

    <div class="header-content ">
      <h1>Ingresa a nuestra comunidad de artesanos</h1>
      <p>¡Reacciona o solicita tus productos o servicios preferidos!</p>
      <p>¡Publica todas tus obras y date a conocer!</p>
      <br>
      <a href="inicio.php"><button type="button" class="btn btn-dark"> Inicio</button></a>
    </div>


  </header>

</body>

</html>