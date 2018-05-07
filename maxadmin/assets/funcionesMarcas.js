$(document).ready(function(){

	/* == Enviar Datos al Controlador por AJAX para Agregar Usuarios a la BD== */
	$('#btnAddMarcas').click(function(){
		if($('#nombre').val().length == ""){
			alertify.alert("Error","Campos Vacios!");
        	return false;
		}
		datos = $('#formMarcas').serialize();//Obtener datos del Formulario Marcas

		/* Enivio de datos por AJAX */
		$.ajax({
			type:"POST",
			data: datos,
			url: "../controller/marcas/addMarca.php",
			success:function(response){
				if(response==1)
				{
					$('#tabla').load('content/tabla_marcas.php');
             		alertify.success("Agregado Correctamente!!");
				}else
				{
					alertify.error("Not OK!");
				}
			}
		});
	});

	/* == Enviar Datos al Controlador por AJAX para Actualizar Marcas en la BD== */
	$('#btnUpdateMarcas').click(function(){
		if($('#nombreu').val().length == ""){
			alertify.alert("Error","Campos Vacios!");
        	return false;
		}

		datos = $('#formMarcasu').serialize();

		/* Enivio de datos por AJAX */
		$.ajax({
			type: "POST",
			data: datos,
			url: "../controller/marcas/updateMarcas.php",
			success:function(response){
				if(response==1){
					$('#tabla').load('content/tabla_marcas.php');
             		alertify.success("Actualizado Correctamente!!");
				}else{	
					alertify.error("Algo salio Mal");
				}
			}
		});

	});


});

function obtenerDatosMarcas(id){
	$.ajax({
		type: "POST",
		data: "id="+id,
		url: "../controller/marcas/getDataMarca.php",
		success:function(response){
			if(response)
			{
				datos = jQuery.parseJSON(response);
				$('#idu').val(datos[0]);
				$('#nombreu').val(datos[1]);
			}
			else
			{
				alertify.error("Algo salio Mal!");
			}
		}
	});
}

function eliminarDatosMarcas(id){
	 alertify.confirm('== Eliminar Registro ==', '¿Esta seguro de eliminar este registro?', function(){
        $.ajax({
          type: "POST",
          data: "id="+id,
          url: "../controller/marcas/deleteMarca.php",
          success:function(response){
            if(response == 1){
                $('#tabla').load('content/tabla_marcas.php');
              alertify.success('Eliminado Correctamente! :)')
            }
            else{
              alertify.error('Algo Salió Mal!');
            }
          }

        });  
      },
        function(){ alertify.error('Registro no Eliminado!')}
      );
}