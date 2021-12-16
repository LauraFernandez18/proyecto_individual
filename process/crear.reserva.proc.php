<?php
include '../services/ver.php';

$id_mesa=$_POST['id_mesa'];
$nombre_cliente=$_POST['nombre_cliente'];
$telf_cliente=$_POST['telf_cliente'];
$fecha=$_POST['fecha'];
$hora=$_POST['hora'];
$num_personas=$_POST['num_personas'];

$reserva=$pdo->prepare("SELECT * FROM tbl_reserva WHERE fecha='{$fecha}' and hora='{$hora}'");
$reserva->execute();
$reserva=$mesaonline->fetchAll(PDO::FETCH_ASSOC);

if(!empty($reserva))

    // if(!empty($num_personas)){} {
    // $crear_reserva = $pdo->prepare("INSERT INTO tbl_reserva (nombre_cliente,telf_cliente,fecha,hora,num_personas,id_mesa)
    // VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    
    $crear_reserva->bindParam(1, $nombre_cliente);
    $crear_reserva->bindParam(2, $telf_cliente);
    $crear_reserva->bindParam(3, $fecha);  
    $crear_reserva->bindParam(4, $hora);  
    $crear_reserva->bindParam(5, $num_personas);
    $crear_reserva->bindParam(6, $id_mesa);
    
    $crear_reserva->execute();

    header('Location: ../view/crear.reserva.form.php');

    } else {
        echo "error";
    }

?>