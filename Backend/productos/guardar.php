<?php
        include '../../Backend/config/baseDeDatos.php';
        if (empty($codigo) || empty($nombre) || empty($proveedor) || empty($precio) || empty($stock) || empty($total_pagar)) {
            echo "<script>alert('Por favor, complete todos los campos');
            window.location.href='../../Frontend/productos/formulario.php'</script>";
            exit;
        }

        $codigo =$_POST['codigo'];
        $nombre=$_POST['nombre_producto'];
        $proveedor= $_POST['id_proveedor']; 
        $precio= $_POST['precio'];
        $stock=$_POST['stock_inicial'];
        $total_pagar    =($_POST['total_pagar'] = $precio * $stock);
        $conexiondb = conectardb();
        


        $query = "INSERT INTO producto (codigo,nombre_producto, id_proveedor, precio, stock_inicial) VALUES 
            ('$codigo','$nombre', '$proveedor','$precio', '$stock')";
        $respuesta = mysqli_query($conexiondb, $query);

        $query2 = "UPDATE caja SET egreso= (egreso +" . $total_pagar. ") WHERE estado= 'abierto'";
        $respuesta2 = mysqli_query($conexiondb, $query2);

        if ($respuesta and $respuesta2) {
                echo "<script>alert('Registro Exitoso');
                window.location.href='../../Frontend/reportes/reporte_producto.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                window.location.href='../../Frontend/reportes/reporte_producto.php'</script>";
            }
          mysqli_close($conexiondb);
?>