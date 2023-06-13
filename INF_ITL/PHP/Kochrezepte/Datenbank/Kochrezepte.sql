-- Ranzmaier Andreas

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Kochrezepte
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Kochrezepte` ;

-- -----------------------------------------------------
-- Schema Kochrezepte
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Kochrezepte` DEFAULT CHARACTER SET utf8 ;
USE `Kochrezepte` ;

-- -----------------------------------------------------
-- Table `Kochrezepte`.`rezeptname`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Kochrezepte`.`rezeptname` (
  `rez_id` INT NOT NULL AUTO_INCREMENT,
  `rez_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`rez_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochrezepte`.`zubereitung`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Kochrezepte`.`zubereitung` (
  `zub_id` INT NOT NULL AUTO_INCREMENT,
  `zub_beschreibung` VARCHAR(200) NOT NULL,
  `rez_id` INT NOT NULL,
  `zub_bereitgestellt_am` DATETIME NOT NULL,
  PRIMARY KEY (`zub_id`),
  INDEX `fk_zubereitung_rezeptname_idx` (`rez_id` ASC) VISIBLE,
  CONSTRAINT `fk_zubereitung_rezeptname`
    FOREIGN KEY (`rez_id`)
    REFERENCES `Kochrezepte`.`rezeptname` (`rez_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochrezepte`.`zutat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Kochrezepte`.`zutat` (
  `zut_id` INT NOT NULL,
  `zut_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`zut_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochrezepte`.`einheit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Kochrezepte`.`einheit` (
  `ein_id` INT NOT NULL,
  `ein_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ein_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochrezepte`.`zutat_einheit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Kochrezepte`.`zutat_einheit` (
  `zut_id` INT NOT NULL,
  `ein_id` INT NOT NULL,
  `zuein_id` INT NOT NULL,
  PRIMARY KEY (`zuein_id`),
  INDEX `fk_zutat_has_einheit_einheit1_idx` (`ein_id` ASC) VISIBLE,
  INDEX `fk_zutat_has_einheit_zutat1_idx` (`zut_id` ASC) VISIBLE,
  CONSTRAINT `fk_zutat_has_einheit_zutat1`
    FOREIGN KEY (`zut_id`)
    REFERENCES `Kochrezepte`.`zutat` (`zut_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_zutat_has_einheit_einheit1`
    FOREIGN KEY (`ein_id`)
    REFERENCES `Kochrezepte`.`einheit` (`ein_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Kochrezepte`.`zubereitung_has_zutat_einheit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Kochrezepte`.`zubereitung_has_zutat_einheit` (
  `zub_id` INT NOT NULL,
  `zuein_id` INT NOT NULL,
  `zubein_menge` INT NOT NULL,
  PRIMARY KEY (`zub_id`, `zuein_id`),
  INDEX `fk_zubereitung_has_zutat_einheit_zutat_einheit1_idx` (`zuein_id` ASC) VISIBLE,
  INDEX `fk_zubereitung_has_zutat_einheit_zubereitung1_idx` (`zub_id` ASC) VISIBLE,
  CONSTRAINT `fk_zubereitung_has_zutat_einheit_zubereitung1`
    FOREIGN KEY (`zub_id`)
    REFERENCES `Kochrezepte`.`zubereitung` (`zub_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_zubereitung_has_zutat_einheit_zutat_einheit1`
    FOREIGN KEY (`zuein_id`)
    REFERENCES `Kochrezepte`.`zutat_einheit` (`zuein_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `Kochrezepte`.`rezeptname`
-- -----------------------------------------------------
START TRANSACTION;
USE `Kochrezepte`;
INSERT INTO `Kochrezepte`.`rezeptname` (`rez_id`, `rez_name`) VALUES (1, 'Marmorkuchen');
INSERT INTO `Kochrezepte`.`rezeptname` (`rez_id`, `rez_name`) VALUES (2, 'Schnitzerl');
INSERT INTO `Kochrezepte`.`rezeptname` (`rez_id`, `rez_name`) VALUES (3, 'Wiener Schnitzerl');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Kochrezepte`.`zubereitung`
-- -----------------------------------------------------
START TRANSACTION;
USE `Kochrezepte`;
INSERT INTO `Kochrezepte`.`zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`, `zub_bereitgestellt_am`) VALUES (1, 'Mischen Sie alle Zutaten zu einem Teig', 1, '2021-05-14 12:10:25');
INSERT INTO `Kochrezepte`.`zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`, `zub_bereitgestellt_am`) VALUES (2, 'Salzen, nicht Klopfen sondern drücken', 2, '2021-10-22 23:40:22');
INSERT INTO `Kochrezepte`.`zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`, `zub_bereitgestellt_am`) VALUES (3, 'Verwenden Sie extra dünn geschnittene Filetschnitten', 3, '2022-01-10 16:15:05');
INSERT INTO `Kochrezepte`.`zubereitung` (`zub_id`, `zub_beschreibung`, `rez_id`, `zub_bereitgestellt_am`) VALUES (4, 'Zuerst Eiklar steif schlagen, dann Mehl langsam untermischen usw', 1, '2022-05-06 10:05:01');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Kochrezepte`.`zutat`
-- -----------------------------------------------------
START TRANSACTION;
USE `Kochrezepte`;
INSERT INTO `Kochrezepte`.`zutat` (`zut_id`, `zut_name`) VALUES (2, 'Eier');
INSERT INTO `Kochrezepte`.`zutat` (`zut_id`, `zut_name`) VALUES (4, 'Kakaopulfer');
INSERT INTO `Kochrezepte`.`zutat` (`zut_id`, `zut_name`) VALUES (1, 'Mehl');
INSERT INTO `Kochrezepte`.`zutat` (`zut_id`, `zut_name`) VALUES (3, 'Salz');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Kochrezepte`.`einheit`
-- -----------------------------------------------------
START TRANSACTION;
USE `Kochrezepte`;
INSERT INTO `Kochrezepte`.`einheit` (`ein_id`, `ein_name`) VALUES (2, 'dag');
INSERT INTO `Kochrezepte`.`einheit` (`ein_id`, `ein_name`) VALUES (4, 'kg');
INSERT INTO `Kochrezepte`.`einheit` (`ein_id`, `ein_name`) VALUES (1, 'Prise');
INSERT INTO `Kochrezepte`.`einheit` (`ein_id`, `ein_name`) VALUES (3, 'Stück');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Kochrezepte`.`zutat_einheit`
-- -----------------------------------------------------
START TRANSACTION;
USE `Kochrezepte`;
INSERT INTO `Kochrezepte`.`zutat_einheit` (`zut_id`, `ein_id`, `zuein_id`) VALUES (1, 2, 1);
INSERT INTO `Kochrezepte`.`zutat_einheit` (`zut_id`, `ein_id`, `zuein_id`) VALUES (1, 4, 2);
INSERT INTO `Kochrezepte`.`zutat_einheit` (`zut_id`, `ein_id`, `zuein_id`) VALUES (2, 3, 3);
INSERT INTO `Kochrezepte`.`zutat_einheit` (`zut_id`, `ein_id`, `zuein_id`) VALUES (3, 1, 4);
INSERT INTO `Kochrezepte`.`zutat_einheit` (`zut_id`, `ein_id`, `zuein_id`) VALUES (4, 2, 5);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Kochrezepte`.`zubereitung_has_zutat_einheit`
-- -----------------------------------------------------
START TRANSACTION;
USE `Kochrezepte`;
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (1, 1, 50);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (1, 3, 4);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (1, 4, 1);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (1, 5, 20);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (2, 1, 20);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (2, 3, 2);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (2, 4, 3);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (3, 1, 20);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (4, 4, 1);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (4, 5, 25);
INSERT INTO `Kochrezepte`.`zubereitung_has_zutat_einheit` (`zub_id`, `zuein_id`, `zubein_menge`) VALUES (4, 1, 75);

COMMIT;

