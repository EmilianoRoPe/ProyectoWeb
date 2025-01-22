/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `registro_usuario` 
USE `registro_usuario`;

CREATE TABLE IF NOT EXISTS `persona` (
  `nombre` varchar(50) DEFAULT NULL,
  `apellido1` varchar(50) DEFAULT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `curp` varchar(50) NOT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `fechanac` date DEFAULT NULL,
  `discapacidad` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `Num` bigint DEFAULT NULL,
  `Colonia` varchar(50) DEFAULT NULL,
  `CP` int DEFAULT NULL,
  `edop` varchar(50) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `boleta` varchar(50) DEFAULT NULL,
  `Promedio` int DEFAULT NULL,
  `escuelas` varchar(50) DEFAULT NULL,
  `otroEscuela` varchar(50) DEFAULT NULL,
  `otroDiscapacidad` varchar(50) DEFAULT NULL,
  `horarioAleatorio` varchar(50) DEFAULT NULL,
  `laboratorioAsignado` varchar(50) DEFAULT NULL,
  `horario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`curp`)
) persona;

INSERT INTO `persona` (`nombre`, `apellido1`, `apellido2`, `curp`, `genero`, `fechanac`, `discapacidad`, `calle`, `Num`, `Colonia`, `CP`, `edop`, `municipio`, `telefono`, `Correo`, `boleta`, `Promedio`, `escuelas`, `otroEscuela`, `otroDiscapacidad`, `horarioAleatorio`, `laboratorioAsignado`, `horario`) VALUES
	('Aaron', 'Ortega', 'Santiago', 'OESA010417HMCRNRA0', 'Hombre', '2001-04-12', 'Auditiva', 'NORTTE', 23, 'Reforma', 12345, 'Durango', '', '5610403359', 'gayeto25@gmail.com', '1234567898', 12, 'CECyT 12 -José María Morelos y Pavón-', '', '', NULL, '2', '16:00'),
	('Aaron', 'Ortega', 'Santiago', 'OESA010417HMCRNRA4', 'Hombre', '2001-04-12', 'Auditiva', 'Sur', 23, 'Reforma', 12345, 'Durango', 'Durango', '5610403359', 'gayeto25@gmail.com', '1234567898', 12, 'CECyT 12 -José María Morelos y Pavón-', '', '', NULL, '5', '12:30'),
	('Aaron', 'Ortega', 'Santiago', 'OESA010417HMCRNRA5', 'Mujer', '2001-09-08', 'Motriz (Bastón)', 'Sur', 13, 'Reforma', 9876, 'Baja California', 'Tijuana', '5610403359', 'gayeto25@gmail.com', '1234567898', 3444, 'CECyT 7 -Cuauhtémoc-', '', '', NULL, '4', '10:45'),
	('Aaron', 'Ortega', 'Santiago', 'OESA010417HMCRNRA7', 'Mujer', '2001-03-12', 'Motriz (Silla de ruedas)', 'Sur', 23, 'Reforma', 76543, 'Guerrero', 'Acapulco de Juárez', '5610403359', 'gayeto25@gmail.com', '1234567898', 8, 'CECyT 9 -Juan de Dios Bátiz-', '', '', NULL, '5', '14:15'),
	('Aaron', 'Ortega', 'Santiago', 'OESA010417HMCRNRA8', 'Mujer', '2001-09-08', 'Motriz (Bastón)', 'Sur', 13, 'Reforma', 9876, 'Baja California', 'Tijuana', '5610403359', 'gayeto25@gmail.com', '1234567898', 3444, 'CECyT 7 -Cuauhtémoc-', '', '', NULL, '4', '10:45'),
	('Yoo', 'Ortega', 'Santiago', 'OESA010417HMCRNRA9', 'Hombre', '2001-04-12', 'Motriz (Bastón)', 'Sur', 12, 'Reforma', 9865, 'Baja California', 'Tijuana', '5610403359', 'gayeto25@gmail.com', '1234567898', 7, 'CECyT 9 -Juan de Dios Bátiz-', '', '', NULL, '1', '10:45'),
	('Aaron', 'Ortega', 'Santiago', 'OESA010417HMCRNRB8', 'Mujer', '2001-03-12', 'Auditiva', 'Sur', 23, 'Reforma', 12345, 'Hidalgo', 'Pachuca de Soto', '5610403359', 'gayeto25@gmail.com', '1234567898', 4, 'CECyT 15 -Diódoro Antúnez Echegaray-', '', '', NULL, '6', '09:00'),
	('Aaron', 'Ortega', 'Santiago', 'OESA010417HMCRNRC2', 'Hombre', '2001-04-17', 'Motriz (Silla de ruedas)', 'Sur', 12, 'Reforma', 12345, 'Baja California', 'Tijuana', '5610403359', 'gayeto25@gmail.com', '1234567898', 3, 'CECyT 3 -Estanislao Ramírez Ruiz-', '', '', NULL, '4', '12:30');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
