<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	$query = "UPDATE proveedores SET nombre = :nom, compania = :com, direccion = :dir, codigo_postal = :cp, telefono = :tel, correo_electronico = :correo WHERE idproveedores = :id";
	$datos = array(
		":id"=>$_POST['idu'],
		":nom"=>$_POST['nombreu'],
		":com"=>$_POST['companiau'],
		":dir"=>$_POST['diru'],
		":cp"=>$_POST['cpu'],
		":tel"=>$_POST['telu'],
		":correo"=>$_POST['correou']
	);

	if($obj->actualizarRegistros($datos,$query))
		echo 1;
	else
		echo 0;

 ?>