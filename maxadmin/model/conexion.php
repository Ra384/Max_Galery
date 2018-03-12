<?php 
	/**
	* 
	*/
	class conexion 
	{
		private $server = "localhost";
		private $user = "root";
		private $pass = "root";
		private $bd = "max"; 

		public function conectar()
		{
			try {
				$pdo = new PDO("mysql: host=$this->server; dbname=$this->bd", $this->user, $this->pass);
				$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $pdo;
			} catch (Exception $e) {
				echo "Error en la Conexión:: ".$e->getMessage();
			}
		}
		
		
	}


 ?>