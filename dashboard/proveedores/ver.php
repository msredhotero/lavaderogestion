<?php

session_start();

if (!isset($_SESSION['usua_se']))
{
	header('Location: /lacalderadeldiablo/vistas/');
} else {

require '../../includes/funcionesHTML.php';
$serviciosHTML = new ServiciosHTML();
$resMenu = $serviciosHTML->menu($_SESSION['usua_se'],'Proveedores',$_SESSION['rol_se']);

require '../../includes/funcionesProductos.php';


$serviciosProductos = new ServiciosProductos();

$resProveedores = $serviciosProductos->traerProveedores();

?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestión de Cancha: La Caldera del Diablo</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    
    <script src="../../js/jquery-ui.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		
		
	</style>
    
<script src="../../js/dashboard.js"></script>
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

<div id="ingoGral" style=" margin-left:240px; padding-top:20px;">

	
    <div class="boxInfo">
        <div id="headBoxInfo">
        	<p style="color: #fff; font-size:18px; height:16px;">Proveedores Cargados</p>
        </div>
    	<div class="cuerpoBox">
        <button type="button" class="btn btn-primary nuevo" style="margin-left:0px;">Nuevo Proveedor</button>
        	<table class="table table-striped">
            	<thead>
                	<tr>
                    	<th>Proveedor</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Cuit</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <!--proveedor,direccion, telefono, cuit, nombre, email -->
                	<?php
						if (mysql_num_rows($resProveedores)>0) {
							while ($row = mysql_fetch_array($resProveedores)) {
					?>
                    	<tr>
                        	<td><?php echo utf8_encode($row['proveedor']); ?></td>
                            <td><?php echo utf8_encode($row['direccion']); ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['cuit']; ?></td>
                            <td><?php echo utf8_encode($row['nombre']); ?></td>
                            <td><?php echo utf8_encode($row['email']); ?></td>
                            <td>
                            		<div class="btn-group">
										<button class="btn btn-success" type="button">Acciones</button>
										
										<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
										</button>
										
										<ul class="dropdown-menu" role="menu">
											<li>
											<a href="javascript:void(0)" class="varmodificar" id="<?php echo $row['idproveedor']; ?>">Modificar</a>
											</li>

											<li>
											<a href="javascript:void(0)" class="varborrar" id="<?php echo $row['idproveedor']; ?>">Borrar</a>
											</li>

										</ul>
									</div>
                             </td>
                        </tr>
                    <?php } ?>
                    <?php } else { ?>
                    	<h3>No hay proveedores cargados.</h3>
                    <?php } ?>
                </tbody>
            </table>
            <div style="height:50px;">
            
            </div>
            
        </div>
    </div>

</div>

<div id="dialog2" title="Eliminar Proveedor">
    	<p>
        	<span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>
            ¿Esta seguro que desea eliminar al Proveedor?.<span id="proveedorEli"></span>
        </p>
        <p><strong>Importante: </strong>También se borrara la relación con los productos asociados</p>
        <input type="hidden" value="" id="idEliminar" name="idEliminar">
</div>

<script type="text/javascript">
$(document).ready(function(){
	
	$('.nuevo').click(function(event){
			url = "index.php";
			$(location).attr('href',url);
	});//fin del boton nuevo
	
	$('.varborrar').click(function(event){
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
	
	$('.varmodificar').click(function(event){
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
									data:  {id: $('#idEliminar').val(), accion: 'eliminarProveedores'},
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
});
</script>


<?php } ?>

	
	
</body>
</html>
