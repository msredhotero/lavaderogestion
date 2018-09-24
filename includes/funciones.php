<?php

/**
 * @author www.intercambiosvirtuales.org
 * @copyright 2013
 */
date_default_timezone_set('America/Buenos_Aires');

class Servicios {
	
	function devolverSelectBox($datos, $ar, $delimitador) {
		
		$cad		= ''; 
		while ($rowTT = mysql_fetch_array($datos)) {
			$contenido	= '';
			foreach ($ar as $i) {
				$contenido .= $rowTT[$i].$delimitador;
			}
			$cad .= '<option value="'.$rowTT[0].'">'.utf8_encode(substr($contenido,0,strlen($contenido)-strlen($delimitador))).'</option>';
		}
		return $cad;
	}
	
	function devolverSelectBoxActivo($datos, $ar, $delimitador, $idSelect) {
		
		$cad		= ''; 
		while ($rowTT = mysql_fetch_array($datos)) {
			$contenido	= '';
			foreach ($ar as $i) {
				$contenido .= $rowTT[$i].$delimitador;
			}
			if ($rowTT[0] == $idSelect) {
				$cad .= '<option value="'.$rowTT[0].'" selected="selected">'.utf8_encode(substr($contenido,0,strlen($contenido)-strlen($delimitador))).'</option>';
			} else {
				$cad .= '<option value="'.$rowTT[0].'">'.utf8_encode(substr($contenido,0,strlen($contenido)-strlen($delimitador))).'</option>';
			}
		}
		return $cad;
	}

