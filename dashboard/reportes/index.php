<?php


session_start();


if (!isset($_SESSION['usua_predio']))
{
	header('Location: ../error.php');
} else {


include ('../../includes/funcionesUsuarios.php');
include ('../../includes/funcionesHTML.php');
include ('../../includes/funciones.php');
include ('../../includes/funcionesReferencias.php');

$serviciosUsuario = new ServiciosUsuarios();
$serviciosHTML = new ServiciosHTML();
$serviciosFunciones = new Servicios();
$serviciosReferencias 	= new ServiciosReferencias();

$fecha = date('Y-m-d');

//$resProductos = $serviciosProductos->traerProductosLimite(6);
$resMenu = $serviciosHTML->menu(utf8_encode($_SESSION['nombre_predio']),"Reportes",$_SESSION['refroll_predio'],'');

$resVentasPorAnio = $serviciosReferencias->traerVentasPorAno(date('Y'));
$resHorarioPico = $serviciosReferencias->traerHorariosTopPorAnio(date('Y'));

$cadHorarioPico = '';

while ($row = mysql_fetch_array($resHorarioPico)) {
    $cadHorarioPico .= '{
        "date": "2018-08-08 '.$row['hora'].'",
        "value": '.$row['cantidad'].'
    },';
}


?>

<!DOCTYPE HTML>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">



