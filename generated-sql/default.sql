
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- cliente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente`
(
    `idCliente` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    `apellidoPaterno` VARCHAR(45) NOT NULL,
    `apellidoMaterno` VARCHAR(45) NOT NULL,
    `Direccion_idDireccion` INTEGER NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `telefono` VARCHAR(45) NOT NULL,
    `celular` VARCHAR(45) NOT NULL,
    `institucion` VARCHAR(45) NOT NULL,
    `tipo_idtipo` INTEGER NOT NULL,
    `Cuestionario_idCuestionario` INTEGER NOT NULL,
    `factura_idfactura` INTEGER,
    PRIMARY KEY (`idCliente`),
    INDEX `fk_Cliente_Direccion1_idx` (`Direccion_idDireccion`),
    INDEX `fk_Cliente_tipo1_idx` (`tipo_idtipo`),
    INDEX `fk_Cliente_Cuestionario1_idx` (`Cuestionario_idCuestionario`),
    INDEX `fk_Cliente_factura1_idx` (`factura_idfactura`),
    CONSTRAINT `fk_Cliente_Cuestionario1`
        FOREIGN KEY (`Cuestionario_idCuestionario`)
        REFERENCES `cuestionario` (`idCuestionario`),
    CONSTRAINT `fk_Cliente_Direccion1`
        FOREIGN KEY (`Direccion_idDireccion`)
        REFERENCES `direccion` (`idDireccion`),
    CONSTRAINT `fk_Cliente_factura1`
        FOREIGN KEY (`factura_idfactura`)
        REFERENCES `factura` (`idfactura`),
    CONSTRAINT `fk_Cliente_tipo1`
        FOREIGN KEY (`tipo_idtipo`)
        REFERENCES `tipo` (`idtipo`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cuestionario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cuestionario`;

CREATE TABLE `cuestionario`
(
    `idCuestionario` INTEGER NOT NULL AUTO_INCREMENT,
    `compartir` TINYINT(1) NOT NULL,
    `concursoPreCongreso` INTEGER,
    `concursoTranCongreso` INTEGER,
    PRIMARY KEY (`idCuestionario`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- direccion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `direccion`;

CREATE TABLE `direccion`
(
    `idDireccion` INTEGER NOT NULL AUTO_INCREMENT,
    `Calle` VARCHAR(45) NOT NULL,
    `Colonia` VARCHAR(45) NOT NULL,
    `CP` VARCHAR(45) NOT NULL,
    `Estado_idEstado` INTEGER NOT NULL,
    PRIMARY KEY (`idDireccion`),
    INDEX `fk_Direccion_Estado1_idx` (`Estado_idEstado`),
    CONSTRAINT `fk_Direccion_Estado1`
        FOREIGN KEY (`Estado_idEstado`)
        REFERENCES `estado` (`idEstado`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- estado
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado`
(
    `idEstado` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    `Pais_idPais` INTEGER NOT NULL,
    PRIMARY KEY (`idEstado`),
    INDEX `fk_Estado_Pais_idx` (`Pais_idPais`),
    CONSTRAINT `fk_Estado_Pais`
        FOREIGN KEY (`Pais_idPais`)
        REFERENCES `pais` (`idPais`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- factura
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `factura`;

CREATE TABLE `factura`
(
    `idfactura` INTEGER NOT NULL AUTO_INCREMENT,
    `rfc` VARCHAR(45) NOT NULL,
    `nombre` VARCHAR(45) NOT NULL,
    `apellidoPaterno` VARCHAR(45) NOT NULL,
    `apellidoMaterno` VARCHAR(45) NOT NULL,
    `email` VARCHAR(45) NOT NULL,
    `noCuenta` VARCHAR(45) NOT NULL,
    `telefono` VARCHAR(45) NOT NULL,
    `Direccion_idDireccion` INTEGER NOT NULL,
    PRIMARY KEY (`idfactura`),
    INDEX `fk_factura_Direccion1_idx` (`Direccion_idDireccion`),
    CONSTRAINT `fk_factura_Direccion1`
        FOREIGN KEY (`Direccion_idDireccion`)
        REFERENCES `direccion` (`idDireccion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- pais
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pais`;

CREATE TABLE `pais`
(
    `idPais` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idPais`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tipo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo`
(
    `idtipo` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
