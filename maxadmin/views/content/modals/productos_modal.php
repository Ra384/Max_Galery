

<!--Add Modal-->
<div id="addProductosModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="ModalLabel" class="modal-title">Agregar Producto</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form id="formProductos">
            
            <div class="form-row">
            <div class="form-group col-md-3 mb-3">
              <label>Código</label>
              <input type="text" placeholder="Código" name="codigo" id="codigo" class="form-control">
            </div>
            <div class="form-group col-md-9 mb-3">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" name="nombre" id="nombre" class="form-control">
            </div>
          </div>
          <div class="form-group">       
            <label>Descripción Corta</label>
            <input type="text" placeholder="Descripción Corta" name="descripcion" id="descripcion" class="form-control">
          </div>
          <div class="form-group">
            <label for="descripcion2">Descripción Completa</label>
            <textarea class="form-control" id="descripcion2" name="descripcion2"  rows="2"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-3">
              <label>Cantidad</label>
              <input type="number" name="cantidad" id="cantidad" min="1" max="200" value="1" class="form-control">
            </div>
            <div class="form-group col-md-9 mb-3">
              <label>Precio</label>
              <input type="text" placeholder="$0.00 Precio" name="precio" id="precio" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4 mb-3">
              <label for="marcaproducto">Marca</label>
              <select class="form-control" name="marca" id="marca">
                <?php while($rows = $datos_marcas->fetch()){ ?>
                  <option value="<?php echo ($rows['nombre']); ?>"><?php echo ($rows['nombre']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label for="categoria">Categoria</label>
              <select class="form-control" name="categoria" id="categoria">
                <?php while($rows = $datos_categorias->fetch()){ ?>
                  <option value="<?php echo ($rows['nombre']); ?>"><?php echo ($rows['nombre']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label for="proveedor">Proveedor</label>
              <select class="form-control" name="proveedor" id="proveedor">
                <?php while($rows = $datos_proveedores->fetch()){ ?>
                  <option value="<?php echo ($rows['nombre']); ?>"><?php echo $rows['nombre']; ?> - <?php echo $rows['compania'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
           
          <div class="pull-right">
            <button type="submit" data-dismiss="modal" id="btnAddProductos" class="btn btn-primary">Agregar Producto</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<!-- Vista Completa Productos  -->
<!--Info Modal-->
<div id="vistaProductos" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      
      <div class="modal-body">
         <div class="form-group row">
            <div class="col-sm-2">Producto</div>
            <div class="col-sm-3">
              <div class="form-check">
                <input class="form-check-input" name="option" type="radio" id="infoCheck">
                <label class="form-check-label" for="infoCheck">
                  Ver Información
                </label>
              </div>
              
            </div>
            <div class="col-sm-3">
              <div class="form-check">
                <input class="form-check-input" name="option" type="radio" id="imgCheck">
                <label class="form-check-label" for="imgCheck">
                  Ver Imagenes
                </label>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-check">
                <input class="form-check-input" name="option" type="radio" id="addImgCheck">
                <label class="form-check-label" for="addImgCheck">
                  Agregar Imagenes
                </label>
              </div>
            </div>
         </div>
         <input type="text" id="idurl" hidden="">
         <!-- Mostrar Imagenes del Producto Seleccionado -->
         <div id="imgs">          
            
         </div>
         <!-- Mostrar Info Completa del producto Seleccionado-->
         <div id="campos">
          
            <h5 class="pull-left">Código&nbsp;&nbsp;</h5>
            <p id="cod"></p>
            <hr>
            <h5 class="pull-left">Nombre&nbsp;&nbsp;</h5>
            <p id="nom"></p>
            <hr>
            <h5 class="pull-left">Descripción Corta&nbsp;&nbsp;</h5>
            <p id="dc"></p>
            <hr>
            <h5 class="pull-left">Descripción Completa&nbsp;&nbsp;</h5>
            <p id="dcom"></p>
            <hr>
            <h5 class="pull-left">Cantidad&nbsp;&nbsp;</h5>
            <p id="cantidadp"></p>
            <hr>
            <h5 class="pull-left">Precio&nbsp;&nbsp;</h5>
            <p id="p"></p>
            <hr>
            <h5 class="pull-left">Marca&nbsp;&nbsp;</h5>
            <p id="marcasp"></p>
            <hr>
            <h5 class="pull-left">Categoria&nbsp;&nbsp;</h5>
            <p id="categoriasp"></p>
            <hr>
            <h5 class="pull-left">Proveedor&nbsp;&nbsp;</h5>
            <p id="proveedoresp"></p> 
         </div>
        <!--Subir Imagenes-->
         <div id="addimgs">
            
         </div>
          <br>
          <button type="button" data-dismiss="modal" aria-label="Close" class="btn-primary pull-right">
            <span aria-hidden="true"> Cerrar ×</span>
          </button>
      </div>
    </div>
  </div>
</div>


<!--Update Modal-->
<div id="updateProductos" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="ModalLabel" class="modal-title">Actualizar Producto</h5>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <form id="formProductosup">
            
            <div class="form-row">
              <input type="text" name="idup" id="idup" hidden="">
            <div class="form-group col-md-3 mb-3">
              <label>Código</label>
              <input type="text" placeholder="Código" name="codigoup" id="codigoup" class="form-control">
            </div>
            <div class="form-group col-md-9 mb-3">
              <label>Nombre</label>
              <input type="text" placeholder="Nombre" name="nombreup" id="nombreup" class="form-control">
            </div>
          </div>
          <div class="form-group">       
            <label>Descripción Corta</label>
            <input type="text" placeholder="Descripción Corta" name="descripcionup" id="descripcionup" class="form-control">
          </div>
          <div class="form-group">
            <label for="descripcion2">Descripción Completa</label>
            <textarea class="form-control" id="descripcion2up" name="descripcion2up"  rows="2"></textarea>
          </div>
          <div class="form-row">
            <div class="form-group col-md-3 mb-3">
              <label>Cantidad</label>
              <input type="number" name="cantidadup" id="cantidadup" min="1" max="200" value="1" class="form-control">
            </div>
            <div class="form-group col-md-9 mb-3">
              <label>Precio</label>
              <input type="text" placeholder="$0.00 Precio" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" name="precioup" id="precioup" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4 mb-3">
              <label for="marcaup">Marca</label>
              <select class="form-control" name="marcaup" id="marcaup">
                <?php while($row = $x->fetch()){ ?>
                  <option value="<?php echo ($row['idmarcas']); ?>"><?php echo ($row['nombre']); ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label for="categoriaup">Categoria</label>
              <select class="form-control" name="categoriaup" id="categoriaup">
                <?php while($row = $y->fetch()){ ?>
                  <option value="<?php echo ($row['idcategorias']);?>">
                      <?php echo ($row['nombre']);?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4 mb-3">
              <label for="proveedorup">Proveedor</label>

              <select class="form-control" name="proveedorup" id="proveedorup">
               
                <?php while($row = $z->fetch()){ ?>
                  <option value="<?php echo ($row['idproveedores']);?>"> <?php echo $row['nombre'];?> </option>
                <?php } ?>
              </select>
            </div>
          </div>
           
          <div class="pull-right">
            <button type="submit" data-dismiss="modal" id="btnUpdateProductos" class="btn btn-primary">Actualizar Producto</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>