	function camposTablaView($cabeceras,$datos,$cantidad) {
		$cadView = '';
		$cadRows = '';
		$classTask = '';
		$classVer = '';
		$classEditar = '';
		$classFinalizar = '';
		$classPagar = '';
		$lblTask = '';

		$classVar = '';
		$icoVar = '';
		$lblVar = '';
		$classVar2 = '';
		$icoVar2 = '';
		$lblVar2 = '';
		$classModNuevo = 'dejar asi';


		switch ($cantidad) {
			case 99:
				$cantidad = 8;
				$classMod = '';
				$classEli = 'varborrar';
				$idresultados = "resultados";
				break;
			case 98:
				$cantidad = 3;
				$classMod = 'varmodificarpredio';
				$classEli = 'varborrarpredio';
				$idresultados = "resultadospredio";
				break;
			case 97:
				$cantidad = 3;
				$classMod = 'varmodificarprincipal';
				$classEli = 'varborrarprincipal';
				$idresultados = "resultadosprincipal";
				break;
			case 96:
				$cantidad = 9;
				$classMod = 'varmodificar';
				$classVer = 'varver';
				$lblVer	  = 'Responsables';
				$classEli = 'varborrar';
				$idresultados = "resultados";
				break;
			case 95:
				$cantidad = 8;
				$classMod = 'varmodificar';
				$classTask	  = 'varpagos';
				$classFinalizar = 'varfinalizar';
				$classEli = 'varborrar';
				$classPagar = 'varpagar';
				$idresultados = "resultados";
				$lblTask = 'Pagos';
				break;
			case 94:
				$cantidad = 8;
				$classMod = 'varmodificar';
				$classTask	  = 'varpagos';
				$classEli = 'varborrar';
				$classPagar = 'varpagar';
				$idresultados = "resultados";
				$lblTask = 'Pagos';
				break;
			case 93:
				$cantidad = 7;
				$classMod = 'varmodificar';
				$classVar	  = 'varestados';
				$classEli = 'varborrar';
				$icoVar = 'glyphicon glyphicon-transfer';
				$lblVar = 'Cambiar Estado';
				$classVar2	  = 'vardetalle';
				$icoVar2 = 'glyphicon glyphicon-list-alt';
				$lblVar2 = 'Servicios';
				$idresultados = "resultados";
				$classModNuevo = '';
				break;
			default:
				$classMod = 'varmodificar';
				$classEli = 'varborrar';
				$idresultados = "resultados";
		}
		/*if ($cantidad == 99) {
			$cantidad = 5;
			$classMod = 'varmodificargoleadores';
			$classEli = 'varborrargoleadores';
			$idresultados = "resultadosgoleadores";
		} else {
			$classMod = 'varmodificar';
			$classEli = 'varborrar';
			$idresultados = "resultados";
		}*/
		while ($row = mysql_fetch_array($datos)) {
			$cadsubRows = '';
			$cadRows = $cadRows.'
			
					<tr class="'.$row[0].'">
                        	';
			
			
			for ($i=1;$i<=$cantidad;$i++) {
				
				$cadsubRows = $cadsubRows.'<td><div style="height:60px;overflow:auto;">'.$row[$i].'</div></td>';	
			}
			
			
			if ($classMod != '') { 
				$cadRows = $cadRows.'
								'.$cadsubRows.'
								<td>
									
									<div class="btn-group">
										<button class="btn btn-success" type="button">Acciones</button>
										
										<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
										</button>
										
										<ul class="dropdown-menu" role="menu">';
				if ($classModNuevo != '') {						   
					$cadRows = $cadRows.'	<li>
											<a href="javascript:void(0)" class="'.$classMod.'" id="'.$row[0].'"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
											</li>';
				}
				if ($classFinalizar != '') {
					$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classFinalizar.'" id="'.$row[0].'" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-ok"></span> Finalizar</a>
											</li>';	
				}						
				
				if ($classVer != '') {
					$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classVer.'" id="'.$row[0].'" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-search"></span> '.$lblVer.'</a>
											</li>';	
				}
				
				if ($classTask != '') {
					$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classTask.'" id="'.$row[0].'" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-usd"></span> '.$lblTask.'</a>
											</li>';	
				}
				
				if ($classPagar != '') {
					$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classPagar.'" id="'.$row[0].'"><span class="glyphicon glyphicon-shopping-cart"></span> Pagar</a>
											</li>';	
				}
				
				if ($classEditar != '') {
					$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classEditar.'" id="'.$row[0].'" >'.$lblEditar.'</a>
											</li>';	
				}

				if ($classVar != '') {
					$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classVar.'" id="'.$row[0].'" ><span class="'.$icoVar.'"></span> '.$lblVar.'</a>
											</li>';	
				}

				if ($classVar2 != '') {
					$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classVar2.'" id="'.$row[0].'" ><span class="'.$icoVar2.'"></span> '.$lblVar2.'</a>
											</li>';	
				}
										
				$cadRows = $cadRows.'		<li>
											<a href="javascript:void(0)" class="'.$classEli.'" id="'.$row[0].'"><span class="glyphicon glyphicon-remove"></span> Borrar</a>
											</li>
											
										</ul>
									</div>
								</td>
							</tr>
				';
			} else {
				
				$cadRows = $cadRows.'
								'.$cadsubRows.'
								<td>
									
									<div class="btn-group">
										<button class="btn btn-success" type="button">Action</button>
										
										<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
										</button>
										
										<ul class="dropdown-menu" role="menu">
										
											<li>
											<a href="javascript:void(0)" class="'.$classEli.'" id="'.$row[0].'">Delete</a>
											</li>
											
										</ul>
									</div>
								</td>
							</tr>
				';
			}
		}
		
		//'.utf8_encode($cadRows).' verificar al subir al servidor
		
		$cadView = $cadView.'
			<table class="table table-striped table-responsive" id="example">
            	<thead>
                	<tr>
                    	'.$cabeceras.'
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="'.$idresultados.'">

                	'.($cadRows).'
                </tbody>
            </table>
			<div style="margin-bottom:85px; margin-right:60px;"></div>
		
		';	
		
		
		return $cadView;
	}


