<?php 
	include '../../model/metodos.php';

	$obj = new crud();
	$query = "DELETE FROM usuarios WHERE idusuarios = :id";

	if($obj ->eliminarRegistros($_POST['id'],$query))
		echo 1;
	else
		echo 0;



 ?>