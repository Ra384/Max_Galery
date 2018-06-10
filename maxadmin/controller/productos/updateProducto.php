<?php
    include "../../model/metodos.php";
	$obj = new crud();
    $query = "UPDATE productos SET
    codigo=:codigo,
    nombre=:nombre,
    descripcion_corta=:dc,
    descripcion_completa=:dcomp,
    precio=:precio,
    cantidad=:cant,
    marcas_idmarcas=:idm,
    categorias_idcategorias=:idc,
    proveedores_idproveedores=:idpro WHERE idproductos=:idp";
    
    $datos = array(
        ':idp' => $_POST['idup'],
        ':codigo' => $_POST['codigoup'],
        ':nombre' => $_POST['nombreup'],
        ':dc' => $_POST['descripcionup'],
        ':dcomp' => $_POST['descripcion2up'],
        ':precio' => $_POST['precioup'],
        ':cant' => $_POST['cantidadup'],
        ':idm' => $_POST['marcaup'],
        ':idc' =>$_POST['categoriaup'],
        ':idpro' =>$_POST['proveedorup'],
    );

	if($obj->actualizarRegistros($datos,$query)){
		echo 1;
	}else{
		echo 0;
	}


?>