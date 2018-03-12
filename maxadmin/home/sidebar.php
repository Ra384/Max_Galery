<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <div class="sidenav-header-inner text-center"><img src="../img/user1.jpg" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5 text-uppercase">Usuario</h2><span class="text-uppercase">Administrador</span>
      </div>
      <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>M</strong><strong class="text-primary">AX</strong></a></div>
    </div>
    <div class="main-menu"> 
      <ul id="side-main-menu" class="side-menu list-unstyled">                  
        <li class="<?php if ($_GET['op']=='home' || isset($_GET['op'])==false): ?> active <?php else: ?> <?php endif ?>"><a href="max.php?op=home"> <i class="icon-home"></i><span>Home</span></a></li>

        <li class="<?php if ($_GET['op']=='productos'): ?> active <?php else: ?> <?php endif ?>"><a href="index.php?op=productos" id="productos"> 
          <i class="fab fa-product-hunt" aria-hidden="true"></i>
          <span>Productos</span></a>
        </li>
        <li class="<?php if ($_GET['op']=='proveedores'): ?> active <?php else: ?> <?php endif ?>"><a href="index.php?op=proveedores" id="proveedores">
          <i class="fas fa-users" aria-hidden="true"></i> 
          
          <span>Proveedores</span></a>
        </li>
        <li class=""><a href="#categorias" id="categorias"> 
            <i class="fas fa-tags" aria-hidden="true"></i>
            <span>Categorias</span></a>
        </li>
        <li class=""><a href="#marcas" id="marcas"> 
            <i class="fas fa-trademark" aria-hidden="true"></i>
            <span>Marcas</span></a>
        </li>
      </ul>
      
    </div>
    <div class="admin-menu">
      <ul id="side-admin-menu" class="side-menu list-unstyled"> 

      </ul>
    </div>
  </div>
</nav>