	function camposTablaViewSinAcciones($cabeceras,$datos,$cantidad) {
		$cadView = '';
		$cadRows = '';
		$classTask = '';
		$classVer = '';
		$classEditar = '';
		$classFinalizar = '';
		$classPagar = '';
		$lblTask = '';

		$classVar = '';
		$icoVar = '';
		$lblVar = '';
		$classMod = '';
		$classEli = 'varborrar';
		$idresultados = 'resultados';



		
		/*if ($cantidad == 99) {
			$cantidad = 5;
			$classMod = 'varmodificargoleadores';
			$classEli = 'varborrargoleadores';
			$idresultados = "resultadosgoleadores";
		} else {
			$classMod = 'varmodificar';
			$classEli = 'varborrar';
			$idresultados = "resultados";
		}*/
		while ($row = mysql_fetch_array($datos)) {
			$cadsubRows = '';
			$cadRows = $cadRows.'
			
					<tr class="'.$row[0].'">
                        	';
			
			
			for ($i=1;$i<=$cantidad;$i++) {
				
				$cadsubRows = $cadsubRows.'<td><div style="height:60px;overflow:auto;">'.$row[$i].'</div></td>';	
			}
			
			
			if ($classMod != '') { 
				$cadRows = $cadRows.'
								'.$cadsubRows.'
								</tr>
				';
			} else {
				
				$cadRows = $cadRows.'
								'.$cadsubRows.'
								<td>
									
									<div class="btn-group">
										<button class="btn btn-success" type="button">Acciones</button>
										
										<button class="btn btn-success dropdown-toggle" data-toggle="dropdown" type="button">
										<span class="caret"></span>
										<span class="sr-only">Toggle Dropdown</span>
										</button>
										
										<ul class="dropdown-menu" role="menu">
										
											<li>
											<a href="javascript:void(0)" class="'.$classEli.'" id="'.$row[0].'">Eliminar</a>
											</li>
											
										</ul>
									</div>
								</td>
							</tr>
				';
			}
		}
		
		//'.utf8_encode($cadRows).' verificar al subir al servidor
		
		$cadView = $cadView.'
			<table class="table table-striped table-responsive" id="example">
            	<thead>
                	<tr>
                    	'.$cabeceras.'
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="'.$idresultados.'">

                	'.($cadRows).'
                </tbody>
            </table>
			<div style="margin-bottom:85px; margin-right:60px;"></div>
		
		';	
		
		
		return $cadView;
	}
	
	
	
