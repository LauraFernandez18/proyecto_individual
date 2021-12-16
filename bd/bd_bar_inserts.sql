
SELECT DATABASE `bd_bar`;
USE `bd_bar`;

INSERT INTO `tbl_users` (`id_user`, `nom_user`, `apellido_user`, `email_user`, `password_user`, `rol_user`) VALUES
(1, 'Dani', 'Ruano', 'dani.ruano@gmail.com', 'dani.ruano', 'Camarero'),
(2, 'Miguel', 'Gras', 'miguel.gras@gmail.com', 'miguel.gras', 'Camarero'),
(3, 'Marc', 'Diaz', 'marc.diaz@gmail.com', 'marc.diaz', 'Camarero'),
(4, 'Alfredo', 'Blum', 'alfredo.blum@gmail.com', 'alfredo.blum', 'Camarero'),
(5, 'Pol', 'Garcia', 'pol.garcia@gmail.com', 'pol.garcia', 'Camarero'),
(6, 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'Admin'),
(7, 'Gerard', 'Gomez', 'gerard.gomez@gmail.com', 'gerard.gomez', 'Jefe');

INSERT INTO `tbl_ubicacion` (`id_ubi`, `tipo_ubi`) VALUES
(1, 'Terraza'),
(2, 'Comedor');

INSERT INTO `tbl_mesa` (`id_mesa`, `num_silla_dispo`, `reservada`, `id_ubi`) VALUES
(1, '4', 0, 1),
(2, '2', 0, 1),
(3, '6', 0, 1),
(4, '2', 0, 1),
(5, '2', 0, 1),
(6, '4', 0, 2),
(7, '2', 0, 2),
(8, '4', 0, 2),
(9, '4', 0, 2),
(10, '4', 1, 2);

INSERT INTO `tbl_reserva` (`id_reserva`, `fecha_inicio`, `fecha_final`, `nombre_cliente`, `num_personas`, `id_mesa`) VALUES
(1, '2020/11/10 17:56:00', 'Arnau', '4', 10);
