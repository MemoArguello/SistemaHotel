<?php
session_start();
include '../../Backend/config/baseDeDatos.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
$sql = "SELECT id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
$result = mysqli_query($conexiondb, $sql);
while ($usuario = mysqli_fetch_assoc($result)) {
    if ($usuario['id_cargo'] != 1) {
        header("location:../../index.php");
    }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$query = "SELECT venta.id_venta, venta.id_producto, venta.id_cliente, venta.cantidad, venta.total_pagar, producto.nombre_producto, reserva.nombre
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
    <title>Editar</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/registrar.css">
    <link rel="stylesheet" href="../admin/listado/listado.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="./IMG/logo.svg" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    $conexiondb = conectardb();
    $query_r = "SELECT * FROM producto";
    $query_h = "SELECT recepcion.id_recepcion, recepcion.id_reserva, reserva.nombre FROM recepcion
    JOIN reserva ON reserva.id = recepcion.id_reserva";
    $resultado_r = mysqli_query($conexiondb, $query_r);
    $resultado_h = mysqli_query($conexiondb, $query_h);

    $id_venta = $_GET['id_venta'];
    $sql = "SELECT * FROM venta WHERE id_venta=" . $id_venta;
    $resultadov = mysqli_query($conexiondb, $sql);
    $venta = mysqli_fetch_row($resultadov);

    mysqli_close($conexiondb);
    include($_SERVER['DOCUMENT_ROOT'] . '/SistemaHotel/Frontend/dashboard/menu.php');

    ?>

    <section class="dashboard">
        <div class="top">
            <div class="topnav" id="myTopnav">
                <a href="../ventas/formulario.php">Realizar Ventas</a>
                <a href="../reportes/reporte_ventas.php">Listado de Ventas</a>
            </div>
        </div>

        <div class="dash-content">
            <div class="signupFrm">
                <form action="../../Backend/venta/editar.php" method="POST" class="formDatos">
                    <h3 align="center">Venta</h3>
                    <br>
                    <div class="inputContainer">
                        <select class="input" name="id_producto" id="inputGroupSelect01"></P>
                            <?php
                            while ($habitacion = mysqli_fetch_assoc($resultado_r)) {
                                echo "<option value='" . $habitacion['id_producto'] . "'>" . $habitacion['nombre_producto'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Producto</label>
                    </div>
                    <div class="inputContainer">
                        <select class="input" name="id_recepcion" id="inputGroupSelect01" readonly></P>
                            <?php
                            while ($habitacion = mysqli_fetch_assoc($resultado_h)) {
                                echo "<option value='" . $habitacion['id_recepcion'] . "'>" . $habitacion['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Cliente</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="cantidad" min="0" value='<?php echo $venta[3]; ?>'>
                        <label for="" class="label">Cantidad</label>
                    </div>
                    <input type="hidden" name="id_venta" id="" value='<?php echo $venta[0]; ?>' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
        </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>