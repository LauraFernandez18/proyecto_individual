<?php
include '../services/ver.php';

$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$nombre_cliente=$_POST['nombre_cliente'];
$telf_cliente=$_POST['telf_cliente'];
$num_personas=$_POST['num_personas'];
$id_reserva=$_POST['id_reserva'];

    $modificar = $pdo->prepare("UPDATE tbl_reserva
    SET fecha = ?,hora = ?,nombre_cliente = ?,telf_cliente = ?,num_personas = ?
    where id_reserva= ?");
   
    $modificar->bindParam(1, $fecha);
    $modificar->bindParam(2, $hora);
    $modificar->bindParam(3, $nombre_cliente);
    $modificar->bindParam(4, $telf_cliente);
    $modificar->bindParam(5, $num_personas);
    $modificar->bindParam(6, $id_reserva);
   
    $modificar->execute();

    header('Location: ../view/reservas.php');
    
