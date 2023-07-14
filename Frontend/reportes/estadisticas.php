<?php
session_start();
include '../../Backend/config/baseDeDatos.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:./index.php");
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
$query1 = "SELECT COUNT(*) total1 FROM reserva";
$query2 = "SELECT COUNT(*) total2 FROM recepcion";
$query3 = "SELECT COUNT(*) total3 FROM habitaciones";
$query4 = "SELECT COUNT(*) total4 FROM producto";
$query5 = "SELECT sum(total_pagar) total5 FROM venta";
$query6 = "SELECT SUM(total_pagar) total6 FROM compra";


$resultado1 = mysqli_query($conexiondb, $query1);
$resultado2 = mysqli_query($conexiondb, $query2);
$resultado3 = mysqli_query($conexiondb, $query3);
$resultado4 = mysqli_query($conexiondb, $query4);
$resultado5 = mysqli_query($conexiondb, $query5);
$resultado6 = mysqli_query($conexiondb, $query6);



?>
<style>
    
    .card-head span {
    font-size: 3.2rem;
    color: grey;
}
    .card {
        box-shadow: 0px 10px 10px -5px rgb(0 0 0 / 10%);
        background: #fff;
        padding: 1rem;
        border-radius: 3px;
        height: 100px;
        width: 340px;
    }

    .card-head {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .analytics {
        font-family: 'Poppins', sans-serif;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 2rem;
        margin-top: 0.5rem;
        margin-bottom: 2rem;
    }
    .page-content {
    padding: 1.3rem 1rem;
    background: #f1f4f9;
    }
</style>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/registrar.css">


    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link href="./IMG/logo.svg" rel="icon">
    <!---bootstrap 4 css-->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- datatables css basico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
    <!---datatables bootstrap 4 css-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap.css">
    <title>HOTEL</title>
</head>

<body>
<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/SistemaHotel/Frontend/dashboard/menu.php');
?>
    <section class="dashboard">
        <div class="top">
        <div class="topnav" id="myTopnav">
                <a href="./estadisticas.php">Estadisticas</a>
                <a href="./auditoria.php">Auditoria</a>
                <a href="./reportes_recepcion.php">Reporte Reservas</a>
                <a href="./reporte_habitacion.php">Reporte Habitaciones</a>
                <a href="./reporte_cliente.php">Reporte Clientes</a>
                <a href="./reporte_caja.php">Reporte Caja</a>
            </div>
        </div>
        <div class="dash-content">
            <div class="analytics">
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado1)) {
                            echo "<td align= 'center'>" . $reserva['total1'] . ' Clientes totales' . "</td>";
                        }
                        ?>
                            <span class="las la-user-friends"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado2)) {
                            echo "<td align= 'center'>" . $reserva['total2'] . ' Habitaciones Reservadas' . "</td>";
                        }
                        ?>
                        <span class="uil uil-bed"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado3)) {
                            echo "<td align= 'center'>" . $reserva['total3'] . ' Habitaciones Registradas' . "</td>";
                        }
                        ?>
                        <span class="uil uil-house-user"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado4)) {
                            echo "<td align= 'center'>" . $reserva['total4'] . ' Productos Registrados' . "</td>";
                        }
                        ?>
                            <span class="las la-shopping-cart"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado5)) {
                            echo "<td align= 'center'>" . $reserva['total5'] . ' Gs en Ventas Realizadas' . "</td>";
                        }
                        ?>
                            <span class="las la-money-bill"></span>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <?php
                        while ($reserva = mysqli_fetch_assoc($resultado6)) {
                            echo "<td align= 'center'>" . $reserva['total6'] . ' Gs en Compras Realizadas' . "</td>";
                        }
                        ?>
                            <span class="las la-store"></span>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <script src="./JS/script.js"></script>
</body>

</html>