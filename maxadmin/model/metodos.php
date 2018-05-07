<?php 
	
	include 'conexion.php';
	
	/**
	* AUTHOR: RAMÓN VEGA
	*/
	
	class crud extends conexion
	{
		
		public function getRegistros($query){
			parent::conectar();
			$rs = $this->pdo->prepare($query);
			$rs -> execute();
			return $rs;
		}


		/* == OBTENER REGISTROS SEGUN LOS $datos INGRESADOS COMO CONDICION == */
		public function getRegistrosPro($query,$datos){
			parent::conectar();
			$rs = $this->pdo->prepare($query);
			$rs -> execute($datos);
			return $rs;
		}

		/* == OBTENER URL PARA MOSTRAR IMAGENES SEGUN EL ID DEL PRODUCTO == */

		public function getUrlImg($id){
			parent::conectar();
			$sql ="SELECT idimg,url FROM img_productos WHERE productos_idproductos = :id";
			$rs = $this->pdo->prepare($sql);
			$rs -> execute(array(":id"=>$id));
			return $rs;
		}

		public function insertarRegistros($query,$datos){
			parent::conectar();
			$rs = $this->pdo->prepare($query);
			$rs -> execute($datos);
			return $rs;
		}

		public function obtenerDatos($id,$query)
		{
			parent::conectar();
			
			$rs = $this->pdo->prepare($query);
			$rs->execute(
				array(
					':id' => $id
				)
			);
			$resultados = $rs -> fetch();
			return $resultados;
		}

		public function actualizarRegistros($datos,$query){
			parent::conectar();

			$rs = $this->pdo->prepare($query);
			$rs->execute(
				$datos
			);
			return $rs;

		}

		public function eliminarRegistros($id,$query){
			parent::conectar();
			$rs = $this->pdo->prepare($query);
			$rs -> execute(array(':id'=>$id));
			return $rs;
		}
	}



 ?>