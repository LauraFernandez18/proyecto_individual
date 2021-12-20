<?php
session_start();
if (!(isset($_SESSION['email_user']))){
        echo"<script>window.location.replace('../view/login.php')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/vista.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
</head>
<body>
    
</body>
</html>

<?php

// Incluimos config de la conexión a bbdd, el comando de conexión en POO y la clase Reserva
include '../services/ver.php';

$enviar = $_POST['enviar'];


if ($enviar === "Filtrar Mesa"){
    $id_mesa = $_POST['id_mesa'];
     //Filtramos el historial por numero de mesa
     $filtro_mesa = $pdo->prepare("SELECT tbl_reserva.id_reserva, tbl_reserva.nombre_cliente, tbl_reserva.num_personas, tbl_reserva.fecha, tbl_reserva.hora from tbl_reserva
     INNER JOIN tbl_mesa on tbl_mesa.id_mesa = tbl_reserva.id_mesa
     WHERE tbl_mesa.id_mesa = ?");
         
     $filtro_mesa->bindParam(1, $id_mesa);
 
     $filtro_mesa->execute();
 
     $listaReservasporMesa=$filtro_mesa->fetchAll(PDO::FETCH_ASSOC);
 
     foreach ($listaReservasporMesa as $reserva) {
         echo "<table>";
         echo "<tr>";
             echo "<td><h3>Reserva {$reserva['id_reserva']}</h3></td>";
         echo "</tr>";
         echo "<tr>";
             echo "<td>Inicio Reserva-> {$reserva['fecha']}</td>";
         echo "</tr>";
         echo "<tr>";
             echo "<td>Hora -> {$reserva['hora']}</td>";
         echo "</tr>";
         echo "<tr>";
             echo "<td>Nombre Cliente -> {$reserva['nombre_cliente']}</td>";
         echo "</tr>";
         echo "<tr>";
             echo "<td>Numero personas -> {$reserva['num_personas']}</td>";
         echo "</tr>";
     echo "</table>";
 }
}else{
    $id_ubi = $_POST['id_ubi'];
        $filtro_ubi = $pdo->prepare("SELECT tbl_mesa.id_mesa, tbl_mesa.nombre_mesa, tbl_reserva.id_reserva, tbl_reserva.nombre_cliente, tbl_reserva.num_personas, tbl_reserva.fecha, tbl_reserva.hora from tbl_reserva 
        INNER JOIN tbl_mesa ON tbl_mesa.id_mesa = tbl_reserva.id_mesa
        INNER JOIN tbl_ubicacion ON tbl_ubicacion.id_ubi = tbl_mesa.id_ubi
        WHERE tbl_ubicacion.tipo_ubi=?
        ORDER BY id_reserva asc");
        
    $filtro_ubi->bindParam(1, $id_ubi);

    $filtro_ubi->execute();

    $listaUbiMesa=$filtro_ubi->fetchAll(PDO::FETCH_ASSOC);

    foreach ($listaUbiMesa as $ubicacion) {
        echo "<table>";
        echo "<tr>";
            echo "<td><h3>Reserva {$ubicacion['id_reserva']}</h3></td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Nombre de mesa -> {$ubicacion['nombre_mesa']}</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Nombre del cliente -> {$ubicacion['nombre_cliente']}</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Número de personas -> {$ubicacion['num_personas']}</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Inicio Reserva-> {$ubicacion['fecha']}</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<td>Hora -> {$ubicacion['hora']}</td>";
        echo "</tr>";
    echo "</table>";
    }
}
