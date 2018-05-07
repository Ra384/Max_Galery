<?php 
	/**
	* AUTHOR: RAMÓN VEGA
	*/
	class conexion 
	{
		/* DATOS CONFIG DE CONEXION */
		private $server = "localhost";
		private $user = "root";
		private $pass = "root";
		private $bd = "max";
		protected $pdo;

		/* METODO PARA REALIZAR A LA CONEXION */
		public function conectar()
		{
			try {
				$this->pdo = new PDO("mysql: host=$this->server; dbname=$this->bd", $this->user, $this->pass);
				$this->pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $this->pdo; //REGRESA EL PDO CON LA CONEXION
			} catch (Exception $e) {
				echo "Error en la Conexión:: ".$e->getMessage();
			}
		}
		
		
	}


 ?>