<?php 
	include "../../model/metodos.php";
	$obj = new crud();

	$query = "UPDATE marcas SET nombre = :nombre WHERE idmarcas = :id";
	$datos = array(":nombre"=>$_POST['nombreu'], ":id"=>$_POST['idu']);

	if($obj->actualizarRegistros($datos,$query)){
		echo 1;
	}else{
		echo 0;
	}

 ?>