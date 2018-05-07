<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	$query = "INSERT INTO img_productos(url,nombre_img,fecha_subida,productos_idproductos) 
					 VALUES(:url,:nombre,now(),:id)";

	
	if(!empty($_FILES)){
       
	    $targetDir = "../../img/productos/uploads/";
	    $fileName = $_FILES['file']['name'];
	    $targetFile = $targetDir.$fileName;
	    $url = "../img/productos/uploads/".$fileName;

	    $array = array(
	    	":url" => $url,
	    	":nombre" => $fileName,
	    	":id" => $_POST['idproducto']

	    );
	    if(move_uploaded_file($_FILES['file']['tmp_name'],$targetFile)){
	        //insert file information into db table
	       if($obj->insertarRegistros($query,$array))
	       	echo "Ok!";
	    }
    
	}



?>