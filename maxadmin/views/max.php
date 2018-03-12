<?php 
  session_start();
  $bandera = false;
  if(isset($_SESSION['name']) == true && isset($_SESSION['activo']) == true){
      $bandera = true;
  }
  else{
      header("Location: ../index.php");
  }


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Max Admin</title>
	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <?php include "../assets/headcss.html"; ?>
    <?php include "../assets/scripts.html"; ?>
</head>
<body>
	<!-- Side Navbar -->
    <?php require_once '../home/sidebar.php'; ?>

    <div class="page home-page">
        <!-- navbar header-->
        <?php require_once '../home/header.html'; ?>
        
        <div id="contenido">
          <?php 
            mostrarContenido();
          ?>
        </div>

        <!--Footer-->
        <?php require_once '../home/footer.html'; ?>
    </div>
</body>
</html>


<!--    ## Redireccionador ##   -->
  <?php 

    
    function mostrarContenido()
    {
      if(isset($_GET['op'])){
        $opcion = $_GET['op'];
         switch ($opcion) {
            case 'home':
              include "home.php";
              break;
           /* case 'productos':
              include "views/productos.php";  
              break;
            case 'proveedores':
              include 'views/proveedores.php';
              break;
            default:
            echo "<br><center><h2>Pagina No Encontrada!</h2></center>";
              break;*/
          }
      }else{
        include 'views/dashboard.php';
      }
     
    }
   ?>