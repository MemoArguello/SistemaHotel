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
    while ($usuario= mysqli_fetch_assoc($result)) {
        if ($usuario['id_cargo'] != 1) {
            header("location:../../index.php");
        }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$id_proveedor= $_GET['id_proveedor'];
$query = "SELECT * FROM proveedores where id_proveedor=" . $id_proveedor;
$resultado = mysqli_query($conexiondb, $query);
$proveedor = mysqli_fetch_row($resultado);
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
                <a href="../productos/formulario.php">Registrar Producto</a>
                <a href="../reportes/reporte_proveedores.php">Proveedores</a>
                <a href="../proveedores/formulario.php">Agregar Proveedor</a>
                <a href="../reportes/reporte_compra.php">Compras</a>
            </div>
        </div>

        <div class="dash-content">
            <div class="signupFrm">
                <form action="../../Backend/proveedores/editar.php" method="POST" class="form_categoria">
                    <h1 class="title">Editar Proveedores</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre_prov" value='<?php echo $proveedor[1]; ?>'>
                        <label for="" class="label">Nombre</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="ruc" value='<?php echo $proveedor[2]; ?>'>
                        <label for="" class="label">RUC</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="telefono" value='<?php echo $proveedor[3]; ?>'>
                        <label for="" class="label">Telefono</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="ciudad" value='<?php echo $proveedor[4]; ?>'>
                        <label for="" class="label">Ciudad</label>
                    </div>
                    <input type="hidden" name="id_proveedor" id="" value='<?php echo $proveedor[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>