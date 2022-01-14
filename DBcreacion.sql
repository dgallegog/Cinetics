DROP DATABASE IF EXISTS `cinetics`;
CREATE DATABASE IF NOT EXISTS `cinetics` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `cinetics`;

CREATE TABLE IF NOT EXISTS `users`(
    `iduser` INT AUTO_INCREMENT NOT NULL,
    `mail` VARCHAR(40) UNIQUE NOT NULL,
    `username` VARCHAR(16) UNIQUE NOT NULL,
    `passHash` VARCHAR(60) NOT NULL,
    `userFirstName` VARCHAR(60),
    `userLastName` VARCHAR(120),
    `creationDate` DATETIME DEFAULT NOW(), 
    `removeDate` DATETIME,
    `lastSignIn` DATETIME,
    `active` TINYINT(1) DEFAULT 0,
    `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
    `activationCode` VARCHAR(255) NOT NULL,
    `activationExpiry` DATETIME NOT NULL,
    `activationDate` DATETIME DEFAULT NULL,
    `resetPassCode` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`iduser`)
);

