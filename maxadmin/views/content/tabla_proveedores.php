<?php 

	include '../../model/metodos.php'; //INCLUIR METODOS.PHP
	$obj = new crud(); //INSTANCIA DE CLASE CRUD
	$datos = $obj->getRegistros("SELECT * FROM proveedores"); //USO DE METODO getRegistros PARA CONSULTA DE DATOS USUARIOS

 ?>

 <script type="text/javascript">
 	$(document).ready( function () {
 		
    	$('#datatableProveedores').DataTable({
    		fixedHeader: true
    	});
	} );
 </script>

<table class="table table-sm table-hover table-bordered" id="datatableProveedores">
	<thead style="background-color: #a52f24; color: white;">
		<tr>
			<td>Nombre</td>
			<td>Compañia</td>
			<td>Dirección</td>
			<td>C. Postal</td>
			<td>Telefono</td>
			<td>C. Electronico</td>
			<td>Fecha Agregado</td>
			<td>Operaciones</td>
		</tr>
	</thead>
	<tfoot style="background-color: #a52f24; color: white;">
		<tr>
			<td>Nombre</td>
			<td>Compañia</td>
			<td>Dirección</td>
			<td>C. Postal</td>
			<td>Telefono</td>
			<td>C. Electronico</td>
			<td>Fecha Agregado</td>
			<td>Operaciones</td>
		</tr>
	</tfoot>
	<tbody>
		<?php while($rows = $datos->fetch()){ ?>
			<tr>
				<td><?php echo $rows['nombre'] ?></td>
				<td><?php echo $rows['compania'] ?></td>
				<td><?php echo $rows['direccion'] ?></td>
				<td><?php echo $rows['codigo_postal'] ?></td>
				<td><?php echo $rows['telefono'] ?></td>
				<td><?php echo $rows['correo_electronico'] ?></td>
				<td><?php echo $rows['fecha_agregado'] ?></td>
				
				<td style="text-align: center;">
				<button class="" id="edit" data-toggle="modal" data-target="#updateProveedores" onclick="obtenerDatosProveedores('<?php echo $rows[0] ?>')">
					<i class="fas fa-edit"></i>
				</button>
				<button class="" onclick="eliminarDatosProveedores('<?php echo $rows['idproveedores'] ?>')">
					<i class="fas fa-trash-alt"></i>
				</button>
			</td>
			</tr>
		<?php }  ?>
		
	</tbody>
</table>