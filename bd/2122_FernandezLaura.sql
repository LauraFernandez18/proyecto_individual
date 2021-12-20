CREATE DATABASE bd_bar;
use bd_bar;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tbl_mesa` (
  `id_mesa` int(11) NOT NULL,
  `nombre_mesa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `num_silla_dispo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `reservada` tinyint(4) DEFAULT NULL,
  `id_ubi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_mesa` (`id_mesa`, `nombre_mesa`, `num_silla_dispo`, `reservada`, `id_ubi`) VALUES
(1, 'Mesa 1', '4', 1, 1),
(2, 'Mesa 2', '2', 0, 1),
(3, 'Mesa 3', '6', 0, 1),
(4, 'Mesa 4', '10', 1, 2),
(5, 'Mesa 5', '2', 0, 2),
(6, 'Mesa 6', '8', 0, 2),
(7, 'Mesa 7', '6', 0, 2),
(8, 'Mesa 8', '4', 0, 2);

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_cliente` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telf_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `num_personas` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_mesa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_reserva` (`id_reserva`, `fecha`, `hora`, `nombre_cliente`, `telf_cliente`, `num_personas`, `id_mesa`) VALUES
(111, '2021-12-30', '10:00', 'Laura', '608712831', '2', 1),
(112, '2021-12-30', '12:00', 'Marc', '608712831', '4', 1),
(113, '2021-12-30', '10:00', 'Gerard', '609712834', '2', 4);

CREATE TABLE `tbl_ubicacion` (
  `id_ubi` int(11) NOT NULL,
  `tipo_ubi` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_ubi` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_ubicacion` (`id_ubi`, `tipo_ubi`, `foto_ubi`) VALUES
(1, 'Terraza', 'terraza.png'),
(2, 'Comedor', 'comedor.png');

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_user` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol_user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `tbl_users` (`id_user`, `nom_user`, `apellido_user`, `email_user`, `password_user`, `rol_user`) VALUES
(6, 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'Admin'),
(20, 'Laura', 'Fernandez', 'laura.fernandez@gmail.com', 'laura.fernandez', 'Admin'),
(21, 'Gerard', 'Gomez', 'gerard.gomez@gmail.com', 'gerard.gomez', 'Camarero'),
(22, 'Marc', 'Diaz', 'marc.diaz@gmail.com', 'marc.diaz', 'Camarero');

ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `fk_ubi_mesa_idx` (`id_ubi`);

ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_mesa_reserva_idx` (`id_mesa`);

ALTER TABLE `tbl_ubicacion`
  ADD PRIMARY KEY (`id_ubi`);

ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

ALTER TABLE `tbl_mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

ALTER TABLE `tbl_ubicacion`
  MODIFY `id_ubi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `tbl_mesa`
  ADD CONSTRAINT `fk_ubi_mesa` FOREIGN KEY (`id_ubi`) REFERENCES `tbl_ubicacion` (`id_ubi`);

ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_mesa_reserva` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`);
COMMIT;
