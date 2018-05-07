<?php 
	include '../../model/metodos.php';//INCLUYO METODOS.PHP
	$obj = new crud();//INSTANCIA DE LA CLASE crud DE METODOS.PHP
	/*SENTENCIA SQL*/
	$query ="SELECT idusuarios,nombre,usuario FROM usuarios WHERE idusuarios = :id";
	$rs = $obj->obtenerDatos($_POST['id'],$query);
	
	
	echo json_encode($rs);
	
 ?>

 
