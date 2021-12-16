
CREATE DATABASE IF NOT EXISTS `bd_bar` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `bd_bar`;


-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_mesa' 
--

DROP TABLE IF EXISTS `tbl_mesa`;
CREATE TABLE `tbl_mesa` (
  `id_mesa` int NOT NULL AUTO_INCREMENT,
  `num_silla_dispo` varchar(2) DEFAULT NULL,
  `reservada` tinyint DEFAULT NULL,
  `id_ubi` int DEFAULT NULL,
  PRIMARY KEY (`id_mesa`),
  KEY `fk_ubi_mesa_idx` (`id_ubi`),
  CONSTRAINT `fk_ubi_mesa` FOREIGN KEY (`id_ubi`) REFERENCES `tbl_ubicacion` (`id_ubi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

LOCK TABLES `tbl_mesa` WRITE;
UNLOCK TABLES;

-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_reserva' 
--

DROP TABLE IF EXISTS `tbl_reserva`;
CREATE TABLE `tbl_reserva` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `nombre_cliente` varchar(20)  DEFAULT NULL,
  `num_personas` varchar(2) DEFAULT NULL,
  `id_mesa` int DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_mesa_reserva_idx` (`id_mesa`),
  CONSTRAINT `fk_mesa_reserva` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

LOCK TABLES `tbl_reserva` WRITE;
UNLOCK TABLES;

-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_ubicacion'
--

DROP TABLE IF EXISTS `tbl_ubicacion`;
CREATE TABLE `tbl_ubicacion` (
  `id_ubi` int NOT NULL AUTO_INCREMENT,
  `tipo_ubi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ubi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

LOCK TABLES `tbl_ubicacion` WRITE;
UNLOCK TABLES;

-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_users'
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(10) DEFAULT NULL,
  `apellido_user` varchar(20) DEFAULT NULL,
  `email_user` varchar(45) DEFAULT NULL,
  `password_user` varchar(20) DEFAULT NULL,
  `rol_user` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

LOCK TABLES `tbl_users` WRITE;
UNLOCK TABLES;

