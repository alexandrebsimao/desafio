-- MySQL Script generated by MySQL Workbench
-- 09/20/15 16:08:28
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema desafio
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema desafio
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `desafio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `desafio` ;

-- -----------------------------------------------------
-- Table `desafio`.`recados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `desafio`.`recados` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nome` VARCHAR(255) NULL COMMENT '',
  `email` VARCHAR(255) NULL COMMENT '',
  `data_envio` DATETIME NULL COMMENT '',
  `aprovado` SET('0', '1') NULL COMMENT '',
  `titulo` VARCHAR(255) NULL COMMENT '',
  `texto` TEXT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
