<?php
require_once('config.php');
$id    		= $_REQUEST['id']; 

try{$sqlDeleteEvento = ("DELETE FROM recepcion WHERE  id_recepcion='" .$id. "'");
$resultProd = mysqli_query($con, $sqlDeleteEvento);
}finally{
    echo "<script>alert('Registro Exitoso');
                           window.location.href='./index.php'</script>";
}

?>
  