-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2016 a las 22:51:15
-- Versión del servidor: 5.1.36-community-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sstaller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbclientes`
--

CREATE TABLE IF NOT EXISTS `dbclientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `nrodocumento` bigint(20) NOT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `direccion` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbclientevehiculos`
--

CREATE TABLE IF NOT EXISTS `dbclientevehiculos` (
  `idclientevehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `refcliente` int(11) NOT NULL,
  `refvehiculo` int(11) NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idclientevehiculo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbordenes`
--

CREATE TABLE IF NOT EXISTS `dbordenes` (
  `idorden` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `refclientevehiculo` int(11) NOT NULL,
  `fechacrea` datetime DEFAULT NULL,
  `fechamodi` datetime DEFAULT NULL,
  `usuacrea` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuamodi` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detallereparacion` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idorden`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbusuarios`
--

CREATE TABLE IF NOT EXISTS `dbusuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `refroll` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombrecompleto` varchar(70) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `dbusuarios`
--

INSERT INTO `dbusuarios` (`idusuario`, `usuario`, `password`, `refroll`, `email`, `nombrecompleto`) VALUES
(1, 'Marcos', 'm', 1, 'msredhotero@msn.com', 'Saupurein Marcos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbvehiculos`
--

CREATE TABLE IF NOT EXISTS `dbvehiculos` (
  `idvehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `patente` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `refmarca` int(11) NOT NULL,
  `refmodelo` int(11) NOT NULL,
  `anio` smallint(6) NOT NULL,
  PRIMARY KEY (`idvehiculo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_table`
--

CREATE TABLE IF NOT EXISTS `new_table` (
  `dbclientevehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `refcliente` int(11) NOT NULL,
  `refvehiculo` int(11) NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`dbclientevehiculo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predio_menu`
--

CREATE TABLE IF NOT EXISTS `predio_menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Orden` smallint(6) DEFAULT NULL,
  `hover` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `permiso` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `predio_menu`
--

INSERT INTO `predio_menu` (`idmenu`, `url`, `icono`, `nombre`, `Orden`, `hover`, `permiso`) VALUES
(12, '../logout.php', 'icosalir', 'Salir', 30, NULL, 'Administrador'),
(13, '../index.php', 'icodashboard', 'Dashboard', 1, NULL, 'Administrador'),
(16, '../clientes/', 'icojugadores', 'Clientes', 2, NULL, 'Administrador'),
(17, '../vehiculos/', 'icovehiculos', 'Vehiculos', 3, NULL, 'Administrador'),
(18, '../ordenes/', 'icoreparacion', 'Ordenes', 4, NULL, 'Administrador'),
(19, '../marcas/', 'icomarca', 'Marcas', 5, NULL, 'Administrador'),
(20, '../modelos/', 'icomodelo', 'Modelos', 6, NULL, 'Administrador'),
(21, '../reportes/', 'icoreportes', 'Reportes', 10, NULL, 'Administrador'),
(22, '../usuarios/', 'icousuarios', 'Usuarios', 7, NULL, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmarca`
--

CREATE TABLE IF NOT EXISTS `tbmarca` (
  `idmarca` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idmarca`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tbmarca`
--

INSERT INTO `tbmarca` (`idmarca`, `marca`, `activo`) VALUES
(1, 'Chevrolet', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmodelo`
--

CREATE TABLE IF NOT EXISTS `tbmodelo` (
  `idmodelo` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `refmarca` int(11) NOT NULL,
  `activo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idmodelo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbroles`
--

CREATE TABLE IF NOT EXISTS `tbroles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbroles`
--

INSERT INTO `tbroles` (`idrol`, `descripcion`, `activo`) VALUES
(1, 'Administrador', b'1'),
(2, 'Empleado', b'1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
