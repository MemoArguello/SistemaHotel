<?php
session_start();

if (isset($_POST['usuario'], $_POST['codigo'])) {
    $usuario = $_POST['usuario'];
    $codigo = md5($_POST['codigo']);

    include '../config/baseDeDatos.php';

    $conexiondb = conectardb();

    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND codigo = '$codigo'";
    $resultado = mysqli_query($conexiondb, $consulta);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $filas = mysqli_fetch_array($resultado);

        if ($filas['id_cargo'] == 1) { // Administrador
            header("location:../../Backend/calendario/index.php");
            exit;
        } else if ($filas['id_cargo'] == 2) { // Recepcionista
            header("location:../../Frontend/inicio.php");
            exit;
        }
    } else {
        echo "<script>alert('No existe la cuenta'); 
        window.location.href='../../index.php'</script>";
    }

    mysqli_free_result($resultado);
} else {
    echo "No se han proporcionado todos los datos necesarios.";
    exit;
}
?>
