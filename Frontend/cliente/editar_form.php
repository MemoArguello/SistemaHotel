<?php
session_start();
include '../../Backend/config/baseDeDatos.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
$conexiondb = conectardb();
    $sql = "SELECT id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
    $resultado = mysqli_query($conexiondb, $sql);
    while ($usuario= mysqli_fetch_assoc($resultado)) {
        if ($usuario['id_cargo'] != 1) {
            header("location:../index.php");
        }
}
$usuario = $_SESSION['usuario'];
$id_categoria = $_GET['id'];
$query = "SELECT * FROM reserva where id=" . $id_categoria;
$resultado = mysqli_query($conexiondb, $query);
$reserva = mysqli_fetch_row($resultado);

$query_c = "SELECT * FROM habitaciones";
$resultado_c = mysqli_query($conexiondb, $query_c);
$habitacion = mysqli_fetch_row($resultado_c);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reserva</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../CSS/registrar.css">
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
                <form action="../../Backend/cliente/editar.php" method="POST" class="formRecepcion">
                    <h3 align="center">EDITAR CLIENTE</h3>
                    <br>
                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="cedula" value='<?php echo $reserva[1]; ?>'>
                        <label for="" class="label">Numero de Cedula</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="nombre" value='<?php echo $reserva[2]; ?>'>
                        <label for="" class="label">Nombres</label>
                    </div>

                    <div class="inputContainer">
                        <input type="number" class="input" placeholder="a" name="telefono" value='<?php echo $reserva[3]; ?>'>
                        <label for="" class="label">Telefono</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="procedencia" value='<?php echo $reserva[4]; ?>'>
                        <label for="" class="label">Procedencia</label>
                    </div>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="factura" value='<?php echo $reserva[5]; ?>'>
                        <label for="" class="label">Factura</label>
                    </div>
                    <input type="hidden" name="id" id="" value='<?php echo $reserva[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="EDITAR">
                </form>
            </div>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>