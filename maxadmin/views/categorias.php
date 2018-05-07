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
		<h2>Categorias</h2>
		<div class="card py-3">
			<div style="display: flex; justify-content: center;" class="py-3">
		        <button type="button" id="btnAgregarCategorias" data-toggle="modal" data-target="#addCategorias" class="btn btn-primary btn-sm">	
		        	Agregar Nueva Categoria
		        </button>
		    </div>
			<div class="card-body">
				<div class="table-responsive">
					<div id="tabla"></div>
		 		</div>
			</div>	
		</div>
		<?php include 'content/modals/categorias_modal.html'; ?>
	</div>
</body>
</html>

<script type="text/javascript">
	/*CARGAR TABLA USUARIOS*/
  $(document).ready(function(){
    $('#tabla').load('content/tabla_categorias.php');

  });
  /*LIMPIA CAMPOS DE FORMULARIOS*/
  $('#btnAgregarCategorias').click(function(){
      $('#formCategorias')[0].reset();
   });
</script>