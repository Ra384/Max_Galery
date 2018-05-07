<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	$query = "SELECT * FROM productos WHERE idproductos = :id";

	$resultado = $obj -> obtenerDatos($_POST['id'],$query);


	$sql = "SELECT m.nombre,c.nombre,pro.nombre FROM marcas m,categorias c,proveedores pro WHERE (m.idmarcas = :idm AND c.idcategorias=:idc AND pro.idproveedores = :idp)";
	
	
	$data =array(
		":idm"=>$resultado['marcas_idmarcas'],
		":idc"=>$resultado['categorias_idcategorias'],
		":idp"=>$resultado['proveedores_idproveedores']
	);

 	$rs = $obj->getRegistrosPro($sql,$data);
 	$claves = $rs->fetch();

 	$resultado['marcas_idmarcas'] = $claves[0];
 	$resultado['categorias_idcategorias'] =$claves[1];
 	$resultado['proveedores_idproveedores'] =$claves[2]; 

 	
 	echo json_encode($resultado);
 	



?>