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
    while ($usuario= mysqli_fetch_assoc($result)) {
        if ($usuario['id_cargo'] != 1) {
            header("location:../../index.php");
        }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$id_producto = $_GET['id_producto'];
$query = "SELECT * FROM producto where id_producto=" . $id_producto;
$resultado = mysqli_query($conexiondb, $query);
$producto = mysqli_fetch_row($resultado);
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
                <a href="./proveedores.php">Proveedores</a>
                <a href="./agg_proveedor.php">Agregar Proveedor</a>
                <a href="./list_compra.php">Compras</a>
            </div>
        </div>
        <div class="dash-content">
            <div class="topnav" id="myTopnav">
            </div>
            <div class="signupFrm">
                <form action="../../Backend/productos/editar.php" method="POST" class="form_producto">
                    <h1 class="title">Editar Productos</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="codigo" value='<?php echo $producto[1]; ?>'>
                        <label for="" class="label">Codigo</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre_producto" value='<?php echo $producto[2]; ?>'>
                        <label for="" class="label">Nombre Producto</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="precio" value='<?php echo $producto[4]; ?>'>
                        <label for="" class="label">precio</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="stock_inicial" value='<?php echo $producto[5]; ?>'>
                        <label for="" class="label">Stock Inicial</label>
                    </div>
                    <input type="hidden" name="id_producto" id="" value='<?php echo $producto[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>