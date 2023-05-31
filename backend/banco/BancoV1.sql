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

insert into Funcionarios values 
(default, 'Gina', '22211879977', 'Esteticista', 'e9b4661b61765ef1594d7969692870a29be9ca1ada44779920a5237611c83e1913c843333c5028e7df3f09f23f383762c08d9513493a34edbd9e47f943f20895', 'ativo'),
(default, 'Dolittle', '02673025413', 'Veterinario', 'e9b4661b61765ef1594d7969692870a29be9ca1ada44779920a5237611c83e1913c843333c5028e7df3f09f23f383762c08d9513493a34edbd9e47f943f20895', 'ativo'),
(default, 'Josilene', '67177775757', 'Secretaria', 'e9b4661b61765ef1594d7969692870a29be9ca1ada44779920a5237611c83e1913c843333c5028e7df3f09f23f383762c08d9513493a34edbd9e47f943f20895', 'ativo');

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
  `complemento` VARCHAR(50) NOT NULL,
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


insert into Clientes values (default, '34125701415', 'Marlene', 'Gomes', '11988888888', '02618200', 'Rua Torre da Alfândega', 
'50', 'a', 'Vila Amália (Zona Norte)', 'Sao paulo', 'SP', 'marlene@gmail.com', 
'e9b4661b61765ef1594d7969692870a29be9ca1ada44779920a5237611c83e1913c843333c5028e7df3f09f23f383762c08d9513493a34edbd9e47f943f20895', 'ativo');

-- -----------------------------------------------------
-- Table `petshop`.`Animais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `petshop`.`Animais` (
  `pk_Animal` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fk_Cliente` INT UNSIGNED NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `data_nascimento` DATE NOT NULL,
  `sexo` ENUM('F', 'M', 'I'),
  `especie` VARCHAR(45) NOT NULL,
  `raca` VARCHAR(45) NOT NULL,
  `peso` FLOAT NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `data_cadastro` DATE NOT NULL,
  `ativo` ENUM('ativo', 'inativo') NOT NULL,
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

insert into Agendamentos values (default, 2, null, '2023-06-20', '14:30', 'Disponivel', null, 'Veterinário', 'ativo');
insert into Agendamentos values (default, 2, null, '2023-06-21', '10:00', 'Disponivel', null, 'Veterinário', 'ativo');



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

select * from clientes;
select * from animais;
select * from Funcionarios;

select * from Agendamentos;

insert into Funcionarios values 
(default, 'Michael', 23301610005, 'admin', 
'b123e9e19d217169b981a61188920f9d28638709a5132201684d792b9264271b7f09157ed4321b1c097f7a4abecfc0977d40a7ee599c845883bd1074ca23c4af', 'ativo');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
