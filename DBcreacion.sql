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
    `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
    `activation_code` VARCHAR(255) NOT NULL,
    `activation_expiry` DATETIME NOT NULL,
    `activated_at` DATETIME DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` DATETIME DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    PRIMARY KEY(`iduser`)
);

