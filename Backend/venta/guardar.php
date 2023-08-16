<?php
include '../../Backend/config/baseDeDatos.php';

$producto       =$_POST['id_producto'];
$cliente        =$_POST['id_recepcion'];
$cantidad       =$_POST['cantidad'];
$usuario        =$_POST['id_usuario'];


$conexion = conectardb();


$precio = "SELECT precio FROM producto WHERE id_producto=" . $producto;
$resultado = mysqli_query($conexion, $precio);
$monto = mysqli_fetch_assoc($resultado);
 
$total_pagar    =($cantidad * $monto['precio']);

$query = "INSERT INTO venta (id_producto, id_cliente, cantidad, total_pagar) VALUES
('$producto','$cliente','$cantidad','$total_pagar')";

$query2 = "UPDATE caja SET ingreso= (ingreso +" . $total_pagar. ") WHERE estado= 'abierto'";

$query3 = "UPDATE producto SET stock_inicial= (stock_inicial -" . $cantidad . ") WHERE id_producto=" . $producto;

$query4 = "UPDATE recepcion SET pago_producto= (pago_producto +" . $total_pagar . ") WHERE id_recepcion=" . $cliente;

$query5 = "UPDATE recepcion SET total= (pago_producto + total_pagar) WHERE id_recepcion=" . $cliente;

$query6 = "INSERT INTO auditoria (id_usuario, evento, fecha) VALUES
('$usuario','Registro de Venta',now())";


$respuesta = mysqli_query($conexion, $query);
$respuesta2 = mysqli_query($conexion, $query2);
$respuesta3 = mysqli_query($conexion, $query3);
$respuesta4 = mysqli_query($conexion, $query4);
$respuesta5 = mysqli_query($conexion, $query5);
$respuesta6 = mysqli_query($conexion, $query6);


if ($respuesta and $respuesta2 and $respuesta3 and $respuesta4 and $respuesta5 and $respuesta6) {
  echo "<script>alert('Registro ingresado');
    window.location.href='../../Frontend/reportes/reporte_ventas.php'</script>";
} else {
   echo "<script>alert('Registro Fallido');
        window.location.href='../../Frontend/reportes/reporte_ventas.php'</script>";
}
  mysqli_close($conexion);
?>