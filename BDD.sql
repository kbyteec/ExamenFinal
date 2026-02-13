-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gestion_alumnos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gestion_alumnos
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gestion_alumnos` DEFAULT CHARACTER SET utf8mb4 ;
USE `gestion_alumnos` ;

-- -----------------------------------------------------
-- Table `gestion_alumnos`.`alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestion_alumnos`.`alumno` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `gestion_alumnos`.`nota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gestion_alumnos`.`nota` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `alumno_id` INT(11) NOT NULL,
  `nota` DECIMAL(4,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `alumno_id` (`alumno_id` ASC) VISIBLE,
  CONSTRAINT `nota_ibfk_1`
    FOREIGN KEY (`alumno_id`)
    REFERENCES `gestion_alumnos`.`alumno` (`id`)
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
