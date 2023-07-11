<?php
include('../config/baseDeDatos.php');

// Obtener los valores de los campos del formulario
$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$procedencia = $_POST['procedencia'];
$factura = $_POST['factura'];

// Verificar si los campos están en blanco
if (empty($cedula) || empty($nombre) || empty($telefono) || empty($procedencia) || empty($factura)) {
    echo "<script>alert('Por favor, complete todos los campos');
          window.location.href='../cliente/registrar.php'</script>";
    exit;
}

$conexiondb = conectardb();

$query = "INSERT INTO reserva (cedula, nombre, telefono, procedencia, factura) VALUES
('$cedula','$nombre','$telefono','$procedencia','$factura')";

$respuesta = mysqli_query($conexiondb, $query);
if ($respuesta) {
    echo "<script>alert('Registro Exitoso');
          window.location.href='../../Frontend/cliente/listado.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
          window.location.href='../cliente/nuevoCliente.php'</script>";
}

mysqli_close($conexiondb);
?>