	function camposTabla($accion,$tabla,$lblcambio,$lblreemplazo,$refdescripcion,$refCampo) {
		$sql	=	"show columns from ".$tabla;
		$res 	=	$this->query($sql,0);
		$label  = '';
		$ocultar = array("fechacrea","fechamodi","usuacrea","usuamodi");
		
		$geoposicionamiento = array("latitud","longitud");
		
		$camposEscondido = "";
		/* Analizar para despues */
		/*if (count($refencias) > 0) {
			$j = 0;

			foreach ($refencias as $reftablas) {
				$sqlTablas = "select id".$reftablas.", ".$refdescripcion[$j]." from ".$reftablas." order by ".$refdescripcion[$j];
				$resultadoRef[$j][0] = $this->query($sqlTablas,0);
				$resultadoRef[$j][1] = $refcampos[$j];
			}
		}*/
		
		
		if ($res == false) {
			return 'Error al traer datos';
		} else {
			
			$form	=	'';
			
			while ($row = mysql_fetch_array($res)) {
				$label = $row[0];
				$i = 0;
				foreach ($lblcambio as $cambio) {
					if ($row[0] == $cambio) {
						$label = $lblreemplazo[$i];
						$i = 0;
						break;
					} else {
						$label = $row[0];
					}
					$i = $i + 1;
				}
				
				if (in_array($row[0],$ocultar)) {
					$lblOculta = "none";	
				} else {
					$lblOculta = "block";
				}
				
				if ($row[3] != 'PRI') {
					if (strpos($row[1],"decimal") !== false) {
						
						if (in_array($row[0],$geoposicionamiento)) {
							$form	=	$form.'
							
							<div class="form-group col-md-6" style="display:'.$lblOculta.'">
								<label for="'.$label.'" class="control-label" style="text-align:left">'.ucwords($label).'</label>
								<div class="input-group col-md-12">
									<span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span></span>
									<input type="text" class="form-control" id="'.strtolower($row[0]).'" name="'.strtolower($row[0]).'" value="0" required>
									
								</div>
							</div>
							
							';

						} else {
						
							$form	=	$form.'
							
							<div class="form-group col-md-6" style="display:'.$lblOculta.'">
								<label for="'.$label.'" class="control-label" style="text-align:left">'.ucwords($label).'</label>
								<div class="input-group col-md-12">
									<span class="input-group-addon">$</span>
									<input type="text" class="form-control" id="'.strtolower($row[0]).'" name="'.strtolower($row[0]).'" value="0" required>
									<span class="input-group-addon">.00</span>
								</div>
							</div>
							
							';
						}
					} else {
						if ( in_array($row[0],$refCampo) ) {
							
							$campo = strtolower($row[0]);
							
							$option = $refdescripcion[array_search($row[0], $refCampo)];
							/*
							$i = 0;
							foreach ($lblcambio as $cambio) {
								if ($row[0] == $cambio) {
									$label = $lblreemplazo[$i];
									$i = 0;
									break 2;
								} else {
									$label = $row[0];
								}
								$i = $i + 1;
							}*/
							
							$autocompletar = array("refclientevehiculos","refordenes");
							
							if (in_array($campo,$autocompletar)) {
								$form	=	$form.'
							
								<div class="form-group col-md-6" style="display:'.$lblOculta.'">
									<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
									<div class="input-group col-md-12">
										
										<select data-placeholder="selecione el '.$label.'..." id="'.strtolower($campo).'" name="'.strtolower($campo).'" class="chosen-select" tabindex="2">
            								<option value=""></option>
											';
								
								$form	=	$form.$option;
								
								$form	=	$form.'		</select>
									</div>
								</div>
								
								';								
							} else {
							
								$form	=	$form.'
								
								<div class="form-group col-md-6" style="display:'.$lblOculta.'">
									<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
									<div class="input-group col-md-12">
										<select class="form-control" id="'.strtolower($campo).'" name="'.strtolower($campo).'">
											';
								
								$form	=	$form.$option;
								
								$form	=	$form.'		</select>
									</div>
								</div>
								
								';
							}
							
						} else {
							
							if (strpos($row[1],"bit") !== false) {
								$label = ucwords($label);
								$campo = strtolower($row[0]);
								
								$form	=	$form.'
								
								<div class="form-group col-md-6" style="display:'.$lblOculta.'">
									<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
									<div class="input-group col-md-12 fontcheck">
										<input type="checkbox" class="form-control" id="'.$campo.'" name="'.$campo.'" style="width:50px;" required> <p>Si/No</p>
									</div>
								</div>
								
								';
								
								
							} else {
								
								if (strpos($row[1],"date") !== false) {
									$label = ucwords($label);
									$campo = strtolower($row[0]);
									
									if (($row[0] == "fechaingreso") || ($row[0] == "horaentrada") || ($row[0] == "horasalida") || ($row[0] == "fechanacimiento")){
										$form	=	$form.'
														
										<div class="form-group col-md-6">
											<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
											<div class="input-group col-md-6">
												<input class="form-control" type="text" value="" name="'.$campo.'" id="'.$campo.'"/>
											</div>
											
										</div>
										
										';
									} else {
										$form	=	$form.'
										
										<div class="form-group col-md-6" style="display:'.$lblOculta.'">
											<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
											<div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="'.$campo.'" data-link-format="yyyy-mm-dd">
												<input class="form-control" size="50" type="text" value="" readonly>
												<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
											</div>
											<input type="hidden" name="'.$campo.'" id="'.$campo.'" value="" />
										</div>
										
										';
									}
									
									/*
									$form	=	$form.'
									
									<div class="form-group col-md-6">
										<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
										<div class="input-group col-md-6">
											<input class="form-control" type="text" name="'.$campo.'" id="'.$campo.'" value="Date"/>
										</div>
										
									</div>
									
									';
									*/
								} else {
									
									if (strpos($row[1],"time") !== false) {
										$label = ucwords($label);
										$campo = strtolower($row[0]);
										
										$form	=	$form.'
										
										<div class="form-group col-md-6" style="display:'.$lblOculta.'">
											<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
											<div class="input-group bootstrap-timepicker col-md-6">
												<input id="timepicker2" name="'.$campo.'" class="form-control">
												<span class="input-group-addon">
<span class="glyphicon glyphicon-time"></span>
</span>
											</div>
											
										</div>
										
										';
										
									} else {
										if ($row[1] == 'MEDIUMTEXT') {
											$label = ucwords($label);
											$campo = strtolower($row[0]);
											
											$form	=	$form.'
											
											<div class="form-group col-md-12" style="display:'.$lblOculta.'">
												<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
												<div class="input-group col-md-12">
													<textarea name="'.$campo.'" id="'.$campo.'" rows="200" cols="160">
														Ingrese la noticia.
													</textarea>
													
													
												</div>
												
											</div>
											
											';
											
										} else {
											
											if ((integer)(str_replace('varchar(','',$row[1])) > 200) {
												$label = ucwords($label);
												$campo = strtolower($row[0]);
												
												$form	=	$form.'
												
												<div class="form-group col-md-6" style="display:'.$lblOculta.'">
													<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
													<div class="input-group col-md-12">
														<textarea type="text" rows="10" cols="6" class="form-control" id="'.$campo.'" name="'.$campo.'" placeholder="Ingrese el '.$label.'..." required></textarea>
													</div>
													
												</div>
												
												';
												
												} else {
												$label = ucwords($label);
												$campo = strtolower($row[0]);
												

												$form	=	$form.'
												
												<div class="form-group col-md-6" style="display:'.$lblOculta.'">
													<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
													<div class="input-group col-md-12">
														<input type="text" class="form-control" id="'.$campo.'" name="'.$campo.'" placeholder="Ingrese el '.$label.'..." required>
													</div>
												</div>
												
												';
												
											}
										}
									}
								}
							}
						}
						
						
					}
				} else {
	
					$camposEscondido = $camposEscondido.'<input type="hidden" id="accion" name="accion" value="'.$accion.'"/>';	
				}
			}
			
			$formulario = $form."<br><br>".$camposEscondido;
			
			return $formulario;
		}	
	}



