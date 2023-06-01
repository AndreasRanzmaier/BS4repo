-- Taxi

-- Ich nutze MySql Workbench zum estellen eines graphischen ERM's.

-- Es hat alle benötigten Features um ich bin damit am vertrautesten.

-- Graphische Oberfläche um Entity Beziehungen und Attributeinstellungen zu sehen.

-- Außerdem kann ich direkt mit Testdatensätzen arbeiten.

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;

SET
    @OLD_FOREIGN_KEY_CHECKS = @ @FOREIGN_KEY_CHECKS,
    FOREIGN_KEY_CHECKS = 0;

SET
    @OLD_SQL_MODE = @ @SQL_MODE,
    SQL_MODE = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------

-- Schema Taxi

-- -----------------------------------------------------

DROP SCHEMA IF EXISTS `Taxi` ;

-- -----------------------------------------------------

-- Schema Taxi

-- -----------------------------------------------------

CREATE SCHEMA IF NOT EXISTS `Taxi` DEFAULT CHARACTER SET utf8 ;

USE `Taxi` ;

-- -----------------------------------------------------

-- Table `Taxi`.`Drivers`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Taxi`.`Drivers` (
        `idDrivers` INT NOT NULL,
        `Vorname` VARCHAR(45) NOT NULL,
        `Nachname` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`idDrivers`)
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Taxi`.`Location`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Taxi`.`Location` (
        `idLocation` INT NOT NULL,
        `Name` VARCHAR(45) NOT NULL,
        PRIMARY KEY (`idLocation`)
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Taxi`.`ChargingStation`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Taxi`.`ChargingStation` (
        `idCtargingStation` INT NOT NULL,
        `Location_idLocation` INT NOT NULL,
        PRIMARY KEY (`idCtargingStation`),
        INDEX `fk_ChargingStation_Location1_idx` (`Location_idLocation` ASC) VISIBLE,
        CONSTRAINT `fk_ChargingStation_Location1` FOREIGN KEY (`Location_idLocation`) REFERENCES `Taxi`.`Location` (`idLocation`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Taxi`.`Cars`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Taxi`.`Cars` (
        `idCars` VARCHAR(10) NOT NULL,
        `ChargingStation_idCtargingStation` INT NOT NULL,
        PRIMARY KEY (`idCars`),
        INDEX `fk_Cars_ChargingStation1_idx` (
            `ChargingStation_idCtargingStation` ASC
        ) VISIBLE,
        CONSTRAINT `fk_Cars_ChargingStation1` FOREIGN KEY (
            `ChargingStation_idCtargingStation`
        ) REFERENCES `Taxi`.`ChargingStation` (`idCtargingStation`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Taxi`.`Drives`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Taxi`.`Drives` (
        `idDrives` INT NOT NULL,
        `Cars_idCars` VARCHAR(10) NOT NULL,
        `KM` INT NOT NULL,
        `Start-time` DATETIME NOT NULL,
        `Passenger` TINYINT NOT NULL,
        `Location_idLocation` INT NOT NULL,
        `Location_idLocation1` INT NOT NULL,
        PRIMARY KEY (`idDrives`),
        INDEX `fk_Fahrten_Cars1_idx` (`Cars_idCars` ASC) VISIBLE,
        INDEX `fk_Drives_Location1_idx` (`Location_idLocation` ASC) VISIBLE,
        INDEX `fk_Drives_Location2_idx` (`Location_idLocation1` ASC) VISIBLE,
        CONSTRAINT `fk_Fahrten_Cars1` FOREIGN KEY (`Cars_idCars`) REFERENCES `Taxi`.`Cars` (`idCars`) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT `fk_Drives_Location1` FOREIGN KEY (`Location_idLocation`) REFERENCES `Taxi`.`Location` (`idLocation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT `fk_Drives_Location2` FOREIGN KEY (`Location_idLocation1`) REFERENCES `Taxi`.`Location` (`idLocation`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Taxi`.`Drivers_has_Cars`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Taxi`.`Drivers_has_Cars` (
        `Drivers_idDrivers` INT NOT NULL,
        `Cars_idCars` VARCHAR(10) NOT NULL,
        `Date` DATE NOT NULL,
        PRIMARY KEY (
            `Drivers_idDrivers`,
            `Cars_idCars`
        ),
        INDEX `fk_Drivers_has_Cars_Cars1_idx` (`Cars_idCars` ASC) VISIBLE,
        INDEX `fk_Drivers_has_Cars_Drivers1_idx` (`Drivers_idDrivers` ASC) VISIBLE,
        CONSTRAINT `fk_Drivers_has_Cars_Drivers1` FOREIGN KEY (`Drivers_idDrivers`) REFERENCES `Taxi`.`Drivers` (`idDrivers`) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT `fk_Drivers_has_Cars_Cars1` FOREIGN KEY (`Cars_idCars`) REFERENCES `Taxi`.`Cars` (`idCars`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

-- -----------------------------------------------------

-- Table `Taxi`.`ChargingStation_has_Cars`

-- -----------------------------------------------------

CREATE TABLE
    IF NOT EXISTS `Taxi`.`ChargingStation_has_Cars` (
        `ChargingStation_idCtargingStation` INT NOT NULL,
        `Cars_idCars` VARCHAR(10) NOT NULL,
        `Ladestart` DATETIME NOT NULL,
        `Ladedauer` INT NOT NULL,
        `Ladekosten` FLOAT NOT NULL,
        PRIMARY KEY (
            `ChargingStation_idCtargingStation`,
            `Cars_idCars`
        ),
        INDEX `fk_ChargingStation_has_Cars1_Cars1_idx` (`Cars_idCars` ASC) VISIBLE,
        INDEX `fk_ChargingStation_has_Cars1_ChargingStation1_idx` (
            `ChargingStation_idCtargingStation` ASC
        ) VISIBLE,
        CONSTRAINT `fk_ChargingStation_has_Cars1_ChargingStation1` FOREIGN KEY (
            `ChargingStation_idCtargingStation`
        ) REFERENCES `Taxi`.`ChargingStation` (`idCtargingStation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
        CONSTRAINT `fk_ChargingStation_has_Cars1_Cars1` FOREIGN KEY (`Cars_idCars`) REFERENCES `Taxi`.`Cars` (`idCars`) ON DELETE NO ACTION ON UPDATE NO ACTION
    ) ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------

-- Data for table `Taxi`.`Drivers`

-- -----------------------------------------------------

START TRANSACTION;

USE `Taxi`;

INSERT INTO
    `Taxi`.`Drivers` (
        `idDrivers`,
        `Vorname`,
        `Nachname`
    )
VALUES (1, 'Andi', 'Ranzi');

INSERT INTO
    `Taxi`.`Drivers` (
        `idDrivers`,
        `Vorname`,
        `Nachname`
    )
VALUES (2, 'David', 'Lampi');

COMMIT;

-- -----------------------------------------------------

-- Data for table `Taxi`.`Location`

-- -----------------------------------------------------

START TRANSACTION;

USE `Taxi`;

INSERT INTO
    `Taxi`.`Location` (`idLocation`, `Name`)
VALUES (1, 'Shell-Gasse');

INSERT INTO
    `Taxi`.`Location` (`idLocation`, `Name`)
VALUES (2, 'Jett-Steaße');

INSERT INTO
    `Taxi`.`Location` (`idLocation`, `Name`)
VALUES (3, 'Startplatz');

INSERT INTO
    `Taxi`.`Location` (`idLocation`, `Name`)
VALUES (4, 'Endhafen');

COMMIT;

-- -----------------------------------------------------

-- Data for table `Taxi`.`ChargingStation`

-- -----------------------------------------------------

START TRANSACTION;

USE `Taxi`;

INSERT INTO
    `Taxi`.`ChargingStation` (
        `idCtargingStation`,
        `Location_idLocation`
    )
VALUES (1, 1);

INSERT INTO
    `Taxi`.`ChargingStation` (
        `idCtargingStation`,
        `Location_idLocation`
    )
VALUES (2, 2);

COMMIT;

-- -----------------------------------------------------

-- Data for table `Taxi`.`Cars`

-- -----------------------------------------------------

START TRANSACTION;

USE `Taxi`;

INSERT INTO
    `Taxi`.`Cars` (
        `idCars`,
        `ChargingStation_idCtargingStation`
    )
VALUES ('GR111AR', 2);

INSERT INTO
    `Taxi`.`Cars` (
        `idCars`,
        `ChargingStation_idCtargingStation`
    )
VALUES ('GR222DT', 1);

COMMIT;

-- -----------------------------------------------------

-- Data for table `Taxi`.`Drives`

-- -----------------------------------------------------

START TRANSACTION;

USE `Taxi`;

INSERT INTO
    `Taxi`.`Drives` (
        `idDrives`,
        `Cars_idCars`,
        `KM`,
        `Start-time`,
        `Passenger`,
        `Location_idLocation`,
        `Location_idLocation1`
    )
VALUES (
        1,
        'GR111AR',
        22,
        '2023-04-03 14:00:45',
        1,
        3,
        4
    );

INSERT INTO
    `Taxi`.`Drives` (
        `idDrives`,
        `Cars_idCars`,
        `KM`,
        `Start-time`,
        `Passenger`,
        `Location_idLocation`,
        `Location_idLocation1`
    )
VALUES (
        2,
        'GR222DT',
        12,
        '2023-04-03 14:00:45',
        0,
        1,
        3
    );

COMMIT;

-- -----------------------------------------------------

-- Data for table `Taxi`.`Drivers_has_Cars`

-- -----------------------------------------------------

START TRANSACTION;

USE `Taxi`;

INSERT INTO
    `Taxi`.`Drivers_has_Cars` (
        `Drivers_idDrivers`,
        `Cars_idCars`,
        `Date`
    )
VALUES (1, 'GR111AR', '30.05.2023');

INSERT INTO
    `Taxi`.`Drivers_has_Cars` (
        `Drivers_idDrivers`,
        `Cars_idCars`,
        `Date`
    )
VALUES (2, 'GR222DT', '28.05.2023');

COMMIT;

-- -----------------------------------------------------

-- Data for table `Taxi`.`ChargingStation_has_Cars`

-- -----------------------------------------------------

START TRANSACTION;

USE `Taxi`;

INSERT INTO
    `Taxi`.`ChargingStation_has_Cars` (
        `ChargingStation_idCtargingStation`,
        `Cars_idCars`,
        `Ladestart`,
        `Ladedauer`,
        `Ladekosten`
    )
VALUES (
        1,
        'GR111AR',
        '2023-04-03 14:00:45 ',
        60,
        83.00
    );

INSERT INTO
    `Taxi`.`ChargingStation_has_Cars` (
        `ChargingStation_idCtargingStation`,
        `Cars_idCars`,
        `Ladestart`,
        `Ladedauer`,
        `Ladekosten`
    )
VALUES (
        2,
        'GR222DT',
        '2023-04-03 14:00:45 ',
        90,
        110.36
    );

COMMIT;

-- Testen der Datenbank mittels SQL selects

-- how many kilometers have been driven with passengers

select sum(km) from drives where passenger = 1;

-- without

select sum(km) from drives where passenger = 0;

-- see who drove what car when

select
    concat(Vorname, Nachname) as 'Driver',
    Cars_idCars,
    date
from drivers_has_cars
    inner join drivers;