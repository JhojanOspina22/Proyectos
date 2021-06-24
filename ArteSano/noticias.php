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

    <?php
    $alerta = isset($_GET['alerta']) ? $_GET['alerta'] : NULL;
    if ($alerta != NULL) {
    ?>
        <script>
            swal("Error", "Para reaccionar a los productos tienes que iniciar sesión", "error")
        </script>
    <?php
    }

    include('Conexion/conexion.php');
    include('Modelo/publicaciones/listar.php');
    $conectar = new Conectar();
    $query = $conectar->conexion();
    $query = Mysqli_query($query, "SELECT * FROM publicaciones");

    while ($publicaciones = $query->fetch_assoc()) {

    ?>
        <center>
            <hr style="background-color:white; height: 0.2rem; padding:0; margin:0">
            </hr>
        </center>
        <section id="galeria" style=" background-color: #1abc9c; margin:0; padding-top: 3rem; ">

            <div class="container-fluid d-flex align-items-center justify-content-center">
                <center>
                    <h1 style="color: white;"> <?php echo $publicaciones['titulo_publicacion']; ?> </h1>
                    <br>

                    <video src="videos/<?php echo $publicaciones['ruta_video']; ?> "  controls height="500px"></video>

                    <br>
                    <?php
                    $publicacion = new publicacion();
                    $reaccion = $publicacion->Reaccion_publicaciones($publicaciones['id_publicacion']);
                    ?>
                    <div class="likes" style="float: right; ">
                        <a href="Controlador/publicaciones/likes.php?id_publicacion= <?php echo $publicaciones['id_publicacion']; ?>&id_reaccion=1" name="like" style="color:black;"><i class="fas fa-heart" aria-hidden="true" style="color: red; "></i> <?php echo  $likes ?></a>
                        <a href="Controlador/publicaciones/likes.php?id_publicacion= <?php echo $publicaciones['id_publicacion']; ?>&id_reaccion=2" style=" padding: 0.5rem; color: black; " id="likes"><i class="far fa-thumbs-down" style="color: blue;"></i><?php echo  $dislikes ?></a>
                    </div>
                    <br>
                    <p style="color: white;"><?php echo $publicaciones['descripcion']; ?></p>
                    <br>
                    <br>
                </center>

            </div>

        </section>

        <center>
            <hr style="background-color:white; height: 0.2rem; padding:0; margin:0">
            </hr>
        </center>
    <?php
    }
    ?>
    <!-- About Section-->


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