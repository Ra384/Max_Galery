<?php 
	include '../../model/metodos.php';//INCLUYO METODOS.PHP
	$obj = new crud();//INSTANCIA DE LA CLASE crud DE METODOS.PHP;
	$query="";
	$datos=array();
	print_r($_POST);
	if($_POST['pswrd']){
		/*SENTENCIA SQL*/
		$query ="UPDATE usuarios SET nombre=:nombre,usuario=:usuario,contrasena=AES_ENCRYPT(:pswd,'gateway') WHERE idusuarios = :id";
		$datos = array(
			':id'=>$_POST['idu'],
			':nombre'=>$_POST['nombreu'],
			':usuario'=>$_POST['usuariou'],
			':pswd'=>$_POST['passwordu']
		);
		
	}else{
		/*SENTENCIA SQL*/
		$query ="UPDATE usuarios SET nombre=:nombre,usuario=:usuario WHERE idusuarios = :id";
		$datos = array(
			':id'=>$_POST['idu'],
			':nombre'=>$_POST['nombreu'],
			':usuario'=>$_POST['usuariou']
		);
		
	}
	

		if($obj->actualizarRegistros($datos,$query))
			echo 1;
		else
			echo 0;
	
	
	

	


 ?>