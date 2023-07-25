<?php
include '../../Backend/config/baseDeDatos.php';


        $codigo         =$_POST['codigo'];
        $nombre         =$_POST['nombre_producto'];
        $precio         =$_POST['precio'];
        $stock          =$_POST['stock_inicial'];
        $conexiondb     =conectardb();

        $id_producto = $_POST['id_producto'];
        $query = "UPDATE producto SET codigo='" . $codigo . "', nombre_producto='" . $nombre . "',precio ='" . $precio ."',  stock_inicial='" . $stock."' WHERE id_producto=" . $id_producto;

        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                                       window.location.href='../../Frontend/reportes/reporte_producto.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                window.location.href='../../Frontend/reportes/reporte_producto.php'</script>";
            }
          mysqli_close($conexiondb);
?>