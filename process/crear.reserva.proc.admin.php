<!--PROCESO PARA CREAR RESERVA ADMIN-->

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

//variable para que no se pueda reservar una hora antes
$hora_antes=strtotime('-1 hour',strtotime($hora));
$hora_antes = date('H:i',$hora_antes);

///variable para que no se pueda reservar una hora después
$hora_desp=strtotime('+1 hour',strtotime($hora));
$hora_desp = date('H:i',$hora_desp);


/* sentencia que revisa si la mesa está disponible en la fecha seleccionada */
$revisar_reserva = $pdo->prepare("SELECT * from tbl_reserva WHERE fecha='$fecha' and hora='$hora' and id_mesa='$id_mesa'");
$revisar_reserva->execute();
$revisar_reserva=$revisar_reserva->fetchAll(PDO::FETCH_ASSOC);

    /*en caso de que esté ocupada no generá la reserva */
    if(!empty($revisar_reserva)) {
        echo "<script> alert('Reserva ocupada')</script>";
        echo"<script>history.back('../biew/crear.reserva.form.php')</script>";
    } else {

//sentencias para revisar que la hora anterior y la de después no están ocupadas

$hora2=$pdo->prepare("SELECT r.id_reserva,r.fecha,r.hora, r.nombre_cliente, r.telf_cliente, r.num_personas, m.id_mesa
FROM tbl_reserva r 
INNER JOIN tbl_mesa m ON r.id_mesa = m.id_mesa
WHERE r.id_mesa = '$id_mesa' AND r.fecha = '$fecha' AND r.hora = '$hora_antes'");
$hora2->execute();
$reserva2=$hora2->fetchAll(PDO::FETCH_ASSOC); 

$hora3=$pdo->prepare("SELECT r.id_reserva,r.fecha,r.hora, r.nombre_cliente, r.telf_cliente, r.num_personas, m.id_mesa
FROM tbl_reserva r 
INNER JOIN tbl_mesa m ON r.id_mesa = m.id_mesa
WHERE r.id_mesa = '$id_mesa' AND r.fecha = '$fecha' AND r.hora = '$hora_desp'");
$hora3->execute();
$reserva3=$hora3->fetchAll(PDO::FETCH_ASSOC); 

//en caso de que la hora no esté disponible

if(!empty($reserva1) || ($reserva2) || ($reserva3)){
    echo "<script> alert('Hora no disponible')</script>";
    echo"<script>window.history.back();</script>";
} else {

try {
    
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

    //indicamos que la mesa está reservada en la base de datos
    $mesa1 = $pdo->prepare("UPDATE tbl_mesa
    SET reservada = 1
    where id_mesa = ?");
    
    $mesa1->bindParam(1, $id_mesa);   
    
    $mesa1->execute();


    echo "<script> alert('Reserva creada con éxito!')</script>";
    echo"<script>window.location.replace('../view/vista.admin.php')</script>";


}
catch (PDOException $e) {
    echo "Error : " . $e->getMessage();

}
      }}

?>