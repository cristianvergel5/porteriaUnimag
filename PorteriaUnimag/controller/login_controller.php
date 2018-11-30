<?php
	
	require_once("../model/usuarios_model.php");
	require_once("usuario_controller.php");

	$usuario = new Usuarios_model();
	$matrizUsuarios = $usuario->getUsuarios();

	$id = $_POST['documento'];
	$pass = $_POST['contrasenia'];

	$encontro = False;

	foreach ($matrizUsuarios as $registro) {
		if($registro["documento"] == $id and $registro['contrasenia'] == $pass){
			$usuario1 = new usuario($registro["documento"], $registro["nombre"], $registro["apellido"], $registro["fecha_nacimiento"], $registro["celular"], $registro["contrasenia"], $registro["direccion"], $registro["genero"], $registro["email"], $registro["tipo_documento"], $registro["foto"], $registro["tipo_usuario"]);

			$encontro = True;
			break;
		}
	}

	if($encontro){
		header("Location: ../view/vigilante_view.php");
			
		session_start();
		$_SESSION['usuario'] = serialize($usuario1); 
	}
	else{
		session_start();
		$_SESSION['login'] = 0; 
		header("Location: ../index.php"); //NO Encontro el usuario redirecciono a misma pagina
	}

?>