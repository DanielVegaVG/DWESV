-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.16.0.7229
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para daw
CREATE DATABASE IF NOT EXISTS `daw` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `daw`;

-- Volcando estructura para tabla daw.asignatura
CREATE TABLE IF NOT EXISTS `asignatura` (
  `id` tinyint(4) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `color` char(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla daw.asignatura: ~13 rows (aproximadamente)
DELETE FROM `asignatura`;
INSERT INTO `asignatura` (`id`, `nombre`, `color`) VALUES
	(1, 'IPP2', '70D7FF'),
	(2, 'DWENC', '72ff7e'),
	(3, 'DWESV', 'FF2E2E'),
	(4, 'PIMOD', 'FFDD63'),
	(5, 'DEAPW', '6663FF'),
	(6, 'SASP', '009747'),
	(7, 'OPT1', '9C9C9C'),
	(8, 'OPT2I', 'FF6E38'),
	(9, 'OPT2A', '4FFFFF'),
	(10, 'DASP', '946d4c'),
	(11, 'TUTO', 'FF91CF'),
	(12, 'SSIN', 'F0EEDS'),
	(13, 'BBDD', 'EEEEEE');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
