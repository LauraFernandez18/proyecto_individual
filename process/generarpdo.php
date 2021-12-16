<?php
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$num_personas=$_POST['num_personas'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$nombre_cliente=$_POST['nombre_cliente'];
$telf_cliente=$_POST['telf_cliente'];
$id_mesa=$_POST['id_mesa'];

try {

    $mesa1 = $pdo->prepare("UPDATE tbl_mesa
    SET tbl_mesa.reservada = 1
    where id_mesa=?");
   
    $mesa1->bindParam(1, $id_mesa);
   
    $mesa1->execute();
    
    
    //INSERTAR RESERVA
    $inicio_reserva = $pdo->prepare("INSERT INTO tbl_reserva (fecha,hora,nombre_cliente,telf_cliente,num_personas,id_mesa)
    VALUES ( ?, ?, ?, ?, ?, ?)");
    
    $inicio_reserva->bindParam(1, $fecha);
    $inicio_reserva->bindParam(2, $hora);
    $inicio_reserva->bindParam(3, $nombre_cliente);
    $inicio_reserva->bindParam(4, $telf_cliente);
    $inicio_reserva->bindParam(5, $num_personas);   
    $inicio_reserva->bindParam(6, $id_mesa);    
    
    $inicio_reserva->execute();


    //UPDATE TABLA MESA RESERVADA=1
    $mesa1 = $pdo->prepare("UPDATE tbl_mesa
    SET reservada = 1
    where id_mesa = ?");
    
    $mesa1->bindParam(1, $id_mesa);   
    
    $mesa1->execute();

    header('Location: ../view/vista.php');


}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}

?>