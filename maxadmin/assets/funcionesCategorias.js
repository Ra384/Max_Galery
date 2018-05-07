$(document).ready(function(){
	$('#btnAddCategorias').click(function(){
		if($('#nombre').val().length == ""){
			alertify.alert("Error","Campos Vacios!");
			return false;
		}

		datos = $('#formCategorias').serialize();

		$.ajax({
			type:"POST",
			data: datos,
			url: "../controller/categorias/addCategoria.php",
			success:function(response){
				if (response==1) {
					$('#tabla').load("content/tabla_categorias.php");
					alertify.success("Agregado Correctamente!");
				} else {
					alertify.error("Algo Salio Mal!");
				}
			}
		});

	});

	$('#btnUpdateCategorias').click(function(){
		if($('#nombreu').val().length == ""){
			alertify.alert("Error","Campos Vacios!");
			return false;
		}

		datos = $('#formCategoriasu').serialize();

		$.ajax({
			type:"POST",
			data: datos,
			url: "../controller/categorias/updateCategorias.php",
			success:function(response){
				if(response==1){
					$('#tabla').load("content/tabla_categorias.php");
					alertify.success("Actualizado Correctamente!");
				}else{
					alertify.error("Algo Salio Mal!");
				}
			}
		});

	});


});


function obtenerDatosCategorias(id){

	$.ajax({
		type: "POST",
		data: "id="+id,
		url: "../controller/categorias/getDataCategoria.php",
		success:function(response){
			if (response) {
				datos = jQuery.parseJSON(response);
				$('#idu').val(datos[0]);
				$('#nombreu').val(datos[1]);
			} else {
				alertify.error("Algo Salio Mal");
			}
		}
	});
}

function eliminarDatosCategorias(id){
	 alertify.confirm('== Eliminar Registro ==', '¿Esta seguro de eliminar este registro?', function(){
        $.ajax({
          type: "POST",
          data: "id="+id,
          url: "../controller/categorias/deleteCategoria.php",
          success:function(response){
            if(response == 1){
                $('#tabla').load('content/tabla_categorias.php');
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