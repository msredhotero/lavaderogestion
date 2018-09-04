<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosReferencias {

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}





/* PARA Clientes */

function insertarClientes($apellido,$nombre,$nrodocumento,$fechanacimiento,$direccion,$telefono,$email) {
$sql = "insert into dbclientes(idcliente,apellido,nombre,nrodocumento,fechanacimiento,direccion,telefono,email)
values ('','".($apellido)."','".($nombre)."',".$nrodocumento.",'".($fechanacimiento)."','".($direccion)."','".($telefono)."','".($email)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarClientes($id,$apellido,$nombre,$nrodocumento,$fechanacimiento,$direccion,$telefono,$email) {
$sql = "update dbclientes
set
apellido = '".($apellido)."',nombre = '".($nombre)."',nrodocumento = ".$nrodocumento.",fechanacimiento = '".($fechanacimiento)."',direccion = '".($direccion)."',telefono = '".($telefono)."',email = '".($email)."'
where idcliente =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarClientes($id) {
$sql = "delete from dbclientes where idcliente =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerClientes() {
$sql = "select
c.idcliente,
c.apellido,
c.nombre,
c.nrodocumento,
c.fechanacimiento,
c.direccion,
c.telefono,
c.email
from dbclientes c
order by concat(c.apellido,' ',c.nombre)";
$res = $this->query($sql,0);
return $res;
}


function traerClientesPorId($id) {
$sql = "select idcliente,apellido,nombre,nrodocumento,fechanacimiento,direccion,telefono,email from dbclientes where idcliente =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbclientes*/


/* PARA Clientevehiculos */

function insertarClientevehiculos($refclientes,$refvehiculos,$activo) {
$sql = "insert into dbclientevehiculos(idclientevehiculo,refclientes,refvehiculos,activo)
values ('',".$refclientes.",".$refvehiculos.",".$activo.")";
$res = $this->query($sql,1);
return $res;

}


function modificarClientevehiculos($id,$refclientes,$refvehiculos,$activo) {
$sql = "update dbclientevehiculos
set
refclientes = ".$refclientes.",refvehiculos = ".$refvehiculos.",activo = ".$activo."
where idclientevehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarClientevehiculos($id) {
$sql = "delete from dbclientevehiculos where idclientevehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerClientevehiculos() {
$sql = "select
c.idclientevehiculo,
concat(cli.apellido,' ',cli.nombre,', Dni: ',cast(cli.nrodocumento as char)) as cliente,
concat(ma.marca,' ',mo.modelo,' - ',veh.patente) as vehiculo,
veh.anio,
c.activo
from dbclientevehiculos c
inner join dbclientes cli ON cli.idcliente = c.refclientes
inner join dbvehiculos veh ON veh.idvehiculo = c.refvehiculos
inner join tbmodelo mo ON mo.idmodelo = veh.refmodelo
inner join tbmarca ma ON ma.idmarca = mo.refmarca
inner join tbtipovehiculo ti ON ti.idtipovehiculo = veh.reftipovehiculo
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerClientevehiculosPorId($id) {
$sql = "select idclientevehiculo,refclientes,refvehiculos,activo from dbclientevehiculos where idclientevehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}

function traerClientevehiculosPorClienteVehiculo($idCliente,$idVehiculo) {
$sql = "select idclientevehiculo,refclientes,refvehiculos,activo from dbclientevehiculos where refclientes =".$idCliente." and refvehiculos =".$idVehiculo;
$res = $this->query($sql,0);
return $res;
}


function traerClientevehiculosPorVehiculo($idVehiculo) {
$sql = "select idclientevehiculo,refclientes,refvehiculos,activo from dbclientevehiculos where refvehiculos =".$idVehiculo;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbclientevehiculos*/


/* PARA Ordenes */

function insertarOrdenes($numero,$refclientevehiculos,$fechacrea,$fechamodi,$usuacrea,$usuamodi,$detallereparacion,$refestados,$precio,$anticipo) {
$sql = "insert into dbordenes(idorden,numero,refclientevehiculos,fechacrea,fechamodi,usuacrea,usuamodi,detallereparacion,refestados,precio,anticipo)
values ('','".($numero)."',".$refclientevehiculos.",'".date('Y-m-d')."','".($fechamodi)."','".($usuacrea)."','".($usuamodi)."','".($detallereparacion)."',".$refestados.",".$precio.",".$anticipo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarOrdenes($id,$numero,$refclientevehiculos,$fechacrea,$fechamodi,$usuacrea,$usuamodi,$detallereparacion,$refestados,$precio,$anticipo) {
$sql = "update dbordenes
set
numero = '".($numero)."',refclientevehiculos = ".$refclientevehiculos.",fechacrea = '".($fechacrea)."',fechamodi = '".($fechamodi)."',usuacrea = '".($usuacrea)."',usuamodi = '".($usuamodi)."',detallereparacion = '".($detallereparacion)."',refestados = ".$refestados.",precio = ".$precio.",anticipo = ".$anticipo."
where idorden =".$id;
$res = $this->query($sql,0);
return $res;
} 


function eliminarOrdenes($id) {
	// elimino los responsables
	$this->eliminarOrdenesresponsablesPorOrden($id);
	//elimino los pagos	
	$this->eliminarPagosPorOrden($id);
	
	//elimino la orden	
	$sql = "delete from dbordenes where idorden =".$id;
	$res = $this->query($sql,0);
	return $res;
}

function zerofill($valor, $longitud){
 $res = str_pad($valor, $longitud, '0', STR_PAD_LEFT);
 return $res;
}

function generarNroOrden() {
	$sql = "select idorden from dbordenes order by idorden desc limit 1";
	$res = $this->query($sql,0);
	if (mysql_num_rows($res)>0) {
		$c = $this->zerofill(mysql_result($res,0,0)+1,6);
		return "ORD".$c;
	}
	return "ORD000001";
}

function finalizarOrden($idOrden,$usuario) {
	$sql = "update dbordenes set refestados = 1,fechamodi = '".date('Y-m-d')."',usuamodi = '".($usuario)."' where idorden =".$idOrden;
	$res = $this->query($sql,0);	
	return $res;
}

function traerOrdenes() {
$sql = "select
o.idorden,
o.numero,
concat(cl.apellido,' ',cl.nombre,', Dni:',cast(cl.nrodocumento as char)) as cliente,
concat(ma.marca,' ',mo.modelo,' - ',ve.patente) as vehiculo,
ve.anio,
DATE_FORMAT(o.fechacrea,'%Y-%m-%d'),
o.detallereparacion,
o.precio,
o.anticipo,
est.estado,
o.fechamodi,
o.usuacrea,
o.usuamodi,
o.refclientevehiculos,
o.refestados
from dbordenes o
inner join dbclientevehiculos cli ON cli.idclientevehiculo = o.refclientevehiculos
inner join dbclientes cl ON cl.idcliente = cli.refclientes
inner join dbvehiculos ve ON ve.idvehiculo = cli.refvehiculos
inner join tbmodelo mo ON mo.idmodelo = ve.refmodelo
inner join tbmarca ma ON ma.idmarca = mo.refmarca
inner join tbestados est ON est.idestado = o.refestados
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerOrdenesActivos() {
$sql = "select
o.idorden,
o.numero,
concat(cl.apellido,' ',cl.nombre,', Dni:',cast(cl.nrodocumento as char)) as cliente,
concat(ma.marca,' ',mo.modelo,' - ',ve.patente) as vehiculo,
DATE_FORMAT(o.fechacrea,'%Y-%m-%d') as fecha,
o.detallereparacion,
o.precio,
(o.precio - coalesce(pp.monto,0)) as saldo,
est.estado,
o.fechamodi,
o.usuacrea,
o.usuamodi,
o.refclientevehiculos,
o.refestados
from dbordenes o
inner join dbclientevehiculos cli ON cli.idclientevehiculo = o.refclientevehiculos
inner join dbclientes cl ON cl.idcliente = cli.refclientes
inner join dbvehiculos ve ON ve.idvehiculo = cli.refvehiculos
inner join tbmodelo mo ON mo.idmodelo = ve.refmodelo
inner join tbmarca ma ON ma.idmarca = mo.refmarca
inner join tbestados est ON est.idestado = o.refestados
left join (select sum(pago) as monto,refordenes from dbpagos) pp ON pp.refordenes = o.idorden
where	est.estado != 'Finalizado'
order by 1";
$res = $this->query($sql,0);
return $res;
}



function traerOrdenesMora() {
$sql = "select
o.idorden,
o.numero,
concat(cl.apellido,' ',cl.nombre,', Dni:',cast(cl.nrodocumento as char)) as cliente,
concat(ma.marca,' ',mo.modelo,' - ',ve.patente) as vehiculo,
DATE_FORMAT(o.fechacrea,'%Y-%m-%d') as fecha,
o.detallereparacion,
o.precio,
(o.precio - coalesce(pp.monto,0)) as saldo,
est.estado,
o.fechamodi,
o.usuacrea,
o.usuamodi,
o.refclientevehiculos,
o.refestados
from dbordenes o
inner join dbclientevehiculos cli ON cli.idclientevehiculo = o.refclientevehiculos
inner join dbclientes cl ON cl.idcliente = cli.refclientes
inner join dbvehiculos ve ON ve.idvehiculo = cli.refvehiculos
inner join tbmodelo mo ON mo.idmodelo = ve.refmodelo
inner join tbmarca ma ON ma.idmarca = mo.refmarca
inner join tbestados est ON est.idestado = o.refestados
left join (select sum(pago) as monto,refordenes from dbpagos) pp ON pp.refordenes = o.idorden
where	est.estado = 'Finalizado' and coalesce(pp.monto,0) < o.precio
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerOrdenesPorId($id) {
$sql = "select idorden,numero,refclientevehiculos,fechacrea,fechamodi,usuacrea,usuamodi,detallereparacion,refestados,precio from dbordenes where idorden =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbordenes*/


/* PARA Usuarios */

function insertarUsuarios($usuario,$password,$refroles,$email,$nombrecompleto) {
$sql = "insert into dbusuarios(idusuario,usuario,password,refroles,email,nombrecompleto)
values ('','".($usuario)."','".($password)."',".$refroles.",'".($email)."','".($nombrecompleto)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarUsuarios($id,$usuario,$password,$refroles,$email,$nombrecompleto) {
$sql = "update dbusuarios
set
usuario = '".($usuario)."',password = '".($password)."',refroles = ".$refroles.",email = '".($email)."',nombrecompleto = '".($nombrecompleto)."'
where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUsuarios($id) {
$sql = "delete from dbusuarios where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerUsuarios() {
$sql = "select
u.idusuario,
u.usuario,
u.password,
u.refroles,
u.email,
u.nombrecompleto
from dbusuarios u
inner join tbroles rol ON rol.idrol = u.refroles
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerUsuariosPorId($id) {
$sql = "select idusuario,usuario,password,refroles,email,nombrecompleto from dbusuarios where idusuario =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbusuarios*/


/* PARA Vehiculos */

function insertarVehiculos($patente,$refmodelo,$reftipovehiculo,$anio) {
$sql = "insert into dbvehiculos(idvehiculo,patente,refmodelo,reftipovehiculo,anio)
values ('','".(strtoupper($patente))."',".$refmodelo.",".$reftipovehiculo.",".$anio.")";
$res = $this->query($sql,1);
return $res;
}


function modificarVehiculos($id,$patente,$refmodelo,$reftipovehiculo,$anio) {
$sql = "update dbvehiculos
set
patente = '".(strtoupper($patente))."',refmodelo = ".$refmodelo.",reftipovehiculo = ".$reftipovehiculo.",anio = ".$anio."
where idvehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarVehiculos($id) {
$sql = "delete from dbvehiculos where idvehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerVehiculos() {
$sql = "select
v.idvehiculo,
v.patente,
v.refmodelo,
v.reftipovehiculo,
v.anio
from dbvehiculos v
inner join tbmodelo mod ON mod.idmodelo = v.refmodelo
inner join tbmarca ma ON ma.idmarca = mod.refmarca
inner join tbtipovehiculo tip ON tip.idtipovehiculo = v.reftipovehiculo
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerVehiculosClientes() {
$sql = "select
v.idvehiculo,
v.patente,
concat(cc.apellido,' ',cc.nombre) as titular,
ma.marca,
mo.modelo,
tip.tipovehiculo,
v.anio
from dbvehiculos v
inner join tbmodelo mo ON mo.idmodelo = v.refmodelo
inner join tbmarca ma ON ma.idmarca = mo.refmarca
inner join tbtipovehiculo tip ON tip.idtipovehiculo = v.reftipovehiculo
inner join dbclientevehiculos cv on cv.refvehiculos = v.idvehiculo
inner join dbclientes cc on cv.refclientes = cc.idcliente
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerVehiculosPorId($id) {
$sql = "select idvehiculo,patente,refmodelo,reftipovehiculo,anio from dbvehiculos where idvehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}

function existePatente($patente) {
	$sql = "select idvehiculo from dbvehiculos where patente = '".str_replace(' ','',trim($patente))."'";	
	$res = $this->query($sql,0);
	if (mysql_num_rows($res)>0) {
		return true;	
	}
	return false;
}
/* Fin */
/* /* Fin de la Tabla: dbvehiculos*/


/* PARA Predio_menu */

function insertarPredio_menu($url,$icono,$nombre,$Orden,$hover,$permiso) {
$sql = "insert into predio_menu(idmenu,url,icono,nombre,Orden,hover,permiso)
values ('','".($url)."','".($icono)."','".($nombre)."',".$Orden.",'".($hover)."','".($permiso)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarPredio_menu($id,$url,$icono,$nombre,$Orden,$hover,$permiso) {
$sql = "update predio_menu
set
url = '".($url)."',icono = '".($icono)."',nombre = '".($nombre)."',Orden = ".$Orden.",hover = '".($hover)."',permiso = '".($permiso)."'
where idmenu =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarPredio_menu($id) {
$sql = "delete from predio_menu where idmenu =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerPredio_menu() {
$sql = "select
p.idmenu,
p.url,
p.icono,
p.nombre,
p.Orden,
p.hover,
p.permiso
from predio_menu p
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerPredio_menuPorId($id) {
$sql = "select idmenu,url,icono,nombre,Orden,hover,permiso from predio_menu where idmenu =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: predio_menu*/


/* PARA Estados */

function insertarEstados($estado) {
$sql = "insert into tbestados(idestado,estado)
values ('','".($estado)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarEstados($id,$estado) {
$sql = "update tbestados
set
estado = '".($estado)."'
where idestado =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarEstados($id) {
$sql = "delete from tbestados where idestado =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerEstados() {
$sql = "select
e.idestado,
e.estado
from tbestados e
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerEstadosPorId($id) {
$sql = "select idestado,estado from tbestados where idestado =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbestados*/


/* PARA Marca */

function insertarMarca($marca,$activo) {
$sql = "insert into tbmarca(idmarca,marca,activo)
values ('','".($marca)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarMarca($id,$marca,$activo) {
$sql = "update tbmarca
set
marca = '".($marca)."',activo = ".$activo."
where idmarca =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarMarca($id) {
$sql = "delete from tbmarca where idmarca =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerMarca() {
$sql = "select
m.idmarca,
m.marca,
(case when m.activo = 1 then 'Si' else 'No' end) as activo
from tbmarca m
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerMarcaPorId($id) {
$sql = "select idmarca,marca,activo from tbmarca where idmarca =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbmarca*/


/* PARA Modelo */

function insertarModelo($modelo,$refmarca,$activo) {
$sql = "insert into tbmodelo(idmodelo,modelo,refmarca,activo)
values ('','".($modelo)."',".$refmarca.",".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarModelo($id,$modelo,$refmarca,$activo) {
$sql = "update tbmodelo
set
modelo = '".($modelo)."',refmarca = ".$refmarca.",activo = ".$activo."
where idmodelo =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarModelo($id) {
$sql = "delete from tbmodelo where idmodelo =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerModelo() {
$sql = "select
m.idmodelo,
m.modelo,
mar.marca,
(case when m.activo = 1 then 'Si' else 'No' end) as activo
from tbmodelo m
inner join tbmarca mar ON mar.idmarca = m.refmarca
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerModeloPorId($id) {
$sql = "select idmodelo,modelo,refmarca,activo from tbmodelo where idmodelo =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbmodelo*/


/* PARA Roles */

function insertarRoles($descripcion,$activo) {
$sql = "insert into tbroles(idrol,descripcion,activo)
values ('','".($descripcion)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarRoles($id,$descripcion,$activo) {
$sql = "update tbroles
set
descripcion = '".($descripcion)."',activo = ".$activo."
where idrol =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarRoles($id) {
$sql = "delete from tbroles where idrol =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerRoles() {
$sql = "select
r.idrol,
r.descripcion,
r.activo
from tbroles r
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerRolesPorId($id) {
$sql = "select idrol,descripcion,activo from tbroles where idrol =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbroles*/


/* PARA Tipovehiculo */

function insertarTipovehiculo($tipovehiculo,$activo) {
$sql = "insert into tbtipovehiculo(idtipovehiculo,tipovehiculo,activo)
values ('','".($tipovehiculo)."',".$activo.")";
$res = $this->query($sql,1);
return $res;
}


function modificarTipovehiculo($id,$tipovehiculo,$activo) {
$sql = "update tbtipovehiculo
set
tipovehiculo = '".($tipovehiculo)."',activo = ".$activo."
where idtipovehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipovehiculo($id) {
$sql = "delete from tbtipovehiculo where idtipovehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTipovehiculo() {
$sql = "select
t.idtipovehiculo,
t.tipovehiculo,
t.activo
from tbtipovehiculo t
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerTipovehiculoPorId($id) {
$sql = "select idtipovehiculo,tipovehiculo,activo from tbtipovehiculo where idtipovehiculo =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: tbtipovehiculo*/


/* PARA Empleados */

function insertarEmpleados($apellido,$nombre,$nrodocumento,$fechanacimiento,$cuil,$telefono,$telefonofijo,$direccion,$email) {
$sql = "insert into dbempleados(idempleado,apellido,nombre,nrodocumento,fechanacimiento,cuil,telefono,telefonofijo,direccion,email)
values ('','".($apellido)."','".($nombre)."','".($nrodocumento)."','".($fechanacimiento)."','".($cuil)."','".($telefono)."','".($telefonofijo)."','".($direccion)."','".($email)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarEmpleados($id,$apellido,$nombre,$nrodocumento,$fechanacimiento,$cuil,$telefono,$telefonofijo,$direccion,$email) {
$sql = "update dbempleados
set
apellido = '".($apellido)."',nombre = '".($nombre)."',nrodocumento = '".($nrodocumento)."',fechanacimiento = '".($fechanacimiento)."',cuil = '".($cuil)."',telefono = '".($telefono)."',telefonofijo = '".($telefonofijo)."',direccion = '".($direccion)."',email = '".($email)."'
where idempleado =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarEmpleados($id) {
$sql = "delete from dbempleados where idempleado =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerEmpleados() {
$sql = "select
e.idempleado,
e.apellido,
e.nombre,
e.nrodocumento,
e.fechanacimiento,
e.cuil,
e.telefono,
e.telefonofijo,
e.direccion,
e.email
from dbempleados e
order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerEmpleadosPorId($id) {
$sql = "select idempleado,apellido,nombre,nrodocumento,fechanacimiento,cuil,telefono,telefonofijo,direccion,email from dbempleados where idempleado =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbempleados*/


/* PARA Ordenesresponsables */

function insertarOrdenesresponsables($refordenes,$refempleados) {
$sql = "insert into dbordenesresponsables(idordenresponsables,refordenes,refempleados)
values ('',".$refordenes.",".$refempleados.")";
$res = $this->query($sql,1);
return $res;
}


function modificarOrdenesresponsables($id,$refordenes,$refempleados) {
$sql = "update dbordenesresponsables
set
refordenes = ".$refordenes.",refempleados = ".$refempleados."
where idordenresponsables =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarOrdenesresponsables($id) {
$sql = "delete from dbordenesresponsables where idordenresponsables =".$id;
$res = $this->query($sql,0);
return $res;
}

function eliminarOrdenesresponsablesPorOrden($orden) {
$sql = "delete from dbordenesresponsables where refordenes =".$orden;
$res = $this->query($sql,0);
return $res;
}


function traerOrdenesresponsables() {
$sql = "select
o.idordenresponsables,
o.refordenes,
o.refempleados
from dbordenesresponsables o
inner join dbordenes ord ON ord.idorden = o.refordenes
inner join dbclientevehiculos cl ON cl.idclientevehiculo = ord.refclientevehiculos
inner join tbestados es ON es.idestado = ord.refestados
inner join dbempleados emp ON emp.idempleado = o.refempleados
order by 1";
$res = $this->query($sql,0);
return $res;
}

function traerResponsablesPorOrden($orden) {
	$sql = "select
o.idordenresponsables,
o.refordenes,
o.refempleados,
emp.apellido,
emp.nombre,
emp.nrodocumento,
emp.cuil
from dbordenesresponsables o
inner join dbordenes ord ON ord.idorden = o.refordenes
inner join dbclientevehiculos cl ON cl.idclientevehiculo = ord.refclientevehiculos
inner join tbestados es ON es.idestado = ord.refestados
inner join dbempleados emp ON emp.idempleado = o.refempleados
where o.refordenes = ".$orden."
order by 1";
$res = $this->query($sql,0);
return $res;
}

function traerOrdenesresponsablesPorId($id) {
$sql = "select idordenresponsables,refordenes,refempleados from dbordenesresponsables where idordenresponsables =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */
/* /* Fin de la Tabla: dbordenesresponsables*/


/* PARA Pagos */

function insertarPagos($refordenes,$pago,$fechapago) { 
$sql = "insert into dbpagos(idpago,refordenes,pago,fechapago) 
values ('',".$refordenes.",".$pago.",'".($fechapago)."')"; 
$res = $this->query($sql,1); 
return $res; 
} 


function modificarPagos($id,$refordenes,$pago,$fechapago) { 
$sql = "update dbpagos 
set 
refordenes = ".$refordenes.",pago = ".$pago.",fechapago = '".($fechapago)."' 
where idpago =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 


function eliminarPagos($id) { 
$sql = "delete from dbpagos where idpago =".$id; 
$res = $this->query($sql,0); 
return $res; 
}


function eliminarPagosPorOrden($orden) { 
$sql = "delete from dbpagos where refordenes =".$orden; 
$res = $this->query($sql,0); 
return $res; 
} 


function traerPagos() { 
$sql = "select 
p.idpago,
concat(cl.apellido,' ',cl.nombre,', Dni:',cast(cl.nrodocumento as char)) as cliente,
concat(ma.marca,' ',mo.modelo,' - ',ve.patente) as vehiculo,
ord.numero,
p.pago,
p.fechapago,
es.estado,
p.refordenes
from dbpagos p 
inner join dbordenes ord ON ord.idorden = p.refordenes 
inner join dbclientevehiculos cli ON cli.idclientevehiculo = ord.refclientevehiculos 
inner join tbestados es ON es.idestado = ord.refestados 
inner join dbclientes cl ON cl.idcliente = cli.refclientes
inner join dbvehiculos ve ON ve.idvehiculo = cli.refvehiculos
inner join tbmodelo mo ON mo.idmodelo = ve.refmodelo
inner join tbmarca ma ON ma.idmarca = mo.refmarca
order by 1"; 
$res = $this->query($sql,0); 
return $res; 
} 



function traerPagosPorOrden($idOrden) {
$sql = "select 
p.idpago,
concat(cl.apellido,' ',cl.nombre,', Dni:',cast(cl.nrodocumento as char)) as cliente,
concat(ma.marca,' ',mo.modelo,' - ',ve.patente) as vehiculo,
ord.numero,
p.pago,
p.fechapago,
es.estado,
p.refordenes
from dbpagos p 
inner join dbordenes ord ON ord.idorden = p.refordenes 
inner join dbclientevehiculos cli ON cli.idclientevehiculo = ord.refclientevehiculos 
inner join tbestados es ON es.idestado = ord.refestados 
inner join dbclientes cl ON cl.idcliente = cli.refclientes
inner join dbvehiculos ve ON ve.idvehiculo = cli.refvehiculos
inner join tbmodelo mo ON mo.idmodelo = ve.refmodelo
inner join tbmarca ma ON ma.idmarca = mo.refmarca
where	ord.idorden = ".$idOrden."
order by 1"; 
$res = $this->query($sql,0); 
return $res;

}


function traerPagosPorId($id) { 
$sql = "select idpago,refordenes,pago,fechapago from dbpagos where idpago =".$id; 
$res = $this->query($sql,0); 
return $res; 
} 

/* Fin */
/* /* Fin de la Tabla: dbpagos*/



function query($sql,$accion) {
		
		
		
		require_once 'appconfig.php';

		$appconfig	= new appconfig();
		$datos		= $appconfig->conexion();	
		$hostname	= $datos['hostname'];
		$database	= $datos['database'];
		$username	= $datos['username'];
		$password	= $datos['password'];
		
		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		mysql_select_db($database);
		
		        $error = 0;
		mysql_query("BEGIN");
		$result=mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		if(!$result){
			$error=1;
		}
		if($error==1){
			mysql_query("ROLLBACK");
			return false;
		}
		 else{
			mysql_query("COMMIT");
			return $result;
		}
		
	}

}

?>