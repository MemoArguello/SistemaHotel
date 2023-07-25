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
$id_categoria = $_GET['id_categoria'];
$query = "SELECT * FROM categorias where id_categoria=" . $id_categoria;
$resultado = mysqli_query($conexiondb, $query);
$categoria = mysqli_fetch_row($resultado);
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
    <link rel="stylesheet" href="../CSS/listado.css">

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
                <a href="../reportes/reporte_habitacion.php">Habitaciones Existentes</a>
                <a href="../habitacion/formulario.php">Registrar Habitacion</a>
                <a href="../reportes/reportes_categorias.php">Categorias</a>
                <a href="./RegistrarCategoria.php">Registrar Categorias</a>
            </div>
        </div>

        <div class="dash-content">
            <div class="signupFrm">
                <form action="../../Backend/categoria/actualizarCategoria.php" method="POST" class="form_categoria">
                    <h3 class="title">Editar Categoria</h3>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre" value='<?php echo $categoria[1]; ?>'>
                        <label for="" class="label">Nombre Categoria</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="piso" value='<?php echo $categoria[2]; ?>'>
                        <label for="" class="label">Ingrese Piso</label>
                    </div>
                    <input type="hidden" name="categoria" id="" value='<?php echo $categoria[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>
    </section>

    <script src="../../JS/script.js"></script>

</body>

</html>