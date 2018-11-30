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
	<title>Porteria Unimag - Vigilante</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- icono -->
	<link rel="shortcut icon" href="../img/logo.png">
	
	<!-- Scripts uso online -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- CSS [Algunos uso online] -->
	<link rel="stylesheet" href="../css/styleVigilante.css" media="screen">
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
          <li><a href="perfil_view.php"><i class="fa fa-user-circle" aria-hidden="true"> Perfil</i></a></li>
          <li><a href="../model/logout.php"><i class="fa fa-sign-out" aria-hidden="true"> Cerrar Sesion</i></a></li>
        </ul>
      </div>
    </div>
  </div>
	
	<!-- Contenido tabs -->
	<div class="jumbotron" align="center">	
		<div class="container">
			<div class="bs-component">
		      <ul class="nav nav-tabs" style="margin-left: 35%; margin-top: 5%;">
		        <li class="nav-item">
		          <a class="nav-link" data-toggle="tab" href="#zonas"><i class="fa fa-map-marker" aria-hidden="true"> Mostrar Zonas</i></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" data-toggle="tab" href="#codigo"><i class="fa fa-search" aria-hidden="true"> Verificar Codigo</i></a>
		        </li>
		      </ul>

		    	<div id="myTabContent" class="tab-content">
			        <div class="tab-pane fade" id="zonas">
			          	<p>
			          		Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squisd. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.
			        	</p>
			        </div>

			        <div class="tab-pane fade" id="codigo">	
		        		<form action="" method="POST">
		        			<div class="form-group row" style="margin-left: 35%; margin-top: 5%;" id="espacioCodigo">
		        				<label class="col-sm-3 col-form-label" id="codigoLabel"><i class="fa fa-arrow-circle-right" aria-hidden="true"> Ingrese el código:</i></label>
				        		<div class="col-sm-3">
							        <input type="text" name="codigoInput" placeholder="Ingrese un codigo">
							    </div>
		        			</div>

		        			<div class="form-group row" style="margin-left: 35%; margin-top: 5%;" id="espacioCodigo">
		        				<label class="col-sm-3 col-form-label" id="codigoLabel"><i class="fa fa-arrow-circle-right" aria-hidden="true"> Ingrese la placa:</i></label>
				        		<div class="col-sm-3">
							        <input id="inputPlaca" type="text" placeholder="Ingrese una placa">
							    </div>
		        			</div>

						    <input type="submit" value="Verificar" id="boton">
		        		</form>
			        </div>
		    	</div>
	    	</div>
    	</div>
	</div>

	<!-- Otros scrips usados -->
  <script src="http://code.jquery.com/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>