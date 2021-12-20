<?php
include '../services/ver.php';

$nom_user=$_POST['nom_user'];
$apellido_user=$_POST['apellido_user'];
$email_user=$_POST['email_user'];
$password_user=$_POST['password_user'];
$id_user=$_POST['id_user'];

    $modificar = $pdo->prepare("UPDATE tbl_users
    SET nom_user = ?, apellido_user = ?, email_user = ?, password_user = ?
    where id_user = ?");
   
    $modificar->bindParam(1, $nom_user);
    $modificar->bindParam(2, $apellido_user);
    $modificar->bindParam(3, $email_user);
    $modificar->bindParam(4, $password_user);
    $modificar->bindParam(5, $id_user);

    $modificar->execute();

    echo "<script> alert('Modificación realizada con éxito')</script>";
    echo"<script>window.location.replace('../view/usuarios.php')</script>";

    
