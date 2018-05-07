<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	$query = "SELECT * FROM proveedores WHERE idproveedores = :id";

	$rs = $obj -> obtenerDatos($_POST['id'],$query);

	echo json_encode($rs);


 ?>