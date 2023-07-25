<?php
include '../../Backend/config/baseDeDatos.php';

if(isset($_GET['id_habitaciones'])){

$id_habitacion = $_GET['id_habitaciones'];

$conexiondb = conectardb();

try {
    $query ="DELETE FROM habitaciones WHERE id_habitaciones=".$id_habitacion;
}
finally{
    echo "<script>alert('Registros Actualizados');
    window.location.href='../../Frontend/reportes/reporte_habitacion.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Eliminado');
    window.location.href='../../Frontend/reportes/reporte_habitacion.php'</script>";
} else {
    echo "<script>alert('No se elimino el registro');
    window.location.href='../../Frontend/reportes/reporte_habitacion.php'</script>";
}
}else{
echo "<script>alert('No se elimino el registro');
window.location.href='../../Frontend/reportes/reporte_habitacion.php'</script>";
}

?>