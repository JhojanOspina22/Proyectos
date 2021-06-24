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

  <!--jquery-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">
  <!-- Navigation-->
  <?php include 'navbar.php' ?>
  <!-- Masthead-->

  </section>


  <?php
  $alerta=isset($_GET['alerta'])?$_GET['alerta']:NULL;
  if($alerta!=NULL){
 ?>
<script> swal("Error", "Para reaccionar a los productos tienes que iniciar sesión", "error")</script>
  <?php
  }
  include('Conexion/conexion.php');
  include('Modelo/producto/listar.php');

  $cone = new Conectar();
  $conexion = $cone->conexion();
  $query1 = ("SELECT * from usuario where id_rol=2 and id_estado=0");
  $resultado1 = $conexion->query($query1);
  while ($tejedores = $resultado1->fetch_assoc()) {
    $tejedor=isset($tejedores['num_doc'])?$tejedores['num_doc']:0;
    
  ?>

<hr style="background-color:white; height: 0.2rem; padding:0; margin:0">

  <section id="galeria" style=" background-color: #1abc9c ">
    <br>
    <br>
    <div class="container conta">
      <center>
        <h1 style="color: white; "> Productos <?php echo $tejedores['nombre']." ". $tejedores['apellido'] ?></h1>
        <div class="row" align="center">


          <?php
      
          $categoria = "todo";
          if (isset($_GET['cate'])) {
            $categoria = $_GET['cate'];
          }
          $query2 = ("SELECT * from producto where id_categoria=$categoria and id_estado=0");
          $query3 = ("SELECT * from producto where  id_estado=0 and id_tejedor=$tejedor");
          if ($categoria == "todo") {
            $resultado = $conexion->query($query3);
          } else {

            $resultado = $conexion->query($query2);
          }

          ?>
          <?php

          while ($productos = $resultado->fetch_assoc()) {
          ?>
            <div class=" col-6 col-sm-6  col-lg-3 col-md-4  " style=" margin-top: 2rem; margin-top: 2rem; ">


              <div class="card tarjet" style="border-color: transparent; ">
                <img title="Popover title" alt="" class="card-img-top" id="imagenzoom" src="data:image/jpg;base64,<?php echo base64_encode($productos['imagen']) ?>" data-toggle="popover" data-trigger="hover" data-content="<?php echo $productos['descripcion'] ?>" style="margin-bottom: -18px; height: 12rem;">


                <div class="card-body">
                  <h5 class="card-title titulo" style="font-family: Cambria; margin-bottom: -10px; line-height: 18px; "><?php echo $productos['nom_producto'] ?></h5>
                  <hr style="background-color: purple; height: 0.3px; width: 70px; margin-bottom: 0px;">
                  <!-- ________________________________ -->
                  <h4 class="card-title titulo" style="color: purple; font-family: Cambria;">$ <?php echo number_format($productos['valor_producto']) ?></h4>


                  <form method="POST" action="" class="form2">
                    <input type="hidden" name="id" value="<?php echo (number_format($productos['id_producto'])) ?>">
                    <input type="hidden" name="nombre" value="<?php echo ($productos['nombre_producto']) ?>">
                    <input type="hidden" name="descrip" value="<?php echo ($productos['descripcion_producto']) ?>">
                    <input type="hidden" name="preci" value="<?php echo ($productos['precio_producto']) ?>">
                    <input type="hidden" name="canti" value="<?php echo ('1') ?>">
                    <input type="hidden" name="img" value="<?php echo (($productos['imagen_producto'])) ?>">
                    <a href=""><button class="btn btn-warning" style="width: 100%; font-size: 20px; "  value="Agregar" title="Solicitar" type="button">Solicitar</button></a>
                    
                  </form>
                  <?php $producto = new producto();
                  $reaccion = $producto->Reaccion_productos($productos['id_producto']);
                  ?>

                  <a href="Controlador/producto/likes.php?id_producto= <?php echo $productos['id_producto']; ?>&id_reaccion=1" name="like" style="color: black;"><i class="fas fa-heart" aria-hidden="true" style="color: red;"></i> <?php echo  $likes ?></a>
                  <a href="Controlador/producto/likes.php?id_producto= <?php echo $productos['id_producto']; ?>&id_reaccion=2" style=" padding: 0.5rem; color: black; " id="likes"><i class="far fa-thumbs-down" style="color: blue;"></i><?php echo  $dislikes ?></a>






                </div>
              </div>
            </div>
          <?php

          }
          ?>

        </div>
      </center>
    </div>

    <br>
    <br>
    
            <hr style="background-color:white; height: 0.2rem; padding:0; margin:0">
            
     
  </section>

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