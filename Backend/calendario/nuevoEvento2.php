<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("config.php");
$reserva =$_POST['id_reserva'];
$usuario        =$_POST['id_usuario'];
$habitacion =$_POST['id_habitacion'];
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  

$fechaInicialSegundos = strtotime($fecha_inicio);
$fechaFinalSegundos = strtotime($fecha_fin);
$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;

$precio = "SELECT precio FROM habitaciones WHERE id_habitaciones=" . $habitacion;
$resultado = mysqli_query($con, $precio);
$monto = mysqli_fetch_assoc($resultado);

$total_pagar = ($dias * $monto['precio']);

$InsertNuevoEvento = "INSERT INTO recepcion (id_reserva, id_habitacion, fecha_inicio, fecha_fin, total_dias, total_pagar, pago_producto, total, estado) VALUES
('$reserva','$habitacion', '$fecha_inicio', '$fecha_fin','$dias','$total_pagar','0', '$total_pagar', 'Falta Pagar')";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

$query3 = "UPDATE caja SET ingreso= (ingreso +" . $total_pagar. ") WHERE estado= 'abierto'";
$resultado = mysqli_query($con, $query3);

$query4 = "INSERT INTO auditoria (id_usuario, evento, fecha) VALUES
('$usuario','Registro de Recepcion',now())";

$resultado = mysqli_query($con, $query4);

header("Location:index2.php?e=1");

?> 