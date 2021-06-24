<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inicio</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->

</head>

<body id="page-top">
    <!-- Navigation-->
    <?php include 'navbar.php' ?>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center" style="margin-top: 0; padding-top: 4rem;">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="" />
            <!-- Masthead Heading-->
            <?php
            $contenido = isset($_SESSION['login']) ? $_SESSION['login'] : null;

            ?>
            <h1 class="masthead-heading text-uppercase mb-0"> <?php if ($contenido == TRUE) {
                                                                    echo "Bienvenido";
                                                                } else {
                                                                    echo "Registrate";
                                                                } ?> </h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0"><?php if ($contenido == TRUE) {
                                                                        echo "Gracias por usar nuestro aplicativo";
                                                                    } else {
                                                                        echo "¡Es gratis!";
                                                                    } ?></p>

            <?php if ($contenido != TRUE) { ?>
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light" href="registro.php">
                        Registrarse
                    </a>
                </div>
            <?php } ?>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio" style="background-color: #2c3e50;">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase mb-0" style="color: white;">Creaciones destacadas</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line" style="color: white;"></div>
                <div class="divider-custom-icon"><i class="fas fa-star" style="color: white;"></i></div>
                <div class="divider-custom-line" style="color: white;"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">

                <?php

                include('Controlador/producto/listar.php');

                while ($filas = mysqli_fetch_assoc($lista_destacada)) {


                ?>
                    <!-- Portfolio Item 1-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto ">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 ">
                                <div class="portfolio-item-caption-content text-center text-white" style="width: 30rem; height: 18rem;">

                                    <h1><?php echo $filas['nom_producto'] ?></h1>
                                    <br>
                                    <br>
                                    <h1>$<?php echo $filas['valor_producto'] ?></h1>
                                    <br>

                                    <i class="fas fa-heart" aria-hidden="true" style="color: red;"></i> <?php echo $filas['likes'] ?>
                                </div>
                            </div>
                            <img class="img-fluid" style="width: 30rem; height: 18rem;" src="data:image/png;base64, <?php echo base64_encode($filas['imagen']) ?>" alt="" />
                        </div>
                    </div>
                <?php } ?>
                <!---- termina-->







            </div>

            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="comunidad.php">
                    <i class="fas fa-plus mr-2"></i>
                    Ver más productos
                </a>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- About Section-->
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">Publicaciones más recientes</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->



            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <?php

                include('Controlador/publicaciones/listar.php');

                ?>
                <ol class="carousel-indicators">
                    <?php

                    $u = 0;
                    while ($filas = mysqli_fetch_assoc($lista)) {




                    ?>
                        <li data-target="#carouselExampleCaptions" data-slide-to=" <?php echo $u ?>" <?php if ($u == 0) { ?> class="active" <?php } ?>></li>

                    <?php
                        $u++;
                    }
                    ?>
                </ol>
                <div class="carousel-inner">
                    <?php
                    include('Controlador/publicaciones/listar.php');
                    $i = 0;
                    while ($filas = mysqli_fetch_assoc($lista)) {




                    ?>


                        <div class="carousel-item <?php if ($i == 0) { ?> active <?php } ?>">
                            <?php
                            if ($filas['ruta_video'] != "") {
                            ?>
                                <video src="videos/<?php echo $filas['ruta_video']; ?>" controls  width="100%" height="400px"></video>

                            <?php } else { ?>
                                <img src="data:image/jpg;base64,<?php echo base64_encode($filas['imagen']) ?>" class="d-block w-100" height="500px" alt="...">

                            <?php
                            }
                            ?>


                            <div class="carousel-caption d-none d-md-block">
                                <h1><?php echo $filas['titulo_publicacion'] ?></h1>
                                <p> <?php echo $filas['descripcion'] ?></p>
                            </div>
                        </div>


                    <?php
                        $i++;
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <!-- About Section Button-->
            <div class="text-center mt-4">
                <a class="btn btn-xl btn-outline-light" href="noticias.php">
                    <i class="fas fa-plus mr-2"></i>
                    Ver más publicaciones
                </a>
            </div>
        </div>
    </section>


    <?php
    include('footer.php');
    ?>



    <!-- Bootstrap core JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>