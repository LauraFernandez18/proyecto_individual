<?php
include '../services/ver.php';

$tipo_ubi=$_POST['tipo_ubi'];
$foto_ubi=$_FILES['foto_ubi'];
$foto=$foto_ubi['name'];
$id_ubi=$_POST['id_ubi'];

$target_dir = "../img/";
$target_file = $target_dir . basename($_FILES["foto_ubi"]["name"]);
if (move_uploaded_file($_FILES["foto_ubi"]["tmp_name"], $target_file)) {
    echo "El archivo ". basename( $_FILES["foto_ubi"]["name"]). " Se subio correctamente";
} else {
    echo "Error al cargar el archivo";
}


    $modificar = $pdo->prepare("UPDATE tbl_ubicacion
    SET tipo_ubi = ?, foto_ubi = ?
    where id_ubi= ?");
   
    $modificar->bindParam(1, $tipo_ubi);
    $modificar->bindParam(2, $foto);
    $modificar->bindParam(3, $id_ubi);

    $modificar->execute();

    echo "<script> alert('Modificación realizada con éxito')</script>";
    echo"<script>window.location.replace('../view/salas.php')</script>";
    
