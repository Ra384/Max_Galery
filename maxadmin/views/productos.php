<?php 
	
	/* VALIDA QUE ESTE ACTIVA LA SESION*/
	$bandera = false;
	if(isset($_SESSION['name']) == true && isset($_SESSION['activo']) == true){
	  $bandera = true; //ENTRA AL MODULO HOME
	}
	else{
	  header("Location: ../index.php"); //REDIRECCIONA PARA LOGEARSE
	}

	include '../model/metodos.php'; //INCLUIR METODOS.PHP
	$obj = new crud(); //INSTANCIA DE CLASE CRUD

	/* == CONSULTAS PARA FORMULARIO DE PRODUCTOS (PRODUCTOS_MODAL) ==*/
	$datos_marcas = $obj -> getRegistros("SELECT * FROM marcas");
	$datos_categorias = $obj ->getRegistros("SELECT * FROM categorias");
	$datos_proveedores = $obj->getRegistros("SELECT * FROM proveedores");
	
	$x = $obj -> getRegistros("SELECT * FROM marcas");
	$y = $obj -> getRegistros("SELECT * FROM categorias");
	$z = $obj->getRegistros("SELECT * FROM proveedores");


	

	

 ?>


<html>
<body>
	<div class="container py-3">
		<h2>Productos</h2>
		<div class="card py-3">
			<div style="display: flex; justify-content: center;" class="py-3">
		        <button type="button" id="btnAgregarProductos" data-toggle="modal" data-target="#addProductosModal" class="btn btn-primary btn-sm">	
		        	Agregar Nuevo Producto
		        </button>
		    </div>
			<div class="card-body">
				<div class="table-responsive">
					<div id="tabla"></div>
		 		</div>
			</div>	
		</div>
		<?php include 'content/modals/productos_modal.php'; ?>
	</div>

</body>
</html>

<script type="text/javascript">
	/*CARGAR TABLA USUARIOS*/
  $(document).ready(function(){
    $('#tabla').load('content/tabla_productos.php');

  });
  /*LIMPIA CAMPOS DE FORMULARIOS*/
  $('#btnAgregarProductos').click(function(){
      $('#formProductos')[0].reset();
   });
</script>