<?php
include '../../Backend/config/baseDeDatos.php';

$producto    = $_POST['id_producto'];
$recepcion   = $_POST['id_recepcion'];
$cantidad   = $_POST['cantidad'];

$conexiondb = conectardb();

$precio = "SELECT precio FROM producto WHERE id_producto=" . $producto;
$resultado = mysqli_query($conexiondb, $precio);
$monto = mysqli_fetch_assoc($resultado);
 
$total_pagar    =($cantidad * $monto['precio']);

$id_venta = $_POST['id_venta'];
$query = "UPDATE venta SET id_producto='" . $producto . "', id_cliente='" .$recepcion . "', cantidad='" .$cantidad . "', total_pagar='" .$total_pagar . "' WHERE id_venta=" . $id_venta;

$query2 = "UPDATE recepcion SET total= (pago_producto + total_pagar) WHERE id_recepcion=" . $recepcion;
$respuesta2 = mysqli_query($conexiondb, $query2);

$respuesta = mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Registro Exitoso');
                window.location.href='../../Frontend/reportes/reporte_ventas.php'</script>";
} else {
    echo "<script>alert('Registro Fallido');
            window.location.href='../../Frontend/reportes/reporte_ventas.php'</script>";
}
mysqli_close($conexiondb);


?>