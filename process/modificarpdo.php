<?php
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$num_personas=$_POST['num_personas_reserva'];
$nombre_cliente=$_POST['nombre_cliente'];
$id_reserva=$_POST['id_reserva'];

try {

    $modreserva = $pdo->prepare("UPDATE tbl_reserva
    SET nombre_cliente = ?,num_personas = ?
    where id_reserva= ?");
   
    $modreserva->bindParam(1, $nombre_cliente);
    $modreserva->bindParam(2, $num_personas);
    $modreserva->bindParam(3, $id_reserva);
   
    $modreserva->execute();

    header('Location: ../view/vista.php');
    
}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}