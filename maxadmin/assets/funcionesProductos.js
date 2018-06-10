$(document).ready(function(){


	$('#btnAddProductos').click(function(){
		if(
		  $('#codigo').val().length == "" || 
	        $('#nombre').val().length == "" || 
	        $('#descripcion').val().length == ""|| 
	        $('#descripcion2').val().length == "" || 
	        $('#precio').val().length == ""
	      )
		{
	        alertify.alert("Error","Campos Vacios!");
	        return false;
      	}

      	datos = $('#formProductos').serialize();

      	$.ajax({
      		type:"POST",
      		data: datos,
      		url: "../controller/productos/addProducto.php",
      		success:function(response){
      			if(response==1){
                              $('#tabla').load('content/tabla_productos.php');
      				alertify.success("Agregado Correctamente!");
      			}else{
      				alertify.error("Algo Salio Mal");
      			}
      		}
      	});
  });
  
  //Actualizar productos
  $('#btnUpdateProductos').click(function(){
    //Valido que no haya campos vacios
    if
    (
      $('#codigoup').val().length=="" ||
      $('#nombreup').val().length=="" ||
      $('#descripcionup').val().length=="" ||
      $('#descripcion2up').val().length=="" ||
      $('#cantidadup').val().length=="" ||
      $('#precioup').val().length=="" 
    )
    {
      alertify.alert("Error","Campos Vacios!");
      return false;
    }

    //Obtengo datos de formulario para mandarlos al controlador
    data = $('#formProductosup').serialize();

    $.ajax({
      type: "POST",
      data: data,
      url: "../controller/productos/updateProducto.php",
      success:function(response){
        if(response==1){
          $('#tabla').load('content/tabla_productos.php');
          alertify.success("Actualizado Correctamente!!");
        }else{
          alertify.error("Algo salio Mal");
        }
      }
    });
  });

    //Evento cuando se activa el radio de imagenes
   $('#imgCheck').change(function(){
      if($(this).prop('checked')){
        $('#campos').hide();
        $('#addimgs').hide();
        $('#imgs').show();
        
        idurl= $('#idurl').val();
        
        $('#imgs').load("../controller/productos/getUrlProducto.php",{id:idurl});

      }
    });


   //Evento cuando se activa el radio de información
   $('#infoCheck').change(function(){
      if($(this).prop('checked')){
        $('#imgs').hide();
        $('#campos').show();

      }
   });

  //Evento cuando se activa el radio de agregar imagenes
   $('#addImgCheck').change(function(){
      if($(this).prop('checked')){
        $('#imgs').hide();
        $('#campos').hide();
        $('#addimgs').show();
      }
   }); 
});

function obtenerDatosProductos(id){
      $('#infoCheck').prop('checked', true); 
      $('#campos').show();
      $('#imgs').hide();
      $('#addimgs').hide();
      $('#addimgs').load('dropzone.html',function(){
        Dropzone.discover();
      });
      Dropzone.options.dropzoneform = {
       dictDefaultMessage: "Arrastra los archivos aquí para subirlos o haz click!",
         init: function() {
              dzClosure = this; // Makes sure that 'this' is understood inside the functions below.
              //send all the form data along with the files:
              this.on("sending", function(data, xhr, formData) {
                 formData.append("idproducto", $("#idurl").val());
              });
        }

      };
      $.ajax({
        type:"POST",
        data:"id="+id,
        url:"../controller/productos/getDataProducto.php",
        success:function(response){
          if (response) {
            datos = jQuery.parseJSON(response);
            //auxcod = $('#codaux').text();

            $('#idurl').val(datos['idproductos']);
            //alert(datos['idproductos']);
            $('#cod').text(datos['codigo']);
            $('#nom').text(datos['nombre']);
            $('#dc').text(datos['descripcion_corta']);
            $('#dcom').text(datos['descripcion_completa']);
            $('#p').text("$"+datos['precio']);
            $('#cantidadp').text(datos['cantidad']);
            $('#marcasp').text(datos['marcas_idmarcas']);
            $('#categoriasp').text(datos['categorias_idcategorias']);
            $('#proveedoresp').text(datos['proveedores_idproveedores']);

          }else{
            alertify.error("Algo salio Mal! :(");
          }
          
        }
      });
}


function obtenerDatosActualizar(id){
  $.ajax({
    type:"POST",
    data:"id="+id,
    url:"../controller/productos/getDataUpdate.php",
    success:function(response){
      if (response) {
        
        datos = jQuery.parseJSON(response);
        $('#idup').val(datos['idproductos']);
        $('#codigoup').val(datos['codigo']);
        $('#nombreup').val(datos['nombre']);
        $('#descripcionup').val(datos['descripcion_corta']);
        $('#descripcion2up').val(datos['descripcion_completa']);
        $('#cantidadup').val(datos['cantidad']);
        $('#precioup').val(datos['precio']);
        $('#marcaup').val(datos['marcas_idmarcas']);
        $('#categoriaup').val(datos['categorias_idcategorias']);
        $('#proveedorup').val(datos['proveedores_idproveedores']);

      }else{
        alertify.error("Algo salio Mal! :(");
      }
      
    }
  });
}

function eliminarDatosProductos(id){
      alertify.confirm('== Eliminar Registro ==', '¿Esta seguro de eliminar este registro?', function(){
        $.ajax({
          type: "POST",
          data: "id="+id,
          url: "../controller/productos/deleteProducto.php",
          success:function(response){
            if(response == 1){
                $('#tabla').load('content/tabla_productos.php');
                alertify.success('Eliminado Correctamente! :)');
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

function eliminarImg(idimg){
  alertify.confirm('== Eliminar Registro ==', '¿Esta seguro de eliminar esta Imagen?', function(){
     
      
     $.ajax({
       type:"POST",
       data:"idimg="+idimg,
       url:"../controller/productos/deleteImg.php",
       success:function (response) {
         if(response==1){
          alertify.success('Imagen Eliminada Correctamente!');
          idurl= $('#idurl').val();
          $('#imgs').load("../controller/productos/getUrlProducto.php",{id:idurl});
         }else{
          alertify.error(':(');
         }
       }
     });
  },
    function(){ alertify.error('Imagen no Eliminada')}
  );
}