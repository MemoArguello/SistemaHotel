<div class="modal" id="modalUpdateEvento"  tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Fecha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  <form name="formEventoUpdate" id="formEventoUpdate" action="UpdateEvento2.php" class="form-horizontal" method="POST">
    <input type="hidden" class="form-control" name="id_recepcion" id="id_recepcion">
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Cliente</label>
      <div class="col-sm-10">
        <input type="" class="form-control" name="id_cliente" id="fecha_inicio" placeholder="" readonly>
      </div>
    </div>
    <div class="form-group">
      <label for="fecha_inicio" class="col-sm-12 control-label">Habitacion</label>
      <div class="col-sm-10">
        <input type="" class="form-control" name="id_reserva" id="fecha_inicio" placeholder="" readonly>
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


    
     <div class="modal-footer">
        <button type="submit" class="btn btn-success">Editar Fecha</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
      </div>
  </form>
      
    </div>
  </div>
</div>