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
    `active` TINYINT(1),
    PRIMARY KEY(`iduser`)
);

