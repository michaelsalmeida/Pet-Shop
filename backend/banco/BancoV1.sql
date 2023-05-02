-- MySQL Workbench Forward Engineering
-- drop database petshop;
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
CREATE SCHEMA IF NOT EXISTS `petshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ;
USE `petshop` ;

-- -----------------------------------------------------
-- Table `petshop`.`Funcionarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Funcionarios` (
  `pk_Funcionario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `cpf` CHAR(11) NOT NULL UNIQUE,
  `profissao` ENUM('Veterinario', 'Secretaria', 'Esteticista', 'admin') NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  `ativo` ENUM('ativo', 'demitido') NOT NULL,
  PRIMARY KEY (`pk_Funcionario`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;

-- -----------------------------------------------------
-- Table `petshop`.`Clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Clientes` (
  `pk_Cliente` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cpf` CHAR(11) NOT NULL UNIQUE,
  `nome` VARCHAR(100) NOT NULL,
  `sobrenome` VARCHAR(200) NOT NULL,
  `celular` CHAR(11) NOT NULL,
  `cep` CHAR(8) NOT NULL,
  `logradouro` VARCHAR(100) NOT NULL,
  `numero` VARCHAR(5) NOT NULL,
  `complemento` VARCHAR(5) NOT NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `municipio` VARCHAR(100) NOT NULL,
  `uf` CHAR(2) NOT NULL,
  `email` VARCHAR(200) NOT NULL UNIQUE,
  `senha` VARCHAR(250) NOT NULL,
  `ativo` ENUM('ativo', 'inativo') NOT NULL,
  PRIMARY KEY (`pk_Cliente`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `petshop`.`Animais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Animais` (
  `pk_Animal` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_Cliente` INT UNSIGNED NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `especie` VARCHAR(45) NOT NULL,
  `raca` VARCHAR(45) NOT NULL,
  `peso` FLOAT NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `ativo` ENUM('ativo', 'inativo') NOT NULL,
  `sexo` ENUM('F', 'M'),
  PRIMARY KEY (`pk_Animal`),
  CONSTRAINT `fk_Animais_Clientes1`
    FOREIGN KEY (`fk_Cliente`)
    REFERENCES `petshop`.`Clientes` (`pk_Cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;


-- -----------------------------------------------------
-- Table `petshop`.`Agendamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Agendamentos` (
  `pk_Agendamento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_Funcionario` INT UNSIGNED NOT NULL,
  `fk_Animal` INT UNSIGNED NULL,
  `data_agendamento` DATE NOT NULL,
  `horario_agendamento` TIME NOT NULL,
  `status` ENUM('Disponivel', 'Marcado', 'Em_Andamento', 'Concluido', 'Cancelado') NOT NULL DEFAULT 'Disponivel',
  `descricao` TEXT NULL,
  `tipo` ENUM('Banho', 'Tosa', 'Veterinário', 'Banho e Tosa') NOT NULL,
  `ativo` ENUM('ativo', 'inativo') NOT NULL,
  PRIMARY KEY (`pk_Agendamento`),
  CONSTRAINT `fk_Agendamentos_Funcionarios`
    FOREIGN KEY (`fk_Funcionario`)
    REFERENCES `petshop`.`Funcionarios` (`pk_Funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Agendamentos_Animais`
    FOREIGN KEY (`fk_Animal`)
    REFERENCES `petshop`.`Animais` (`pk_Animal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `petshop`.`Comentarios` (
  `pk_Comentario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `telefone` CHAR(11) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `mensagem` TEXT,
  `data` DATE NOT NULL,
  PRIMARY KEY (`pk_Comentario`)
)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_general_ci;

desc Funcionarios;

select * from Funcionarios;

insert into Funcionarios values 
(default, 'Michael', 22222222222, 'admin', 
'b123e9e19d217169b981a61188920f9d28638709a5132201684d792b9264271b7f09157ed4321b1c097f7a4abecfc0977d40a7ee599c845883bd1074ca23c4af', 'ativo');


insert into Clientes VALUES
(default, 11122233396, 'Violett', 'Vohor', '11958855005', '05005400', 'limão', '123', 'a', 'limoeiro', 'São Paulo', 'sp', 'scar@example.com',
'b123e9e19d217169b981a61188920f9d28638709a5132201684d792b9264271b7f09157ed4321b1c097f7a4abecfc0977d40a7ee599c845883bd1074ca23c4af', 'ativo');

insert into Animais values
(default, 1, 'Tobias', '2023-01-01', 'dragao', 'komodo', '45', 'rosa', '2023-04-11', 'ativo');

insert into Agendamentos values
(default, 2, 1, '2023-03-11', '11:40', 'Em_Andamento', null, 'Veterinário', 'ativo'),
(default, 2, 1, '2023-04-12', '15:40', 'Concluido', 'teste de descrição', 'Veterinário', 'ativo'),
(default, 2, 1, '2023-05-11', '14:40', 'Marcado', null, 'Veterinário', 'ativo');

insert into Agendamentos values
(default, 2, null, '2022-04-11', '11:40', 'Disponivel', null, 'Veterinário', 'ativo');

select * from Animais;
select * from Clientes;
select * from Agendamentos;
select * from Funcionarios;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
