<?php 

	include "../../model/metodos.php";
	$obj = new crud();
	$query = "SELECT * FROM marcas WHERE idmarcas = :id";

	$resultado = $obj -> obtenerDatos($_POST['id'],$query);

	echo json_encode($resultado);

 ?>