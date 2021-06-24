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

			<nav class="nav-menu d-none d-lg-block">
				<ul>
					<li><a href="index.php">Inicio</a></li>
					<li><a href="index.php#about">Nosotros</a></li>
					<li><a href="productos.php">Productos</a></li>
					<li><a href="#">Entregas</a></li>
					<li><a href="index.php#contact">Contactanos</a></li>

					<li class="book-a-table text-center active"><a href="carritocompra.php" name="submit"><i class="fa fa-shopping-cart" aria-hidden="true">(<?php echo (empty($_SESSION['CARRITO'])) ? 0 : count($_SESSION['CARRITO']) ?>)</i></a></li>
				</ul>
			</nav><!-- .nav-menu -->

		</div>

	</header><!-- End Header -->

	<div class="cart-wrap" style="margin-top: 6rem">
		<div class="container">
			<div class="row">
				<?php

				if (!empty($_SESSION['CARRITO'])) {

				?>
					<div class="col col-sm-6 col-lg-8 colum1">
						<div class="main-heading">Carrito de compra</div>
						<div class="table-cart table-responsive-sm">
							<table class="table-hover">
								<thead>
									<tr>
										<th class="text-center">Producto</th>
										<th class="text-center">Cantidad</th>
										<th class="text-center">Total</th>
										<th class="text-center">---</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$total = 0;
									foreach ($_SESSION['CARRITO'] as  $indice => $producto) {



									?>
										<tr>
											<td class="text-center">
												<div class="display-flex align-center">
													<div class="img-product">
														<img src="data:image/jpg;base64,<?php echo base64_encode($producto['IMAGEN']) ?>" alt="" class="mCS_img_loaded">
													</div>
													<div class="name-product">
														<?php echo $producto['NOMBRE'] ?>

													</div>
													<div class="price">
														$<?php echo number_format($producto['PRECIO']) ?>
													</div>
												</div>
											</td>
											<td class="product-count text-center">
												<form action="#" class="count-inlineflex">

													<input type="text" name="quantity" id="cantidad" value="<?php echo $producto['CANTIDAD'] ?>" class="qty">

												</form>
											</td>
											<td class="text-center">
												<div class="total">
													$<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD']) ?>
												</div>
											</td>
											<td class="text-center">
												<form method="POST" action="">
													<input class="form-control" type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY) ?>">
													<button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit"><i class="fa fa-trash" aria-hidden="true" title="Eliminar"></i></button>
												</form>

											</td>
										</tr>

									<?php
										$total = $total + $producto['CANTIDAD'] * $producto['PRECIO'];
									}  ?>
								</tbody>
							</table>

						</div>
						<!-- /.table-cart -->
					</div>
					<?php

					foreach ($_SESSION['CARRITO'] as  $indice => $producto) {



					?>

						<div class=" col-6 col-sm-2  col-lg-3 col-md-4 colum2 text-center " style="width: 100%;">
							<div class="card" style="border-color: transparent;">
								<center><img title="<?php echo $producto['NOMBRE'] ?>" alt="" class="card-img-top" src="data:image/jpg;base64,<?php echo base64_encode($producto['IMAGEN']) ?>" style="width: 100px; height: 80px;"></center>


								<div class="card-body">
									<p class="card-title" style=" margin-top: -1rem;"><?php echo $producto['NOMBRE'] ?></p>
									<hr style="background-color: purple; height: 1px; width: 70px; margin-top: -0.5rem; " align="center">

									<h5 class="card-title" style="color: purple; margin-top: -0.5rem;"><input class="text-center" | type="text" value="<?php echo number_format($producto['CANTIDAD']) ?>" style="width: 2rem; height: 1.5rem; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;"> $ <?php echo number_format($producto['PRECIO']) ?></h5>


									<form method="POST" action="" align="center">
										<input class="form-control" type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY) ?>">
										<button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit" style="height: 1rem; margin-top: -1rem; ">
											<p style="margin-top: -0.5rem; font-size: 10px;">Eliminar</p>
										</button>
									</form>



								</div>
							</div>
						</div>
					<?php
					}
					$valorenvio = 10000;
				} else {
					$valorenvio = 0;
					$total = 0;
					?>
					<div class="col-lg-8">
						<div class="main-heading">Carrito de compra</div>
						<div class="table-cart">
							<table>
								<thead>
									<tr>

									</tr>
								</thead>
								<tbody>

									<tr>

									</tr>
								</tbody>
							</table>
							<div class="coupon-box">
								<div class="alert alert-warning" role="alert">
									No hay productos en el carrito.
								</div>
							</div>
						</div>
						<!-- /.table-cart -->
					</div>

				<?php } ?>
				<!-- /.col-lg-8 -->
				<div class="col-lg-4">
					<div class="cart-totals">
						<h2 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">Total Carrito</h2>
						<form action="" method="POST" accept-charset="utf-8">
							<table>
								<tbody>

									<tr>
										<td>Subtotal</td>
										<td class="subtotal">$<?php echo number_format($total) ?></td>
									</tr>

									<tr>
										<td>Valor envio</td>
										<td class="subtotal">$<?php echo number_format($valorenvio) ?></td>
									</tr>

									<tr class="total-row">
										<td>Total COP</td>
										<td class="price-total">$ <?php echo number_format($total + $valorenvio) ?></td>
									</tr>




								</tbody>
							</table>
							<div class="btn-cart-totals">

								<button class="checkout round-black-btn" name="btnAccion" value="Vacear" type="submit">
									Vacear Carrito
								</button>
						</form>
						<form action="pagar.php" method="POST" accept-charset="utf-8">
							<?php
							if (!empty($_SESSION['CARRITO'])) {
							?>

								<button class="checkout round-black-btn" name="btnAccion" value="Proceder" type="submit">
									Proceder al pago
								</button>

							<?php } else { ?>

								<button class="checkout round-black-btn" disabled name="btnAccion" value="Proceder" type="submit">
									Proceder al pago
								</button>

							<?php } ?>
						</form>
					</div>
					<!-- /.btn-cart-totals -->
					</form>
					<!-- /form -->
				</div>
				<!-- /.cart-totals -->
			</div>
			<!-- /.col-lg-4 -->
		</div>
	</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




	<!-- ======= Footer ======= -->
	<footer id="footer">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6 col-md-4 col-lg-5  col-xl-5 social-links">
					<h3>Sweet Surprise</h3>
					<p>Siempre transmitiendo sentimientos con nuestros diferentes detalles y desayunos sorpresa.</p>
					<div class="social-links">
						<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
						<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
						<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
						<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
						<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-md-4 col-lg-4  col-xl-4 footer-links">
					<h3 style="color: #ffb03b">Enlaces Útiles</h3>
					<ul>
						<li><a href="index.php" style="color: #fff">Inicio</a></li>
						<li><a href="#about2" style="color: #fff">Nosostros</a></li>
						<li><a href="productos.php" style="color: #fff">Productos</a></li>
					</ul>
				</div>
				<div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 ">
					<img src="assets/img/logo.png" alt="" class="img-fluid" align="center">
				</div>
			</div>
			<div class="copyright">
				&copy; Copyright <strong><span>Sweet Surprise</span></strong>. Todos los derechos reservados.
			</div>
			<div class="credits">
				<!-- All the links in the footer should remain intact. -->
				<!-- You can delete the links only if you purchased the pro version. -->
				<!-- Licensing information: https://bootstrapmade.com/license/ -->
				<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
				Diseñado por <a href="#">TecnoServices C&M.</a>
			</div>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/venobox/venobox.min.js"></script>
	<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

	<!-- Template Main JS File -->
	<script src="assets/js/mainproductos.js"></script>

</body>

</html>