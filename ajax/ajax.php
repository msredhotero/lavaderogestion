<?php

include ('../includes/funcionesUsuarios.php');
include ('../includes/funciones.php');
include ('../includes/funcionesHTML.php');
include ('../includes/funcionesReferencias.php');


$serviciosUsuarios  		= new ServiciosUsuarios();
$serviciosFunciones 		= new Servicios();
$serviciosHTML				= new ServiciosHTML();
$serviciosReferencias		= new ServiciosReferencias();


$accion = $_POST['accion'];


switch ($accion) {
    case 'login':
        enviarMail($serviciosUsuarios);
        break;
	case 'entrar':
		entrar($serviciosUsuarios);
		break;
	case 'insertarUsuario':
        insertarUsuario($serviciosUsuarios);
        break;
	case 'modificarUsuario':
        modificarUsuario($serviciosUsuarios);
        break;
	case 'registrar':
		registrar($serviciosUsuarios);
        break;



/* PARA Tipovehiculo */

case 'insertarClientes':
insertarClientes($serviciosReferencias);
break;
case 'modificarClientes':
modificarClientes($serviciosReferencias);
break;
case 'eliminarClientes':
eliminarClientes($serviciosReferencias);
break;
case 'insertarClientevehiculos':
insertarClientevehiculos($serviciosReferencias);
break;
case 'modificarClientevehiculos':
modificarClientevehiculos($serviciosReferencias);
break;
case 'eliminarClientevehiculos':
eliminarClientevehiculos($serviciosReferencias);
break;
case 'insertarOrdenes':
insertarOrdenes($serviciosReferencias);
break;
case 'modificarOrdenes':
modificarOrdenes($serviciosReferencias);
break;
case 'eliminarOrdenes':
eliminarOrdenes($serviciosReferencias);
break;
case 'finalizarOrden':
finalizarOrden($serviciosReferencias);
break;
case 'insertarUsuarios':
insertarUsuarios($serviciosReferencias);
break;
case 'modificarUsuarios':
modificarUsuarios($serviciosReferencias);
break;
case 'eliminarUsuarios':
eliminarUsuarios($serviciosReferencias);
break;
case 'insertarVehiculos':
insertarVehiculos($serviciosReferencias);
break;
case 'insertarVehiculosSimple':
insertarVehiculosSimple($serviciosReferencias);
break;
case 'modificarVehiculos':
modificarVehiculos($serviciosReferencias);
break;
case 'eliminarVehiculos':
eliminarVehiculos($serviciosReferencias);
break;
case 'insertarPredio_menu':
insertarPredio_menu($serviciosReferencias);
break;
case 'modificarPredio_menu':
modificarPredio_menu($serviciosReferencias);
break;
case 'eliminarPredio_menu':
eliminarPredio_menu($serviciosReferencias);
break;
case 'insertarEstados':
insertarEstados($serviciosReferencias);
break;
case 'modificarEstados':
modificarEstados($serviciosReferencias);
break;
case 'eliminarEstados':
eliminarEstados($serviciosReferencias);
break;
case 'insertarMarca':
insertarMarca($serviciosReferencias);
break;
case 'modificarMarca':
modificarMarca($serviciosReferencias);
break;
case 'eliminarMarca':
eliminarMarca($serviciosReferencias);
break;
case 'insertarModelo':
insertarModelo($serviciosReferencias);
break;
case 'modificarModelo':
modificarModelo($serviciosReferencias);
break;
case 'eliminarModelo':
eliminarModelo($serviciosReferencias);
break;
case 'insertarRoles':
insertarRoles($serviciosReferencias);
break;
case 'modificarRoles':
modificarRoles($serviciosReferencias);
break;
case 'eliminarRoles':
eliminarRoles($serviciosReferencias);
break;
case 'insertarTipovehiculo':
insertarTipovehiculo($serviciosReferencias);
break;
case 'modificarTipovehiculo':
modificarTipovehiculo($serviciosReferencias);
break;
case 'eliminarTipovehiculo':
eliminarTipovehiculo($serviciosReferencias);
break;
case 'insertarEmpleados':
insertarEmpleados($serviciosReferencias);
break;
case 'modificarEmpleados':
modificarEmpleados($serviciosReferencias);
break;
case 'eliminarEmpleados':
eliminarEmpleados($serviciosReferencias);
break; 
case 'traerResponsablesPorOrden':
traerResponsablesPorOrden($serviciosReferencias);
break;
case 'insertarPagos': 
insertarPagos($serviciosReferencias); 
break; 
case 'modificarPagos': 
modificarPagos($serviciosReferencias); 
break; 
case 'eliminarPagos': 
eliminarPagos($serviciosReferencias); 
break;
case 'traerPagosPorOrden':
traerPagosPorOrden($serviciosReferencias);
break; 

case 'insertarProveedores':
insertarProveedores($serviciosReferencias);
break;
case 'modificarProveedores':
modificarProveedores($serviciosReferencias);
break;
case 'eliminarProveedores':
eliminarProveedores($serviciosReferencias);
break; 
case 'insertarSocios':
insertarSocios($serviciosReferencias);
break;
case 'modificarSocios':
modificarSocios($serviciosReferencias);
break;
case 'eliminarSocios':
eliminarSocios($serviciosReferencias);
break;
case 'insertarTurnos':
insertarTurnos($serviciosReferencias);
break;
case 'modificarTurnos':
modificarTurnos($serviciosReferencias);
break;
case 'eliminarTurnos':
eliminarTurnos($serviciosReferencias);
break;
case 'insertarTurnosdetalles':
insertarTurnosdetalles($serviciosReferencias);
break;
case 'modificarTurnosdetalles':
modificarTurnosdetalles($serviciosReferencias);
break;
case 'eliminarTurnosdetalles':
eliminarTurnosdetalles($serviciosReferencias);
break; 
case 'insertarServicios':
insertarServicios($serviciosReferencias);
break;
case 'modificarServicios':
modificarServicios($serviciosReferencias);
break;
case 'eliminarServicios':
eliminarServicios($serviciosReferencias);
break;
case 'insertarTipomovimientos':
insertarTipomovimientos($serviciosReferencias);
break;
case 'modificarTipomovimientos':
modificarTipomovimientos($serviciosReferencias);
break;
case 'eliminarTipomovimientos':
eliminarTipomovimientos($serviciosReferencias);
break; 

case 'insertarOtrosingresosegresos': 
insertarOtrosingresosegresos($serviciosReferencias); 
break; 
case 'modificarOtrosingresosegresos': 
modificarOtrosingresosegresos($serviciosReferencias); 
break; 
case 'eliminarOtrosingresosegresos': 
eliminarOtrosingresosegresos($serviciosReferencias); 
break; 

case 'insertarCaja': 
insertarCaja($serviciosReferencias); 
break; 
case 'modificarCaja': 
modificarCaja($serviciosReferencias); 
break; 
case 'eliminarCaja': 
eliminarCaja($serviciosReferencias); 
break; 

case 'insertarTurnos': 
insertarTurnos($serviciosReferencias); 
break; 
case 'modificarTurnos': 
modificarTurnos($serviciosReferencias); 
break; 
case 'eliminarTurnos': 
eliminarTurnos($serviciosReferencias); 
break; 
case 'insertarTurnosdetalles': 
insertarTurnosdetalles($serviciosReferencias); 
break; 
case 'modificarTurnosdetalles': 
modificarTurnosdetalles($serviciosReferencias); 
break; 
case 'eliminarTurnosdetalles': 
eliminarTurnosdetalles($serviciosReferencias); 
break; 

case 'traerCajadiariaPorFecha':
traerCajadiariaPorFecha($serviciosReferencias);
break;
case 'insertarCajadiaria':
insertarCajadiaria($serviciosReferencias);
break;

case 'insertarClientesV':
insertarClientesV($serviciosReferencias);
break;

case 'traerVehiculosPorCliente':
traerVehiculosPorCliente($serviciosReferencias, $serviciosFunciones);
break;

}
/* Fin */

