-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema petshop
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `petshop` ;

-- -----------------------------------------------------
-- Schema petshop
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `petshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `petshop` ;

-- -----------------------------------------------------
-- Table `petshop`.`Funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Funcionarios` (
  `PK_Funcionario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `CPF` CHAR(11) NOT NULL,
  `Senha` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`PK_Funcionario`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `petshop`.`Enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Enderecos` (
  `PK_Endereco` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `CEP` CHAR(8) NOT NULL,
  `Logradouro` VARCHAR(100) NOT NULL,
  `Numero` VARCHAR(5) NOT NULL,
  `Bairro` VARCHAR(100) NOT NULL,
  `Municipio` VARCHAR(100) NOT NULL,
  `UF` CHAR(2) NOT NULL,
  PRIMARY KEY (`PK_Endereco`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `petshop`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Clientes` (
  `PK_Cliente` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `FK_Endereco` INT UNSIGNED NOT NULL,
  `CPF` CHAR(11) NOT NULL,
  `Nome` VARCHAR(100) NOT NULL,
  `Sobrenome` VARCHAR(200) NOT NULL,
  `Celular` CHAR(11) NOT NULL,
  `Email` VARCHAR(200) NOT NULL,
  `Senha` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`PK_Cliente`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC) VISIBLE,
  INDEX `fk_Clientes_Enderecos_idx` (`FK_Endereco` ASC) VISIBLE,
  UNIQUE INDEX `Email_UNIQUE` (`Email` ASC) VISIBLE,
  CONSTRAINT `fk_Clientes_Enderecos`
    FOREIGN KEY (`FK_Endereco`)
    REFERENCES `petshop`.`Enderecos` (`PK_Endereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `petshop`.`Animais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Animais` (
  `PK_Animal` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `FK_Cliente` INT UNSIGNED NOT NULL,
  `Nome` VARCHAR(100) NOT NULL,
  `Data_Nascimento` DATE NOT NULL,
  `Raca` VARCHAR(45) NOT NULL,
  `Peso` FLOAT NOT NULL,
  `Cor` VARCHAR(45) NOT NULL,
  `Data_Cadastro` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`PK_Animal`),
  INDEX `fk_Animais_Clientes1_idx` (`FK_Cliente` ASC) VISIBLE,
  CONSTRAINT `fk_Animais_Clientes1`
    FOREIGN KEY (`FK_Cliente`)
    REFERENCES `petshop`.`Clientes` (`PK_Cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `petshop`.`Agendamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Agendamentos` (
  `PK_Agendamento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `FK_Funcionario` INT UNSIGNED NOT NULL,
  `FK_Animal` INT UNSIGNED NULL,
  `Data_Agendamento` DATE NOT NULL,
  `Horario_Agendamento` TIME NOT NULL,
  `Status` ENUM('Disponivel', 'Marcado', 'Em Andamento', 'Concluido') NOT NULL,
  `Descricao` TEXT NULL,
  `Tipo` ENUM('Banho', 'Tosa', 'Veterinário') NOT NULL,
  PRIMARY KEY (`PK_Agendamento`),
  INDEX `fk_Agendamentos_Funcionarios1_idx` (`FK_Funcionario` ASC) VISIBLE,
  INDEX `fk_Agendamentos_Animais1_idx` (`FK_Animal` ASC) VISIBLE,
  CONSTRAINT `fk_Agendamentos_Funcionarios1`
    FOREIGN KEY (`FK_Funcionario`)
    REFERENCES `petshop`.`Funcionarios` (`PK_Funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agendamentos_Animais1`
    FOREIGN KEY (`FK_Animal`)
    REFERENCES `petshop`.`Animais` (`PK_Animal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
