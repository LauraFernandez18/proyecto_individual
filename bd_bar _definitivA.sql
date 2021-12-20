-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2021 a las 14:40:24
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_bar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE `tbl_mesa` (
  `id_mesa` int(11) NOT NULL,
  `nombre_mesa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `num_silla_dispo` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `reservada` tinyint(4) DEFAULT NULL,
  `id_ubi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`id_mesa`, `nombre_mesa`, `num_silla_dispo`, `reservada`, `id_ubi`) VALUES
(1, 'Mesa 1', '4', 1, 1),
(2, 'Mesa 2', '2', 1, 1),
(3, 'Mesa 3', '6', 0, 1),
(4, 'Mesa 4', '2', 0, 1),
(5, 'Mesa 5', '2', 0, 1),
(6, 'Mesa 6', '4', 0, 2),
(7, 'Mesa 7', '2', 0, 2),
(8, 'Mesa 8', '4', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int(11) NOT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `hora` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_cliente` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telf_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `num_personas` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_mesa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `fecha`, `hora`, `nombre_cliente`, `telf_cliente`, `num_personas`, `id_mesa`) VALUES
(51, '2021-12-17', '10:00', 'laura', '608712831', '3', 1),
(52, '2021-12-17', '11:00', 'laura', '608712831', '4', 1),
(53, '2021-12-21', '15:00', 'laura', '608712831', '3', 1),
(56, '2021-12-20', '10:00', 'laura', '608712831', '3', 1),
(57, '2021-12-15', '10:00', 'laura', '608712831', '3', 1),
(58, '2021-12-15', '10:00', 'laura', '608712831', '2', 2),
(59, '2021-12-21', '10:00', 'laura', '608712831', '3', 1),
(60, '2021-12-21', '10:00', 'laura', '608712831', '1', 2),
(61, '2021-12-21', '11:00', 'lau', '608712832', '3', 1),
(62, '2021-12-21', '11:00', 'laura', '608712831', '1', 2),
(64, '2021-12-21', '12:00', 'laura', '608712831', '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ubicacion`
--

CREATE TABLE `tbl_ubicacion` (
  `id_ubi` int(11) NOT NULL,
  `tipo_ubi` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `foto_ubi` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ubicacion`
--

INSERT INTO `tbl_ubicacion` (`id_ubi`, `tipo_ubi`, `foto_ubi`) VALUES
(1, 'Terraza', ''),
(2, 'Comedor', ''),
(5, 'Privada', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email_user` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password_user` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol_user` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `nom_user`, `apellido_user`, `email_user`, `password_user`, `rol_user`) VALUES
(1, 'Dani', 'Ruano', 'dani.ruano@gmail.com', 'dani.ruano', 'Camarero'),
(2, 'Miguel', 'Gras', 'miguel.gras@gmail.com', 'miguel.gras', 'Camarero'),
(3, 'Marc', 'Diaz', 'marc.diaz@gmail.com', 'marc.diaz', 'Camarero'),
(4, 'Alfredo', 'Blum', 'alfredo.blum@gmail.com', 'alfredo.blum', 'Camarero'),
(5, 'Pol', 'Garcia', 'pol.garcia@gmail.com', 'pol.garcia', 'Camarero'),
(6, 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'Admin'),
(7, 'Gerard', 'Gomez', 'gerard.gomez@gmail.com', 'gerard.gomez', 'Jefe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `fk_ubi_mesa_idx` (`id_ubi`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_mesa_reserva_idx` (`id_mesa`);

--
-- Indices de la tabla `tbl_ubicacion`
--
ALTER TABLE `tbl_ubicacion`
  ADD PRIMARY KEY (`id_ubi`);

--
-- Indices de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `tbl_ubicacion`
--
ALTER TABLE `tbl_ubicacion`
  MODIFY `id_ubi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD CONSTRAINT `fk_ubi_mesa` FOREIGN KEY (`id_ubi`) REFERENCES `tbl_ubicacion` (`id_ubi`);

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_mesa_reserva` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
