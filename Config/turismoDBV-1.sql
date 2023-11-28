SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `turismodb` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `turismodb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema turismodb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `turismodb` ;

-- -----------------------------------------------------
-- Schema turismodb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `turismodb` DEFAULT CHARACTER SET utf8mb4 COLLATE=utf8mb4_general_ci;
USE `turismodb` ;

-- -----------------------------------------------------
-- Table `turismodb`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`estado` (
  `idestado` INT NOT NULL,
  `nombreEstado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idestado`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`tipoDePlan`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`tipoDePlan` (
  `idTipoDeServicio` INT NOT NULL AUTO_INCREMENT,
  `nombreTipoDePlan` VARCHAR(45) NOT NULL,
  `descripcionTipoDePlan` VARCHAR(45) CHARACTER SET 'utf8mb4' NOT NULL,
  PRIMARY KEY (`idTipoDeServicio`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`Planes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`Planes` (
  `idPlanes` INT NOT NULL AUTO_INCREMENT,
  `nombrePlanes` VARCHAR(45) NULL,
  `detallePlanes` VARCHAR(45) NULL,
  `tarifaPlanes` DOUBLE NULL,
  `requisitosEspeciales` VARCHAR(45) NULL,
  `estado_idestado` INT NOT NULL,
  `tipoDePlan_idTipoDeServicio` INT NOT NULL,
  PRIMARY KEY (`idPlanes`),
  INDEX `fk_Planes_estado_idx` (`estado_idestado` ) ,
  INDEX `fk_Planes_tipoDePlan1_idx` (`tipoDePlan_idTipoDeServicio`),
  CONSTRAINT `fk_Planes_estado`
    FOREIGN KEY (`estado_idestado`)
    REFERENCES `turismodb`.`estado` (`idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Planes_tipoDePlan1`
    FOREIGN KEY (`tipoDePlan_idTipoDeServicio`)
    REFERENCES `turismodb`.`tipoDePlan` (`idTipoDeServicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`Roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`Roles` (
  `idRoles` INT NOT NULL AUTO_INCREMENT,
  `nombreRoles` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`idRoles`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `mydb`.`tipoDeDocumento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`tipoDeDocumento` (
  `idtipoDeDocumento` INT NOT NULL AUTO_INCREMENT,
  `nombreTipoDeDocumento` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipoDeDocumento`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

USE `turismodb` ;

-- -----------------------------------------------------
-- Table `turismodb`.`factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`factura` (
  `idFactura` INT NOT NULL AUTO_INCREMENT,
  `fechaFactura` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `tipodepagoFactura` VARCHAR(45) NULL DEFAULT NULL,
  `totalFactura` DOUBLE NULL DEFAULT NULL,
  `estado_idestado` INT NOT NULL,
  PRIMARY KEY (`idFactura`),
  INDEX `fk_factura_estado1_idx` (`estado_idestado` ) ,
  CONSTRAINT `fk_factura_estado1`
    FOREIGN KEY (`estado_idestado`)
    REFERENCES `turismodb`.`estado` (`idestado`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`reservas` (
  `idReservas` INT NOT NULL AUTO_INCREMENT,
  `fechaReserva` DATE NULL DEFAULT NULL,
  `cantidadTuristas` INT NULL DEFAULT NULL,
  `costoTotal` DOUBLE NULL DEFAULT NULL,
  `descripcion` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `Planes_idPlanes` INT NOT NULL,
  `estado_idestado` INT NOT NULL,
  PRIMARY KEY (`idReservas`),
  INDEX `fk_reservas_Planes1_idx` (`Planes_idPlanes` ) ,
  INDEX `fk_reservas_estado1_idx` (`estado_idestado` ) ,
  CONSTRAINT `fk_reservas_Planes1`
    FOREIGN KEY (`Planes_idPlanes`)
    REFERENCES `turismodb`.`Planes` (`idPlanes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservas_estado1`
    FOREIGN KEY (`estado_idestado`)
    REFERENCES `turismodb`.`estado` (`idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`detallefactura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`detallefactura` (
  `factura_idFactura` INT NOT NULL,
  `reservas_idReservas` INT NOT NULL,
  PRIMARY KEY (`factura_idFactura`, `reservas_idReservas`),
  INDEX `fk_factura_has_reservas_reservas1_idx` (`reservas_idReservas` ) ,
  INDEX `fk_factura_has_reservas_factura1_idx` (`factura_idFactura` ) ,
  CONSTRAINT `fk_factura_has_reservas_factura1`
    FOREIGN KEY (`factura_idFactura`)
    REFERENCES `turismodb`.`factura` (`idFactura`),
  CONSTRAINT `fk_factura_has_reservas_reservas1`
    FOREIGN KEY (`reservas_idReservas`)
    REFERENCES `turismodb`.`reservas` (`idReservas`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`persona` (
  `idpersona` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `apellidos` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `genero` VARCHAR(45) NULL DEFAULT NULL,
  `nacionalidad` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `correo` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` VARCHAR(45) NULL DEFAULT NULL,
  `estado_idestado` INT NOT NULL,
  `Roles_idRoles` INT NOT NULL,
  PRIMARY KEY (`idpersona`),
  INDEX `fk_persona_estado1_idx` (`estado_idestado` ) ,
  INDEX `fk_persona_Roles1_idx` (`Roles_idRoles` ) ,
  CONSTRAINT `fk_persona_estado1`
    FOREIGN KEY (`estado_idestado`)
    REFERENCES `turismodb`.`estado` (`idestado`),
  CONSTRAINT `fk_persona_Roles1`
    FOREIGN KEY (`Roles_idRoles`)
    REFERENCES `turismodb`.`Roles` (`idRoles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`documentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`documentos` (
  `iddocumentosVehiculo` INT NOT NULL AUTO_INCREMENT,
  `nombreDocumentos` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `fechaCreaciónDocumentos` DATE NULL DEFAULT NULL,
  `copiaDocumentos` VARCHAR(45) NULL,
  `persona_idpersona` INT NOT NULL,
  `tipoDeDocumento_idtipoDeDocumento` INT NOT NULL,
  PRIMARY KEY (`iddocumentosVehiculo`),
  INDEX `fk_documentos_persona1_idx` (`persona_idpersona` ) ,
  INDEX `fk_documentos_tipoDeDocumento1_idx` (`tipoDeDocumento_idtipoDeDocumento` ) ,
  CONSTRAINT `fk_documentos_persona1`
    FOREIGN KEY (`persona_idpersona`)
    REFERENCES `turismodb`.`persona` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_documentos_tipoDeDocumento1`
    FOREIGN KEY (`tipoDeDocumento_idtipoDeDocumento`)
    REFERENCES `turismodb`.`tipoDeDocumento` (`idtipoDeDocumento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`garantia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`garantia` (
  `idGarantia` INT NOT NULL AUTO_INCREMENT,
  `fecha` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `descripcion` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `Planes_idPlanes` INT NOT NULL,
  PRIMARY KEY (`idGarantia`),
  INDEX `fk_garantia_Planes1_idx` (`Planes_idPlanes` ) ,
  CONSTRAINT `fk_garantia_Planes1`
    FOREIGN KEY (`Planes_idPlanes`)
    REFERENCES `turismodb`.`Planes` (`idPlanes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`idiomas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`idiomas` (
  `ididiomas` INT NOT NULL,
  `nombre` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `nivel` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `persona_idpersona` INT NOT NULL,
  PRIMARY KEY (`ididiomas`),
  INDEX `fk_idiomas_persona1_idx` (`persona_idpersona` ) ,
  CONSTRAINT `fk_idiomas_persona1`
    FOREIGN KEY (`persona_idpersona`)
    REFERENCES `turismodb`.`persona` (`idpersona`))
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`reseñas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`reseñas` (
  `idReseñas` INT NOT NULL AUTO_INCREMENT,
  `descripcionReseñas` VARCHAR(45) NULL DEFAULT NULL,
  `calificacionReseñas` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `Planes_idPlanes` INT NOT NULL,
  PRIMARY KEY (`idReseñas`),
  INDEX `fk_reseñas_Planes1_idx` (`Planes_idPlanes` ) ,
  CONSTRAINT `fk_reseñas_Planes1`
    FOREIGN KEY (`Planes_idPlanes`)
    REFERENCES `turismodb`.`Planes` (`idPlanes`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`vehiculo` (
  `idvehiculo` INT NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `modelo` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `fechaFabricacionVehiculo` VARCHAR(45) NULL DEFAULT NULL,
  `tipoVehiculo` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `ocupacionVehiculo` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `capacidadEquipajeVehiculo` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `persona_idpersona` INT NOT NULL,
  PRIMARY KEY (`idvehiculo`),
  INDEX `fk_vehiculo_persona1_idx` (`persona_idpersona` ) ,
  CONSTRAINT `fk_vehiculo_persona1`
    FOREIGN KEY (`persona_idpersona`)
    REFERENCES `turismodb`.`persona` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `turismodb`.`ruta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `turismodb`.`ruta` (
  `idruta` INT NOT NULL AUTO_INCREMENT,
  `nombreRuta` VARCHAR(45) NULL DEFAULT NULL,
  `recorridoRuta` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `ubicacionRuta` VARCHAR(45) CHARACTER SET 'utf8mb4' NULL DEFAULT NULL,
  `vehiculo_idvehiculo` INT NOT NULL,
  PRIMARY KEY (`idruta`),
  INDEX `fk_ruta_vehiculo1_idx` (`vehiculo_idvehiculo` ) ,
  CONSTRAINT `fk_ruta_vehiculo1`
    FOREIGN KEY (`vehiculo_idvehiculo`)
    REFERENCES `turismodb`.`vehiculo` (`idvehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
