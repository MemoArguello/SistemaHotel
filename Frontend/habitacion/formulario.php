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
            header("location:../index.php");
        }
}
$usuario = $_SESSION['usuario'];
$conexiondb = conectardb();
$query = "SELECT * FROM categorias";
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
                <a href="./listado_habitacion.php">Habitaciones Existentes</a>
                <a href="./formulario.php">Registrar Habitacion</a>
                <a href="../categoria/listado_categoria.php">Listado Categoria</a>
                <a href="../categoria/categoria.php">Registrar Categorias</a>
            </div>
        </div>
        <div class="dash-content">
            <div class="signupFrm">
                <form action="../../Backend/habitacion/guardar.php" method="POST" class="form_habitacion">
                    <h1 class="title">Registrar Habitacion</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre_habitacion">
                        <label for="" class="label">Nombre</label>
                    </div>
                    <div class="inputContainer">
                        <select class="input" name="id_categoria" class="" id="inputGroupSelect01"></P>
                            <?php
                            while ($cargo = mysqli_fetch_assoc($resultado)) {
                                echo "<option value='" . $cargo['id_categoria'] . "'>" . $cargo['categoria'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="detalles">
                        <label for="" class="label">Detalles</label>
                    </div>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="precio">
                        <label for="" class="label">Precio</label>
                    </div>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>

        </div>
    </section>

    <script src="../../JS/script.js"></script>

</body>

</html>