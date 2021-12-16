
------------------- Primera consulta -----------------------
/*
Filtrar dependiendo de la ubicacion, todas las mesas que tiene esa ubi, si estan reservadas o no.
*/

-- Ubicación: Terraza --
SELECT tbl_mesa.id_mesa, tbl_reserva.id_reserva, tbl_reserva.nombre_cliente, tbl_reserva.num_personas, tbl_reserva.fecha_inicio, tbl_reserva.fecha_final from tbl_reserva 
    INNER JOIN tbl_mesa ON tbl_mesa.id_mesa = tbl_reserva.id_mesa
    INNER JOIN tbl_ubicacion ON tbl_ubicacion.id_ubi = tbl_mesa.id_ubi
    WHERE tbl_ubicacion.tipo_ubi=?

-- Ubicación: Comedor --
ELECT tbl_mesa.id_mesa, tbl_reserva.id_reserva, tbl_reserva.nombre_cliente, tbl_reserva.num_personas, tbl_reserva.fecha_inicio, tbl_reserva.fecha_final from tbl_reserva 
    INNER JOIN tbl_mesa ON tbl_mesa.id_mesa = tbl_reserva.id_mesa
    INNER JOIN tbl_ubicacion ON tbl_ubicacion.id_ubi = tbl_mesa.id_ubi
    WHERE tbl_ubicacion.tipo_ubi=?

------------------- Segunda consulta -----------------------
/*
Filtrar por id de mesa (ver todas las reservas que han habido).
*/
SELECT tbl_reserva.id_reserva, tbl_reserva.nombre_cliente, tbl_reserva.num_personas, tbl_reserva.fecha_inicio, tbl_reserva.fecha_final from tbl_reserva
	INNER JOIN tbl_mesa on tbl_mesa.id_mesa = tbl_reserva.id_mesa
    WHERE tbl_mesa.id_mesa = 3
