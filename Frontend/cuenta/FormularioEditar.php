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
$id_usuario = $_GET['id_usuario'];
$query_c = "SELECT * FROM cargo";
$resultado_c = mysqli_query($conexiondb, $query_c);
$cargos = mysqli_fetch_row($resultado_c);

$query = "SELECT * FROM usuarios WHERE id_usuario=" . $id_usuario;
$resultado = mysqli_query($conexiondb, $query);
$usuarios = mysqli_fetch_row($resultado);


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
                <a href="../configuracion/form_cuenta.php">Registrar Cuenta</a>
            </div>
        </div>

        <div class="dash-content">

            <div class="signupFrm">
                <form action="../../Backend/cuenta/editar.php" method="POST" class="form">
                    <h1 class="title">Editar Cuenta</h1>
                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="correo" value='<?php echo $usuarios[1]; ?>'>
                        <label for="" class="label">Correo Electronico</label>
                    </div>

                    <div class="inputContainer">
                        <input type="text" class="input" placeholder="a" name="usuario" value='<?php echo $usuarios[2]; ?>'>
                        <label for="" class="label">Nombre de Usuario</label>
                    </div>

                    <div class="inputContainer">
                        <?php
                        $query_rol = mysqli_query($conexiondb, "select * FROM cargo");
                        $result_cargo = mysqli_num_rows($query_rol);
                        ?>
                        <select class="input" name="id_cargo" class="" id="inputGroupSelect01">
                            <?php
                            if ($result_cargo > 0) {
                                while ($cargo = mysqli_fetch_array($query_rol)) {
                            ?>
                                    <option value="<?php echo $cargo['id'] ?>"><?php echo $cargo['descripcion'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_usuario" id="" value='<?php echo $usuarios[0] ?>' readonly>
                    <input type="hidden" name="editar" id="" value='si' readonly>
                    <input type="submit" class="submitBtn" value="GUARDAR">
                </form>
            </div>

        </div>
    </section>

    <?php
    mysqli_close($conexiondb);
    ?>
    <script src="./../JS/script.js"></script>

</body>

</html>