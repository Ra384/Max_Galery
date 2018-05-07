 
 $(document).ready(function(){ 
    
    $('#isChecked').change(function(){

      if($(this).prop('checked')){
        $('#passwordu').val("");
        $('#mostrar').show();
      }else{
        $('#passwordu').val("sa");
        $('#mostrar').hide();
      }
    });

    /* == Enviar Datos al Controlador por AJAX para Agregar Usuarios a la BD== */
    $('#btnAddUsuarios').click(function(){
      if($('#nombre').val().length == "" || $('#usuario').val().length == "" || $('#password').val().length == ""){
        alertify.alert("Error","Campos Vacios!");
        return false;
      }

      datos = $('#formUsuarios').serialize(); //Obtener Datos del Formulario 

      /*Envio de Datos por AJAX*/
      $.ajax({
        type: "POST", //Metodo
        data: datos, //Datos del fomulario
        url: "../controller/usuarios/addUsuario.php",//Direccion de los datos a enviar
        success:function(response){
          if (response==1) { // Si hay respuesta (Insertado de Datos correctamente)
             $('#tabla').load('content/tabla_usuarios.php');
             alertify.success("Agregado Correctamente!!");
          }else{
            alertify.error("Algo Salió Mal!");
          }
        }
      });

    });


    /* == Enviar Datos al Controlador por AJAX para Modificar Usuarios en la BD== */
    $('#btnUpdateUsuarios').click(function(){
      if($('#nombreu').val().length == "" || $('#usuariou').val().length == "" || $('#passwordu').val().length == ""){
        alertify.alert("Error","Campos Vacios!");
        return false;
      }

      datos = $('#formUsuariosu').serialize();

      $.ajax({
        type: "POST",
        data: datos,
        url: "../controller/usuarios/updateUsuario.php",
        success:function(response){
          if (response) {
             $('#tabla').load('content/tabla_usuarios.php');
             alertify.success("Modificado Correctamente!!");
          }else{
            alertify.error("Algo Salió Mal!");
          }
        }
      });

    });
  });

 /* FUNCION AGREGAR DATOS AL FORMULARIO */
    function obtenerDatosUsuarios(id){
      $('#isChecked').prop('checked', false); 
      $('#passwordu').val("vacio");
      $('#mostrar').hide();
      $.ajax({
        type:"POST",
        data:"id="+id,
        url:"../controller/usuarios/getDataUsuario.php",
        success:function(response){
          if (response) {
            datos = jQuery.parseJSON(response);
            $('#idu').val(datos[0]);
            $('#nombreu').val(datos[1]);
            $('#usuariou').val(datos[2]);
            
          }else{
            alertify.error("Algo salio Mal! :(");
          }
          
        }
      });
    }

    function eliminarDatosUsuarios(id){
      alertify.confirm('== Eliminar Registro ==', '¿Esta seguro de eliminar este registro?', function(){
        $.ajax({
          type: "POST",
          data: "id="+id,
          url: "../controller/usuarios/deleteUsuario.php",
          success:function(response){
            if(response == 1){
                $('#tabla').load('content/tabla_usuarios.php');
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

