<?php

session_start();

if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../error.php');
} else {


include ('../includes/funcionesUsuarios.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funciones.php');
include ('../includes/funcionesReferencias.php');

$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosFunciones = new Servicios();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu($_SESSION['nombre_predio'],"Dashboard",$_SESSION['refroll_predio'],'');

/////////////////////// Opciones pagina ///////////////////////////////////////////////
$singular = "Orden";

$plural = "Ordenes";

$eliminar = "eliminarOrdenes";

$insertar = "insertarOrdenes";

$tituloWeb = "Gestión: Talleres";
//////////////////////// Fin opciones ////////////////////////////////////////////////


/////////////////////// Opciones para la creacion del formulario  /////////////////////

/////////////////////// Opciones para la creacion del view  patente,refmodelo,reftipovehiculo,anio/////////////////////
$cabeceras 		= "	<th>Ingreso</th>
					<th>Dueño</th>
					<th>Vehiculo</th>
					<th>Hora Entrada</th>
					<th>Hora Salida</th>
					<th>Usuario</th>
					<th>Estado</th>";

//////////////////////////////////////////////  FIN de los opciones //////////////////////////

$lstCargados 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosReferencias->traerTurnosGridPorEstadoIn('3,4,5'),93);
$lstCargadosMora 	= $serviciosFunciones->camposTablaView($cabeceras,$serviciosReferencias->traerTurnosGridPorEstadoIn('1'),93);


$resEstado 	= $serviciosReferencias->traerEstados();
$cadRefEstado 	= $serviciosFunciones->devolverSelectBox($resEstado,array(1),'');

?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">



<title>Gesti&oacute;n: Bellwash</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../css/jquery-ui.css">

    <script src="../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>




    
   
   <link href="../css/perfect-scrollbar.css" rel="stylesheet">
      <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
      <script src="../js/jquery.mousewheel.js"></script>
      <script src="../js/perfect-scrollbar.js"></script>
      <script>
      jQuery(document).ready(function ($) {
        "use strict";
        $('#navigation').perfectScrollbar();
      });
    </script>
</head>

<body>

 
<?php echo str_replace('..','../dashboard',$resMenu); ?>

<div id="content">

<h3>Bienvenido</h3>

    <div class="boxInfoLargo tile-stats tile-white stat-tile">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Turnos Cargados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert errorModificarEstado'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
    		<?php echo $lstCargados; ?>
    	</div>
    </div>
    
    
    <div class="boxInfoLargo tile-stats tile-white stat-tile">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Finalizados</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>
    		<?php echo $lstCargadosMora; ?>
    	</div>
    </div>
    
    
    
    
    
   
</div>


</div>



