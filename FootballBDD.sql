-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour footballclub
CREATE DATABASE IF NOT EXISTS `footballclub` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `footballclub`;

-- Listage de la structure de table footballclub. club
CREATE TABLE IF NOT EXISTS `club` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `createDate` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `desc` float NOT NULL DEFAULT '0',
  `logo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `stadiumName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `clubs_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_club_clubs` (`clubs_id`),
  CONSTRAINT `FK_club_clubs` FOREIGN KEY (`clubs_id`) REFERENCES `clubs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table footballclub. clubs
CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `club_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_clubs_club` (`club_id`),
  KEY `FK_clubs_user` (`user_id`),
  CONSTRAINT `FK_clubs_club` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`),
  CONSTRAINT `FK_clubs_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table footballclub. country
CREATE TABLE IF NOT EXISTS `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameCountry` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `league_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_country_league` (`league_id`),
  CONSTRAINT `FK_country_league` FOREIGN KEY (`league_id`) REFERENCES `league` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table footballclub. effectif
CREATE TABLE IF NOT EXISTS `effectif` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastName` varchar(200) NOT NULL DEFAULT '0',
  `firstName` varchar(200) NOT NULL DEFAULT '0',
  `birthDate` date NOT NULL,
  `nationality` varchar(200) NOT NULL DEFAULT '',
  `club_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_effectif_club` (`club_id`),
  CONSTRAINT `FK_effectif_club` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table footballclub. league
CREATE TABLE IF NOT EXISTS `league` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameLeague` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `club_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_league_club` (`club_id`),
  CONSTRAINT `FK_league_club` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de table footballclub. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lastName` varchar(200) NOT NULL DEFAULT '0',
  `firstName` varchar(200) NOT NULL DEFAULT '0',
  `birthDate` date NOT NULL DEFAULT '0000-00-00',
  `nationality` varchar(200) NOT NULL DEFAULT '',
  `clubs_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_user_clubs` (`clubs_id`),
  CONSTRAINT `FK_user_clubs` FOREIGN KEY (`clubs_id`) REFERENCES `clubs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Les données exportées n'étaient pas sélectionnées.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
