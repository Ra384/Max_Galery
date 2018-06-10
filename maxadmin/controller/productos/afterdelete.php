<?php
    include "../../model/metodos.php";
    $obj = new crud();

     /* == Recargar Pestaña Nuevamente == */
     $datos = $obj -> getUrlImg($_REQUEST['id']);
     $data = $datos->fetchAll();



?>
<html>
 	<body>
		<div class="container">
			<div class="row">
				<?php if (!empty($data)): ?>
					<?php for ($i=0; $i < count($data) ; $i++) { ?>
						<div class="col-md-4" style="border:1px solid gray;"><br>
							<div id="containerbtn" align="center" class="py-1">
								<button id="btndeleteimg" style="display:inline-block; width:6em;" onclick="eliminarImg('<?php echo $data[$i]['idimg'] ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
							</div>
							<img src="<?php echo $data[$i]['url']; ?>" alt="..." class="img-thumbnail" >
						</div>
					<?php } ?>
				<?php else: ?>
					<h3>No hay Imagenes para mostrar :(</h3>
				<?php endif ?>		
			</div>
		</div>
 	</body>
 </html>