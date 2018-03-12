<?php 
	session_start();
  	unset($_SESSION['name']);
  	unset($_SESSION['activo']);
  	session_destroy();
  	header('location: ../index.php');
 ?>