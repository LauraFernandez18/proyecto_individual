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

    /* sentencia que revisa si la mesa está disponible en la fecha seleccionada */
    $revisar_reserva = $pdo->prepare("SELECT * from tbl_reserva WHERE fecha='$fecha' and hora='$hora' and id_mesa='$id_mesa'");
    $revisar_reserva->execute();
    $revisar_reserva=$revisar_reserva->fetchAll(PDO::FETCH_ASSOC);

    /*en caso de que esté ocupada no generá la reserva */

    if(!empty($revisar_reserva)) {
        echo "<script> alert('Reserva ocupada')</script>";
        echo"<script>history.back('../process/generarform.php')</script>";
    } else {
$entrada=strtotime('2 hour',strtotime($hora));
$salida = date('H:i',$entrada);
//hora antes 
$horaantes=strtotime('-1 hour',strtotime($hora));
$horaant = date('H:i',$horaantes);
//hora despues
$horadespues=strtotime('+1 hour',strtotime($hora));
$horadesp = date('H:i',$horadespues);

$stmt1=$pdo->prepare("SELECT r.id_reserva,r.fecha,r.hora, r.nombre_cliente, r.telf_cliente, r.num_personas, m.id_mesa
FROM `tbl_reserva` r 
INNER JOIN tbl_mesa m ON r.id_mesa = m.id_mesa
INNER JOIN tbl_ubicacion u ON m.id_ubi = u.id_ubi
WHERE r.id_mesa = '$id_mesa' AND r.fecha = '$fecha' AND r.hora = '$hora'");
$stmt1->execute();
$reserva1=$stmt1->fetchAll(PDO::FETCH_ASSOC);

$stmt2=$pdo->prepare("SELECT r.id_reserva,r.fecha,r.hora, r.nombre_cliente, r.telf_cliente, r.num_personas, m.id_mesa
FROM `tbl_reserva` r 
INNER JOIN tbl_mesa m ON r.id_mesa = m.id_mesa
INNER JOIN tbl_ubicacion u ON m.id_ubi = u.id_ubi
WHERE r.id_mesa = '$id_mesa' AND r.fecha = '$fecha' AND r.hora = '$horaant'");
$stmt2->execute();
$reserva2=$stmt2->fetchAll(PDO::FETCH_ASSOC); 

$stmt3=$pdo->prepare("SELECT r.id_reserva,r.fecha,r.hora, r.nombre_cliente, r.telf_cliente, r.num_personas, m.id_mesa
FROM `tbl_reserva` r 
INNER JOIN tbl_mesa m ON r.id_mesa = m.id_mesa
INNER JOIN tbl_ubicacion u ON m.id_ubi = u.id_ubi
WHERE r.id_mesa = '$id_mesa' AND r.fecha = '$fecha' AND r.hora = '$horadesp'");
$stmt3->execute();
$reserva3=$stmt3->fetchAll(PDO::FETCH_ASSOC); 

if(!empty($reserva1)){
    session_start();
    $_SESSION['error']=1;
    header("location: generarform.php?id_mesa={$id_mesa}&error=error");
}elseif(!empty($reserva2)){
    session_start();
    $_SESSION['error']=1;
    header("location: generarform.php?id_mesa={$id_mesa}&error=error");
}elseif(!empty($reserva3)){
    session_start();
    $_SESSION['error']=1;
    header("location: generarform.php?id_mesa={$id_mesa}&error=error");
} else {

try {

    
    //INSERTAR RESERVA
    $inicio_reserva = $pdo->prepare("INSERT INTO tbl_reserva (fecha,hora,nombre_cliente,telf_cliente,num_personas,salida,id_mesa)
    VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    
    $inicio_reserva->bindParam(1, $fecha);
    $inicio_reserva->bindParam(2, $hora);
    $inicio_reserva->bindParam(3, $nombre_cliente);
    $inicio_reserva->bindParam(4, $telf_cliente);
    $inicio_reserva->bindParam(5, $num_personas);   
    $inicio_reserva->bindParam(6, $salida); 
    $inicio_reserva->bindParam(7, $id_mesa);   
    
    $inicio_reserva->execute();

    header('Location: ../view/vista.php');


}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}
      }}

?>