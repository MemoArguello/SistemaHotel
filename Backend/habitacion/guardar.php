<?php
include('../config/baseDeDatos.php');

$nombre = $_POST['nombre_habitacion'];
$detalles = $_POST['detalles'];
$categoria = $_POST['id_categoria'];
$precio = $_POST['precio'];

if (empty($nombre) || empty($detalles) || empty($categoria) || empty($precio)) {
    echo "<script>alert('Por favor, complete todos los campos');
          window.location.href='../../Frontend/habitacion/listado_habitacion.php'</script>";
    exit;
}

$conexiondb = conectardb();

$query = "INSERT INTO habitaciones (nombre_habitacion, detalles, id_categoria, precio, estado) VALUES
('$nombre', '$detalles', '$categoria', '$precio', 'Disponible')";

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Se registró la habitación');
          window.location.href='../../Frontend/habitacion/listado_habitacion.php'</script>";
} else {
    echo "<script>alert('No se pudo registrar la habitación');
          window.location.href='../../Frontend/habitacion/listado_habitacion.php'</script>";
}

mysqli_close($conexiondb);
?>
