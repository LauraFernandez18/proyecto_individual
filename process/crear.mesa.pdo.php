<!--PROCESO PARA CREAR MESA-->

<?php
include '../services/ver.php';

$nombre_mesa=$_POST['nombre_mesa'];
$num_silla_dispo=$_POST['num_silla_dispo'];
$id_ubi=$_POST['id_ubi'];

    //INSERTAR MESA
    $crear_mesa = $pdo->prepare("INSERT INTO tbl_mesa (nombre_mesa,num_silla_dispo,id_ubi)
    VALUES ( ?, ?, ?)");
    
    $crear_mesa->bindParam(1, $nombre_mesa);
    $crear_mesa->bindParam(2, $num_silla_dispo);
    $crear_mesa->bindParam(3, $id_ubi);  
    
    $crear_mesa->execute();

    echo "<script> alert('Mesa creada con éxito!')</script>";
    echo"<script>window.location.replace('../view/mesas.php')</script>";

?>