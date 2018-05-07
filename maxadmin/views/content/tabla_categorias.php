<?php 

	include '../../model/metodos.php'; //INCLUIR METODOS.PHP
	$obj = new crud(); //INSTANCIA DE CLASE CRUD
	$datos = $obj->getRegistros("SELECT * FROM categorias"); //USO DE METODO getRegistros PARA CONSULTA DE DATOS MARCAS

 ?>

 <script type="text/javascript">
 	$(document).ready( function () {
 		
    	$('#datatableCategorias').DataTable({
    		fixedHeader: true
    	});
	} );
 </script>

<table class="table table-sm table-hover table-bordered" id="datatableCategorias">
	<thead style="background-color: #a52f24; color: white;">
		<tr>
			<td>Nombre</td>
			<td>Fecha de Agregado</td>
			<td>Operaciones</td>
		</tr>
	</thead>
	<tfoot style="background-color: #a52f24; color: white;">
		<tr>
			<td>Nombre</td>
			<td>Fecha de Agregado</td>
			<td>Operaciones</td>
		</tr>
	</tfoot>
	<tbody>
		<?php while($rows = $datos->fetch()){ ?>
			<tr>
				<td><?php echo $rows['nombre'] ?></td>
				<td><?php echo $rows['fecha_agregado'] ?></td>
				
				<td style="text-align: center;">
				<button class="" id="edit" data-toggle="modal" data-target="#updateCategorias" onclick="obtenerDatosCategorias('<?php echo $rows[0] ?>')">
					<i class="fas fa-edit"></i>
				</button>
				<button class="" onclick="eliminarDatosCategorias('<?php echo $rows['idcategorias'] ?>')">
					<i class="fas fa-trash-alt"></i>
				</button>
			</td>
			</tr>
		<?php }  ?>
		
	</tbody>
</table>