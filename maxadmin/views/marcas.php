<?php 

	/* VALIDA QUE ESTE ACTIVA LA SESION*/
	$bandera = false;
	if(isset($_SESSION['name']) == true && isset($_SESSION['activo']) == true){
	  $bandera = true; //ENTRA AL MODULO HOME
	}
	else{
	  header("Location: ../index.php"); //REDIRECCIONA PARA LOGEARSE
	}

 ?>


<html>
<body>
	<div class="container py-3">
		<h2>Marcas</h2>
		<div class="card py-3">
			<div style="display: flex; justify-content: center;" class="py-3">
		        <button type="button" id="btnAgregarMarcas" data-toggle="modal" data-target="#addMarcas" class="btn btn-primary btn-sm">	
		        	Agregar Nueva Marca
		        </button>
		    </div>
			<div class="card-body">
				<div class="table-responsive">
					<div id="tabla"></div>
		 		</div>
			</div>	
		</div>
		<?php include 'content/modals/marcas_modal.html'; ?>
	</div>
</body>
</html>

<script type="text/javascript">
	/*CARGAR TABLA CATEGORIAS*/
  $(document).ready(function(){
    $('#tabla').load('content/tabla_marcas.php');

  });
  /*LIMPIA CAMPOS DE FORMULARIOS*/
  $('#btnAgregarMarcas').click(function(){
      $('#formMarcas')[0].reset();
   });
</script>