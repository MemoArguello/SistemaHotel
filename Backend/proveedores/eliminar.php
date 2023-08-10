<?php
include '../../Backend/config/baseDeDatos.php';

$id_proveedor = $_GET['id_proveedor'];

$conexiondb = conectardb();

// Verificar si existen compras relacionadas con el proveedor
$query_compras = "SELECT COUNT(*) AS total_compras FROM compra WHERE id_proveedor = $id_proveedor";
$resultado_compras = mysqli_query($conexiondb, $query_compras);
$datos_compras = mysqli_fetch_assoc($resultado_compras);
$total_compras = $datos_compras['total_compras'];

if ($total_compras > 0) {
    // Mostrar mensaje de que no se puede eliminar debido a compras relacionadas
    echo "<script>alert('No se puede eliminar el proveedor porque existen compras relacionadas.');
    window.location.href='../../Frontend/reportes/reporte_proveedores.php'</script>";
    exit;
}

// Ahora eliminar el proveedor
$query_eliminar_proveedor = "DELETE FROM proveedores WHERE id_proveedor = $id_proveedor";
$respuesta_eliminar_proveedor = mysqli_query($conexiondb, $query_eliminar_proveedor);

if ($respuesta_eliminar_proveedor) {
    echo "<script>alert('Proveedor Eliminado');
    window.location.href='../../Frontend/reportes/reporte_proveedores.php'</script>";
} else {
    echo "<script>alert('No se pudo eliminar el proveedor.');
    window.location.href='../../Frontend/reportes/reporte_proveedores.php'</script>";
}
?>
