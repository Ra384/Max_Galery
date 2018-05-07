<?php 

	include "../../model/metodos.php";
	$obj = new crud();

	$query = "DELETE FROM productos WHERE idproductos = :id";
	//Elimino productos asociados al producto a eliminar
	

	//Elimino producto y mando una respuesta
	if($obj->eliminarRegistros($_POST['id'],$query))
		echo 1;
	else
		echo 0;
	



 ?>