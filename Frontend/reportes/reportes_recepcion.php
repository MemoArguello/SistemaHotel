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
                <a href="../../Backend/calendario/index.php">Calendario</a>
                <a href="./reportes_recepcion.php">Recepciones</a>
                <a href="../cliente/registrar.php">Registrar Cliente</a>
                <a href="../reportes/reporte_cliente.php">Lista de Clientes</a>
            </div>
        </div>
        <div class="dash-content">
            <div class="container">
                <br>
                <div class"row">
                    <div class="col-lg-12">
                        <table id="tablaUsuarios" class="table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Habitacion</th>
                                    <th>Fecha de Entrada</th>
                                    <th>Fecha de salida</th>
                                    <th>Estadia (Dias)</th>
                                    <th>Total habitaion (Gs)</th>
                                    <th>Productos</th>
                                    <th>Total (Gs)</th>
                                    <th>Estado</th>
                                    <th>Imprimir</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--Jquery. popper.js, Bootstrap JS-->
        <script src="jquery/jquery-3.5.1.min.js"></script>
        <script src="popper/popper.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!--Datatables JS-->
        <script type="text/javascript" src="datatables/datatables.min.js"></script>
        <!--Para usar botones en datatables JS-->
        <script src="datatables/Buttons-2.3.2/js/dataTables.buttons.js"></script>
        <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
        <script src="datatables/pdfmake-0.1.36/pdfmake.js"></script>
        <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
        <script src="datatables/Buttons-2.3.2/js/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#tablaUsuarios').DataTable({
                    //para usar botones
                    responsive: "true",
                    dom: 'Bfrtilp',
                    buttons: [{
                            extend: 'excelHtml5',
                            text: 'Excel',
                            titleAttr: 'Exportar a Excel',
                            className: 'btn btn-success'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn btn-danger'
                        },
                        {
                            extend: 'print',
                            text: 'imprimir',
                            titleAttr: 'imprimir',
                            className: 'btn btn-info'
                        },
                    ],
                    "ajax": {
                        "url": "list_recepcion.php",
                        "dataSrc": ""
                    },
                    "columns": [
                        {
                            "data": "nombre"
                        },
                        {
                            "data": "nombre_habitacion"
                        },
                        {
                            "data": "fecha_inicio"
                        },
                        {
                            "data": "fecha_fin"
                        },
                        {
                            "data": "total_dias"
                        },
                        {
                            "data": "total_pagar"
                        },
                        {
                            "data": "pago_producto"
                        },
                        {
                            "data": "total"
                        },
                        {
                            "data": "estado"
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return '<a href="../../Backend/calendario/factura.php?id_recepcion=' + row.id_recepcion + '" class="submitBoton">Factura</a>';
                            }
                        },
                        {
                            "data": null,
                            "render": function(data, type, row) {
                                return '<a href="../../Backend/calendario/pagado.php?id_recepcion=' + row.id_recepcion + '" class="submitBotonEliminar">Pagado</a>';
                            }
                        }
                    ]
                });
            });
        </script>
        </div>
    </section>


    <script src="./JS/script.js"></script>
</body>

</html>