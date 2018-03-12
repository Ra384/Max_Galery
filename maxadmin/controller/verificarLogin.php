<?php 
	/* Generar Conexión */
	include '../model/conexion.php'; 
	session_start();
	$obj = new conexion();
	$conexion = $obj->conectar(); //Almacena Conexión

	/* --VALIDACION USUARIO Y CONTRASEÑA-- */
	if(isset($_POST['submit']))
	{
		$sql = "SELECT * FROM usuarios WHERE usuario = :usu AND AES_DECRYPT(contraseña,'gateway') = :pass";
		$query = $conexion->prepare($sql);
		$query->execute(array(':usu'=>$_POST['usuario'],':pass'=>$_POST['contraseña']));
		$rs = $query->fetchAll();
		
		if(!empty($rs)){
			echo "Ok!"; //Redireccionar Dar Acceso al Sistema
			$_SESSION['name'] = $_POST['usuario'];
      		$_SESSION['activo'] = "Bienvenido ";
			header("Location: ../views/max.php?op=home");
		}else{

			header("Location: ../index.php?error=1"); //Mensaje de Error Contraseña Incorrecta
		}
	}
	/* --FIN VALIDACION--*/

 ?>