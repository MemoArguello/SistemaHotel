<?php
    $conexiondb = conectardb();
    $query_r = "SELECT * FROM reserva";
    $query_h = "SELECT * FROM habitaciones";
    $resultado_r = mysqli_query($conexiondb, $query_r);
    $resultado_h = mysqli_query($conexiondb, $query_h);

    mysqli_close($conexiondb);
    $usuario = $_SESSION['usuario'];
  if (!isset($usuario)) {
    header("location:../index.php");
  }
  $conexiondb = conectardb();
    $sql = "SELECT * FROM `usuarios` WHERE usuario = '$usuario';";
    $result = mysqli_query($conexiondb, $sql);
    $venta = mysqli_fetch_row($result);

    ?>
<div class="modal" id="exampleModal"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Nueva reservacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEvento" id="formEvento" action="nuevoEvento.php" class="form-horizontal" method="POST">
    <div class="col-sm-10">
  <div class="inputContainer">
                        <select class="input" name="id_reserva" id="inputGroupSelect01"></P>
                            <?php
                            while ($habitacion = mysqli_fetch_assoc($resultado_r)) {
                                echo "<option value='" . $habitacion['id'] . "'>" . $habitacion['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Cliente</label>
    </div>
    </div>
    <div class="col-sm-10">
    <div class="inputContainer">
                        <select class="input" name="id_habitacion" id="inputGroupSelect01"></P>
                            <?php
                            while ($habitacion = mysqli_fetch_assoc($resultado_h)) {
                                echo "<option value='" . $habitacion['id_habitaciones'] . "'>" . $habitacion['nombre_habitacion'] . "</option>";
                            }
                            ?>
                        </select>
                        <label for="" class="label">Habitacion</label>
                    </div>
    </div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Fecha Inicio</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha Inicio">
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_fin" class="col-sm-12 control-label">Fecha Final</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha Final">
      </div>
    </div>
    <input type="hidden" name="id_usuario" id="" value='<?php echo $venta[0]; ?>' readonly>

		
	   <div class="modal-footer">
      	<button type="submit" class="btn btn-success">Guardar Evento</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
    	</div>
	</form>
      
    </div>
  </div>
</div>