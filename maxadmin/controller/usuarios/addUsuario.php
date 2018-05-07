<?php 
	include '../../model/metodos.php'; //INCLUYO METODOS.PHP
	$obj = new crud(); //INSTANCIA DE LA CLASE crud DE METODOS.PHP
	
	/*SENTENCIA SQL*/
	$query = "INSERT INTO usuarios VALUES(0,:nombre,:usuario,AES_ENCRYPT(:password,'gateway'),now())"; 

	/* DATOS PARA AGREGAR*/
	$data = array(
		':nombre' => $_POST['nombre'],
		':usuario' => $_POST['usuario'],
		':password' => $_POST['password']
	);

	/*VALIDA SI SE INSERTAN LOS DATOS O NO EN LA BD*/
	if($obj -> insertarRegistros($query,$data))
		echo 1; //RESPONDE A LA PETICION AJAX CON UN 1
	else
		echo 0; //RESPONDE AL PETICION AJAX CON UN 0



 ?>