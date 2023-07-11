<?php
session_start();
include '../../Backend/config/baseDeDatos.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../../index.php");
}
$conexiondb = conectardb();
$sql = "SELECT id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
$resultado = mysqli_query($conexiondb, $sql);
while ($usuario = mysqli_fetch_assoc($resultado)) {
    if ($usuario['id_cargo'] != 1) {
        header("location:../../index.php");
    }
}
$conexiondb = conectardb();
$query = "SELECT * FROM habitaciones";
$resultado = mysqli_query($conexiondb, $query);
$usuario = $_SESSION['usuario'];
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
    <link rel="stylesheet" href="../CSS/style.css">
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
                    <a href="../../Backend/calendario/index.php">Calendario</a>
                    <a href="../../Backend/calendario/listado_recepciones.php">Recepciones</a>
                    <a href="../cliente/registrar.php">Registrar Cliente</a>
                    <a href="./listado.php">Lista de Clientes</a>
                </div>
            </div>

            <div class="dash-content">
                <div class="signupFrm">
                    <form action="../../Backend/cliente/nuevoCliente.php" method="POST" class="formRecepcion">
                        <h3 align="center">REGISTRAR CLIENTE</h3>
                        <br>
                        <div class="inputContainer">
                            <input type="number" class="input" placeholder="a" name="cedula">
                            <label for="" class="label">Numero de Cedula</label>
                        </div>

                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="a" name="nombre">
                            <label for="" class="label">Nombres</label>
                        </div>

                        <div class="inputContainer">
                            <input type="number" class="input" placeholder="a" name="telefono">
                            <label for="" class="label">Telefono</label>
                        </div>

                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="a" name="procedencia">
                            <label for="" class="label">Procedencia</label>
                        </div>
                        <div class="inputContainer">
                            <input type="text" class="input" placeholder="a" name="factura">
                            <label for="" class="label">Factura</label>
                        </div>
                        <input type="submit" class="submitBtn" value="GUARDAR">
                    </form>
                </div>

            </div>
        </section>

        <script src="../js/script.js"></script>

</body>

</html>