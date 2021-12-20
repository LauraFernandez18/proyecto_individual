<!--PROCESO PARA CREAR USUARIOS ADMIN-->

<?php
include '../services/ver.php';

$nom_user=$_POST['nom_user'];
$apellido_user=$_POST['apellido_user'];
$email_user=$_POST['email_user'];
$password_user=$_POST['password_user'];
$rol_user=$_POST['rol_user'];
$id_user=$_POST['id_user'];

    //INSERTAR USUARIO
    $crear_user = $pdo->prepare("INSERT INTO tbl_users (nom_user,apellido_user,email_user,password_user,rol_user,id_user)
    VALUES ( ?, ?, ?, ?, ?, ?)");
    
    $crear_user->bindParam(1, $nom_user);
    $crear_user->bindParam(2, $apellido_user);
    $crear_user->bindParam(3, $email_user);
    $crear_user->bindParam(4, $password_user);
    $crear_user->bindParam(5, $rol_user);
    $crear_user->bindParam(6, $id_user);  
    
    $crear_user->execute();

    echo "<script> alert('Usuario creado con éxito!')</script>";
    echo"<script>window.location.replace('../view/usuarios.php')</script>";

?>