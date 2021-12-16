<?php 
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$id = $_GET['id'];

$fecha_actual=date("Y-m-d H:i:s", time());


// Bind

try {

    

    $fin_reserva = $pdo->prepare("UPDATE tbl_reserva
    SET tbl_reserva.fecha = ?
    where id_reserva = ?");
    
    $fin_reserva->bindParam(1, $fecha_actual);
    $fin_reserva->bindParam(2, $id);    
    
    $fin_reserva->execute();



    $mesa0 = $pdo->prepare("UPDATE tbl_mesa
	inner join tbl_reserva on tbl_mesa.id_mesa=tbl_reserva.id_mesa
    SET tbl_mesa.reservada = 0
    where tbl_reserva.id_reserva=?");
   
    $mesa0->bindParam(1, $id);
   
    $mesa0->execute();
    //Fetch your records and display.

    header('Location: ../view/vista.php');

}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();
}