	////////////////////////////////////////////////////////////////////////////////////////////////////////////




	function camposTablaModificar($id,$lblid,$accion,$tabla,$lblcambio,$lblreemplazo,$refdescripcion,$refCampo) {
		
		switch ($tabla) {
			case 'dbtorneos':
				
				break;

			default:
				$sqlMod = "select * from ".$tabla." where ".$lblid." = ".$id;
				$resMod = $this->query($sqlMod,0);
		}
		/*if ($tabla == 'dbtorneos') {
			$resMod = $this->TraerIdTorneos($id);
		} else {
			$sqlMod = "select * from ".$tabla." where ".$lblid." = ".$id;
			$resMod = $this->query($sqlMod,0);
		}*/
		$sql	=	"show columns from ".$tabla;
		$res 	=	$this->query($sql,0);
		
		$ocultar = array("fechacrea","fechamodi","usuacrea","usuamodi");
		
		$camposEscondido = "";
		/* Analizar para despues */
		/*if (count($refencias) > 0) {
			$j = 0;

			foreach ($refencias as $reftablas) {
				$sqlTablas = "select id".$reftablas.", ".$refdescripcion[$j]." from ".$reftablas." order by ".$refdescripcion[$j];
				$resultadoRef[$j][0] = $this->query($sqlTablas,0);
				$resultadoRef[$j][1] = $refcampos[$j];
			}
		}*/
		
		
		if ($res == false) {
			return 'Error al traer datos';
		} else {
			
			$form	=	'';
			
			while ($row = mysql_fetch_array($res)) {
				$label = $row[0];
				$i = 0;
				foreach ($lblcambio as $cambio) {
					if ($row[0] == $cambio) {
						$label = $lblreemplazo[$i];
						$i = 0;
						break;
					} else {
						$label = $row[0];
					}
					$i = $i + 1;
				}
				
				if (in_array($row[0],$ocultar)) {
					$lblOculta = "none";	
				} else {
					$lblOculta = "block";
				}
				
				if ($row[3] != 'PRI') {
					if (strpos($row[1],"decimal") !== false) {
						$form	=	$form.'
						
						<div class="form-group col-md-6" style="display:'.$lblOculta.'">
							<label for="'.$label.'" class="control-label" style="text-align:left">'.ucwords($label).'</label>
							<div class="input-group col-md-12">
								<span class="input-group-addon">$</span>
								<input type="text" class="form-control" id="'.strtolower($row[0]).'" name="'.strtolower($row[0]).'" value="'.mysql_result($resMod,0,$row[0]).'" required>
								<span class="input-group-addon">.00</span>
							</div>
						</div>
						
						';
					} else {
						if ( in_array($row[0],$refCampo) ) {
							
							$campo = strtolower($row[0]);
							
							$option = $refdescripcion[array_search($row[0], $refCampo)];
							/*
							$i = 0;
							foreach ($lblcambio as $cambio) {
								if ($row[0] == $cambio) {
									$label = $lblreemplazo[$i];
									$i = 0;
									break 2;
								} else {
									$label = $row[0];
								}
								$i = $i + 1;
							}*/
							
							$form	=	$form.'
							
							<div class="form-group col-md-6" style="display:'.$lblOculta.'">
								<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
								<div class="input-group col-md-12">
									<select class="form-control" id="'.strtolower($campo).'" name="'.strtolower($campo).'">
										';
							
							$form	=	$form.$option;
							
							$form	=	$form.'		</select>
								</div>
							</div>
							
							';
							
						} else {
							
							if (strpos($row[1],"bit") !== false) {
								$label = ucwords($label);
								$campo = strtolower($row[0]);
								
								$activo = '';
								if (mysql_result($resMod,0,$row[0])==1){
									$activo = 'checked';
								}
								
								$form	=	$form.'
								
								<div class="form-group col-md-6" style="display:'.$lblOculta.'">
									<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
									<div class="input-group col-md-12 fontcheck">
										<input type="checkbox" '.$activo.' class="form-control" id="'.$campo.'" name="'.$campo.'" style="width:50px;" required> <p>Si/No</p>
									</div>
								</div>
								
								';
								
								
							} else {
								
								if (strpos($row[1],"date") !== false) {
									$label = ucwords($label);
									$campo = strtolower($row[0]);
									
									$form	=	$form.'
									
									<div class="form-group col-md-6" style="display:'.$lblOculta.'">
										<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
										<div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="'.$campo.'" data-link-format="yyyy-mm-dd">
											<input class="form-control" value="'.mysql_result($resMod,0,$row[0]).'" size="50" type="text" value="" readonly>
											<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
										</div>
										<input type="hidden" name="'.$campo.'" id="'.$campo.'" value="'.mysql_result($resMod,0,$row[0]).'" />
									</div>
									
									';
									
									/*
									$form	=	$form.'
									
									<div class="form-group col-md-6">
										<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
										<div class="input-group col-md-6">
											<input class="form-control" type="text" name="'.$campo.'" id="'.$campo.'" value="Date"/>
										</div>
										
									</div>
									
									';
									*/
								} else {
									
									if (strpos($row[1],"time") !== false) {
										$label = ucwords($label);
										$campo = strtolower($row[0]);
										
										$form	=	$form.'
										
										<div class="form-group col-md-6" style="display:'.$lblOculta.'">
											<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
											<div class="input-group bootstrap-timepicker col-md-6">
												<input id="timepicker2" value="'.mysql_result($resMod,0,$row[0]).'" name="'.$campo.'" class="form-control">
												<span class="input-group-addon">
<span class="glyphicon glyphicon-time"></span>
</span>
											</div>
											
										</div>
										
										';
										
									} else {
										if ((integer)(str_replace('varchar(','',$row[1])) > 200) {
											$label = ucwords($label);
											$campo = strtolower($row[0]);
											
											$form	=	$form.'
											
											<div class="form-group col-md-6" style="display:'.$lblOculta.'">
												<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
												<div class="input-group col-md-12">
													<textarea type="text" rows="10" cols="6" class="form-control" id="'.$campo.'" name="'.$campo.'" placeholder="Ingrese el '.$label.'..." required>'.utf8_encode(mysql_result($resMod,0,$row[0])).'</textarea>
												</div>
												
											</div>
											
											';
											
										} else {
											
											if ($row[1] == 'MEDIUMTEXT') {
											$label = ucwords($label);
											$campo = strtolower($row[0]);
											
											$form	=	$form.'
											
											<div class="form-group col-md-12" style="display:'.$lblOculta.'">
												<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
												<div class="input-group col-md-12">
													<textarea name="'.$campo.'" id="'.$campo.'" rows="200" cols="160">
														Ingrese la noticia.
													</textarea>
													
													
												</div>
												
											</div>
											
											';
											
											} else {
												$label = ucwords($label);
												$campo = strtolower($row[0]);
												
												$form	=	$form.'
												
												<div class="form-group col-md-6" style="display:'.$lblOculta.'">
													<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
													<div class="input-group col-md-12">
														<input type="text" value="'.(mysql_result($resMod,0,$row[0])).'" class="form-control" id="'.$campo.'" name="'.$campo.'" placeholder="Ingrese el '.$label.'..." required>
													</div>
												</div>
												
												';
											}
										}
									}
								}
							}
						}
						
						
					}
				} else {
	
					$camposEscondido = $camposEscondido.'<input type="hidden" id="accion" name="accion" value="'.$accion.'"/>'.'<input type="hidden" id="id" name="id" value="'.$id.'"/>';	
				}
			}
			/* <input type="text" value="'.utf8_encode(mysql_result($resMod,0,$row[0])).'" class="form-control" id="'.$campo.'" name="'.$campo.'" placeholder="Ingrese el '.$label.'..." required>  ///////////////////////////////  verificar al subir al servidor   /////////////////////////////////*/
			$formulario = $form."<br><br>".$camposEscondido;
			
			return $formulario;
		}	
	}
	




