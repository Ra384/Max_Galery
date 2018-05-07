<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	$query = "INSERT INTO proveedores VALUES(0,:nom,:comp,:dir,:cp,:tel,:correo,now())";
	$datos = array(
		":nom"=>$_POST['nombre'],
		":comp"=>$_POST['compania'],
		":dir"=>$_POST['dir'],
		":cp"=>$_POST['cp'],
		":tel"=>$_POST['tel'],
		":correo"=>$_POST['correo']
	);

	if($obj->insertarRegistros($query,$datos))
		echo 1;
	else
		echo 0;
 ?>