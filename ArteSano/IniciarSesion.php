<?php 
session_start();
if(isset($_SESSION['login'])){
	header('location:inicio.php');
}
?> 
<?php require_once  'errores/errores.php';

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
	<title>Iniciar sesión</title>
	<!-- meta_tags-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="connective login form a Flat Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Meta_tag_Keywords -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all">
	<!--style_sheet-->
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<!--font_awesome_icons-->
	<!--web_fonts-->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
	<!--//web_fonts-->
</head>

<body>
	<?php include 'navbar.php'; ?>

	<div class="form">
		<h1></h1>
		<div class="form-content">

			<form action="Controlador/ControladorIndex.php" method="POST">
				<div class="form-info">
					<h2>Ingresar</h2>
				</div>
				<div class="email-w3l">


					<span class="i1"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
					<input class="email" name="user" placeholder="Correo electrónico">
					<?php if (isset($_SESSION['error'])) {

						echo 	mostrarerrores($_SESSION['error'], 'user');
							                         
					}
					
					?>
					
									

				</div>
				<div class="pass-w3l">
					<!---728x90--->
					<span class="i2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					<input class="pass" type="password" name="password" placeholder="Contraseña">
					<?php if (isset($_SESSION['error'])) {

						echo 	mostrarerrores($_SESSION['error'], 'password');
					}

					?>
				</div>
				<div class="form-check">


					<div class="clear"></div>
				</div>
				<?php borrar() ?>
				<div class="submit-agileits">
					<input class="login" type="submit" value="Iniciar Sesión">
					<center><p class="text-center" style="color: rgb(114, 114, 114)">¿No tienes cuenta? <a href="registro.php" style="color: aliceblue">Registrate</a> </p></center>
				</div>
			</form>
		</div>
	</div>
	<!---728x90--->

	<!---728x90--->
</body>

</html>