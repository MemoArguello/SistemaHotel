<?php
include '../../Backend/config/baseDeDatos.php';

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$procedencia = $_POST['procedencia'];
$factura = $_POST['factura'];

// Verificar si los campos están en blanco
if (empty($cedula) || empty($nombre) || empty($telefono) || empty($procedencia) || empty($factura)) {
    echo "<script>alert('Por favor, complete todos los campos');
    window.location.href='../../Frontend/reportes/reporte_cliente.php'</script>";
    exit;
}

$conexiondb = conectardb();

$id_reserva = $_POST['id'];
$query = "UPDATE reserva SET cedula='" . $cedula . "', nombre='" . $nombre . "', telefono='" . $telefono . "', procedencia='" . $procedencia . "', factura='" . $factura . "' WHERE id=" . $id_reserva;

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Se actualizó correctamente');
    window.location.href='../../Frontend/reportes/reporte_cliente.php'</script>";
} else {
    echo "<script>alert('Falló la actualización');
    window.location.href='../../Frontend/reportes/reporte_cliente.php'</script>";
}

mysqli_close($conexiondb);
?>