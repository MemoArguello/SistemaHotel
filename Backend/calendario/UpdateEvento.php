<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

include('config.php');
                        
$idEvento         = $_POST['id_recepcion'];

$evento2           = ucwords($_REQUEST['id_habitacion']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final);
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  


$fechaInicialSegundos = strtotime($fecha_inicio);
$fechaFinalSegundos = strtotime($fecha_fin);
$dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;

$UpdateProd = ("UPDATE recepcion SET fecha_inicio ='$fecha_inicio',fecha_fin ='$fecha_fin', total_dias ='$dias'
    WHERE id_recepcion='".$idEvento."' ");
$result = mysqli_query($con, $UpdateProd);

header("Location:index.php?ea=1");
?>