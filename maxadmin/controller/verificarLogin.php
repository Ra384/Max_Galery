<?php 
	/* Generar Conexión */
	include '../model/conexion.php'; 
	session_start();
	$obj = new conexion();
	$conexion = $obj->conectar(); //Almacena Conexión
	
	//phpinfo();
	/* --VALIDACION USUARIO Y CONTRASEÑA-- */
	if(isset($_POST['submit']))
	{
		
		$sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND AES_DECRYPT(contrasena,'gateway') = :password";//SENTENCIA MYSQL
		$query = $conexion->prepare($sql); //SE CARGA LA SENTENCIA
		
		$query->execute(
			array(
				':usuario' => $_POST['usuario'],
				':password' => $_POST['password']
			)
		);// SE EJECUTA CON LOS PARAMETROS REQUERIDOS
		

		
		
		$rs = $query->fetchAll();//SE ALMACENA EL RESULTADO DE LA CONSULTA

		if(!empty($rs)){
			//echo "Ok!"; //Redireccionar Dar Acceso al Sistema
			$_SESSION['name'] = $_POST['usuario'];
      		$_SESSION['activo'] = "Bienvenido ";
			header("Location: ../views/max.php?op=home");
		}else{

			header("Location: ../index.php?error=1"); //Mensaje de Error Contraseña Incorrecta
		}
	}
	/* --FIN VALIDACION--*/

 ?>