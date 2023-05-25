-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema MOVIE
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `MOVIE` ;

-- -----------------------------------------------------
-- Schema MOVIE
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MOVIE` ;
USE `MOVIE` ;

-- -----------------------------------------------------
-- Table `MOVIE`.`PROTAGONIST`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MOVIE`.`PROTAGONIST` (
  `pro_id` INT NOT NULL AUTO_INCREMENT,
  `pro_fname` VARCHAR(45) NULL,
  `pro_sname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`pro_id`),
  UNIQUE INDEX `uq_pro_name` (`pro_fname` ASC, `pro_sname` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MOVIE`.`MOVIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MOVIE`.`MOVIE` (
  `mov_id` INT NOT NULL AUTO_INCREMENT,
  `mov_title` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`mov_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MOVIE`.`COUNTRY`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MOVIE`.`COUNTRY` (
  `cou_id` INT NOT NULL AUTO_INCREMENT,
  `cou_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cou_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MOVIE`.`COMPANY`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MOVIE`.`COMPANY` (
  `com_id` INT NOT NULL AUTO_INCREMENT,
  `com_name` VARCHAR(45) NOT NULL,
  `cou_id` INT NOT NULL,
  PRIMARY KEY (`com_id`),
  INDEX `fk_COMPANY_COUNTRY1_idx` (`cou_id` ASC),
  CONSTRAINT `fk_COMPANY_COUNTRY1`
    FOREIGN KEY (`cou_id`)
    REFERENCES `MOVIE`.`COUNTRY` (`cou_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MOVIE`.`PROTAGONIST_MOVIE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MOVIE`.`PROTAGONIST_MOVIE` (
  `prmo_id` INT NOT NULL AUTO_INCREMENT,
  `pro_actor_id` INT NOT NULL,
  `mov_id` INT NOT NULL,
  `pro_regie_id` INT NOT NULL,
  `com_id` INT NOT NULL,
  INDEX `fk_PROTAGONIST_has_MOVIE_MOVIE1_idx` (`mov_id` ASC),
  INDEX `fk_PROTAGONIST_has_MOVIE_PROTAGONIST_idx` (`pro_actor_id` ASC),
  INDEX `fk_PROTAGONIST_has_MOVIE_PROTAGONIST1_idx` (`pro_regie_id` ASC),
  PRIMARY KEY (`prmo_id`),
  INDEX `fk_PROTAGONIST_MOVIE_COMPANY1_idx` (`com_id` ASC),
  CONSTRAINT `fk_PROTAGONIST_has_MOVIE_PROTAGONIST`
    FOREIGN KEY (`pro_actor_id`)
    REFERENCES `MOVIE`.`PROTAGONIST` (`pro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROTAGONIST_has_MOVIE_MOVIE1`
    FOREIGN KEY (`mov_id`)
    REFERENCES `MOVIE`.`MOVIE` (`mov_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROTAGONIST_has_MOVIE_PROTAGONIST1`
    FOREIGN KEY (`pro_regie_id`)
    REFERENCES `MOVIE`.`PROTAGONIST` (`pro_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROTAGONIST_MOVIE_COMPANY1`
    FOREIGN KEY (`com_id`)
    REFERENCES `MOVIE`.`COMPANY` (`com_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `MOVIE`.`PROTAGONIST`
-- -----------------------------------------------------
START TRANSACTION;
USE `MOVIE`;
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Barret', 'Oliver');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Tami', 'Stronach');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Karl', 'Merkatz');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Ida', 'Krottendorf');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Martin', 'Freeman');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Ian', 'McKellen');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Jürgen', 'Prochnow');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Wolfgang', 'Peteresen');
INSERT INTO `MOVIE`.`PROTAGONIST` (`pro_id`, `pro_fname`, `pro_sname`) VALUES (DEFAULT, 'Franz', 'Antel');

COMMIT;


-- -----------------------------------------------------
-- Data for table `MOVIE`.`MOVIE`
-- -----------------------------------------------------
START TRANSACTION;
USE `MOVIE`;
INSERT INTO `MOVIE`.`MOVIE` (`mov_id`, `mov_title`) VALUES (DEFAULT, 'Der Bockerer');
INSERT INTO `MOVIE`.`MOVIE` (`mov_id`, `mov_title`) VALUES (DEFAULT, 'Der Hobbit');
INSERT INTO `MOVIE`.`MOVIE` (`mov_id`, `mov_title`) VALUES (DEFAULT, 'Die unendliche Geschichte');
INSERT INTO `MOVIE`.`MOVIE` (`mov_id`, `mov_title`) VALUES (DEFAULT, 'Das Boot');

COMMIT;


-- -----------------------------------------------------
-- Data for table `MOVIE`.`COUNTRY`
-- -----------------------------------------------------
START TRANSACTION;
USE `MOVIE`;
INSERT INTO `MOVIE`.`COUNTRY` (`cou_id`, `cou_name`) VALUES (DEFAULT, 'USA');
INSERT INTO `MOVIE`.`COUNTRY` (`cou_id`, `cou_name`) VALUES (DEFAULT, 'Deutschland');
INSERT INTO `MOVIE`.`COUNTRY` (`cou_id`, `cou_name`) VALUES (DEFAULT, 'Österreich');
INSERT INTO `MOVIE`.`COUNTRY` (`cou_id`, `cou_name`) VALUES (DEFAULT, 'Great Britain');

COMMIT;


-- -----------------------------------------------------
-- Data for table `MOVIE`.`COMPANY`
-- -----------------------------------------------------
START TRANSACTION;
USE `MOVIE`;
INSERT INTO `MOVIE`.`COMPANY` (`com_id`, `com_name`, `cou_id`) VALUES (DEFAULT, 'Warner Bros. Entertainment', 1);
INSERT INTO `MOVIE`.`COMPANY` (`com_id`, `com_name`, `cou_id`) VALUES (DEFAULT, 'Walt Disney Motion Pictures Group', 1);
INSERT INTO `MOVIE`.`COMPANY` (`com_id`, `com_name`, `cou_id`) VALUES (DEFAULT, 'Bavaria Filmstudios', 2);
INSERT INTO `MOVIE`.`COMPANY` (`com_id`, `com_name`, `cou_id`) VALUES (DEFAULT, 'Rosenhügel-Filmstudios', 3);
INSERT INTO `MOVIE`.`COMPANY` (`com_id`, `com_name`, `cou_id`) VALUES (DEFAULT, '20th Century Fox', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `MOVIE`.`PROTAGONIST_MOVIE`
-- -----------------------------------------------------
START TRANSACTION;
USE `MOVIE`;
INSERT INTO `MOVIE`.`PROTAGONIST_MOVIE` (`prmo_id`, `pro_actor_id`, `mov_id`, `pro_regie_id`, `com_id`) VALUES (DEFAULT, 7, 4, 8, 3);
INSERT INTO `MOVIE`.`PROTAGONIST_MOVIE` (`prmo_id`, `pro_actor_id`, `mov_id`, `pro_regie_id`, `com_id`) VALUES (DEFAULT, 3, 1, 9, 4);
INSERT INTO `MOVIE`.`PROTAGONIST_MOVIE` (`prmo_id`, `pro_actor_id`, `mov_id`, `pro_regie_id`, `com_id`) VALUES (DEFAULT, 4, 1, 9, 4);
INSERT INTO `MOVIE`.`PROTAGONIST_MOVIE` (`prmo_id`, `pro_actor_id`, `mov_id`, `pro_regie_id`, `com_id`) VALUES (DEFAULT, 1, 3, 8, 3);
INSERT INTO `MOVIE`.`PROTAGONIST_MOVIE` (`prmo_id`, `pro_actor_id`, `mov_id`, `pro_regie_id`, `com_id`) VALUES (DEFAULT, 2, 3, 8, 3);

COMMIT;

