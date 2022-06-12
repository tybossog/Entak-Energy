-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema entak_energy_development_db
-- -----------------------------------------------------
-- Development database for Entak Energy

-- -----------------------------------------------------
-- Schema entak_energy_development_db
--
-- Development database for Entak Energy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `entak_energy_development_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `entak_energy_development_db` ;

-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`bio_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`bio_info` (
  `bio_info_id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '1',
  `create_date` DATETIME NOT NULL,
  `last_update` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `phone` VARCHAR(10) NOT NULL,
  `gender` ENUM('MALE', 'FEMALE') NOT NULL,
  PRIMARY KEY (`bio_info_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`country` (
  `country_id` INT NOT NULL AUTO_INCREMENT,
  `name` ENUM('Nigeria', 'Cameroun') NOT NULL DEFAULT 'Nigeria',
  `language` ENUM('English', 'French') NOT NULL DEFAULT 'English',
  `currency` ENUM('NGN') NOT NULL DEFAULT 'NGN',
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`country_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`city` (
  `city_id` INT NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(50) NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `country_id` INT NOT NULL,
  PRIMARY KEY (`city_id`),
  INDEX `fk_city_country1_idx` (`country_id` ASC) VISIBLE,
  CONSTRAINT `fk_city_country1`
    FOREIGN KEY (`country_id`)
    REFERENCES `entak_energy_development_db`.`country` (`country_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`address` (
  `address_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `city_id` INT NOT NULL,
  `house_line` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`address_id`),
  INDEX `fk_address_city1_idx` (`city_id` ASC) VISIBLE,
  CONSTRAINT `fk_address_city1`
    FOREIGN KEY (`city_id`)
    REFERENCES `entak_energy_development_db`.`city` (`city_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`account_settings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`account_settings` (
  `account_settings_id` INT NOT NULL AUTO_INCREMENT,
  `always_loggedin` TINYINT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_settings_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`authentication`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`authentication` (
  `authentication_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`authentication_id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`landlord`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`landlord` (
  `landlord_id` INT NOT NULL AUTO_INCREMENT,
  `bio_info_id` INT NOT NULL,
  `address_id` INT UNSIGNED NOT NULL,
  `account_settings_id` INT NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` TIMESTAMP NOT NULL,
  `last_logout` TIMESTAMP NOT NULL,
  `authentication_id` INT NOT NULL,
  PRIMARY KEY (`landlord_id`),
  INDEX `fk_landlord_bio_info1_idx` (`bio_info_id` ASC) VISIBLE,
  INDEX `fk_landlord_address1_idx` (`address_id` ASC) VISIBLE,
  INDEX `fk_landlord_account_settings1_idx` (`account_settings_id` ASC) VISIBLE,
  INDEX `fk_landlord_authentication1_idx` (`authentication_id` ASC) VISIBLE,
  CONSTRAINT `fk_landlord_bio_info1`
    FOREIGN KEY (`bio_info_id`)
    REFERENCES `entak_energy_development_db`.`bio_info` (`bio_info_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_landlord_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `entak_energy_development_db`.`address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_landlord_account_settings1`
    FOREIGN KEY (`account_settings_id`)
    REFERENCES `entak_energy_development_db`.`account_settings` (`account_settings_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_landlord_authentication1`
    FOREIGN KEY (`authentication_id`)
    REFERENCES `entak_energy_development_db`.`authentication` (`authentication_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`building`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`building` (
  `building_id` INT NOT NULL,
  `landlord_id` INT NOT NULL,
  `building_number` INT NOT NULL,
  `address_id` INT UNSIGNED NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`building_id`),
  INDEX `fk_building_landlord1_idx` (`landlord_id` ASC) VISIBLE,
  INDEX `fk_building_address1_idx` (`address_id` ASC) VISIBLE,
  CONSTRAINT `fk_building_landlord1`
    FOREIGN KEY (`landlord_id`)
    REFERENCES `entak_energy_development_db`.`landlord` (`landlord_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_building_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `entak_energy_development_db`.`address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`smart_meter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`smart_meter` (
  `smart_meter_id` INT NOT NULL AUTO_INCREMENT,
  `building_id` INT NOT NULL,
  `authentication_id` INT NOT NULL,
  `serial_number` VARCHAR(9) NOT NULL,
  `unit_available` FLOAT NOT NULL,
  `status` ENUM('OFFLINE', 'ONLINE') NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_recharge` TIMESTAMP NOT NULL,
  PRIMARY KEY (`smart_meter_id`),
  INDEX `fk_smart_meter_building1_idx` (`building_id` ASC) VISIBLE,
  INDEX `fk_smart_meter_authentication1_idx` (`authentication_id` ASC) VISIBLE,
  UNIQUE INDEX `serial_number_UNIQUE` (`serial_number` ASC) VISIBLE,
  CONSTRAINT `fk_smart_meter_building1`
    FOREIGN KEY (`building_id`)
    REFERENCES `entak_energy_development_db`.`building` (`building_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_smart_meter_authentication1`
    FOREIGN KEY (`authentication_id`)
    REFERENCES `entak_energy_development_db`.`authentication` (`authentication_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`tenant`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`tenant` (
  `tenant_id` INT NOT NULL AUTO_INCREMENT,
  `bio_info_id` INT NOT NULL,
  `address_id` INT UNSIGNED NOT NULL,
  `smart_meter_id` INT NOT NULL,
  `account_settings_id` INT NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` TIMESTAMP NOT NULL,
  `last_logout` TIMESTAMP NOT NULL,
  PRIMARY KEY (`tenant_id`),
  INDEX `fk_tenant_bio_info1_idx` (`bio_info_id` ASC) VISIBLE,
  INDEX `fk_tenant_address1_idx` (`address_id` ASC) VISIBLE,
  INDEX `fk_tenant_smart_meter1_idx` (`smart_meter_id` ASC) VISIBLE,
  INDEX `fk_tenant_account_settings1_idx` (`account_settings_id` ASC) VISIBLE,
  CONSTRAINT `fk_tenant_bio_info1`
    FOREIGN KEY (`bio_info_id`)
    REFERENCES `entak_energy_development_db`.`bio_info` (`bio_info_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenant_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `entak_energy_development_db`.`address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenant_smart_meter1`
    FOREIGN KEY (`smart_meter_id`)
    REFERENCES `entak_energy_development_db`.`smart_meter` (`smart_meter_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tenant_account_settings1`
    FOREIGN KEY (`account_settings_id`)
    REFERENCES `entak_energy_development_db`.`account_settings` (`account_settings_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`invoice`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`invoice` (
  `invoice_id` INT NOT NULL AUTO_INCREMENT,
  `tenant_id` INT NOT NULL,
  `building_id` INT NOT NULL,
  `address_id` INT UNSIGNED NOT NULL,
  `description` TEXT(500) NOT NULL,
  `quantity` INT UNSIGNED NOT NULL DEFAULT 0,
  `status` ENUM('SUCCESSFUL', 'FAILED', 'PENDING') NOT NULL,
  `smart_meter_id` INT NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `amount` DECIMAL(5,2) NOT NULL,
  `payment_date` DATETIME NOT NULL,
  PRIMARY KEY (`invoice_id`),
  INDEX `fk_invoice_tenant1_idx` (`tenant_id` ASC) VISIBLE,
  INDEX `fk_invoice_building1_idx` (`building_id` ASC) VISIBLE,
  INDEX `fk_invoice_address1_idx` (`address_id` ASC) VISIBLE,
  INDEX `fk_invoice_smart_meter1_idx` (`smart_meter_id` ASC) VISIBLE,
  CONSTRAINT `fk_invoice_tenant1`
    FOREIGN KEY (`tenant_id`)
    REFERENCES `entak_energy_development_db`.`tenant` (`tenant_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_building1`
    FOREIGN KEY (`building_id`)
    REFERENCES `entak_energy_development_db`.`building` (`building_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `entak_energy_development_db`.`address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_smart_meter1`
    FOREIGN KEY (`smart_meter_id`)
    REFERENCES `entak_energy_development_db`.`smart_meter` (`smart_meter_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`administrator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`administrator` (
  `administrator_id` INT NOT NULL AUTO_INCREMENT,
  `bio_info_id` INT NOT NULL,
  `address_id` INT UNSIGNED NOT NULL,
  `account_settings_id` INT NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` TIMESTAMP NOT NULL,
  `last_logout` TIMESTAMP NOT NULL,
  `authentication_id` INT NOT NULL,
  PRIMARY KEY (`administrator_id`),
  INDEX `fk_administrator_bio_info1_idx` (`bio_info_id` ASC) VISIBLE,
  INDEX `fk_administrator_address1_idx` (`address_id` ASC) VISIBLE,
  INDEX `fk_administrator_account_settings1_idx` (`account_settings_id` ASC) VISIBLE,
  INDEX `fk_administrator_authentication1_idx` (`authentication_id` ASC) VISIBLE,
  CONSTRAINT `fk_administrator_bio_info1`
    FOREIGN KEY (`bio_info_id`)
    REFERENCES `entak_energy_development_db`.`bio_info` (`bio_info_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_administrator_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `entak_energy_development_db`.`address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_administrator_account_settings1`
    FOREIGN KEY (`account_settings_id`)
    REFERENCES `entak_energy_development_db`.`account_settings` (`account_settings_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_administrator_authentication1`
    FOREIGN KEY (`authentication_id`)
    REFERENCES `entak_energy_development_db`.`authentication` (`authentication_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`operator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`operator` (
  `operator_id` INT NOT NULL AUTO_INCREMENT,
  `bio_info_id` INT NOT NULL,
  `address_id` INT UNSIGNED NOT NULL,
  `account_settings_id` INT NOT NULL,
  `last_update` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` TIMESTAMP NOT NULL,
  `last_logout` TIMESTAMP NOT NULL,
  `authentication_id` INT NOT NULL,
  PRIMARY KEY (`operator_id`),
  INDEX `fk_operator_bio_info1_idx` (`bio_info_id` ASC) VISIBLE,
  INDEX `fk_operator_address1_idx` (`address_id` ASC) VISIBLE,
  INDEX `fk_operator_account_settings1_idx` (`account_settings_id` ASC) VISIBLE,
  INDEX `fk_operator_authentication1_idx` (`authentication_id` ASC) VISIBLE,
  CONSTRAINT `fk_operator_bio_info1`
    FOREIGN KEY (`bio_info_id`)
    REFERENCES `entak_energy_development_db`.`bio_info` (`bio_info_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operator_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `entak_energy_development_db`.`address` (`address_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operator_account_settings1`
    FOREIGN KEY (`account_settings_id`)
    REFERENCES `entak_energy_development_db`.`account_settings` (`account_settings_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_operator_authentication1`
    FOREIGN KEY (`authentication_id`)
    REFERENCES `entak_energy_development_db`.`authentication` (`authentication_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `entak_energy_development_db`.`gas_price`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `entak_energy_development_db`.`gas_price` (
  `gas_price_id` INT NOT NULL AUTO_INCREMENT,
  `current_price` FLOAT NOT NULL,
  `old_price` FLOAT NOT NULL,
  PRIMARY KEY (`gas_price_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