function traerVehiculosPorCliente($serviciosReferencias, $serviciosFunciones) {
	$idcliente = $_POST['id'];

	$res = $serviciosReferencias->traerVehiculosPorClientes($idcliente);
	$cad = $serviciosFunciones->devolverSelectBox($res,array(1,3,4),' ');

	echo $cad;
}


function insertarClientesV($serviciosReferencias) {
	$apellido = $_POST['apellido'];
	$nombre = $_POST['nombre'];
	$nrodocumento = $_POST['nrodocumento'];
	$fechanacimiento = $_POST['fechanacimiento'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$email = $_POST['email'];
	
	$res = $serviciosReferencias->insertarClientes($apellido,$nombre,$nrodocumento,$fechanacimiento,$direccion,$telefono,$email);
	
	if ((integer)$res > 0) {
		$patente 			= str_replace(' ','',ltrim(rtrim($_POST['patente'])));
		$refmodelo 			= $_POST['refmodelo'];
		$reftipovehiculo 	= $_POST['reftipovehiculo'];
		$anio 				= $_POST['anio'];
		$refclientes		= $res;
		$observaciones		= $_POST['observaciones'];
		
		if 	($serviciosReferencias->existePatente($patente) == true) {
			echo 'La patente ya fue cargada, no pueden existir dos patentes iguales.';
		} else {
		
			if (($refclientes == '') || ($refclientes == null)) {
				echo 'Debe seleccionar un cliente para poder ingresar un vehiculo';
			} else {
				$res = $serviciosReferencias->insertarVehiculos($patente,$refmodelo,$reftipovehiculo,$anio,$observaciones);
			
				if ((integer)$res > 0) {
					
					$res2 = $serviciosReferencias->insertarClientevehiculos($refclientes,$res,'1');
					if ((integer)$res2 > 0) {
						echo '';	
					} else {
						$serviciosReferencias->eliminarVehiculos($res);
						echo 'hubo un error al insertar datos del dueño';	
					}
					
				} else {
					echo 'hubo un error al insertar datos';
				}
			}
		}
		echo '';
	} else {
		echo 'hubo un error al insertar datos';
	}
}

function traerCajadiariaPorFecha($serviciosReferencias) {
	$fecha = $_POST['fecha'];	
	
	$res = $serviciosReferencias->traerCajadiariaPorFecha($fecha);
	
	if (mysql_num_rows($res)>0) {
		echo mysql_result($res,0,'montoinicio');	
	} else {
		echo 0;
	}
}

function insertarCajadiaria($serviciosReferencias) {
	$monto = $_POST['inicio']; 
	$montoinicio = $_POST['inicio']; 
	$montofinal = $_POST['inicio']; 
	$fecha = $_POST['fecha']; 
	
	$res = $serviciosReferencias->insertarCaja($monto,$montoinicio,$montofinal,$fecha); 
	
	if ((integer)$res > 0) { 
		echo ''; 
	} else { 
		echo 'Huvo un error al insertar datos';	 
	} 
}

function insertarCaja($serviciosReferencias) { 
	$monto = $_POST['monto']; 
	$montoinicio = $_POST['montoinicio']; 
	$montofinal = $_POST['montofinal']; 
	$fecha = $_POST['fecha']; 
	$res = $serviciosReferencias->insertarCaja($monto,$montoinicio,$montofinal,$fecha); 
	if ((integer)$res > 0) { 
	echo ''; 
	} else { 
	echo 'Huvo un error al insertar datos';	 
	} 
} 


	function modificarCaja($serviciosReferencias) { 
	$id = $_POST['id']; 
	$monto = $_POST['monto']; 
	$montoinicio = $_POST['montoinicio']; 
	$montofinal = $_POST['montofinal']; 
	$fecha = $_POST['fecha']; 
	$res = $serviciosReferencias->modificarCaja($id,$monto,$montoinicio,$montofinal,$fecha); 
	if ($res == true) { 
	echo ''; 
	} else { 
	echo 'Huvo un error al modificar datos'; 
	} 
	} 

	function eliminarCaja($serviciosReferencias) { 
	$id = $_POST['id']; 
	$res = $serviciosReferencias->eliminarCaja($id); 
	echo $res; 
	} 


	function insertarOtrosingresosegresos($serviciosReferencias) { 
	$reftipomovimientos = $_POST['reftipomovimientos']; 
	$monto = $_POST['monto']; 

	$usuacrea = $_POST['usuacrea']; 
	$res = $serviciosReferencias->insertarOtrosingresosegresos($reftipomovimientos,$monto,$usuacrea); 
	if ((integer)$res > 0) { 
	echo ''; 
	} else { 
	echo 'Huvo un error al insertar datos';	 
	} 
	} 


	function modificarOtrosingresosegresos($serviciosReferencias) { 
	$id = $_POST['id']; 
	$reftipomovimientos = $_POST['reftipomovimientos']; 
	$monto = $_POST['monto']; 

	$usuacrea = $_POST['usuacrea']; 
	$res = $serviciosReferencias->modificarOtrosingresosegresos($id,$reftipomovimientos,$monto,$usuacrea); 
	if ($res == true) { 
	echo ''; 
	} else { 
	echo 'Huvo un error al modificar datos'; 
	} 
	} 


	function eliminarOtrosingresosegresos($serviciosReferencias) { 
	$id = $_POST['id']; 
	$res = $serviciosReferencias->eliminarOtrosingresosegresos($id); 
	echo $res; 
	} 




	function insertarProveedores($serviciosReferencias) {
		$razonsocial = $_POST['razonsocial'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cuit = $_POST['cuit'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$observaciones = $_POST['observaciones'];
		$res = $serviciosReferencias->insertarProveedores($razonsocial,$nombre,$apellido,$cuit,$direccion,$telefono,$celular,$email,$observaciones);
		if ((integer)$res > 0) {
		echo '';
		} else {
		echo 'Huvo un error al insertar datos';
		}
	}


	function modificarProveedores($serviciosReferencias) {
		$id = $_POST['id'];
		$razonsocial = $_POST['razonsocial'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$cuit = $_POST['cuit'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$observaciones = $_POST['observaciones'];
		$res = $serviciosReferencias->modificarProveedores($id,$razonsocial,$nombre,$apellido,$cuit,$direccion,$telefono,$celular,$email,$observaciones);
		if ($res == true) {
		echo '';
		} else {
		echo 'Huvo un error al modificar datos';
		}
	}

	function eliminarProveedores($serviciosReferencias) {
		$id = $_POST['id'];
		$res = $serviciosReferencias->eliminarProveedores($id);
		echo $res;
	}

	function insertarSocios($serviciosReferencias) {
		$apellido = $_POST['apellido'];
		$nombre = $_POST['nombre'];
		$nrodocumento = $_POST['nrodocumento'];
		$cuit = $_POST['cuit'];
		$domicilio = $_POST['domicilio'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$res = $serviciosReferencias->insertarSocios($apellido,$nombre,$nrodocumento,$cuit,$domicilio,$telefono,$email);
		if ((integer)$res > 0) {
		echo '';
		} else {
		echo 'Huvo un error al insertar datos';
		}
	}


	function modificarSocios($serviciosReferencias) {
		$id = $_POST['id'];
		$apellido = $_POST['apellido'];
		$nombre = $_POST['nombre'];
		$nrodocumento = $_POST['nrodocumento'];
		$cuit = $_POST['cuit'];
		$domicilio = $_POST['domicilio'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$res = $serviciosReferencias->modificarSocios($id,$apellido,$nombre,$nrodocumento,$cuit,$domicilio,$telefono,$email);
		if ($res == true) {
		echo '';
		} else {
		echo 'Huvo un error al modificar datos';
		}
	}


	function eliminarSocios($serviciosReferencias) {
		$id = $_POST['id'];
		$res = $serviciosReferencias->eliminarSocios($id);
		echo $res;
	} 


	function insertarTurnos($serviciosReferencias) {
		$fechaingreso = $_POST['fechaingreso'];
		$refclientes = $_POST['refclientes'];
		$refvehiculos = $_POST['refvehiculos'];
		$horaentrada = $_POST['horaentrada'];
		$horasalida = $_POST['horasalida'];
		$usuacrea = $_POST['usuacrea'];
		$refestados = $_POST['refestados'];
		$descuento = $_POST['descuento'];
		$reftipomovimientos = $_POST['reftipomovimientos'];
		
		$res = $serviciosReferencias->insertarTurnos($fechaingreso,$refclientes,$refvehiculos,$horaentrada,$horasalida,$usuacrea,$refestados,$descuento,$reftipomovimientos);
		
		if ((integer)$res > 0) {
			$resServicios = $serviciosReferencias->traerServicios();

			while ($rowFS = mysql_fetch_array($resServicios)) {
				if (isset($_POST[$rowFS[0]])) {
					$serviciosReferencias->insertarTurnosdetalles($res,$rowFS[0],$rowFS[1],$rowFS[2],$rowFS[3]);
				}
			}
			echo '';
		} else {
			echo 'Huvo un error al insertar datos';
		}
	}


	function modificarTurnos($serviciosReferencias) {
		$id = $_POST['id'];
		$fechaingreso = $_POST['fechaingreso'];
		$refclientes = $_POST['refclientes'];
		$refvehiculos = $_POST['refvehiculos'];
		$horaentrada = $_POST['horaentrada'];
		$horasalida = $_POST['horasalida'];
		$usuacrea = $_POST['usuacrea'];
		$refestados = $_POST['refestados'];
		$descuento = $_POST['descuento'];
		$reftipomovimientos = $_POST['reftipomovimientos'];
		$res = $serviciosReferencias->modificarTurnos($id,$fechaingreso,$refclientes,$refvehiculos,$horaentrada,$horasalida,$usuacrea,$refestados,$descuento,$reftipomovimientos);
		if ($res == true) {
		echo '';
		} else {
		echo 'Huvo un error al modificar datos';
		}
	}


	function eliminarTurnos($serviciosReferencias) {
		$id = $_POST['id'];
		$res = $serviciosReferencias->eliminarTurnos($id);
		echo $res;
	}

	function insertarTurnosdetalles($serviciosReferencias) {
		$refturnos = $_POST['refturnos'];
		$refservicios = $_POST['refservicios'];
		$descripcion = $_POST['descripcion'];
		$costo = $_POST['costo'];
		$tiempo = $_POST['tiempo'];
		$res = $serviciosReferencias->insertarTurnosdetalles($refturnos,$refservicios,$descripcion,$costo,$tiempo);
		if ((integer)$res > 0) {
		echo '';
		} else {
		echo 'Huvo un error al insertar datos';
		}
	}


	function modificarTurnosdetalles($serviciosReferencias) {
		$id = $_POST['id'];
		$refturnos = $_POST['refturnos'];
		$refservicios = $_POST['refservicios'];
		$descripcion = $_POST['descripcion'];
		$costo = $_POST['costo'];
		$tiempo = $_POST['tiempo'];
		$res = $serviciosReferencias->modificarTurnosdetalles($id,$refturnos,$refservicios,$descripcion,$costo,$tiempo);
		if ($res == true) {
		echo '';
		} else {
		echo 'Huvo un error al modificar datos';
		}
	}


	function eliminarTurnosdetalles($serviciosReferencias) {
		$id = $_POST['id'];
		$res = $serviciosReferencias->eliminarTurnosdetalles($id);
		echo $res;
	}


	function insertarServicios($serviciosReferencias) {
		$descripcion = $_POST['descripcion'];
		$costo = $_POST['costo'];
		$tiempo = $_POST['tiempo'];
		$observaciones = $_POST['observaciones'];
		$res = $serviciosReferencias->insertarServicios($descripcion,$costo,$tiempo,$observaciones);
		if ((integer)$res > 0) {
		echo '';
		} else {
		echo 'Huvo un error al insertar datos';
		}
	}


	function modificarServicios($serviciosReferencias) {
		$id = $_POST['id'];
		$descripcion = $_POST['descripcion'];
		$costo = $_POST['costo'];
		$tiempo = $_POST['tiempo'];
		$observaciones = $_POST['observaciones'];
		$res = $serviciosReferencias->modificarServicios($id,$descripcion,$costo,$tiempo,$observaciones);
		if ($res == true) {
		echo '';
		} else {
		echo 'Huvo un error al modificar datos';
		}
	}


	function eliminarServicios($serviciosReferencias) {
		$id = $_POST['id'];
		$res = $serviciosReferencias->eliminarServicios($id);
		echo $res;
		}
		function insertarTipomovimientos($serviciosReferencias) {
		$descripcion = $_POST['descripcion'];
		$categoria = $_POST['categoria'];
		$res = $serviciosReferencias->insertarTipomovimientos($descripcion,$categoria);
		if ((integer)$res > 0) {
		echo '';
		} else {
		echo 'Huvo un error al insertar datos';
		}
	}


	function modificarTipomovimientos($serviciosReferencias) {
		$id = $_POST['id'];
		$descripcion = $_POST['descripcion'];
		$categoria = $_POST['categoria'];
		$res = $serviciosReferencias->modificarTipomovimientos($id,$descripcion,$categoria);
		if ($res == true) {
		echo '';
		} else {
		echo 'Huvo un error al modificar datos';
		}
	}


	function eliminarTipomovimientos($serviciosReferencias) {
		$id = $_POST['id'];
		$res = $serviciosReferencias->eliminarTipomovimientos($id);
		echo $res;
	} 


/* PARA Tipovehiculo */

function insertarClientes($serviciosReferencias) {
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nrodocumento = $_POST['nrodocumento'];
$fechanacimiento = $_POST['fechanacimiento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$res = $serviciosReferencias->insertarClientes($apellido,$nombre,$nrodocumento,$fechanacimiento,$direccion,$telefono,$email);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarClientes($serviciosReferencias) {
$id = $_POST['id'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nrodocumento = $_POST['nrodocumento'];
$fechanacimiento = $_POST['fechanacimiento'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$res = $serviciosReferencias->modificarClientes($id,$apellido,$nombre,$nrodocumento,$fechanacimiento,$direccion,$telefono,$email);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarClientes($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarClientes($id);
echo $res;
}
function insertarClientevehiculos($serviciosReferencias) {
$refcliente = $_POST['refcliente'];
$refclientes = $_POST['refclientes'];
$refvehiculos = $_POST['refvehiculos'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarClientevehiculos($refcliente,$refclientes,$refvehiculos,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarClientevehiculos($serviciosReferencias) {
$id = $_POST['id'];
$refcliente = $_POST['refcliente'];
$refclientes = $_POST['refclientes'];
$refvehiculos = $_POST['refvehiculos'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarClientevehiculos($id,$refcliente,$refclientes,$refvehiculos,$activo);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarClientevehiculos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarClientevehiculos($id);
echo $res;
}
function insertarEmpleados($serviciosReferencias) {
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nrodocumento = $_POST['nrodocumento'];
$fechanacimiento = $_POST['fechanacimiento'];
$cuil = $_POST['cuil'];
$telefono = $_POST['telefono'];
$telefonofijo = $_POST['telefonofijo'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$res = $serviciosReferencias->insertarEmpleados($apellido,$nombre,$nrodocumento,$fechanacimiento,$cuil,$telefono,$telefonofijo,$direccion,$email);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarEmpleados($serviciosReferencias) {
$id = $_POST['id'];
$apellido = $_POST['apellido'];
$nombre = $_POST['nombre'];
$nrodocumento = $_POST['nrodocumento'];
$fechanacimiento = $_POST['fechanacimiento'];
$cuil = $_POST['cuil'];
$telefono = $_POST['telefono'];
$telefonofijo = $_POST['telefonofijo'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$res = $serviciosReferencias->modificarEmpleados($id,$apellido,$nombre,$nrodocumento,$fechanacimiento,$cuil,$telefono,$telefonofijo,$direccion,$email);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarEmpleados($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarEmpleados($id);
echo $res;
} 

function traerResponsablesPorOrden($serviciosReferencias) {
	$orden		=	$_POST['id'];	
	
	$res 		= $serviciosReferencias->traerResponsablesPorOrden($orden);
	
	$cadRef = '';
	while ($row = mysql_fetch_array($res)) {
		$cadRef .= "<p><span class='glyphicon glyphicon-user'></span> ".utf8_encode($row['apellido']).", ".utf8_encode($row['nombre'])."</p>";
	}
	echo $cadRef;
}

function insertarOrdenes($serviciosReferencias) {
	$numero = $_POST['numero'];
	$refclientevehiculos = $_POST['refclientevehiculos'];
	$fechacrea = $_POST['fechacrea'];
	$fechamodi = $_POST['fechamodi'];
	$usuacrea = $_POST['usuacrea'];
	$usuamodi = $_POST['usuamodi'];
	$detallereparacion = $_POST['detallereparacion'];
	$refestados = $_POST['refestados'];
	$precio	= $_POST['precio'];
	$anticipo	= $_POST['anticipo'];
	
	$res = $serviciosReferencias->insertarOrdenes($numero,$refclientevehiculos,$fechacrea,$fechamodi,$usuacrea,$usuamodi,$detallereparacion,$refestados,$precio,$anticipo);
	
	if ((integer)$res > 0) {
		$resUser = $serviciosReferencias->traerEmpleados();
		$cad = 'user';
		while ($rowFS = mysql_fetch_array($resUser)) {
			if (isset($_POST[$cad.$rowFS[0]])) {
				$serviciosReferencias->insertarOrdenesresponsables($res,$rowFS[0]);
			}
		}
		
		echo '';
	} else {
		echo 'hubo un error al insertar datos';
	}
}
function modificarOrdenes($serviciosReferencias) {
	$id = $_POST['id'];
	$numero = $_POST['numero'];
	$refclientevehiculos = $_POST['refclientevehiculos'];
	$fechacrea = $_POST['fechacrea'];
	$fechamodi = $_POST['fechamodi'];
	$usuacrea = $_POST['usuacrea'];
	$usuamodi = $_POST['usuamodi'];
	$detallereparacion = $_POST['detallereparacion'];
	$refestados = $_POST['refestados'];
	$precio	= $_POST['precio'];
	$anticipo	= $_POST['anticipo'];
	
	$res = $serviciosReferencias->modificarOrdenes($id,$numero,$refclientevehiculos,$fechacrea,$fechamodi,$usuacrea,$usuamodi,$detallereparacion,$refestados,$precio,$anticipo);
	
	if ($res == true) {
		
		$serviciosReferencias->eliminarOrdenesresponsablesPorOrden($id);
			$resUser = $serviciosReferencias->traerEmpleados();
			$cad = 'user';
			while ($rowFS = mysql_fetch_array($resUser)) {
				if (isset($_POST[$cad.$rowFS[0]])) {
					$serviciosReferencias->insertarOrdenesresponsables($res,$rowFS[0]);
				}
			}
		echo '';
	} else {
		echo 'hubo un error al modificar datos';
	}
}
function eliminarOrdenes($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarOrdenes($id);
echo $res;
}

function finalizarOrden($serviciosReferencias) {
	$idOrden = $_POST['id'];
	$usuario = $_POST['usuario'];
	$res = $serviciosReferencias->finalizarOrden($idOrden, $usuario);
	if ($res == true) {
		echo '';
	} else {
		echo 'hubo un error al finalizar la orden';
	}
}


function insertarUsuarios($serviciosReferencias) {
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$refroles = $_POST['refroles'];
	$email = $_POST['email'];
	$nombrecompleto = $_POST['nombrecompleto'];
	$res = $serviciosReferencias->insertarUsuarios($usuario,$password,$refroles,$email,$nombrecompleto);
	if ((integer)$res > 0) {
	echo '';
	} else {
	echo 'hubo un error al insertar datos';
	}
}

function modificarUsuarios($serviciosReferencias) {
$id = $_POST['id'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$refroles = $_POST['refroles'];
$email = $_POST['email'];
$nombrecompleto = $_POST['nombrecompleto'];
$res = $serviciosReferencias->modificarUsuarios($id,$usuario,$password,$refroles,$email,$nombrecompleto);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarUsuarios($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarUsuarios($id);
echo $res;
}


function insertarVehiculos($serviciosReferencias) {
	$patente 			= str_replace(' ','',ltrim(rtrim($_POST['patente'])));
	$refmodelo 			= $_POST['refmodelo'];
	$reftipovehiculo 	= $_POST['reftipovehiculo'];
	$anio 				= $_POST['anio'];
	$refclientes		= $_POST['refclientes'];
	$observaciones		= $_POST['observaciones'];
	
	if 	($serviciosReferencias->existePatente($patente) == true) {
		echo 'La patente ya fue cargada, no pueden existir dos patentes iguales.';
	} else {
	
		if (($refclientes == '') || ($refclientes == null)) {
			echo 'Debe seleccionar un cliente para poder ingresar un vehiculo';
		} else {
			$res = $serviciosReferencias->insertarVehiculos($patente,$refmodelo,$reftipovehiculo,$anio,$observaciones);
		
			if ((integer)$res > 0) {
				
				$res2 = $serviciosReferencias->insertarClientevehiculos($refclientes,$res,'1');
				if ((integer)$res2 > 0) {
					echo '';	
				} else {
					$serviciosReferencias->eliminarVehiculos($res);
					echo 'hubo un error al insertar datos del dueño';	
				}
				
			} else {
				echo 'hubo un error al insertar datos';
			}
		}
	}
	
	
}


function insertarVehiculosSimple($serviciosReferencias) {
	$patente 			= str_replace(' ','',ltrim(rtrim($_POST['patente2'])));
	$refmodelo 			= $_POST['refmodelo'];
	$reftipovehiculo 	= $_POST['reftipovehiculo'];
	$anio 				= $_POST['anio2'];
	$refclientes		= $_POST['refclientes2'];
	$observaciones		= $_POST['observaciones'];
	
	if 	($serviciosReferencias->existePatente($patente) == true) {
		echo 'La patente ya fue cargada, no pueden existir dos patentes iguales.';
	} else {
	
		if (($refclientes == '') || ($refclientes == null)) {
			echo 'Debe seleccionar un cliente para poder ingresar un vehiculo';
		} else {
			$res = $serviciosReferencias->insertarVehiculos($patente,$refmodelo,$reftipovehiculo,$anio,$observaciones);
		
			if ((integer)$res > 0) {
				
				$res2 = $serviciosReferencias->insertarClientevehiculos($refclientes,$res,'1');
				if ((integer)$res2 > 0) {
					echo '';	
				} else {
					$serviciosReferencias->eliminarVehiculos($res);
					echo 'hubo un error al insertar datos del dueño';	
				}
				
			} else {
				echo 'hubo un error al insertar datos';
			}
		}
	}
	
	
}

	function modificarVehiculos($serviciosReferencias) {
		$id = $_POST['id'];
		$patente = $_POST['patente'];
		$refmodelo = $_POST['refmodelo'];
		$reftipovehiculo = $_POST['reftipovehiculo'];
		$anio = $_POST['anio'];
		$observaciones		= $_POST['observaciones'];

		$res = $serviciosReferencias->modificarVehiculos($id,$patente,$refmodelo,$reftipovehiculo,$anio,$observaciones);
		
		if ($res == true) {
			echo '';
		} else {
			echo 'hubo un error al modificar datos';
		}
	}

function eliminarVehiculos($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarVehiculos($id);
echo $res;
}
function insertarPredio_menu($serviciosReferencias) {
$url = $_POST['url'];
$icono = $_POST['icono'];
$nombre = $_POST['nombre'];
$Orden = $_POST['Orden'];
$hover = $_POST['hover'];
$permiso = $_POST['permiso'];
$res = $serviciosReferencias->insertarPredio_menu($url,$icono,$nombre,$Orden,$hover,$permiso);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarPredio_menu($serviciosReferencias) {
$id = $_POST['id'];
$url = $_POST['url'];
$icono = $_POST['icono'];
$nombre = $_POST['nombre'];
$Orden = $_POST['Orden'];
$hover = $_POST['hover'];
$permiso = $_POST['permiso'];
$res = $serviciosReferencias->modificarPredio_menu($id,$url,$icono,$nombre,$Orden,$hover,$permiso);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarPredio_menu($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarPredio_menu($id);
echo $res;
}
function insertarEstados($serviciosReferencias) {
$estado = $_POST['estado'];
$res = $serviciosReferencias->insertarEstados($estado);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarEstados($serviciosReferencias) {
$id = $_POST['id'];
$estado = $_POST['estado'];
$res = $serviciosReferencias->modificarEstados($id,$estado);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarEstados($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarEstados($id);
echo $res;
}
function insertarMarca($serviciosReferencias) {
$marca = $_POST['marca'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarMarca($marca,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarMarca($serviciosReferencias) {
$id = $_POST['id'];
$marca = $_POST['marca'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarMarca($id,$marca,$activo);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarMarca($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarMarca($id);
echo $res;
}
function insertarModelo($serviciosReferencias) {
$modelo = $_POST['modelo'];
$refmarca = $_POST['refmarca'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarModelo($modelo,$refmarca,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarModelo($serviciosReferencias) {
$id = $_POST['id'];
$modelo = $_POST['modelo'];
$refmarca = $_POST['refmarca'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarModelo($id,$modelo,$refmarca,$activo);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarModelo($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarModelo($id);
echo $res;
}
function insertarRoles($serviciosReferencias) {
$descripcion = $_POST['descripcion'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarRoles($descripcion,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarRoles($serviciosReferencias) {
$id = $_POST['id'];
$descripcion = $_POST['descripcion'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarRoles($id,$descripcion,$activo);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarRoles($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarRoles($id);
echo $res;
}
function insertarTipovehiculo($serviciosReferencias) {
$tipovehiculo = $_POST['tipovehiculo'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->insertarTipovehiculo($tipovehiculo,$activo);
if ((integer)$res > 0) {
echo '';
} else {
echo 'hubo un error al insertar datos';
}
}
function modificarTipovehiculo($serviciosReferencias) {
$id = $_POST['id'];
$tipovehiculo = $_POST['tipovehiculo'];
if (isset($_POST['activo'])) {
$activo = 1;
} else {
$activo = 0;
}
$res = $serviciosReferencias->modificarTipovehiculo($id,$tipovehiculo,$activo);
if ($res == true) {
echo '';
} else {
echo 'hubo un error al modificar datos';
}
}
function eliminarTipovehiculo($serviciosReferencias) {
$id = $_POST['id'];
$res = $serviciosReferencias->eliminarTipovehiculo($id);
echo $res;
}
function insertarPagos($serviciosReferencias) { 
$refordenes = $_POST['refordenes']; 
$pago = $_POST['pago']; 
$fechapago = $_POST['fechapago']; 
$res = $serviciosReferencias->insertarPagos($refordenes,$pago,$fechapago); 
if ((integer)$res > 0) { 
echo ''; 
} else { 
echo 'hubo un error al insertar datos';	
} 
} 
function modificarPagos($serviciosReferencias) { 
$id = $_POST['id']; 
$refordenes = $_POST['refordenes']; 
$pago = $_POST['pago']; 
$fechapago = $_POST['fechapago']; 
$res = $serviciosReferencias->modificarPagos($id,$refordenes,$pago,$fechapago); 
if ($res == true) { 
echo ''; 
} else { 
echo 'hubo un error al modificar datos'; 
} 
} 
function eliminarPagos($serviciosReferencias) { 
$id = $_POST['id']; 
$res = $serviciosReferencias->eliminarPagos($id); 
echo $res; 
} 


function traerPagosPorOrden($serviciosReferencias) {
	$orden		=	$_POST['id'];	
	
	$res 		= $serviciosReferencias->traerPagosPorOrden($orden);
	
	$cadRef = '';
	while ($row = mysql_fetch_array($res)) {
		$cadRef .= "<p><span class='glyphicon glyphicon-usd'></span> ".$row['pago']." - Fecha: ".$row['fechapago']."</p>";
	}
	echo $cadRef;
}

////////////////////////// FIN DE TRAER DATOS ////////////////////////////////////////////////////////////

//////////////////////////  BASICO  /////////////////////////////////////////////////////////////////////////

function toArray($query)
{
    $res = array();
    while ($row = @mysql_fetch_array($query)) {
        $res[] = $row;
    }
    return $res;
}


function entrar($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	echo $serviciosUsuarios->loginUsuario($email,$pass);
}


function registrar($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroll'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function insertarUsuario($serviciosUsuarios) {
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroles'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	$res = $serviciosUsuarios->insertarUsuario($usuario,$password,$refroll,$email,$nombre);
	if ((integer)$res > 0) {
		echo '';	
	} else {
		echo $res;	
	}
}


function modificarUsuario($serviciosUsuarios) {
	$id					=	$_POST['id'];
	$usuario			=	$_POST['usuario'];
	$password			=	$_POST['password'];
	$refroll			=	$_POST['refroles'];
	$email				=	$_POST['email'];
	$nombre				=	$_POST['nombrecompleto'];
	
	echo $serviciosUsuarios->modificarUsuario($id,$usuario,$password,$refroll,$email,$nombre);
}


function enviarMail($serviciosUsuarios) {
	$email		=	$_POST['email'];
	$pass		=	$_POST['pass'];
	//$idempresa  =	$_POST['idempresa'];
	
	echo $serviciosUsuarios->login($email,$pass);
}


function devolverImagen($nroInput) {
	
	if( $_FILES['archivo'.$nroInput]['name'] != null && $_FILES['archivo'.$nroInput]['size'] > 0 ){
	// Nivel de errores
	  error_reporting(E_ALL);
	  $altura = 100;
	  // Constantes
	  # Altura de el thumbnail en píxeles
	  //define("ALTURA", 100);
	  # Nombre del archivo temporal del thumbnail
	  //define("NAMETHUMB", "/tmp/thumbtemp"); //Esto en servidores Linux, en Windows podría ser:
	  //define("NAMETHUMB", "c:/windows/temp/thumbtemp"); //y te olvidas de los problemas de permisos
	  $NAMETHUMB = "c:/windows/temp/thumbtemp";
	  # Servidor de base de datos
	  //define("DBHOST", "localhost");
	  # nombre de la base de datos
	  //define("DBNAME", "portalinmobiliario");
	  # Usuario de base de datos
	  //define("DBUSER", "root");
	  # Password de base de datos
	  //define("DBPASSWORD", "");
	  // Mime types permitidos
	  $mimetypes = array("image/jpeg", "image/pjpeg", "image/gif", "image/png");
	  // Variables de la foto
	  $name = $_FILES["archivo".$nroInput]["name"];
	  $type = $_FILES["archivo".$nroInput]["type"];
	  $tmp_name = $_FILES["archivo".$nroInput]["tmp_name"];
	  $size = $_FILES["archivo".$nroInput]["size"];
	  // Verificamos si el archivo es una imagen válida
	  if(!in_array($type, $mimetypes))
		die("El archivo que subiste no es una imagen válida");
	  // Creando el thumbnail
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  $img = imagecreatefromjpeg($tmp_name);
		  break;
		case $mimetypes[2]:
		  $img = imagecreatefromgif($tmp_name);
		  break;
		case $mimetypes[3]:
		  $img = imagecreatefrompng($tmp_name);
		  break;
	  }
	  
	  $datos = getimagesize($tmp_name);
	  
	  $ratio = ($datos[1]/$altura);
	  $ancho = round($datos[0]/$ratio);
	  $thumb = imagecreatetruecolor($ancho, $altura);
	  imagecopyresized($thumb, $img, 0, 0, 0, 0, $ancho, $altura, $datos[0], $datos[1]);
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  imagejpeg($thumb, $NAMETHUMB);
			  break;
		case $mimetypes[2]:
		  imagegif($thumb, $NAMETHUMB);
		  break;
		case $mimetypes[3]:
		  imagepng($thumb, $NAMETHUMB);
		  break;
	  }
	  // Extrae los contenidos de las fotos
	  # contenido de la foto original
	  $fp = fopen($tmp_name, "rb");
	  $tfoto = fread($fp, filesize($tmp_name));
	  $tfoto = addslashes($tfoto);
	  fclose($fp);
	  # contenido del thumbnail
	  $fp = fopen($NAMETHUMB, "rb");
	  $tthumb = fread($fp, filesize($NAMETHUMB));
	  $tthumb = addslashes($tthumb);
	  fclose($fp);
	  // Borra archivos temporales si es que existen
	  //@unlink($tmp_name);
	  //@unlink(NAMETHUMB);
	} else {
		$tfoto = '';
		$type = '';
	}
	$tfoto = utf8_decode($tfoto);
	return array('tfoto' => $tfoto, 'type' => $type);	
}


?>