	function camposTablaMod($accion,$id) {
		
		$resTipoVenta = $this->traerUsuariosPorId($id);
		
		$sql	=	"show columns from se_usuarios";
		$res 	=	$this->query($sql,0);
		if ($res == false) {
			return 'Error al traer datos';
		} else {
			
			$form	=	'';
			
			while ($row = mysql_fetch_array($res)) {
				if ($row[3] != 'PRI') {
					if (strpos($row[1],"decimal") !== false) {
						$form	=	$form.'
						
						<div class="form-group col-md-6">
							<label for="'.$row[0].'" class="control-label" style="text-align:left">'.ucwords($row[0]).'</label>
							<div class="input-group col-md-12">
								<span class="input-group-addon">$</span>
								<input type="text" class="form-control" id="'.$row[0].'" name="'.$row[0].'" value="'.mysql_result($resTipoVenta,0,$row[0]).'" required>
								<span class="input-group-addon">.00</span>
							</div>
						</div>
						
						';
					} else {
						
						$formTabla = "";
						$formReferencia = "";
						switch ($row[0]) {
							case "refroll":
								$label = "Rol";
								$campo = $row[0];
								
								$formTabla = '
									<div class="form-group col-md-6">
										<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
										<div class="input-group col-md-12">
													
											<select class="form-control" id="'.$campo.'" name="'.$campo.'">
												';
												if (mysql_result($resTipoVenta,0,$campo) == 'SuperAdmin') {
													$formTabla = $formTabla.'
														<option value="SuperAdmin" selected>SuperAdmin</option>
														<option value="Administrador">Administrador</option>
														<option value="Empleado">Empleado</option>
													';
												}
												if (mysql_result($resTipoVenta,0,$campo) == 'Administrador') {
													$formTabla = $formTabla.'
														<option value="SuperAdmin">SuperAdmin</option>
														<option value="Administrador" selected>Administrador</option>
														<option value="Empleado">Empleado</option>
													';
												}
												if (mysql_result($resTipoVenta,0,$campo) == 'Empleado') {
													$formTabla = $formTabla.'
														<option value="SuperAdmin">SuperAdmin</option>
														<option value="Administrador">Administrador</option>
														<option value="Empleado" selected>Empleado</option>
													';
												}
												
								$formTabla = $formTabla.'</select>
										</div>
									</div>
									
									';
								
								break;
							case "refvalores":
								$label = "Aplica Sobre";
								$campo = $row[0];
								
								$sqlRef = "select idvalor,descripcion from lcdd_valores";
								$resRef = $this->query($sqlRef,0);
								
								$formRefDivUno = '<div class="form-group col-md-6">
											<label for="'.$row[0].'" class="control-label" style="text-align:left">'.$label.'</label>
											<div class="input-group col-md-12">
												<select class="form-control" id="'.$campo.'" name="'.$campo.'" >';
								$formRefDivDos = "</select></div></div>";
								$formOption = "";
								
								while ($rowRef = mysql_fetch_array($resRef)) {
									if (mysql_result($resTipoVenta,0,$campo) == $rowRef[0]) {
										$formOption = $formOption."<option value='".$rowRef[0]."' selected>".$rowRef[1]."</option>";
									} else {
										$formOption = $formOption."<option value='".$rowRef[0]."'>".$rowRef[1]."</option>";
									}
								}
								
								$formReferencia = $formRefDivUno.$formOption.$formRefDivDos;
								
								break;
							default:
								$label = ucwords($row[0]);
								$campo = $row[0];
								
								$formTabla = '
									<div class="form-group col-md-6">
										<label for="'.$campo.'" class="control-label" style="text-align:left">'.$label.'</label>
										<div class="input-group col-md-12">
											<input type="text" class="form-control" value="'.utf8_encode(mysql_result($resTipoVenta,0,$campo)).'" id="'.$campo.'" name="'.$campo.'" placeholder="Ingrese el '.$label.'..." required>
										</div>
									</div>
									
									';
									
								break;
							}
						
						
						
						$form	=	$form.$formReferencia.$formTabla;
					}
				} else {
					$camposEscondido = '<input type="hidden" id="id" name="id" value="'.$id.'"/>';
					$camposEscondido = $camposEscondido.'<input type="hidden" id="accion" name="accion" value="'.$accion.'"/>';	
				}
			}
			
			$formulario = $form."<br><br>".$camposEscondido;
			
			return $formulario;
		}	
	}




