<?php
include '../../Backend/config/baseDeDatos.php';

$id_categoria = $_GET['id_categoria'];

$conexiondb = conectardb();

try{$query ="DELETE FROM categorias WHERE id_categoria=".$id_categoria;
}
catch(Error){
    echo "<script>alert('Registros Actualizados');
    window.location.href='../../Frontend/reportes/reportes_categorias.php'</script>";
}finally{
    echo "<script>alert('Registros Actualizados');
    window.location.href='../../Frontend/reportes/reportes_categorias.php'</script>";
}
$respuesta= mysqli_query($conexiondb, $query);

if ($respuesta) {
    echo "<script>alert('Categoria Eliminada');
    window.location.href='../../Frontend/reportes/reportes_categorias.php'</script>";
} else {
    echo "<script>alert('No se pudo Eliminar');
    window.location.href='../../Frontend/reportes/reportes_categorias.php'</script>";
}
?>