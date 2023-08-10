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
$query = "SELECT * FROM cargo ORDER BY id ASC";
$resultado = mysqli_query($conexiondb, $query);
mysqli_close($conexiondb);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuracion</title>
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="./../CSS/style.css">
    <link rel="stylesheet" href="../CSS/registrar.css">

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
                <a href="../reportes/reporte_cuentas.php">Cuentas Existentes</a>
                <a href="./form_cuenta.php">Registrar Cuenta</a>
            </div>
        </div>

        <div class="dash-content">
            <div class="signupFrm">
                <form action="./guardar_cuenta.php" method="POST" class="form">
                    <h1 class="title">Registrar Cuenta</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="correo">
                        <label for="" class="label">Correo Electronico</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="usuario">
                        <label for="" class="label">Nombre de Usuario</label>
                    </div>

                    <div class="inputContainer">
                        <input type="password" class="input" placeholder="a" name="codigo" minlength="5">
                        <label for="" class="label">Contraseña</label>
                    </div>

                    <div class="inputContainer">
                        <input type="password" class="input" placeholder="a" name="ccodigo" minlength="5">
                        <label for="" class="label">Confirmar Contraseña</label>
                    </div>
                    <div class="inputContainer">
                        <select class="input" name="id" class="" id="inputGroupSelect01">
                            <?php
                            while ($cargo = mysqli_fetch_assoc($resultado)) {
                                echo "<option value='" . $cargo['id'] . "'>" . $cargo['descripcion'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Cambiar Cargo</label>
                    </div>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>

        </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>