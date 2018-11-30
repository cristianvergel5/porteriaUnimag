<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo "<script> window.location = '../index.php'; </script> ";
    }

    require_once("../controller/usuario_controller.php");
    $profile = unserialize($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Porteria Unimag - Perfil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- icono -->
	<link rel="shortcut icon" href="../img/logo.png">
	
	<!-- Scripts uso online -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- CSS [Algunos uso online] -->
	<link rel="stylesheet" href="../css/stylePerfil.css" media="screen">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.3.2/spacelab/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>
<body onload="">
	<!-- Responsive navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <!--  Muestra tres opciones cuando se encoje -->
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <?php echo "<p class='navbar-brand'>Vigilante ".$profile->get_nombre()." ".$profile->get_apellido()."</p>"; ?>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="vigilante_view.php"><i class="fa fa-address-book" aria-hidden="true"> Inicio</i></a></li>
          <li><a href="../model/logout.php"><i class="fa fa-sign-out" aria-hidden="true"> Cerrar Sesion</i></a></li>
        </ul>
      </div>
    </div>
  </div>
	
	<!-- Contenido tabs -->
	<div class="jumbotron" align="center">	
		<h1 class="display-3">Perfil</h1>

		<div id="espacioInfo">
			<div class="form-group row" style="margin-left: 35%; margin-top: 5%;" id="espacioNombres">
				<label class="col-sm-3 col-form-label" id="nombresLabel"><i class="fa fa-arrow-circle-right" aria-hidden="true"> Nombres:</i></label>
	    		<div class="col-sm-3">
	    			<?php
	    				$info = $profile->get_nombre();
					    echo "<input type='text' name='nombresInput' value='$info' disabled='true'>";
					?>
			    </div>
			</div>

			<div class="form-group row" style="margin-left: 35%; margin-top: 5%;" id="espacioApellidos">
				<label class="col-sm-3 col-form-label" id="apellidosLabel"><i class="fa fa-arrow-circle-right" aria-hidden="true"> Apellidos:</i></label>
	    		<div class="col-sm-3">
			        <?php
	    				$info = $profile->get_apellido();
					    echo "<input type='text' name='apellidosInput' value='$info' disabled='true'>";
					?>
			    </div>
			</div>

			<div class="form-group row" style="margin-left: 35%; margin-top: 5%;" id="espacioDireccion">
				<label class="col-sm-3 col-form-label" id="direccionLabel"><i class="fa fa-arrow-circle-right" aria-hidden="true"> Direccion:</i></label>
	    		<div class="col-sm-3">
			        <?php
	    				$info = $profile->get_direccion();
					    echo "<input type='text' name='direccionInput' value='$info' disabled='true'>";
					?>
			    </div>
			</div>

			<input type="button" value="Cambiar Contraseña" id="boton">
		
		</div>
	</div>

	<!-- Otros scrips usados -->
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>