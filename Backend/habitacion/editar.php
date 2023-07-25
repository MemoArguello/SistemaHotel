<?php
include '../../Backend/config/baseDeDatos.php';

$id_habitaciones = $_POST['habitacion'];
$nombre = $_POST['nombre_habitacion'];
$detalles = $_POST['detalles'];
$precio = $_POST['precio'];

if (empty($nombre) || empty($detalles) || empty($precio)) {
    echo "<script>alert('Por favor, complete todos los campos');
    window.location.href='../../Frontend/reportes/reporte_habitacion.php'</script>";
    exit;
}

$conexion = conectardb();

$query = "UPDATE habitaciones SET nombre_habitacion='" . $nombre . "', detalles='" . $detalles . "', precio='" . $precio . "' WHERE id_habitaciones=" . $id_habitaciones;

$respuesta = mysqli_query($conexion, $query);

if ($respuesta) {
    echo "<script>alert('Se editó correctamente');
    window.location.href='../../Frontend/reportes/reporte_habitacion.php'</script>";
} else {
    echo "<script>alert('No se pudo editar');
    window.location.href='../../Frontend/reportes/reporte_habitacion.php'</script>";
}

mysqli_close($conexion);
?>
