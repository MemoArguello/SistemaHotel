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

    $conexiondb = conectardb();
    $consulta = "SELECT habitaciones.id_habitaciones, habitaciones.nombre_habitacion, habitaciones.detalles, habitaciones.id_categoria, habitaciones.precio, habitaciones.estado, categorias.id_categoria, categorias.categoria FROM habitaciones JOIN categorias ON categorias.id_categoria = habitaciones.id_categoria";
    $resultado = mysqli_query($conexiondb, $consulta);
    mysqli_close($conexiondb);
    ?>
    <section class="dashboard">
        <div class="top">
            <div class="topnav" id="myTopnav">
                <a href="./listado_habitacion.php">Habitaciones Existentes</a>
                <a href="./formulario.php">Registrar Habitacion</a>
                <a href="../categoria/listadoCategoria.php">Categorias</a>
                <a href="../categoria/registrarCategoria.php">Registrar Categorias</a>
            </div>
        </div>

        <div class="dash-content">
            <br>
            <h1 align="center">HABITACIONES</h1>
            <table class="">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Detalles</th>
                        <th>Precio</th>
                        <th align="left">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    while ($habitaciones = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<tr>";
                        echo "<tr>";
                        echo "<tr>";
                        echo "<th scope ='row'>" . $index++ . "</th>";
                        echo "<td align= 'center'>" . $habitaciones['nombre_habitacion'] . "</td>";
                        echo "<td align= 'center'>" . $habitaciones['categoria'] . "</td>";
                        echo "<td align= 'center'>" . $habitaciones['detalles'] . "</td>";
                        echo "<td align= 'center'>" . $habitaciones['precio'] . "</td>";
                        echo "<td>";
                        echo "<a href='./editar.php?id_habitaciones=" . $habitaciones['id_habitaciones'] . "' class='submitBoton'> Editar </a>";
                        echo "<a href='../../Backend/habitacion/eliminar.php?id_habitaciones=" . $habitaciones['id_habitaciones'] . "' class='submitBotonEliminar'> Borrar </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>