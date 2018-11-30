<?php

/**
* Clase de el usuario
*/

class usuario
{
	
	private $documento;
	public $nombre;
	public $apellido;
	public $fecha_naciemiento;
	public $celular;
	private $contrasenia;
	public $direccion;
	public $genero;
	public $email;
	public $tipo_documento;
	public $foto;
	public $tipo_usuario;

	/* Agregar mas info si es requerida*/

	public function __construct($documento, $nombre, $apellido, $fecha_naciemiento, $celular, $contrasenia,$direccion, $genero, $email, $tipo_documento, $foto, $tipo_usuario)
	{
		$this->documento = $documento;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
		$this->fecha_naciemiento = $fecha_naciemiento;
		$this->celular = $celular;
		$this->contrasenia = $contrasenia;
		$this->direccion = $direccion;
		$this->genero = $genero;
		$this->email = $email;
		$this->tipo_documento = $tipo_documento;
		$this->foto = $foto;
		$this->tipo_usuario = $tipo_usuario;
	}

	public function __destruct(){

	}

	public function getEmail(){
		return $this->email;
	}

	public function getgenero(){
		return $this->genero; 
	}

	public function getcontrasenia(){
		return $this->contrasenia;
	}

	public function get_foto(){
		return $this->foto; 
	}

	public function get_tipo_documento(){
		return $this->tipo_documento;
	}

	public function get_documento(){
		return $this->documento;
	}

	public function get_nombre(){
		return $this->nombre;
	}

	public function get_fecha_naciemiento(){
		return $this->fecha_naciemiento;
	}

	public function get_celular(){
		return $this->celular;
	}

	public function get_apellido(){
		return $this->apellido;
	}

	public function get_direccion(){
		return $this->direccion;
	}
}

?>