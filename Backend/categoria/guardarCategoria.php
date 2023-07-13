<?php
include '../../Backend/config/baseDeDatos.php';

$categoria = $_POST['nombre'];
$piso = $_POST['piso'];

if (empty($categoria) || empty($piso)) {
    echo "<script>alert('Por favor, complete todos los campos');
    window.location.href='../../Frontend/categoria/listadoCategoria.php'</script>";
    exit;
}

$conexiondb = conectardb();

try {
    $query = "INSERT INTO categorias (categoria, piso) VALUES ('$categoria', '$piso')";
    $respuesta = mysqli_query($conexiondb, $query);

    if ($respuesta) {
        echo "<script>alert('Registro Exitoso');
        window.location.href='../../Frontend/categoria/listadoCategoria.php'</script>";
    } else {
        echo "<script>alert('Registro Fallido');
        window.location.href='../../Frontend/categoria/listadoCategoria.php'</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('Error al insertar en la base de datos: " . $e->getMessage() . "');
    window.location.href='../../Frontend/categoria/listadoCategoria.php'</script>";
}

mysqli_close($conexiondb);
?>
