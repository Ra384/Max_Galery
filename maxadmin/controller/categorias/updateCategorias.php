<?php 
	include "../../model/metodos.php";
	$obj = new crud();

	$query = "UPDATE categorias SET nombre = :nombre WHERE idcategorias = :id";
	$datos = array(":nombre"=>$_POST['nombreu'], ":id"=>$_POST['idu']);

	if ($obj->actualizarRegistros($datos,$query)) {
		echo 1;
	}else{
		echo 0;
	}

 ?>