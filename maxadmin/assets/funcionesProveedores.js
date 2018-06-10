$(document).ready(function(){ 
    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    /* == Enviar Datos al Controlador por AJAX para Agregar Proveedores a la BD== */
    $('#btnAddProveedores').click(function(){
      if($('#nombre').val().length == "" || 
        $('#compania').val().length == "" || 
        $('#dir').val().length == "" || 
        $('#cp').val().length == "" || 
        $('#tel').val().length == "" ||
        $('#correo').val().length == ""){
        alertify.alert("Error","Campos Vacios!");
        return false;
      }else if(regex.test($('#correo').val().trim())==false){
        alertify.alert('Correo','Dirección de Correo invalida!');
        return false;
      }

      datos = $('#formProveedores').serialize(); //Obtener Datos del Formulario 

      /*Envio de Datos por AJAX*/
      $.ajax({
        type: "POST", //Metodo
        data: datos, //Datos del fomulario
        url: "../controller/proveedores/addProveedor.php",//Direccion de los datos a enviar
        success:function(response){
          if (response==1) { // Si hay respuesta (Insertado de Datos correctamente)
             $('#tabla').load('content/tabla_proveedores.php');
             alertify.success("Agregado Correctamente!!");
          }else{
            alertify.error("Algo Salió Mal!");
          }
        }
      });

    });

    
    /* == Enviar Datos al Controlador por AJAX para Modificar Proveedores en la BD== */
    
    $('#btnUpdateProveedores').click(function(){
      
      if($('#nombreu').val().length == "" || 
        $('#companiau').val().length == "" || 
        $('#diru').val().length == ""|| 
        $('#cpu').val().length == "" || 
        $('#telu').val().length == ""||
        $('#correou').val().length == ""){
        alertify.alert("Error","Campos Vacios!");
        return false;
      }else if(regex.test($('#correou').val().trim())==false){
        alertify.alert('Correo','Dirección de Correo invalida!');
        return false;
      }

      datos = $('#formProveedoresu').serialize();

      $.ajax({
        type: "POST",
        data: datos,
        url: "../controller/proveedores/updateProveedor.php",
        success:function(response){
          if (response) {
             $('#tabla').load('content/tabla_proveedores.php');
             alertify.success("Modificado Correctamente!!");
          }else{
            alertify.error("Algo Salió Mal!");
          }
        }
      });

    });
    
  });

 /* FUNCION AGREGAR DATOS AL FORMULARIO */
    function obtenerDatosProveedores(id){
      
      $.ajax({
        type:"POST",
        data:"id="+id,
        url:"../controller/proveedores/getDataProveedor.php",
        success:function(response){
          if (response) {
            datos = jQuery.parseJSON(response);
            $('#idu').val(datos[0]);
            $('#nombreu').val(datos[1]);
            $('#companiau').val(datos[2]);
            $('#diru').val(datos[3]);
            $('#cpu').val(datos[4]);
            $('#telu').val(datos[5]);
            $('#correou').val(datos[6]);
                 
          }else{
            alertify.error("Algo salio Mal! :(");
          }
          
        }
      });
    }

    function eliminarDatosProveedores(id){
      alertify.confirm('== Eliminar Registro ==', '¿Esta seguro de eliminar este registro?', function(){
        $.ajax({
          type: "POST",
          data: "id="+id,
          url: "../controller/proveedores/deleteProveedor.php",
          success:function(response){
            if(response == 1){
                $('#tabla').load('content/tabla_proveedores.php');
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

