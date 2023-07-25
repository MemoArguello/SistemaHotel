<?php
include '../../Backend/config/baseDeDatos.php';

$id_producto = $_GET['id_producto'];

$conexiondb = conectardb();

try {
    $query ="DELETE FROM producto WHERE id_producto=".$id_producto;

}finally{
    echo "<script>alert('Registros Actualizados');
window.location.href='../../Frontend/reportes/reporte_producto.php'</script>";
}

$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Producto Eliminado');
    window.location.href='../../Frontend/reportes/reporte_producto.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='../../Frontend/reportes/reporte_producto.php'</script>";
}
?>