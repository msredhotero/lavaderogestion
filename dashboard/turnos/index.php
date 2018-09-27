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
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Turnos",$_SESSION['refroll_predio'],'');


/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Turno";

$plural = "Turnos";

$eliminar = "eliminarTurnos";

$insertar = "insertarTurnos";

$tituloWeb = "Gestión: Bellwash";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla 			= "dbturnos";

$lblCambio	 	= array("fechaingreso","refclientes", "refvehiculos","horaentrada","horasalida","refestados","reftipomovimientos");
$lblreemplazo	= array("Fecha de Ingreso", "Cliente", "Vehiculo","Hora Entrada","Hora Salida","Estados","Tipo Movimiento");


$resVehiculos = $serviciosReferencias->traerVehiculosClientes();
$cadRefVehiculos 	= $serviciosFunciones->devolverSelectBox($resVehiculos,array(1,3,4),' - ');

$res1 	= $serviciosReferencias->traerClientes();
$cadRef 	= $serviciosFunciones->devolverSelectBox($res1,array(1,2),', ');

$res2 	= $serviciosReferencias->traerVehiculosClientes();
$cadRef2 	= $serviciosFunciones->devolverSelectBox($res2,array(1,3,4),' ');

$res3 = $serviciosReferencias->traerEstadosPorIn('3,4,5');
$cadRef3 = $serviciosFunciones->devolverSelectBox($res3,array(1),' ');

$res4 = $serviciosReferencias->traerTipomovimientosPorId(5);
$cadRef4 = $serviciosFunciones->devolverSelectBox($res4,array(1),' ');

$refdescripcion = array(0 => $cadRef,1 => $cadRef2,2 => $cadRef3,3 => $cadRef4);
$refCampo 	=  array("refclientes","refvehiculos","refestados","reftipomovimientos");
//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$resServicios = $serviciosReferencias->traerServicios();


/////////////////////// Opciones para la creacion del view  patente,refmodelo,reftipovehiculo,anio/////////////////////
$cabeceras 		= "	<th>Ingreso</th>
					<th>Dueño</th>
					<th>Vehiculo</th>
					<th>Hora Entrada</th>
					<th>Hora Salida</th>
					<th>Usuario</th>
					<th>Estado</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////




$formulario 	= $serviciosFunciones->camposTabla($insertar ,$tabla,$lblCambio,$lblreemplazo,$refdescripcion,$refCampo);

$lstCargados 	= $serviciosFunciones->camposTablaViewSinAcciones($cabeceras,$serviciosReferencias->traerTurnosGrid(),7);


/*************** para el formulario de clientes */
/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla2 			= "dbclientes";

$lblCambio2	 	= array("nrodocumento","fechanacimiento","telefono","direccion");
$lblreemplazo2	= array("Nro Documento","Fecha Nacimiento","Teléfono","dirección");

$refdescripcion2 = array();
$refCampo2 	=  array();

$formularioClientes 	= $serviciosFunciones->camposTabla('insertarClientesV' ,$tabla2,$lblCambio2,$lblreemplazo2,$refdescripcion2,$refCampo2);


//////////////////////////////////////////////  FIN de los opciones //////////////////////////
/*********** fin el formulario de clientes */


/*********** para el formulario de vehiculos */
/////////////////////// Opciones para la creacion del formulario  /////////////////////
$tabla3 			= "dbvehiculos";

$lblCambio3	 	= array("refmodelo","reftipovehiculo", "anio");
$lblreemplazo3	= array("Marca/Modelo", "Tipo", "Año");


$resModelo 	= $serviciosReferencias->traerModelo();
$cadRefModelo 	= $serviciosFunciones->devolverSelectBox($resModelo,array(2,1),' - ');

$resTipo 	= $serviciosReferencias->traerTipovehiculo();
$cadRefTV 	= $serviciosFunciones->devolverSelectBox($resTipo,array(1),'');