<title>Gesti&oacute;n: Bellwash</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="../../css/estiloDash.css" rel="stylesheet" type="text/css">
    

    
    <script type="text/javascript" src="../../js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" href="../../css/jquery-ui.css">

    <script src="../../js/jquery-ui.js"></script>
    
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
        #chartdiv {
        width: 100%;
        height: 500px;
        }

        #chartdiv2 {
        width: 100%;
        height: 500px;
        }

        .amcharts-export-menu-top-right {
        top: 10px;
        right: 0;
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
        	<p style="color: #fff; font-size:18px; height:16px;">Reporte Caja Diaria</p>
        	
        </div>
    	<div class="cuerpoBox">
        	<form class="form-inline formulario" role="form">
        	<div class="row">
            	<div class="form-group col-md-4 col-xs-6" style="display:'.$lblOculta.'">
                    <label for="fecha1" class="control-label" style="text-align:left">Seleccione el Día</label>
                    <div class="input-group col-md-6 col-xs-12">
                    <input class="form-control" type="text" name="fecha1" id="fecha1" value="Date"/>
                    </div>
                </div>
                
                
                <div class="form-group col-md-6">
                    <label class="control-label" style="text-align:left" for="refcliente">Acción</label>

                    	<ul class="list-inline">
                        	<li>
                    			<button type="button" class="btn btn-success" id="rptCajaDiaria" style="margin-left:0px;">Generar</button>
                            </li>
                            <li>
                    			<button type="button" class="btn btn-info" id="rptCajaDiariaDetalle" style="margin-left:0px;">Generar Detalle</button>
                            </li>
                            <!--<li>
                        		<button type="button" class="btn btn-default" id="rptCJExcel" style="margin-left:0px;">Generar Excel</button>
                            </li>-->
                        </ul>

                </div>
                

            </div>

            <div class="row">
            <div class="col-md-12">
                <hr>
                <h4>Total Mes a Mes, Año: <?php echo date('Y'); ?></h4>
                <hr>

                <div id="chartdiv"></div>
            </div>    
            </div>


            <div class="row">
            <div class="col-md-12">
                <hr>
                <h4>Horarios Pico de trabajo, Año: <?php echo date('Y'); ?></h4>
                <hr>

                <div id="chartdiv2"></div>
            </div>    
            </div>
            
            
            <div class='row' style="margin-left:25px; margin-right:25px;">
                <div class='alert'>
                
                </div>
                <div id='load'>
                
                </div>
            </div>

            </form>
    	</div>
    </div>
    
    
    

    
    
   
</div>


</div>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>


<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
<script src="../../bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../js/bootstrap-datetimepicker.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.es.js"></script>

<script type="text/javascript">
$(document).ready(function(){


	$("#rptCajaDiaria").click(function(event) {
        window.open("../../reportes/rptdiario.php?fecha=" + $("#fecha1").val() ,'_blank');	
						
    });
	
	$("#rptCajaDiariaDetalle").click(function(event) {
        window.open("../../reportes/rptdiariodetalle.php?fecha=" + $("#fecha1").val() ,'_blank');	
						
    });
	
	
	$("#rptsc").click(function(event) {
        window.open("../../reportes/rptSaldosClientes.php?idEmp=" + $("#refempresa2").val() + "&fechadesde=" + $("#fechadesde2").val()+ "&fechahasta=" + $("#fechahasta2").val(),'_blank');	
						
    });
	
	$("#rptscc").click(function(event) {
        window.open("../../reportes/rptSaldosPorClientes.php?idEmp=" + $("#refempresa4").val() + "&idClie=" + $("#refcliente1").val() + "&fechadesde=" + $("#fechadesde3").val()+ "&fechahasta=" + $("#fechahasta3").val(),'_blank');	
						
    });
	
	$('#rptcc').click(function(e) {
        window.open("../../reportes/rptSaldosEmpresa.php?fechadesde=" + $("#fechadesde4").val()+ "&fechahasta=" + $("#fechahasta4").val(),'_blank');
    });
	
	$("#rpt5").click(function(event) {
        window.open("../../reportes/rptSaldosClientesEmpresas.php?idClie=" + $("#refcliente5").val() + "&fechadesde=" + $("#fechadesde5").val()+ "&fechahasta=" + $("#fechahasta5").val(),'_blank');	
						
    });
	
	
	$("#rpt6").click(function(event) {
        window.open("../../reportes/rptSociosEmpresas.php",'_blank');	
						
    });
	
	$("#rpt7").click(function(event) {
        window.open("../../reportes/rptSocios.php",'_blank');	
						
    });

	
	
	
	
	$("#rptgfExcel").click(function(event) {
        window.open("../../reportes/rptFacturacionGeneralExcel.php?id=" + $("#refempresa1").val() + "&fechadesde=" + $("#fechadesde1").val()+ "&fechahasta=" + $("#fechahasta1").val(),'_blank');	
						
    });
	
	$("#rptscExcel").click(function(event) {
        window.open("../../reportes/rptSaldosClientesExcel.php?idEmp=" + $("#refempresa2").val() + "&fechadesde=" + $("#fechadesde2").val()+ "&fechahasta=" + $("#fechahasta2").val(),'_blank');	
						
    });
	
	$("#rptsccExcel").click(function(event) {
        window.open("../../reportes/rptSaldosPorClientesExcel.php?idEmp=" + $("#refempresa4").val() + "&idClie=" + $("#refcliente1").val() + "&fechadesde=" + $("#fechadesde3").val()+ "&fechahasta=" + $("#fechahasta3").val(),'_blank');	
						
    });
	
	$('#rptccExcel').click(function(e) {
        window.open("../../reportes/rptSaldosEmpresaExcel.php?fechadesde=" + $("#fechadesde4").val()+ "&fechahasta=" + $("#fechahasta4").val(),'_blank');
    });
	
	$("#rpt5Excel").click(function(event) {
        window.open("../../reportes/rptSaldosClientesEmpresasExcel.php?idClie=" + $("#refcliente5").val() + "&fechadesde=" + $("#fechadesde5").val()+ "&fechahasta=" + $("#fechahasta5").val(),'_blank');	
						
    });
	
	$("#rpt6Excel").click(function(event) {
        window.open("../../reportes/rptSociosEmpresasExcel.php",'_blank');	
						
    });
	
	$("#rpt7Excel").click(function(event) {
        window.open("../../reportes/rptSociosExcel.php",'_blank');	
						
    });

});
</script>
<script type="text/javascript">
/*
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
*/
</script>

<script>
  $(function() {
	  $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
 
    $( "#fecha1" ).datepicker();
    $( "#fecha1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde2" ).datepicker();
    $( "#fechadesde2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde3" ).datepicker();
    $( "#fechadesde3" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde4" ).datepicker();
    $( "#fechadesde4" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechadesde5" ).datepicker();
    $( "#fechadesde5" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	
	$( "#fechahasta1" ).datepicker();
    $( "#fechahasta1" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta2" ).datepicker();
    $( "#fechahasta2" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta3" ).datepicker();
    $( "#fechahasta3" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta4" ).datepicker();
    $( "#fechahasta4" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
	$( "#fechahasta5" ).datepicker();
    $( "#fechahasta5" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	
  });
  </script>

  <script>
var chart = AmCharts.makeChart("chartdiv", {
  "type": "serial",
  "theme": "light",
  "marginRight": 70,
  "dataProvider": [{
    "country": "Enero",
    "visits": <?php echo mysql_result($resVentasPorAnio,0,2); ?>,
    "color": "#FF0F00"
  }, {
    "country": "Febrero",
    "visits": <?php echo mysql_result($resVentasPorAnio,1,2); ?>,
    "color": "#FF6600"
  }, {
    "country": "Marzo",
    "visits": <?php echo mysql_result($resVentasPorAnio,2,2); ?>,
    "color": "#FF9E01"
  }, {
    "country": "Abril",
    "visits": <?php echo mysql_result($resVentasPorAnio,3,2); ?>,
    "color": "#FCD202"
  }, {
    "country": "Mayo",
    "visits": <?php echo mysql_result($resVentasPorAnio,4,2); ?>,
    "color": "#F8FF01"
  }, {
    "country": "Junio",
    "visits": <?php echo mysql_result($resVentasPorAnio,5,2); ?>,
    "color": "#B0DE09"
  }, {
    "country": "Julio",
    "visits": <?php echo mysql_result($resVentasPorAnio,6,2); ?>,
    "color": "#04D215"
  }, {
    "country": "Agosto",
    "visits": <?php echo mysql_result($resVentasPorAnio,7,2); ?>,
    "color": "#0D8ECF"
  }, {
    "country": "Septiembre",
    "visits": <?php echo mysql_result($resVentasPorAnio,8,2); ?>,
    "color": "#0D52D1"
  }, {
    "country": "Octubre",
    "visits": <?php echo mysql_result($resVentasPorAnio,9,2); ?>,
    "color": "#2A0CD0"
  }, {
    "country": "Noviembre",
    "visits": <?php echo mysql_result($resVentasPorAnio,10,2); ?>,
    "color": "#8A0CCF"
  }, {
    "country": "Diciembre",
    "visits": <?php echo mysql_result($resVentasPorAnio,11,2); ?>,
    "color": "#CD0D74"
  }],
  "valueAxes": [{
    "axisAlpha": 0,
    "position": "left",
    "title": "Total por Mes"
  }],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "country",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});
</script>

<script>
var chart = AmCharts.makeChart("chartdiv2", {
    "type": "serial",
    "theme": "light",
    "marginRight": 40,
    "marginLeft": 40,
    "autoMarginOffset": 20,
    "mouseWheelZoomEnabled":true,
    "dataDateFormat": "YYYY-MM-DD HH:NN:SS",
    "valueAxes": [{
        "id": "v1",
        "axisAlpha": 0,
        "position": "left",
        "ignoreAxisWidth":true
    }],
    "balloon": {
        "borderThickness": 1,
        "shadowAlpha": 0
    },
    "graphs": [{
        "id": "g1",
        "balloon":{
          "drop":true,
          "adjustBorderColor":false,
          "color":"#ffffff"
        },
        "bullet": "round",
        "bulletBorderAlpha": 1,
        "bulletColor": "#FFFFFF",
        "bulletSize": 5,
        "hideBulletsCount": 50,
        "lineThickness": 2,
        "title": "red line",
        "useLineColorForBulletBorder": true,
        "valueField": "value",
        "balloonText": "<span style='font-size:18px;'>[[value]]</span>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "oppositeAxis":false,
        "offset":30,
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount":true,
        "color":"#AAAAAA"
    },
    "chartCursor": {
        "pan": true,
        "valueLineEnabled": true,
        "valueLineBalloonEnabled": true,
        "cursorAlpha":1,
        "cursorColor":"#258cbb",
        "limitToGraph":"g1",
        "valueLineAlpha":0.2,
        "valueZoomable":true,
        "categoryBalloonDateFormat": "JJ:NN"
    },
    "valueScrollbar":{
      "oppositeAxis":false,
      "offset":50,
      "scrollbarHeight":10
    },
    "categoryField": "date",
    "categoryAxis": {
        "minPeriod": "mm",
		"parseDates": true
    },
    "export": {
        "enabled": true
    },
    "dataProvider": [
        <?php echo $cadHorarioPico; ?>
        ]
});

chart.addListener("rendered", zoomChart);

zoomChart();

function zoomChart() {
    chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
}
</script>
<?php } ?>
</body>
</html>
