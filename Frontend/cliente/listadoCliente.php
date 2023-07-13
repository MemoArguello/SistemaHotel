<?php
session_start();
include '../../Backend/config/baseDeDatos.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../../index.php");
}
$conexiondb = conectardb();
$sql = "SELECT usuario, id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
$resultado1 = mysqli_query($conexiondb, $sql);
while ($usuario = mysqli_fetch_assoc($resultado1)) {
    if ($usuario['id_cargo'] != 1) {
        header("location:../../index.php");
    }
}
$conexiondb = conectardb();
$query = "SELECT * FROM reserva";
$resultado = mysqli_query($conexiondb, $query);
$usuario = $_SESSION['usuario'];

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
    <link rel="stylesheet" href="../CSS/listado.css">
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
                <a href="./listadoCliente.php">Lista de Clientes</a>
            </div>
        </div>

        <div class="dash-content">
        <br>
            <h1 align="center">CLIENTES</h1>
            <table class="">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>telefono</th>
                        <th>Procedencia</th>
                        <th>Factura</th>
                        <th align="left">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    while ($reserva = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<tr>";
                        echo "<tr>";
                        echo "<tr>";
                        echo "<th scope ='row'>" . $index++ . "</th>";
                        echo "<td align= 'center'>" . $reserva['cedula'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['nombre'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['telefono'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['procedencia'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['factura'] . "</td>";
                        echo "<td>";
                        echo "<a href='./editar_form.php?id=" . $reserva['id'] . "' class='submitBoton'> Editar </a>";
                        echo "<a href='../../Backend/cliente/eliminar.php?id=" . $reserva['id'] . "' class='submitBotonEliminar'> Borrar </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
    </section>

    <script src="../JS/script.js"></script>

</body>

</html>