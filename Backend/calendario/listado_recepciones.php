<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:../index.php");
}
    $conexiondb = conectardb();
    $sql = "SELECT usuario, id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
    $resultado1 = mysqli_query($conexiondb, $sql);
    while ($usuario= mysqli_fetch_assoc($resultado1)) {
        if ($usuario['id_cargo'] != 1) {
            header("location:../index.php");
        }
}
$conexiondb = conectardb();
$query ="SELECT recepcion.id_recepcion, recepcion.id_reserva, recepcion.id_habitacion, recepcion.fecha_inicio, 
recepcion.fecha_fin, recepcion.total_dias, recepcion.total_pagar, recepcion.pago_producto,recepcion.total, recepcion.estado,
reserva.id, reserva.cedula, reserva.nombre, 
habitaciones.nombre_habitacion 
FROM recepcion JOIN reserva ON reserva.id = recepcion.id_reserva
JOIN habitaciones ON habitaciones.id_habitaciones = recepcion.id_habitacion";
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
    <link rel="stylesheet" href="../admin/listado/listado.css">
</head>

<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="../IMG/logo.svg" alt="">
            </div>

            <span class="logo_name">HOTEL</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../calendario/index.php">
                        <i class="uil uil-calendar-alt"></i>
                        <span class="link-name">Reservas</span>
                    </a></li>
                <li><a href="../admin/listado/form_habitaciones.php">
                        <i class="uil uil-bed"></i>
                        <span class="link-name">Habitación</span>
                    </a></li>
                <li><a href="../reportes.php">
                        <i class="uil uil-file-graph"></i>
                        <span class="link-name">Reportes</span>
                    </a></li>
                <li><a href="../producto/listado_productos.php">
                        <i class="uil uil-coffee"></i>
                        <span class="link-name">Productos</span>
                    </a></li>
                    <li><a href="../ventas/ventas.php">
                        <i class="uil uil-usd-circle"></i>
                        <span class="link-name">Venta</span>
                    </a></li>
                    <li><a href="../reportes_caja.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
            </a></li>
                <li><a href="../admin/listado/form_cuentas.php">
                        <i class="uil uil-setting"></i>
                        <span class="link-name">Configuración</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a>
                        <i class="uil uil-user"></i>
                        <span class="link-name"><?php echo "Usuario: $usuario"; ?></span>
                    </a>
                </li>
                <li><a href="../cerrar_sesion.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Cerrar Sesión</span>
                    </a></li>
                <li class="mode">
                    <div class="mode-toggle">
                    </div>
                </li>

            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>
            <img src="../IMG/admin.svg" alt="">
        </div>

        <div class="dash-content">
            <div class="topnav" id="myTopnav">
                <a href="../calendario/index.php">Calendario</a>
                <a href="./listado_recepciones.php">Recepciones</a>
                <a href="../Recepcion/recepcionar.php">Registrar Cliente</a>
                <a href="../calendario22/listado_reserva.php">Lista de Clientes</a>
            </div>
            <h1 align="center">CHECK OUT</h1>
            <table class="">
                <thead>
                    <tr>
                        <th>Nº</th>
                        <th>Cliente</th>
                        <th>Habitacion</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Total Dias</th>
                        <th>Precio Hospedaje</th>
                        <th>Gastos Producto</th>
                        <th>Total a Pagar</th>
                        <th>Estado</th>
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
                        echo "<td align= 'center'>" . $reserva['nombre'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['nombre_habitacion'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['fecha_inicio'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['fecha_fin'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['total_dias'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['total_pagar'] .  " Gs" . "</td>";
                        echo "<td align= 'center'>" . $reserva['pago_producto'] .  " Gs" . "</td>";
                        echo "<td align= 'center'>" . $reserva['total'] . "</td>";
                        echo "<td align= 'center'>" . $reserva['estado'] .  "</td>";
                        echo "<td>";
                        echo "<a href='../factura.php?id_recepcion=" . $reserva['id_recepcion'] . "' class='submitBotonFactura'>Factura</a>";
                        echo "<a href='./pagado.php?id_recepcion=" . $reserva['id_recepcion'] . "' class='submitBoton'>Pagado</a>";
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