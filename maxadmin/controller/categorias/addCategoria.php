<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	$query = "INSERT INTO categorias VALUES(0,:nombre,now())";

	$datos = array(":nombre"=>$_POST['nombre']);

	if($obj->insertarRegistros($query,$datos)){
		echo 1;
	}else{
		echo 0;
	}

 ?>