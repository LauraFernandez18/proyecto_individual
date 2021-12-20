<?php

require_once '../services/conexion.php';

$email_user=$_POST['email_user'];
$password_user=$_POST['password_user'];

$stmt = $pdo->prepare("SELECT * FROM tbl_users WHERE email_user=? and password_user=?");

$stmt->bindParam(1, $email_user);
$stmt->bindParam(2, $password_user);
$stmt->execute();

$cuenta = $stmt->rowCount();

if ($cuenta == 1) {

    // Comprobamos si coincide el email y el password

    session_start();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['email_user']=$email_user;

    if ($user['rol_user'] == "Admin") {
        $_SESSION['admin']="1";
        echo"<script>window.location.replace('../view/vista.admin.php')</script>";
    } else {
        echo"<script>window.location.replace('../view/vista.php')</script>";
    };

} else {

    // En caso de que falle volvemos al login
    echo "<script> alert('Email y/o contraseña incorrectos')</script>";
    echo"<script>window.location.replace('../view/login.php')</script>";

};
