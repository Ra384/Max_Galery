<?php 
	session_start();
	/*AL CERRAR SESION SE RESETEAN LA VARIABLES ESPERANDO A SER OCUPADAS POR EL USUARIO QUE INICIE SESION*/
  	unset($_SESSION['name']);
  	unset($_SESSION['activo']);
  	//CIERRA LA SESION
  	session_destroy();
  	header('location: ../index.php'); //REDIRECCIONA A PAGINA LOGIN
 ?>