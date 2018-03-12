<?php 

	
	$bandera = false;
	if(isset($_SESSION['name']) == true && isset($_SESSION['activo']) == true){
	  $bandera = true;
	}
	else{
	  header("Location: ../index.php");
	}

 ?>