<?php 

	include '../../model/metodos.php'; //INCLUIR METODOS.PHP
	$obj = new crud(); //INSTANCIA DE CLASE CRUD
	$datos = $obj->getRegistros("SELECT * FROM getproductos"); //USO DE METODO getRegistros PARA CONSULTA DE DATOS PRODUCTOS

 ?>

 <script type="text/javascript">
 	$(document).ready( function () {
 		
    	$('#datatableProductos').DataTable({
    		fixedHeader: true
    	});
	} );
 </script>

<table class="table table-sm table-hover table-bordered" id="datatableProductos">
	<thead style="background-color: #a52f24; color: white;">
		<tr>
			<td>Código</td>
			<td>Descripción</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Proveedor</td>
			<td>Estado</td>
			<td>Operaciones</td>
		</tr>
	</thead>
	<tfoot style="background-color: #a52f24; color: white;">
		<tr>
			<td>Código</td>
			<td>Descripción</td>
			<td>Precio</td>
			<td>Cantidad</td>
			<td>Proveedor</td>
			<td>Estado</td>
			<td>Operaciones</td>
		</tr>
	</tfoot>
	<tbody>
		<?php while($rows = $datos->fetch()){ ?>
			<tr>
				<td><?php echo $rows['codigo'] ?></td>
				<td>
					<?php echo $rows['nombre'] ?><br><?php echo $rows['descripcion_corta'] ?>
				</td>
				<td>$ <?php echo $rows['precio'] ?></td>
				<td><?php echo $rows['cantidad'] ?></td>
				<td><?php echo $rows['Nombre_Proveedor'] ?></td>
				<td>
					<?php 
						if($rows['cantidad'] > 0)
							echo 'En Venta';
						else if($rows['cantidad'] <= 0)
							echo 'Agotado';
						
					?>		
				</td>
				
				
				<td style="text-align: center;">
					<button class="" id="mostrar" data-toggle="modal" data-target="#vistaProductos" onclick="obtenerDatosProductos('<?php echo $rows['idproductos'] ?>')">
						<i class="fas fa-eye"></i>
					</button>
					<button class="" id="edit" data-toggle="modal" data-target="#updateProductos" onclick="obtenerDatosActualizar('<?php echo $rows['idproductos'] ?>')">
						<i class="fas fa-edit"></i>
					</button>

					<button class="" onclick="eliminarDatosProductos('<?php echo $rows['idproductos'] ?>')">
						<i class="fas fa-trash-alt"></i>
					</button>
				</td>
			</tr>
			
		<?php }  ?>
		
	</tbody>

</table>

