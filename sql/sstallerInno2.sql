SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sstaller` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `sstaller` ;

-- -----------------------------------------------------
-- Table `sstaller`.`dbclientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`dbclientes` (
  `idcliente` INT(11) NOT NULL AUTO_INCREMENT,
  `apellido` VARCHAR(70) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `nombre` VARCHAR(70) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `nrodocumento` BIGINT(20) NOT NULL,
  `fechanacimiento` DATE NULL DEFAULT NULL,
  `direccion` VARCHAR(120) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `telefono` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `email` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `sstaller`.`tbmarca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`tbmarca` (
  `idmarca` INT(11) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `activo` BIT(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idmarca`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `sstaller`.`tbmodelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`tbmodelo` (
  `idmodelo` INT(11) NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `refmarca` INT(11) NOT NULL,
  `activo` BIT(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idmodelo`),
  INDEX `fk_tbmodelo_tbmarca_idx` (`refmarca` ASC),
  CONSTRAINT `fk_tbmodelo_tbmarca`
    FOREIGN KEY (`refmarca`)
    REFERENCES `sstaller`.`tbmarca` (`idmarca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sstaller`.`dbvehiculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`dbvehiculos` (
  `idvehiculo` INT(11) NOT NULL AUTO_INCREMENT,
  `patente` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `refmodelo` INT(11) NOT NULL,
  `anio` SMALLINT(6) NOT NULL,
  PRIMARY KEY (`idvehiculo`),
  INDEX `fk_dbvehiculos_tbmodelo1_idx` (`refmodelo` ASC),
  CONSTRAINT `fk_dbvehiculos_tbmodelo1`
    FOREIGN KEY (`refmodelo`)
    REFERENCES `sstaller`.`tbmodelo` (`idmodelo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sstaller`.`dbclientevehiculos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`dbclientevehiculos` (
  `idclientevehiculo` INT(11) NOT NULL AUTO_INCREMENT,
  `refcliente` INT(11) NOT NULL,
  `refclientes` INT(11) NOT NULL,
  `refvehiculos` INT(11) NOT NULL,
  `activo` BIT(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`idclientevehiculo`),
  INDEX `fk_dbclientevehiculos_dbvehiculos1_idx` (`refvehiculos` ASC),
  INDEX `fk_dbclientevehiculos_dbclientes1_idx` (`refclientes` ASC),
  CONSTRAINT `fk_dbclientevehiculos_dbvehiculos1`
    FOREIGN KEY (`refvehiculos`)
    REFERENCES `sstaller`.`dbvehiculos` (`idvehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dbclientevehiculos_dbclientes1`
    FOREIGN KEY (`refclientes`)
    REFERENCES `sstaller`.`dbclientes` (`idcliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sstaller`.`tbestados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`tbestados` (
  `idestado` INT(11) NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  PRIMARY KEY (`idestado`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


-- -----------------------------------------------------
-- Table `sstaller`.`dbordenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`dbordenes` (
  `idorden` INT(11) NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `refclientevehiculo` INT(11) NOT NULL,
  `fechacrea` DATETIME NULL DEFAULT NULL,
  `fechamodi` DATETIME NULL DEFAULT NULL,
  `usuacrea` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `usuamodi` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `detallereparacion` VARCHAR(400) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `refestados` INT(11) NOT NULL,
  PRIMARY KEY (`idorden`),
  INDEX `fk_dbordenes_tbestados1_idx` (`refestados` ASC),
  CONSTRAINT `fk_dbordenes_tbestados1`
    FOREIGN KEY (`refestados`)
    REFERENCES `sstaller`.`tbestados` (`idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sstaller`.`tbroles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`tbroles` (
  `idrol` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `activo` BIT(1) NOT NULL,
  PRIMARY KEY (`idrol`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sstaller`.`dbusuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`dbusuarios` (
  `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(10) NOT NULL,
  `password` VARCHAR(10) NOT NULL,
  `refroles` INT(11) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `nombrecompleto` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_dbusuarios_tbroles1_idx` (`refroles` ASC),
  CONSTRAINT `fk_dbusuarios_tbroles1`
    FOREIGN KEY (`refroles`)
    REFERENCES `sstaller`.`tbroles` (`idrol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2;


-- -----------------------------------------------------
-- Table `sstaller`.`predio_menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sstaller`.`predio_menu` (
  `idmenu` INT(11) NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `icono` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NOT NULL,
  `Orden` SMALLINT(6) NULL DEFAULT NULL,
  `hover` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  `permiso` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idmenu`))
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