<div class="modal fade" id="myModalcaja" tabindex="1" style="z-index:500000;" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Inicio de Caja</h4>
      </div>
      <div class="modal-body inicioCaja">
      	<div class="row">
        <div class="form-group col-md-6 col-xs-6" style="display:'.$lblOculta.'">
            <label for="'.$campo.'" class="control-label" style="text-align:left">Fecha</label>
            <div class="input-group date form_date col-md-6 col-xs-6" data-date="" data-date-format="dd MM yyyy" data-link-field="fechacaja" data-link-format="yyyy-mm-dd">
                <input class="form-control" size="50" type="text" value="<?php echo date('Y-m-d'); ?>" readonly>
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
            <input type="hidden" name="fechacaja" id="fechacaja" value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class="col-md-6">
        	<label class="control-label">Ingresa Inicio de Caja</label>
            <div class="col-md-12 input-group">
            	<input type="number" class="form-control valor" id="cajainicio" name="cajainicio" value="5" required />
            </div>
        </div>
        </div>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarcaja">Guardar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cambio de Estado</h4>
      </div>
      <div class="modal-body estados">
        <div class="form-group col-md-6" style="display:block">
			<label for="reftipomovimientos" class="control-label" style="text-align:left">Estado</label>
			<div class="input-group col-md-12">
				<select class="form-control" id="refestados" name="refestados">
					<?php echo $cadRefEstado; ?>
				</select>
			</div>
		</div>
		<div class="form-group col-md-6" style="display:block">
			<p>* Recuerde que si Finaliza/Cancela el turno, solo el Administrador podrá revertir esta situación.</p>
		</div>
        <input type="hidden" id="idturnoestado" name="idturnoestado" value="0">
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-warning" data-dismiss="modal" id="modificarEstado">Modificar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="dialog2" title="Eliminar <?php echo $singular; ?>">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar el <?php echo $singular; ?>?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>Si elimina el <?php echo $singular; ?> se perderan todos los datos de este</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>
<script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
<script src="../bootstrap/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	
	
	$('table.table').dataTable({
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

	
	function modificarEstadoPorTurno(idturno, idestado) {
		$.ajax({
			data:  {id: idturno,
					idestado: idestado,
					accion: 'modificarEstadoPorTurno'},
			url:   '../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
					
			},
			success:  function (response) {
				if (response != '') {
					$(".alert").removeClass("alert-success");
					$(".alert").removeClass("alert-danger");
                    $(".alert").addClass("alert-danger");
                    $(".errorModificarEstado").html('<strong>Error!</strong> '+response);
				} else {
					url = "index.php";
					$(location).attr('href',url);
				}
			}
		});
	}

	$('#modificarEstado').click(function() {
		modificarEstadoPorTurno($('#idturnoestado').val(), $('#refestados').val());
	});


	$('#guardarcaja').click(function() {

		$.ajax({
			data:  {fecha: $('#fechacaja').val(),
					inicio: $('.valor').val(), 
					accion: 'insertarCajadiaria'},
			url:   '../ajax/ajax.php',
			type:  'post',
			beforeSend: function () {
					
			},
			success:  function (response) {
				$('.detallePedido').html(response);	
				traerCaja();
			}
		});
});

function traerCaja() {
$.ajax({
	data:  {fecha: $('#fechacaja').val(),
			accion: 'traerCajadiariaPorFecha'},
	url:   '../ajax/ajax.php',
	type:  'post',
	beforeSend: function () {
			
	},
	success:  function (response) {
		$('.valor').val(response);
	}
});
}

traerCaja();
	


	$('table.table').on("click",'.varestados', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			$('#myModal2').modal();
			$('#idturnoestado').val(usersid);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton cambiar estados


	$('table.table').on("click",'.varborrar', function(){
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
	
	$('table.table').on("click",'.varmodificar', function(){
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			
			url = "ordenes/modificar.php?id=" + usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton modificar
	
	
	$('table.table').on("click",'.varpagar', function(){
		
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {
			
			url = "pagos/pagar.php?id="+usersid;
			$(location).attr('href',url);
		  } else {
			alert("Error, vuelva a realizar la acción.");	
		  }
	});//fin del boton pagos
	
	
	$('table.table').on("click",'.varpagos', function(){
			
		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {

			$.ajax({
					data:  {id: usersid, accion: 'traerPagosPorOrden'},
					url:   '../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							
					},
					success:  function (response) {
							$('.userasignates').html(response);
							
					}
			});
			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error redo action.");	
		  }
	});//fin del boton eliminar
	
	
	$('table.table').on("click",'.varfinalizar', function(){

		  usersid =  $(this).attr("id");
		  if (!isNaN(usersid)) {

			$.ajax({
					data:  {id: usersid, usuario: '<?php echo $_SESSION['nombre_predio']; ?>', accion: 'finalizarOrden'},
					url:   '../ajax/ajax.php',
					type:  'post',
					beforeSend: function () {
							
					},
					success:  function (response) {
							if (response == '') {
								$(".alert").removeClass("alert-danger");
								$(".alert").removeClass("alert-info");
								$(".alert").addClass("alert-success");
								$(".alert").html('<strong>Ok!</strong> Se finalizo exitosamente la <strong>Orden</strong>. ');
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
								$(".alert").html('<strong>Error!</strong> '+response);
								$("#load").html('');
							}
							
					}
			});
			
			//url = "../clienteseleccionado/index.php?idcliente=" + usersid;
			//$(location).attr('href',url);
		  } else {
			alert("Error redo action.");	
		  }
	});//fin del boton eliminar
	
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
									url:   '../ajax/ajax.php',
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

	


});
</script>
<?php } ?>
</body>
</html>
