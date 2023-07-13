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
    <title>Categoria</title>
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
                <a href="../habitacion/listado_habitacion.php">Habitaciones Existentes</a>
                <a href="../habitacion/formulario.php">Registrar Habitacion</a>
                <a href="./listadoCategoria.php">Categorias</a>
                <a href="./RegistrarCategoria.php">Registrar Categorias</a>
            </div>
        </div>

        <div class="dash-content">
        <br>
            <h1 align="center">CATEGORIAS</h1>
            <table id="example" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th align="center">Categoria</th>
                        <th align="center">Piso</th>
                        <th align="left">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $index = 1;
                    while ($categoria = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<tr>";
                        echo "<tr>";
                        echo "<tr>";
                        echo "<th scope ='row'>" . $index++ . "</th>";
                        echo "<td align= 'center'>" . $categoria['categoria'] . "</td>";
                        echo "<td align= 'center'>" . $categoria['piso'] . "</td>";
                        echo "<td>";
                        echo "<a href='./editarCategoria.php?id_categoria=" . $categoria['id_categoria'] . "' class='submitBoton'> Editar </a>";
                        echo "<a href='../../Backend/categoria/eliminarCategoria.php?id_categoria=" . $categoria['id_categoria'] . "' class='submitBotonEliminar'> Borrar </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
    </section>
    <script src="../../JS/script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.j"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
</body>
</html>