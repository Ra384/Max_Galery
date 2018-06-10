<?php 

	include "../../model/metodos.php";
	$obj = new crud();

	/**Borrar registros de imagenes**/
	$qd = "DELETE FROM img_productos WHERE productos_idproductos = :id";
	$obj->eliminarRegistros($_POST['id'],$qd);

	/** Borrar registro Producto **/
	$qdp = "DELETE FROM productos WHERE idproductos = :id";

	//Elimino producto y mando una respuesta
	if($obj->eliminarRegistros($_POST['id'],$qdp))
		echo 1;
	else
		echo 0;
	

 ?>