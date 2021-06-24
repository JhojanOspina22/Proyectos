<?php 
require_once('Controlador/Seguridad.php'); 
if($_SESSION['rol']!=3){
    header('location:inicio.php'); 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mis compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="esyilos.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        .class {

            position: relative;
            left: 50%;
        }
    </style>
</head>

<body background="images/fondo.jpg">
   
<?php include 'navbar.php';?>

<br>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-10" style="color: white">
                        <h2>Inspeccion de <b>Compras</b></h2>
                    </div>

                   

                </div>
                <br>
            </div>
            <table class="table table-bordered" style="background-color: rgba(255,255,255,0.50); ">
                <thead>
                    <tr style="color:black">
                        <th>Nombre tejedor</th>
                        <th>teléfono tejedor</th>
                        <th>Nombre producto</th>
                        <th>Cantidad</th>
                        <th>Valor total compra</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th>Accion</th>



                    </tr>
                </thead>
                <tbody>

                    
                        <?php

                        include('Controlador/producto/listar.php');

                        while ($filas = mysqli_fetch_assoc($listar_compras)) {
                            
                        ?>
                        <tr class=" align-items-center">
                            <td> <?php echo $filas['nombre'] ." ".$filas['apellido']  ?></td>
                            <td> <?php echo $filas['telefono']?></td>
                            <td> <?php echo $filas['nom_producto']  ?></td>
                            <td> <?php echo $filas['cantidad']  ?></td>
                            <td> <?php echo $filas['valor']  ?></td>
                            <td ><img class="img-fluid" style="height:5rem; width: 8rem;" src="data:image/png;base64, <?php echo base64_encode($filas['imagen']) ?>"  alt="" /></td>
                            <td> <?php echo $filas['nombre_estado']  ?></td>
                           
                          <center> 
                          <td>  <a style="margin: 1rem;" href="Controlador/producto/cancelar.php?id_compra=<?php echo $filas['id_compra'] ?>"><i class="fas fa-arrow-alt-circle-left" title="Cancelar compra" style="color: red; font-size: 2rem;"></i></a></td> 
                          </center>
                            </tr>

                            
                        <?php
                        }
                        ?>
                    

                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</body>

<!-- Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Eliminar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
            <div class="modal-body">
                <div class="container-fluid">
                    ¿Estas seguro que deseas eliminar?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a href="Controlador/producto/eliminar.php?id_producto=<?php echo $filas['id_producto']?>"><button    type="button" class="btn btn-danger">Eliminar</button></a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM
        
    });
</script>
<script> 
function alerta(){
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
}
</script>
</html>