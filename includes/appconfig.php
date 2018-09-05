<?php

date_default_timezone_set('America/Buenos_Aires');

class appconfig {

function conexion() {
		
		$hostname = "localhost";
		$database = "lavadero";
		$username = "root";
		$password = "";
		
		/*
		$hostname = "localhost";
		$database = "u235498999_tm";
		$username = "u235498999_tm";
		$password = "rhcp7575TM";
		//u235498999_kike usuario
		*/
		
		$conexion = array("hostname" => $hostname,
						  "database" => $database,
						  "username" => $username,
						  "password" => $password);
						  
		return $conexion;
}

}




?>