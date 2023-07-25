<?php

include '../../Backend/config/baseDeDatos.php';

$estado        ='Pagado';

$conexiondb = conectardb();

$id = $_GET['id_recepcion']; 
$query = "UPDATE recepcion SET estado='" .$estado . "' WHERE id_recepcion=" . $id;


$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo
    "<script>alert('Cambio Agregado');
    window.location.href='../../Frontend/reportes/reportes_recepcion.php'</script>";
}
else{ 
    echo "<script>alert('Cambio Agregado');
    window.location.href='../../Frontend/reportes/reportes_recepcion.php'</script>";
}
mysqli_close($conexiondb);

?>