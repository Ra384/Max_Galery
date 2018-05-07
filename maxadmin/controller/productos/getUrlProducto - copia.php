<?php 
	include "../../model/metodos.php";
	$obj = new crud();
	
	$datos = $obj -> getUrlImg($_REQUEST['id']);

	
	
	
 ?>
 <html>
 	<body>
 		
 		<div class="container">
 			<div class="row">
 				
 			<?php if($data=$datos->fetch()) {?>	
				<?php while($data = $datos->fetch()){ ?>
				
						<div class="col-md-4"><br>
							<img src="<?php echo $data['url']; ?>" alt="..." class="img-thumbnail">
						</div>
							
				<?php }
			}
			else{
				
					echo "<h4>No Hay Imagenes Para Mostrar!</h4>";

			} ?>	
 			</div>
 		</div>
 	</body>
 </html>