<?php
session_start();
include '../../Backend/config/baseDeDatos.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
    $sql = "SELECT * FROM `usuarios` WHERE usuario = '$usuario';";
    $result = mysqli_query($conexiondb, $sql);
    $usuarioN = mysqli_fetch_row($result);
    while ($usuario= mysqli_fetch_assoc($result)) {
        if ($usuario['id_cargo'] != 1) {
            header("location:../../index.php");
        }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$query = "SELECT venta.id_venta, venta.id_producto, venta.id_cliente,  venta.cantidad, venta.total_pagar, producto.nombre_producto, reserva.nombre
FROM venta JOIN producto ON producto.id_producto = venta.id_producto
JOIN reserva ON reserva.id = venta.id_cliente";
$resultado = mysqli_query($conexiondb, $query);

mysqli_close($conexiondb);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habitaciones</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/registrar.css">
    <link rel="stylesheet" href="../admin/listado/listado.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!---bootstrap 4 css-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- datatables css basico-->
    <link rel="stylesheet" type="text/css" href="../datatables/datatables.min.css">
    <!---datatables bootstrap 4 css-->
    <link rel="stylesheet" type="text/css" href="../datatables/DataTables-1.13.1/css/dataTables.bootstrap.css"
</head>

<body>
    <?php
    $conexiondb = conectardb();
    $query_r = "SELECT * FROM producto";
    $query_h = "SELECT * FROM reserva";
    $resultado_r = mysqli_query($conexiondb, $query_r);
    $resultado_h = mysqli_query($conexiondb, $query_h);

    mysqli_close($conexiondb);
    include($_SERVER['DOCUMENT_ROOT'] . '/SistemaHotel/Frontend/dashboard/menu.php');

    ?>
    <section class="dashboard">
        <div class="top">
        <div class="topnav" id="myTopnav">
                <a href="../reportes/reporte_caja.php">Reporte Caja</a>
                <a href="./abrir_caja.php">Abrir Nueva caja</a>
            </div>
        </div>
        <div class="dash-content">
            <div class="signupFrm">
                <form action="../../Backend/caja/guardar_caja.php" method="POST" class="formCaja">
                    <h3 align="center">Apertura de Caja</h3>
                    <br>
                    <div class="inputContainer">
                        <input type="date" class="input" placeholder="a" name="fecha_aper" min="0">
                        <label for="" class="label">Apertura de caja</label>
                    </div>
                    <div class="inputContainer">
                        <input type="time" class="input" placeholder="a" name="hora_aper" min="0">
                        <label for="" class="label">Hora de Apertura</label>
                    </div>
                    <input type="hidden" name="id_usuario" id="" value='<?php echo $usuarioN[0]; ?>' readonly>
                    <input type="hidden" name="editar" id="" value='no' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    <script src="../JS/script.js"></script>

</body>

</html>