$refdescripcion3 = array(0 => $cadRefModelo,1 => $cadRefTV);
$refCampo3 	=  array("refmodelo","reftipovehiculo");

$formularioVehiculo 	= $serviciosFunciones->camposTabla('insertarClientesV' ,$tabla3,$lblCambio3,$lblreemplazo3,$refdescripcion3,$refCampo3);
$formularioVehiculoSimple 	= $serviciosFunciones->camposTabla('insertarVehiculosSimple' ,$tabla3,$lblCambio3,$lblreemplazo3,$refdescripcion3,$refCampo3);

//////////////////////////////////////////////  FIN de los opciones //////////////////////////

/*********** fin el formulario de vehiculos */

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
	<link rel="stylesheet" type="text/css" href="../../css/jquery.datetimepicker.css"/>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../../css/chosen.css">
	<style type="text/css">
		.chosen-single {
			z-index: 9999999;
		}

		.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } 
		.datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; 
				background: #fff; overflow: hidden; border: 1px solid #006699; 
				-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
		.datagrid table td, .datagrid table th { padding: 8px 8px; }
		.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
		background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');
		background-color:#006699; color:#FFFFFF; 
		font-size: 1.6em; font-weight: bold; border-left: 1px solid #0070A8; } 
		.datagrid table thead th:first-child { border: none; }
		.datagrid table tbody td { color: #00557F; border-left: 1px solid #E1EEF4;font-size: 14px;font-weight: normal; }
		.datagrid table tbody .alt td { background: #E1EEf4; color: #00557F; }
		.datagrid table tbody td:first-child { border-left: none; }
		.datagrid table tbody tr:last-child td { border-bottom: none; }
		.datagrid table tfoot td div { border-top: 1px solid #006699;background: #E1EEf4;} 
		.datagrid table tfoot td { padding: 6px; font-size: 16px } 
		.datagrid table tfoot td div{ padding: 2px; }
		.datagrid table tfoot td ul { margin: 0; padding:0; list-style: none; text-align: right; }
		.datagrid table tfoot  li { display: inline; }
		.datagrid table tfoot li a { text-decoration: none; display: inline-block;  
		padding: 2px 8px; margin: 1px;color: #FFFFFF;border: 2px solid #006699;
		-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; 
		background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );
		background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');
		background-color:#006699; }
		.datagrid table tfoot ul.active, .datagrid table tfoot ul a:hover { text-decoration: none;border-color: #00557F; color: #FFFFFF; background: none; background-color:#006699;}
		div.dhtmlx_window_active, div.dhx_modal_cover_dv { position: fixed !important; }
		
		.datagrid table tfoot {
			background-color: #E1EEf4;
			color:#00557F;
			border-top: 1px solid #006699;
			font-size: 1.6em;
		}

		input[type=checkbox] { -ms-transform: scale(2); /* IE */
  -moz-transform: scale(2); /* FF */
  -webkit-transform: scale(2); /* Safari and Chrome */
  -o-transform: scale(2); /* Opera */
  padding: 10px; } /* to hide the checkbox itself */


		
		
	</style>
	<link rel="stylesheet" href="../../css/chosen.css">
    
   
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
        	<p style="color: #fff; font-size:18px; height:16px;">Carga de <?php echo $plural; ?></p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class="row">

				<div class="form-group col-md-6" style="display:block">
					<label for="refvehiculos" class="control-label" style="text-align:left">Vehiculo</label>
					<div class="input-group col-md-12">
						<select style="width:100%;" data-placeholder="selecione la Patente..." id="refvehiculos" name="refvehiculos" class="chosen-select" tabindex="2">
						<?php echo $cadRef2; ?>
						</select>
						<span class="input-group-addon"><span class="glyphicon glyphicon-plus-sign"></span></span>
						<span style="background-color:#55CD59;  color: white;  font-weight: bold;" class="input-group-addon agregarVehiculo"><a style="color:white;text-decoration: none;" href="javascript:void(0)">Agregar</a></span>
					</div>
				</div>

				<div class="form-group col-md-6" style="display:block">
					<label for="refclientes" class="control-label" style="text-align:left">Cliente</label>
					<div class="input-group col-md-12">
						<select class="form-control" id="refclientes" name="refclientes">
						
						</select>
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<!--<span style="background-color:#F68A09;  color: white;  font-weight: bold; cursor: pointer;" class="input-group-addon"><span class="glyphicon glyphicon-zoom-in buscarVehiculo"></span></span>-->
						<span style="background-color:#55CD59;  color: white;  font-weight: bold;" class="input-group-addon agregarCliente"><a style="color:white;text-decoration: none;" href="javascript:void(0)">Nuevo</a></span>
					</div>
				</div>


				

				<div class="form-group col-md-12">
					<div class="datagrid">
						<table>
							<thead>
								<tr>
									<th style="text-align:center;">Servicio</th>
									<th style="text-align:center;">Costo</th>
									<th style="text-align:center;">Tiempo</th>
									<th style="text-align:center;">Seleccionar</th>
								</tr>
							</thead>
							<tfoot><div>
	  							<tr>
	  								<td>Sub-Total:</td>
									<td><span class="glyphicon glyphicon-usd"></span> <span class="subtotal">0</span></td>
									<td>Tiempo Estimado:</td>    
									<td><span class="glyphicon glyphicon-time"></span> <span class="totaltiempo">0</span> Minutos</td>
								</tr></div>
							</tfoot>
							<tbody id="lstServicios">
							  <?php 
								  $i=1;
								  while ($row = mysql_fetch_array($resServicios)) {
							  ?>
							  <?php if (($i % 2) == 0) { ?>
								<tr class="alt">
									<td style="font-size:1.4em;"><?php echo $row['descripcion']; ?></td>
									<td style="font-size:1.4em;text-align:center;" id="costo<?php echo $row['idservicio']; ?>" class="costo"><?php echo $row['costo']; ?></td>
									<td style="font-size:1.4em;text-align:center;" id="tiempo<?php echo $row['idservicio']; ?>" class="tiempo"><?php echo $row['tiempo']; ?></td>
									<td style="text-align:center;"><input type="checkbox" class="seleccionar form-control" name="<?php echo $row['idservicio']; ?>" id="<?php echo $row['idservicio']; ?>"/></td>
								</tr>
								<?php
							  	} else {
								?>
								<tr>
									<td style="font-size:1.4em;"><?php echo $row['descripcion']; ?></td>
									<td style="font-size:1.4em;text-align:center;" id="costo<?php echo $row['idservicio']; ?>" class="costo"><?php echo $row['costo']; ?></td>
									<td style="font-size:1.4em;text-align:center;" id="tiempo<?php echo $row['idservicio']; ?>" class="tiempo"><?php echo $row['tiempo']; ?></td>
									<td style="text-align:center;"><input type="checkbox" class="seleccionar form-control" name="<?php echo $row['idservicio']; ?>" id="<?php echo $row['idservicio']; ?>"/></td>
								</tr>
								<?php
									$i += 1;
								  }
								}
								?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="form-group col-md-3" style="display:block">
					<label for="descuento" class="control-label" style="text-align:left">Descuento</label>
					<div class="input-group col-md-12">
						<span class="input-group-addon">$</span>
						<input type="text" class="form-control" id="descuento" name="descuento" value="0" required>
						<span class="input-group-addon">.00</span>
					</div>
				</div>

				<div class="form-group col-md-3">
					<label for="fechaingreso" class="control-label" style="text-align:left">Fecha De Ingreso</label>
					<div class="input-group col-md-12">
						<input class="form-control" type="text" value="" name="fechaingreso" id="fechaingreso"/>
					</div>
					
				</div>
										
				<div class="form-group col-md-3">
					<label for="horaentrada" class="control-label" style="text-align:left">Hora Entrada</label>
					<div class="input-group col-md-12">
						<input class="form-control" type="text" value="" name="horaentrada" id="horaentrada"/>
					</div>
					
				</div>
						
						
										
				<div class="form-group col-md-3">
					<label for="horasalida" class="control-label" style="text-align:left">Hora Salida</label>
					<div class="input-group col-md-12">
						<input class="form-control" type="text" value="" name="horasalida" id="horasalida"/>
					</div>
					
				</div>
					
				
				<div class="form-group col-md-6" style="display:block">
					<label for="refestados" class="control-label" style="text-align:left">Estados</label>
					<div class="input-group col-md-12">
						<select class="form-control" id="refestados" name="refestados">
							<?php echo $cadRef3; ?>
						</select>
					</div>
				</div>
			
				
				<div class="form-group col-md-6" style="display:none;">
					<label for="reftipomovimientos" class="control-label" style="text-align:left">Tipo Movimiento</label>
					<div class="input-group col-md-12">
						<select class="form-control" id="reftipomovimientos" name="reftipomovimientos">
						<?php echo $cadRef4; ?>
						</select>
					</div>
				</div>
				
				<input type="hidden" id="accion" name="accion" value="insertarTurnos"/>
				<input type="hidden" id="usuacrea" name="usuacrea" value="usuacrea"/>
            </div>
            
            
            <div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
            
            <div class="row" style="margin-top:-25px;">
                <div class="col-md-12">
                <ul class="list-inline" style="margin-top:15px;">
					
                    <li>
                        <button type="button" class="btn btn-primary" id="cargar" style="margin-left:0px;">Guardar</button>
                    </li>
					<li class="navbar-right" style="font-size:2em; padding-right:10%;">
						Monto a Pagar: <input id="total" style="padding:16px; font-size:1.9em; width:250px;" name="total" placeholder="Total con..." required="" type="text" value="0">
					</li>
                </ul>
                </div>
			</div>
			<div style="padding-bottom: 80px;"></div>
            </form>
    	</div>
    </div>
    
    <div class="boxInfoLargo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;"><?php echo $plural; ?> Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<?php echo $lstCargados; ?>
    	</div>
    </div>
    
    

    
    
   
</div>


</div>

<form class="form-inline formulario" role="form">
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Cargar Cliente Nuevo</h4>
      </div>
      <div class="modal-body">
		<div class="row">
        <?php echo $formularioClientes; ?>
		</div>
		<hr>
		<div class="row">
			<h4 style="padding-left:15px;">Cargar el vehiculo</h4>				
		</div>
		<hr>
		<div class="row">
		<?php echo $formularioVehiculo; ?>
		</div>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-primary" id="cargarCliente">Guardar</button>						
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>


<form class="form-inline formulario" role="form">
<div id="modalVehiculos" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Nuevo Vehiculo</h4>
      </div>
      <div class="modal-body">

		<div class="row">
		<?php echo str_replace('anio','anio2',str_replace('patente','patente2',$formularioVehiculoSimple)); ?>
		<div class="col-md-12">
		<h4>* Recuerde que el vehiculo se le asignara al cliente "General"</h4>
		</div>
		<input type="hidden" id="refclientes2" name="refclientes2" value=""/>
		</div>
      </div>
      <div class="modal-footer">
	  <button type="button" class="btn btn-primary" id="cargarVehiculo">Guardar</button>						
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</form>

<div id="dialog2" title="Eliminar <?php echo $singular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el <?php echo $singular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Si elimina el <?php echo $singular; ?> se perderan todos los datos de este</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>
<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../js/jquery.datetimepicker.full.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
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

	$('.agregarCliente').click(function() {
		$('#myModal').modal();
	});

	$('.agregarVehiculo').click(function() {
		$('#refclientes2').val($('#refclientes').val());
		$('#modalVehiculos').modal();
	});

	$('#refclientes').change(function() {
		traerVehiculosPorCliente($('#refclientes').val());
	});

	$('.buscarVehiculo').click(function() {
		traerVehiculosPorCliente($('#refclientes').val());
	});

	function traerVehiculosPorCliente(cliente) {
		$.ajax({
			data:  {id: cliente, 
					accion: 'traerVehiculosPorCliente'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('#refvehiculos').html('');	
			},
			success:  function (response) {
				if (response == '') {
					$('#refvehiculos').append('<option value="0">No se encontraron vehiculos cargados</option>');
				} else {
					$('#refvehiculos').append(response);
				}
					
			}
		});
	}

	function traerClientesPorVehiculo(Vehiculo) {
		$.ajax({
			data:  {id: Vehiculo, 
					accion: 'traerClientesPorVehiculo'},
			url:   '../../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
				$('#refclientes').html('');	
			},
			success:  function (response) {
				if (response == '') {
					$('#refclientes').append('<option value="1">General</option>');
				} else {
					$('#refclientes').append(response);
				}
					
			}
		});
	}

	traerClientesPorVehiculo($('#refvehiculos').val());

	$('#refvehiculos').change(function() {
		traerClientesPorVehiculo($('#refvehiculos').val());
	});

	
	$("#lstServicios").on("click",'.seleccionar', function(){
		$('#descuento').val(0);

		var usersid =  $(this).attr("id");

		if (!isNaN(usersid)) {
			costo = $('#costo' + usersid.toString()).html();
			tiempo = $('#tiempo' + usersid.toString()).html();
			if ($(this).prop('checked')) {
				$('.subtotal').html(parseFloat($('.subtotal').html()) + parseFloat(costo));
				$('.totaltiempo').html(parseInt($('.totaltiempo').html()) + parseInt(tiempo));
				setearFechaSalida(parseInt($('.totaltiempo').html()));
				$('#total').val(parseFloat($('.subtotal').html()));
			} else {
				$('.subtotal').html(parseFloat($('.subtotal').html()) - parseFloat(costo));
				$('.totaltiempo').html(parseInt($('.totaltiempo').html()) - parseInt(tiempo));
				setearFechaSalida(parseInt($('.totaltiempo').html()));
				$('#total').val(parseFloat($('.subtotal').html()));
			}
			
		} else {
			alert("Error, vuelva a realizar la acción.");	
		}

	});//fin del boton seleccionar

	$('#descuento').change(function() {
		subtotal = $('.subtotal').html();
		if ($(this).val() > parseFloat(subtotal)) {
			$('#total').val(0);
		} else {
			$('#total').val(parseFloat(subtotal) - $(this).val());
		}
	})

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
			
	function validador(){

		$error = "";


		if ($("#fechaingreso").val() == "") {
			$error = "Es obligatorio el campo Fechaingreso.";
			$("#fechaingreso").addClass("alert-danger");
			$("#fechaingreso").attr("placeholder",$error);
		}
	
	
		if ($("#refestados").val() == "") {
			$error = "Es obligatorio el campo Refestados.";
			$("#refestados").addClass("alert-danger");
			$("#refestados").attr("placeholder",$error);
		}
	
	

		if ($("#descuento").val() == "") {
			$error = "Es obligatorio el campo Descuento.";
			$("#descuento").addClass("alert-danger");
			$("#descuento").attr("placeholder",$error);
		}

		
		
		return $error;
	}
	

	
	
	//al enviar el formulario
    $('#cargar').click(function(){

		if (validador() == "")
        {
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
						$(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong><?php echo $singular; ?></strong>. ');
						$(".alert").delay(3000).queue(function(){
							/*aca lo que quiero hacer 
								después de los 2 segundos de retraso*/
							$(this).dequeue(); //continúo con el siguiente ítem en la cola
							
						});
						$("#load").html('');
						url = "index.php";
						$(location).attr('href',url);
						
						
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
		}
    });

    function addMinutes(date, minutes) {
	    return new Date(date.getTime() + minutes*60000);
	}

    function setearFechaSalida(minutos) {
    	var fechaEntrada = $('#horaentrada').datetimepicker('getValue');

    	var fechaSalida = new Date(fechaEntrada);
    	
    	fechaSalida = addMinutes(fechaSalida, parseInt(minutos));

    	//alert(fechaSalida);
    	var mesNuevo = '0' + (fechaSalida.getMonth() + 1).toString();
    	var diasNuevo = '0' + fechaSalida.getDate().toString();
    	var horasNuevo = '0' + fechaSalida.getHours().toString();
    	var minutosNuevo = '0' + fechaSalida.getMinutes().toString();

    	var nuevaFecha = fechaSalida.getFullYear().toString() + '-' + mesNuevo.slice(-2) + '-' + diasNuevo.slice(-2) + ' ' + horasNuevo.slice(-2) + ':' + minutosNuevo.slice(-2);
    	$('#horasalida').val(nuevaFecha);

    }

	$('#fechaingreso').datetimepicker({
	dayOfWeekStart : 1,
	format: 'Y-m-d H:i',
	defaultDate:new Date()
	});
	$.datetimepicker.setLocale('es');
	$('#fechaingreso').datetimepicker({step:10});

	$('#fechaingreso').val('<?php echo date('Y-m-d H:i'); ?>');


	
	$('#horaentrada').datetimepicker({
		format: 'Y-m-d H:i',
		minDate:'<?php echo date('Y-m-d'); ?> 10:00',
		onSelectDate:function(ct,$i){
		  setearFechaSalida(parseInt($('.totaltiempo').html()));
		},
		onSelectTime:function(ct,$i){
		  setearFechaSalida(parseInt($('.totaltiempo').html()));
		}
	});
	$.datetimepicker.setLocale('es');
	$('#horaentrada').datetimepicker({step:10});

	$('#horaentrada').val('<?php echo date('Y-m-d H:i'); ?>');

	$('#horasalida').datetimepicker({
	dayOfWeekStart : 1,
	format: 'Y-m-d H:i'
	});
	$.datetimepicker.setLocale('es');
	$('#horasalida').datetimepicker({step:10});

	$('#horasalida').val('<?php echo date('Y-m-d H:i'); ?>');

	$('#fechanacimiento').datetimepicker({
	dayOfWeekStart : 1,
	format: 'Y-m-d',
	mask:true,
	});
	$.datetimepicker.setLocale('es');


	$("#apellido").click(function(event) {
		$("#apellido").removeClass("alert-danger");
		if ($(this).val() == "") {
			$("#apellido").attr("value","");
			$("#apellido").attr("placeholder","Ingrese el Apellido...");
		}
	});

	$("#apellido").change(function(event) {
		$("#apellido").removeClass("alert-danger");
		$("#apellido").attr("placeholder","Ingrese el Apellido");
	});
	
	

	$("#nombre").click(function(event) {
		$("#nombre").removeClass("alert-danger");
		if ($(this).val() == "") {
			$("#nombre").attr("value","");
			$("#nombre").attr("placeholder","Ingrese el Nombre...");
		}
	});

	$("#nombre").change(function(event) {
		$("#nombre").removeClass("alert-danger");
		$("#nombre").attr("placeholder","Ingrese el Nombre");
	});
	
	

	$("#nrodocumento").click(function(event) {
		$("#nrodocumento").removeClass("alert-danger");
		if ($(this).val() == "") {
			$("#nrodocumento").attr("value","");
			$("#nrodocumento").attr("placeholder","Ingrese el Nrodocumento...");
		}
	});

	$("#nrodocumento").change(function(event) {
		$("#nrodocumento").removeClass("alert-danger");
		$("#nrodocumento").attr("placeholder","Ingrese el Nrodocumento");
	});
						
				
	function validadorCliente(){

		$error = "";
		
		
		if ($("#apellido").val() == "") {
			$error = "Es obligatorio el campo Apellido.";
			$("#apellido").addClass("alert-danger");
			$("#apellido").attr("placeholder",$error);
		}
	
	

		if ($("#nombre").val() == "") {
			$error = "Es obligatorio el campo Nombre.";
			$("#nombre").addClass("alert-danger");
			$("#nombre").attr("placeholder",$error);
		}
	
	

		if ($("#nrodocumento").val() == "") {
			$error = "Es obligatorio el campo Nrodocumento.";
			$("#nrodocumento").addClass("alert-danger");
			$("#nrodocumento").attr("placeholder",$error);
		}
			
			
		return $error;
	}


	$("#patente").click(function(event) {
		$("#patente").removeClass("alert-danger");
		if ($(this).val() == "") {
			$("#patente").attr("value","");
			$("#patente").attr("placeholder","Ingrese el Patente...");
		}
	});

	$("#patente").change(function(event) {
		$("#patente").removeClass("alert-danger");
		$("#patente").attr("placeholder","Ingrese el Patente");
	});
	
	

	$("#anio").click(function(event) {
		$("#anio").removeClass("alert-danger");
		if ($(this).val() == "") {
			$("#anio").attr("value","");
			$("#anio").attr("placeholder","Ingrese el Anio...");
		}
	});

	$("#anio").change(function(event) {
		$("#anio").removeClass("alert-danger");
		$("#anio").attr("placeholder","Ingrese el Anio");
	});
					
						
	function validadorVehiculo(){

		$error = "";
		
		
		if ($("#patente").val() == "") {
			$error = "Es obligatorio el campo Patente.";
			$("#patente").addClass("alert-danger");
			$("#patente").attr("placeholder",$error);
		}

		if ($("#anio").val() == "") {
			$error = "Es obligatorio el campo Anio.";
			$("#anio").addClass("alert-danger");
			$("#anio").attr("placeholder",$error);
		}
			
			
		return $error;
	}


	function validadorVehiculo2(){

		$error = "";


		if ($("#patente2").val() == "") {
			$error = "Es obligatorio el campo Patente.";
			$("#patente2").addClass("alert-danger");
			$("#patente2").attr("placeholder",$error);
		}

		if ($("#anio2").val() == "") {
			$error = "Es obligatorio el campo Anio.";
			$("#anio2").addClass("alert-danger");
			$("#anio2").attr("placeholder",$error);
		}
			
			
		return $error;
	}


	//al enviar el formulario
    $('#cargarCliente').click(function(){
		var val1 = validadorCliente();
		var val2 = validadorVehiculo();
		if ((val2 == "") && (val2 == ""))
        {
			//información del formulario
			var formData = new FormData($(".formulario")[1]);
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
						$(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong><?php echo $singular; ?></strong>. ');
						$(".alert").delay(3000).queue(function(){
							/*aca lo que quiero hacer 
								después de los 2 segundos de retraso*/
							$(this).dequeue(); //continúo con el siguiente ítem en la cola
							
						});
						$("#load").html('');
						url = "index.php";
						$(location).attr('href',url);
						
						
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
		}
    });

	//al enviar el formulario
    $('#cargarVehiculo').click(function(){

		var val2 = validadorVehiculo2();
		if (val2 == "")
        {
			//información del formulario
			var formData = new FormData($(".formulario")[2]);
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
						$(".alert").html('<strong>Ok!</strong> Se cargo exitosamente el <strong><?php echo $singular; ?></strong>. ');
						$(".alert").delay(3000).queue(function(){
							/*aca lo que quiero hacer 
								después de los 2 segundos de retraso*/
							$(this).dequeue(); //continúo con el siguiente ítem en la cola
							
						});
						$("#load").html('');
						url = "index.php";
						$(location).attr('href',url);
						
						
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
		}
    });

	

});
</script>
<script src="../../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
	}
	
	
  </script>

<?php } ?>
</body>
</html>
