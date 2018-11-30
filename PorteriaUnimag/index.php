<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Porteria Unimag</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styleLogin.css" media="screen">
	<link rel="shortcut icon" href="img/logo.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body onload="">
	<?php

		session_start();
		if(!isset($_SESSION['usuario']) && isset($_SESSION['login'])){
			echo "<script> swal('Error!', 'Identificacion o contraseña incorrectos', 'error'); </script> ";
	    }
		session_destroy();
	?>
	<div id="espacioLogin">
		<img src="img/logo9.png" id="imagenLogin">

		<form action="controller/login_controller.php" method="POST">
			<p>Identificacion</p>
			<input type="text" name="documento" placeholder="Ingrese una identificacion">
			<p>Contraseña</p>
			<input type="password" name="contrasenia" placeholder="Ingrese la contraseña">
			<input type="submit" value="Ingresar" id="boton">
		</form>
	</div>
</body>
</html>