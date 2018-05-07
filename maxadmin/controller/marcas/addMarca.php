<?php 

	include "../../model/metodos.php";
	$obj = new crud();
	$datos = array(":nombre"=>$_POST['nombre']);
	$query ="INSERT INTO marcas VALUES(0,:nombre,now())";
	if($obj -> insertarRegistros($query,$datos)){
		echo 1;
	}else{
		echo 0;
	}

 ?>