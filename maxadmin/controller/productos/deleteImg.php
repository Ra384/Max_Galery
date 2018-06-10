<?php
    include "../../model/metodos.php";
    $obj = new crud();
    
    /* ==Eliminar imagen== */
    $query = "DELETE FROM img_productos WHERE idimg = :id";
    if($obj->eliminarRegistros($_POST['idimg'],$query)){
        echo 1;
    }else{
        echo 0;
    }
    
   
    
    
?>
