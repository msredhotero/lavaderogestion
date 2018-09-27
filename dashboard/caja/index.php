<?php


session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../../error.php');
} else {


include ('../../includes/funciones.php');
include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funcionesReferencias.php');

$serviciosFunciones 	= new Servicios();
$serviciosUsuario 		= new ServiciosUsuarios();
$serviciosHTML 			= new ServiciosHTML();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Cierre de Caja",$_SESSION['refroll_predio'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Empleado";

$plural = "Empleados";

$eliminar = "eliminarEmpleados";

$insertar = "insertarEmpleados";

$tituloWeb = "Gestión: Talleres";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbempleados";

$lblCambio	 	= array("nrodocumento","fechanacimiento","telefono","direccion","telefonofijo");
$lblreemplazo	= array("Nro Documento","Fecha Nacimiento","Teléfono","dirección","Teléfono Fijo");


$cadRef 	= '';

$refdescripcion = array();
$refCampo 	=  array();
//////////////////////////////////////////////  FIN de los opciones //////////////////////////




/////////////////////// Opciones para la creacion del view  apellido,nombre,nrodocumento,fechanacimiento,direccion,telefono,email/////////////////////
$cabeceras 		= "	<th>Apellido</th>
					<th>Nombre</th>
					<th>Nro Documento</th>
					<th>Fecha Nacimiento</th>
					<th>CUIL</th>
					<th>Teléfono</th>
					<th>Teléfono Fijo</th>
					<th>Dirección</th>
					<th>Email</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




//$formulario 	= $serviciosFunciones->camposTabla($insertar ,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

//$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosReferencias->traerEmpleados(),9);

$resCaja = $serviciosReferencias->traerCajadiariaPorFecha(date('Y-m-d'));

$resServicios = $serviciosReferencias->traerTurnosTotalPorFechaEstados(date('Y-m-d'),'1');

$resIngresosEgresos = $serviciosReferencias->traerOtrosingresosegresosTotalPorFecha(date('Y-m-d'));

$subtotal = 0;
$total = 0;
$egresos = 0;
$ingresos = 0;
$caja = 0;

if (mysql_num_rows($resCaja) > 0) {
	$caja = mysql_result($resCaja,0,1);
} else {
	$caja = 0;
}

if (mysql_num_rows($resServicios) > 0) {
	$subtotal = mysql_result($resServicios,0,2);
} else {
	$subtotal = 0;
}


if (mysql_num_rows($resIngresosEgresos) > 0) {
	$ingresos = mysql_result($resIngresosEgresos,0,0);
	$egresos = mysql_result($resIngresosEgresos,0,1);
} else {
	$ingresos = 0;
	$egresos = 0;
}

$resTimeline = $serviciosReferencias->traerTurnosGridPorFecha(date('Y-m-d'));

$total = $caja + $subtotal + $ingresos - $egresos;

if ($_SESSION['refroll_predio'] != 1) {

} else {

	
}


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title><?php echo $tituloWeb; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">

    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
	<style type="text/css">
		.monto {
			color: red;
		}

		@import url(https://fonts.googleapis.com/css?family=Raleway);
		@import url(http://weloveiconfonts.com/api/?family=entypo);
		[class*="entypo-"]:before {
		font-family: 'entypo', sans-serif;
		}

		[class*="entypo-"] {
		width: 1em;
		height: 1em;
		}

		
		a:hover {
		color: #777;
		}

		h1 {
		font-family: 'Raleway', sans-serif;
		letter-spacing: 1.5px;
		color: #999;
		font-weight: 100;
		font-size: 2.4em;
		margin: 0;
		border-bottom: 1px solid #777;
		padding-bottom: 0.2em;
		}

		h2 {
		font-family: 'Raleway', sans-serif;
		letter-spacing: 1.5px;
		color: #999;
		font-weight: 100;
		font-size: 1.0em;
		}

		.timeline {
		border-left: 0.25em solid #4298c3;
		background: rgba(255, 255, 255, 0.1);
		margin: 2em auto;
		line-height: 1.4em;
		padding: 1em;
		padding-left: 3em;
		list-style: none;
		text-align: left;
		margin-left: 10em;
		margin-right: 3em;
		border-radius: 0.5em;
		min-width: 22em;
		}

		.event {
		min-width: 20em;
		width: 100%;
		vertical-align: middle;
		box-sizing: border-box;
		position: relative;
		}

		.timeline .event:before,
		.timeline .event:after {
		position: absolute;
		display: block;
		top: 1em;
		}

		.timeline .event:before {
		left: -15em;
		color: rgba(255, 255, 255, 0.8);
		content: attr(data-date);
		text-align: right;
		font-weight: 100;
		font-size: 0.9em;
		min-width: 9em;
		}

		.timeline .event:after {
		box-shadow: 0 0 0 0.2em #4298c3;
		left: -3.5em;
		background: #313534;
		border-radius: 50%;
		height: 0.75em;
		width: 0.75em;
		content: "";
		}

		.timeline .event .member-location,
		.timeline .event .member-parameters {
		display: none;
		}

		.timeline .event:last-of-type .member-location,
		.timeline .event:last-of-type .member-parameters {
		display: block;
		}

		.member-shots-number {
			height:40px;
			padding-top:5px;
		}

		.member-socials li a {
			margin-top: 3px;
		}

		.member-infos {
		padding: 10px;
		text-align: left;
		position: relative;
		}

		.member-infos > h1 {
		font-weight: bold;
		font-size: 1.4em;
		}

		.member-location a:before {
		margin-right: 5px;
		}

		.member-location {
		text-indent: 2px;
		}

		.follow,
		.options {
		width: 30px;
		height: 30px;
		text-align: center;
		line-height: 30px;
		background: #D3D3D3;
		text-shadow: 0 1px 0 rgba(255, 255, 255, 0.4);
		box-shadow: 0 2px 0 0 #C0C0C0;
		border-radius: 3px;
		display: inline-block;
		}

		.follow:hover,
		.options:hover {
		box-shadow: 0 1px 0 0 #C0C0C0;
		box-sizing: border-box;
		vertical-align: bottom;
		margin-bottom: -1px;
		}

		.member-socials {
		display: inline-block;
		font-weight: bold;
		vertical-align: bottom;
		line-height: 8px;
		float: right;
		}

		.member-socials li {
		display: inline-block;
		}

		.shots-number,
		.followers {
		font-weight: normal;
		display: block;
		margin-top: 10px;
		font-size: 0.9em;
		}

		.member-contact {
		position: absolute;
		right: 10px;
		top: 10px;
		}

		.member-contact li {
		display: inline-block;
		margin-left: 10px;
		}

		.member-shots-number {
		padding-right: 6px;
		border-right: 1px solid rgba(0, 0, 0, 0.06);
		margin-right: 6px;
		margin-left: 6px;
		}

		.contenedorTime {
			background: #252827;
			font-family: 'Raleway', sans-serif;
			margin-top: 50px;
			text-align: center;
		}
  
		
	</style>
    
   
   <link href="../../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../../js/jquery.mousewheel.js"></script>
      <script src="../../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
</head>

<body>

 <?php echo $resMenu; ?>

<div id="content">

    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Cierre de Caja del Día: <?php echo date('Y-m-d'); ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class="row">
	  			<div class="col-md-6">
	  				<div class="row">
	  					<div class="col-md-6">
							<h4>Total Servicio de Lavado:</h4>
						</div>
						<div class="col-md-6 monto">
							<h4>$ <?php echo number_format($subtotal,2,',','.'); ?></h4>
						</div>
					</div>
				</div>

				<div class="col-md-6">
	  				<div class="row">
	  					<div class="col-md-6">
							<h4>Inicio de Caja:</h4>
						</div>
						<div class="col-md-6 monto">
							<h4>$ <?php echo number_format($caja,2,',','.'); ?></h4>
						</div>
					</div>
				</div>

				<div class="col-md-6">
	  				<div class="row">
	  					<div class="col-md-6">
							<h4>Ingresos/Egresos:</h4>
						</div>
						<div class="col-md-6 monto">
							<h4>$ <?php echo number_format($ingresos,2,',','.'); ?> / <span style="color:#0B991A;"> -$ <?php echo number_format($egresos,2,',','.'); ?></span></h4>
						</div>
					</div>
				</div>


				<div class="col-md-6">
	  				<div class="row">
	  					<div class="col-md-6">
						  <h4>Total:</h4>
						</div>
						<div class="col-md-6 monto">
							<h4>$ <?php echo number_format($total,2,',','.'); ?></h4>
						</div>
					</div>
				</div>
            </div>

			<div class="row">
	  			<div class="col-md-12 contenedorTime">
				  <ul class="timeline">
				  <?php 

					while ($rowTL = mysql_fetch_array($resTimeline)) {
						$resDetalle = $serviciosReferencias->traerTurnosdetallesPorTurno($rowTL[0]);
						$dateEntrada =date_create($rowTL['horaentrada']);
						$dateSalida =date_create($rowTL['horasalida']);


				  ?>
					<li class="event" data-date="<?php echo date_format($dateEntrada,'H:i'); ?> - <?php echo date_format($dateSalida,'H:i'); ?>">
					<div class="member-infos">
						<h1 class='member-title'><?php echo $rowTL['apyn']; ?> / <?php echo $rowTL['vehiculo']; ?></h1>
						<?php
							$subtotalDetalle = 0;
							while ($rowD = mysql_fetch_array($resDetalle)) {
								$subtotalDetalle += $rowD['costo'];
						?>
						<h2 class="member-location "><span class='entypo-location'></span><?php echo $rowD['descripcion']; ?>, Tiempo: <?php echo $rowD['tiempo']; ?></h2>
						<?php } ?>

						<div class="member-parameters">
						<a href="javascript:void(0)" class="follow entypo-plus"></a>
						<a href="javascript:void(0)" class="options entypo-cog"></a>
						<ul class="member-socials">
							<li class="member-shots-number"><a href="javascript:void(0)"><?php echo number_format($subtotalDetalle,2,',','.'); ?> <span class="shots-number">Importe</span></a></li>
							<li class="member-shots-number"><a href="javascript:void(0)"><?php echo number_format($rowTL['descuento'],2,',','.'); ?> <span class="followers">Descuento</span></a></li>
							<li class="member-follower"><a href="javascript:void(0)"><?php echo $rowTL['estado']; ?> <span class="followers">Estado</span></a></li>
						</ul>
						</div>

					</div>

					</li>
					<?php } ?>
				</ul>
				</div>
			</div>
            
            <div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
                    <li>
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Cerrar Caja</button>
                    </li>
                </ul>
                </div>
            </div>
			<input type="hidden" name="accion" id="accion" value="cerrarCaja"/>
            </form>
    	</div>
    </div>
    
 
    
   
</div>


</div>

<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>

<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">
$(document).ready(function(){

	$('.member-title').click(function(e) {
		console.log("Clicked");
		$(this).next().slideToggle();
		$(this).next().next().slideToggle();
		$(this).next().next().next().slideToggle();
		$(this).next().next().next().next().slideToggle();
		$(this).next().next().next().next().next().slideToggle();
		$(this).next().next().next().next().next().next().slideToggle();
		$(this).next().next().next().next().next().next().next().slideToggle();
		$(this).next().next().next().next().next().next().next().next().slideToggle();
		$(this).next().next().next().next().next().next().next().next().next().slideToggle();
	});

	$('#example').dataTable({
		"order": [[ 0, "asc" ]],
		"language": {
			"emptyTable":     "No hay datos cargados",
			"info":           "Mostrar _START_ hasta _END_ del total de _TOTAL_ filas",
			"infoEmpty":      "Mostrar 0 hasta 0 del total de 0 filas",
			"infoFiltered":   "(filtrados del total de _MAX_ filas)",
			"infoPostFix":    "",
			"thousands":      ",",
			"lengthMenu":     "Mostrar _MENU_ filas",
			"loadingRecords": "Cargando...",
			"processing":     "Procesando...",
			"search":         "Buscar:",
			"zeroRecords":    "No se encontraron resultados",
			"paginate": {
				"first":      "Primero",
				"last":       "Ultimo",
				"next":       "Siguiente",
				"previous":   "Anterior"
			},
			"aria": {
				"sortAscending":  ": activate to sort column ascending",
				"sortDescending": ": activate to sort column descending"
			}
		  }
	} );
	

	$("#example").on("click",'.varborrar', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$("#idEliminar").val(usersid);
			$("#dialog2").dialog("open");

			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton eliminar
	
	$("#example").on("click",'.varmodificar', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			
			url = "modificar.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar

	 $( "#dialog2" ).dialog({
		 	
			    autoOpen: false,
			 	resizable: false,
				width:600,
				height:240,
				modal: true,
				buttons: {
				    "Eliminar": function() {
	
						$.ajax({
									data:  {id: $('#idEliminar').val(), accion: '<?php echo $eliminar; ?>'},
									url:   '../../ajax/ajax.php',
									type:  'post',
									beforeSend: function () {
											
									},
									success:  function (response) {
											url = "index.php";
											$(location).attr('href',url);
											
									}
							});
						$( this ).dialog( "close" );
						$( this ).dialog( "close" );
							$('html, body').animate({
	           					scrollTop: '1000px'
	       					},
	       					1500);
				    },
				    Cancelar: function() {
						$( this ).dialog( "close" );
				    }
				}
		 
		 
	 		}); //fin del dialogo para eliminar
			
	<?php 
		echo $serviciosHTML->validacion($tabla);
	
	?>
	

	
	
	//al enviar el formulario
    $('#cargar').click(function(){
		

		//información del formulario
		var formData = new FormData($(".formulario")[0]);
		var message = "";
		//hacemos la petición ajax  
		$.ajax({
			url: '../../ajax/ajax.php',  
			type: 'POST',
			// Form data
			//datos del formulario
			data: formData,
			//necesario para subir archivos via ajax
			cache: false,
			contentType: false,
			processData: false,
			//mientras enviamos el archivo
			beforeSend: function(){
				$("#load").html('<img src="../../imagenes/load13.gif" width="50" height="50" />');       
			},
			//una vez finalizado correctamente
			success: function(data){

				if (data == '') {
										$(".alert").removeClass("alert-danger");
										$(".alert").removeClass("alert-info");
										$(".alert").addClass("alert-success");
										$(".alert").html('<strong>Ok!</strong> Se cerro la caja correctamente</strong>. ');
										$(".alert").delay(3000).queue(function(){
											/*aca lo que quiero hacer 
												después de los 2 segundos de retraso*/
											$(this).dequeue(); //continúo con el siguiente ítem en la cola
											
										});
										$("#load").html('');

										
										
									} else {
										$(".alert").removeClass("alert-danger");
										$(".alert").addClass("alert-danger");
										$(".alert").html('<strong>Error!</strong> '+data);
										$("#load").html('');
									}
			},
			//si ha ocurrido un error
			error: function(){
				$(".alert").html('<strong>Error!</strong> Actualice la pagina');
				$("#load").html('');
			}
		});
	
    });

});
</script>

<script type="text/javascript">
$('.form_date').datetimepicker({
	language:  'es',
	weekStart: 1,
	todayBtn:  1,
	autoclose: 1,
	todayHighlight: 1,
	startView: 2,
	minView: 2,
	forceParse: 0,
	format: 'dd/mm/yyyy'
});
</script>
<?php } ?>
</body>
</html>