	function TraerUsuario($nombre,$pass) {
		
		require_once 'appconfig.php';

		$appconfig	= new appconfig();
		$datos		= $appconfig->conexion();
		$hostname	= $datos['hostname'];
		$database	= $datos['database'];
		$username	= $datos['username'];
		$password	= $datos['password'];
		
		
		$conn = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		$db = mysql_select_db($database);
	 
	 	
	 
		$error = 0;		
		
		
		
		$sqlusu = "select * from dbusuarios where usuario = '".$nombre."'";
		
		$respusu = mysql_query($sqlusu,$conn) or die (mysql_error(1));;
		
		$filas = mysql_num_rows($respusu);
		
		if ($filas > 0) {
			$sqlpass = "select * from dbusuarios where Pass = '".$pass."' and idusuario = ".mysql_result($respusu,0,0);
		    //echo $sqlpass;
		    $error = 1;
		    
			$resppass = mysql_query($sqlpass,$conn) or die (mysql_error(1));;
			
			$filas2 = mysql_num_rows($resppass);
			
			if ($filas2 > 0) {
				$error = 1;
				
				$_SESSION['sg_usuario'] = $nombre;
				$_SESSION['sg_pass'] = $pass;
				
				} else {
				$error = 0;
				}
			
			}
			else
			
			{
				$error = 0;	
			}
			
	    mysql_close($conn);
	
		return $error;
		
	}
	
	Function TraerTipoDoc() {
		$sql = "select * from tbtipodoc";
		return $this-> query($sql,0);
	}
	
	
	
	function activarTabla($tabla,$id,$campo,$todos)
	{
		if ($todos == true) {
		$sql = "update ".$tabla." set activo = false";
		$this-> query($sql,0);
		}
		
		$sql = "";
		$sql = "update ".$tabla." set activo = true where ".$campo." = ".$id;
		$this-> query($sql,0);
	}
	
	
	
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
		mysql_query("SET NAMES 'utf8'");
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