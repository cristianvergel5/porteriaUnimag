<?php
	/* Model para el usuario, hacemos operaciones con BD */
	class Usuarios_model{

		private $db;
		private $usuarios;
		
		public function __construct()
		{
			require_once("Conexion.php");
			$this->db = Conectar::conexion();
			$this->usuarios = array();
		}	

		public function getUsuarios(){
			$consulta = $this->db->query("SELECT * FROM usuario");

			while($filas=$consulta->fetch(PDO::FETCH_ASSOC))
			{
				$this->usuarios[]=$filas;
			}

			return $this->usuarios;
		}
	}
?>