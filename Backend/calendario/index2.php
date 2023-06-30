<?php
session_start();
include '../db.php';

$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
  header("location:../index.php");
}
$conexiondb = conectardb();
$sql = "SELECT usuario, id_cargo FROM `usuarios` WHERE usuario = '$usuario';";
$result_vista = mysqli_query($conexiondb, $sql);
while ($usuario= mysqli_fetch_assoc($result_vista )) {
    if ($usuario['id_cargo'] != 2) {
        header("location:../index.php");
    }
}
$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Reservas</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="../CSS/registrar.css">
  <link rel="stylesheet" href="../CSS/style.css">

</head>
<body>
<nav>
    <div class="logo-name">
      <div class="logo-image">
        <img src="./../IMG/logo.svg" alt="">
      </div>

      <span class="logo_name">HOTEL</span>
    </div>

    <div class="menu-items">
      <ul class="nav-links">
        <li><a href="./index2.php">
            <i class="uil uil-calendar-alt"></i>
            <span class="link-name">Reservas</span>
          </a></li>
        <li><a href="../admin/listado/form_habitaciones2.php">
            <i class="uil uil-bed"></i>
            <span class="link-name">Habitación</span>
          </a></li>
        <li><a href="../reportes2.php">
            <i class="uil uil-file-graph"></i>
            <span class="link-name">Reportes</span>
          </a></li>
        <li><a href="../producto/listado_productos2.php">
            <i class="uil uil-coffee"></i>
            <span class="link-name">Productos</span>
          </a></li>
          <li><a href="../ventas/ventas2.php">
            <i class="uil uil-usd-circle"></i>
            <span class="link-name">Ventas</span>
          </a></li>
          <li><a href="../reportes_caja2.php">
                        <i class="uil uil-money-withdrawal"></i>
                        <span class="link-name">Caja</span>
            </a></li>
      </ul>

      <ul class="logout-mode">
        <li><a>
            <i class="uil uil-user"></i>
            <span class="link-name"><?php echo "Usuario: $usuario"; ?></span>
          </a>
        </li>
        <li><a href="../cerrar_sesion.php">
            <i class="uil uil-signout"></i>
            <span class="link-name">Cerrar Sesión</span>
          </a></li>
      </ul>
    </div>
  </nav>
  <section class="dashboard">
    <div class="top">
      <i class="uil uil-bars sidebar-toggle"></i>
      <img src="../IMG/recepcionista.svg" alt="">
    </div>
    <div class="dash-content">
      <div class="topnav" id="myTopnav">
        <a href="./index2.php">Calendario</a>
        <a href="./listado_recepciones2.php">Recepciones</a>
        <a href="../Recepcion/recepcionar2.php">Registrar Cliente</a>
        <a href="../calendario22/listado_reserva2.php">Lista de Clientes</a>
      </div>
<?php
include('config.php');

$SqlEventos   = "SELECT recepcion.id_recepcion, recepcion.id_reserva, recepcion.id_habitacion, recepcion.fecha_inicio, recepcion.fecha_fin, reserva.id, reserva.cedula, reserva.nombre, habitaciones.nombre_habitacion, habitaciones.precio, TIMESTAMPDIFF(DAY, fecha_inicio, fecha_fin) AS fecha 
FROM recepcion JOIN reserva ON reserva.id = recepcion.id_reserva
JOIN habitaciones ON habitaciones.id_habitaciones = recepcion.id_habitacion";
$resulEventos = mysqli_query($con, $SqlEventos);

?>
<div class="mt-5"></div>

<div class="container">
  <div class="row">
    <div class="col msjs">

    </div>
  </div>


</div>



<div id="calendar"></div>


<?php  
  include('modalNuevoEvento2.php');
  include('modalUpdateEvento2.php');
?>



<script src ="js/jquery-3.0.0.min.js"> </script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/moment.min.js"></script>	
<script type="text/javascript" src="js/fullcalendar.min.js"></script>
<script src='locales/es.js'></script>

<script type="text/javascript">
$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
       
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
      
    events: [
      <?php
       while($dataEvento = mysqli_fetch_array($resulEventos)){ ?>
          {
          _id: '<?php echo $dataEvento['id_recepcion']; ?>',
          title2: '<?php echo $dataEvento['nombre']; ?>',
          title: '<?php echo $dataEvento['nombre_habitacion']; ?>',
          start: '<?php echo $dataEvento['fecha_inicio']; ?>',
          end:   '<?php echo $dataEvento['fecha_fin']; ?>',
          },
        <?php } ?>
    ],


//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event._id_recepcion;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
         // $("#respuesta").html(response);
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var id_recepcion = event._id;
    $('input[name=id_recepcion').val(id_recepcion);
    $('input[name=id_reserva').val(event.title);
    $('input[name=id_cliente').val(event.title2);
    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
    $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});

</script>
</body>
</html>