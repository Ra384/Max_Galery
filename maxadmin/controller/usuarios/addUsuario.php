<?php 
	include '../../model/metodos.php'; //INCLUYO METODOS.PHP
	$obj = new crud(); //INSTANCIA DE LA CLASE crud DE METODOS.PHP
	/*VALIDA SI INSERTARE DATOS O NO EN LA BD DESPUES SI NO SE REPITE EL USUARIO*/	
	$valida = false; 
	/*SENTENCIAS SQL*/
	$query = "INSERT INTO usuarios VALUES(0,:nombre,:usuario,AES_ENCRYPT(:password,'gateway'),now())"; 
	$consulta = "SELECT * FROM usuarios";

	$rs = $obj->getRegistros($consulta);
	
	/* DATOS PARA AGREGAR*/
	$data = array(
		':nombre' => $_POST['nombre'],
		':usuario' => $_POST['usuario'],
		':password' => $_POST['password']
	);
	
	while($x = $rs->fetch()){
		if(strcmp($x['nombre'],$data[':nombre']) == 0 ||
			strcmp($x['usuario'],$data[':usuario']) == 0 ){
				$valida = true;
				break;
		}
	}
	
	if($valida){
		echo 0;
	}else{
		$obj -> insertarRegistros($query,$data);
		echo 1;
	}

	/*VALIDA SI SE INSERTAN LOS DATOS O NO EN LA BD*/
	/*if($obj -> insertarRegistros($query,$data)){
		echo 1; //RESPONDE A LA PETICION AJAX CON UN 1
	}else{
		echo 0; //RESPONDE AL PETICION AJAX CON UN 0
	}*/
		



 ?>