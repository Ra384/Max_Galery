<?php
	session_start();
	$bandera = false;
	
	if(isset($_GET['error']))
		$bandera = true;

	if(isset($_SESSION['activo']))
	{
		header("Location: views/max.php?op=home");
	}
	

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="css/estilosLogin.css">
</head>
<body>
	<br><br><br><br>
	<h1 align="center">Inicio de Sesión</h1>
	<div class="wrap">
		<form action="controller/verificarLogin.php" method="POST">
			<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="" required>
			<input type="password" name="contraseña" id="contraseña" placeholder="Contraseña" value="" required>
			<?php if ($bandera): ?>
				<div class="alert error">
					ERROR :: USUARIO Y/O CONTRASEÑA INCORRECTA
				</div>
			<?php endif; ?>
			<input type="submit" name="submit" class="btn btn-primary" value="ACCEDER">
		</form>
	</div>
</body>
</html>