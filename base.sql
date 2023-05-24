-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema footballclub
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema footballclub
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `footballclub` DEFAULT CHARACTER SET latin1 ;
USE `footballclub` ;

-- -----------------------------------------------------
-- Table `footballclub`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `footballclub`.`country` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NULL DEFAULT NULL,
  `img` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name` (`name` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 38
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `footballclub`.`league`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `footballclub`.`league` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NULL DEFAULT NULL,
  `country_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_league_to_country` (`country_id` ASC) VISIBLE,
  CONSTRAINT `fk_league_to_country`
    FOREIGN KEY (`country_id`)
    REFERENCES `footballclub`.`country` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 39
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `footballclub`.`club`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `footballclub`.`club` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `createDate` DATE NOT NULL,
  `descrip` MEDIUMTEXT NOT NULL,
  `logo` VARCHAR(255) NULL DEFAULT NULL,
  `stadiumName` VARCHAR(200) NOT NULL,
  `league_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `name_UNIQUE` (`name` ASC) VISIBLE,
  INDEX `fk_club_to_league` (`league_id` ASC) VISIBLE,
  CONSTRAINT `fk_club_to_league`
    FOREIGN KEY (`league_id`)
    REFERENCES `footballclub`.`league` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 21
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `footballclub`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `footballclub`.`user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `passwd` VARCHAR(255) NOT NULL,
  `lastName` VARCHAR(200) NOT NULL DEFAULT '0',
  `firstName` VARCHAR(200) NOT NULL DEFAULT '0',
  `role` VARCHAR(20) NOT NULL DEFAULT '[ROLE_USER]',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 22
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
