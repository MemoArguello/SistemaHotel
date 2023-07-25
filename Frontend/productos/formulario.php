<?php
session_start();
include '../../Backend/config/baseDeDatos.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../../index.php");
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
$query = "SELECT * FROM proveedores";
$resultadop = mysqli_query($conexiondb, $query);

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
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . '/SistemaHotel/Frontend/dashboard/menu.php');
    ?>
    <section class="dashboard">
        <div class="top">
            <div class="topnav" id="myTopnav">
                <a href="../reportes/reporte_producto.php">Productos</a>
                <a href="./formulario.php">Registrar Producto</a>
                <a href="../reportes/reporte_proveedores.php">Proveedores</a>
                <a href="../proveedores/formulario.php">Agregar Proveedor</a>
                <a href="../reportes/reporte_compra.php">Compras</a>
            </div>
        </div>
        <div class="dash-content">
            <div class="topnav" id="myTopnav">
            </div>
            <div class="signupFrm">
                <form action="../../Backend/productos/guardar.php" method="POST" class="form_producto">
                    <h1 class="title">Registrar Productos</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="codigo">
                        <label for="" class="label">Codigo</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre_producto">
                        <label for="" class="label">Nombre Producto</label>
                    </div>
                    <div class="inputContainer">
                        <select class="input" name="id_proveedor" id="inputGroupSelect01"></P>
                            <?php
                            while ($proveedores = mysqli_fetch_assoc($resultadop)) {
                                echo "<option value='" . $proveedores['id_proveedor'] . "'>" . $proveedores['nombre_prov'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Proveedor</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="precio">
                        <label for="" class="label">Precio</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="stock_inicial">
                        <label for="" class="label">Cantidad</label>
                    </div>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>