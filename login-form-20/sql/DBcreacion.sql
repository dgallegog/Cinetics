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
    `activationDate` DATETIME DEFAULT NULL,
    `activationCode` VARCHAR(255) NOT NULL,
    `resetPassExpiry` DATETIME DEFAULT NULL,
    `resetPassCode` VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY(`iduser`)
);

CREATE TABLE IF NOT EXISTS `videos`(
    `idVideo` INT AUTO_INCREMENT NOT NULL,
    `likes` INT UNSIGNED DEFAULT 0,
    `dislikes` INT UNSIGNED DEFAULT 0,
    `path` VARCHAR(300) NOT NULL,
    `description` VARCHAR(300) NOT NULL,
    `uploadDate` DATETIME DEFAULT NOW(),
    `usersIduser` INT, 
    PRIMARY KEY(`idVideo`),

    CONSTRAINT `fk_videos_users` FOREIGN KEY (`usersIduser`) REFERENCES `users`(`iduser`)
        ON UPDATE CASCADE ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS `hashtags`(
    `idHashtag` INT AUTO_INCREMENT NOT NULL,
    `tag` VARCHAR(30),
    PRIMARY KEY(`idHashtag`)
);

CREATE TABLE IF NOT EXISTS `videoHashtags`(
    `videosIdVideo` INT,
    `hashtagsIdHashtag` INT,
    PRIMARY KEY (`videosIdVideo`,`hashtagsIdHashtag`),

    CONSTRAINT `fk_videoHashtags_videos` FOREIGN KEY (`videosIdVideo`) REFERENCES `videos`(`idVideo`)
        ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT `fk_videoHashtags_hashtags` FOREIGN KEY (`hashtagsIdHashtag`) REFERENCES `hashtags`(`idHashtag`)
    ON UPDATE CASCADE ON DELETE CASCADE
);