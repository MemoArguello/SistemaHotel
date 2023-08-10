<?php
        include '../../Backend/config/baseDeDatos.php';
        $nombre     = $_POST['nombre_prov'];
        $ruc        =$_POST['ruc'];
        $telefono   =$_POST['telefono'];
        $ciudad     =$_POST['ciudad'];
        $conexiondb = conectardb();

  
        $id_proveedor = $_POST['id_proveedor'];
        $query = "UPDATE proveedores SET nombre_prov='" . $nombre . "', ruc='" .$ruc . "', telefono='" .$telefono . "',ciudad='" .$ciudad . "' WHERE id_proveedor=" . $id_proveedor;

        $respuesta = mysqli_query($conexiondb, $query);

        if ($respuesta) {
                echo "<script>alert('Registro Exitoso');
                window.location.href='../../Frontend/reportes/reporte_proveedores.php'</script>";
            } else {
                echo "<script>alert('Registro Fallido');
                window.location.href='../../Frontend/reportes/reporte_proveedores.php'</script>";
            }
          mysqli_close($conexiondb);
?>