<?php

include '../db.php';

$estado        ='Pagado';

$conexiondb = conectardb();

$id = $_GET['id_recepcion']; 
$query = "UPDATE recepcion SET estado='" .$estado . "' WHERE id_recepcion=" . $id;


$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo
    "<script>alert('Registro Exitoso');
    window.location.href='./listado_recepciones.php'</script>";
}else{ echo "<script>alert('Registro Exitoso');
    window.location.href='./listado_recepciones.php'</script>";
}
mysqli_close($conexiondb);

?>