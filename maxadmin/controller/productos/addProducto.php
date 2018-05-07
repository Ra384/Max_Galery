<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	$sql = "SELECT idmarcas,idcategorias,idproveedores 
			FROM marcas m,categorias c,proveedores pro 
			WHERE (m.nombre = :nm AND c.nombre=:nc AND pro.nombre =:npro)";
	$data =array(
		":nm"=>$_POST['marca'],
		":nc"=>$_POST['categoria'],
		":npro"=>$_POST['proveedor']
	);
 	$rs = $obj->getRegistrosPro($sql,$data);
 	$claves = $rs->fetch();

 	

 	$sql_ins="INSERT INTO productos VALUES(0,:cod,:nom,:dcorta,:dcomp,:precio,:cant,:idm,:idcat,:idpro)";
 	$array = array(
 		":cod"=>$_POST['codigo'],
 		":nom"=>$_POST['nombre'],
 		":dcorta"=>$_POST['descripcion'],
 		":dcomp"=>$_POST['descripcion2'],
 		":precio"=>$_POST['precio'],
 		":cant"=>$_POST['cantidad'],
 		":idm"=>$claves['idmarcas'],
 		":idcat"=>$claves['idcategorias'],
 		":idpro"=>$claves['idproveedores']
 	);

 	if($obj->insertarRegistros($sql_ins,$array))
 		echo 1;
 	else
 		echo 0;

?>