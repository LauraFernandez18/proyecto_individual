<?php
include '../services/ver.php';

$nombre_mesa=$_POST['nombre_mesa'];
$num_silla_dispo=$_POST['num_silla_dispo'];
$id_ubi=$_POST['id_ubi'];
$tipo_ubi=$_POST['tipo_ubi'];
$id_mesa=$_POST['id_mesa'];

    $modificar = $pdo->prepare("UPDATE tbl_mesa
    SET nombre_mesa = ?, num_silla_dispo = ?,id_ubi = ?,tipo_ubi = ?
    where id_mesa= ?");
   
    $modificar->bindParam(1, $nombre_mesa);
    $modificar->bindParam(2, $num_silla_dispo);
    $modificar->bindParam(3, $id_ubi);
    $modificar->bindParam(4, $tipo_ubi);
    $modificar->bindParam(5, $id_mesa);

    $modificar->execute();

    header('Location: ../view/vista.php');
    
