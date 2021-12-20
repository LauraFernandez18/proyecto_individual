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
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <script type="text/javascript" src="../js/code.js"></script>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modificar usuario</title>
</head>
<body class="cuerpo">
<form action="../process/modificar.user.proc.php" class="caja" method="post" enctype="multipart/form-data" onsubmit="return validar_user();">
        <h2>Modificar usuario</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre</p>
        <input type="text" name="nom_user" id='nom_user' value="<?php echo $_GET['nom_user'] ?>">
        <br>
        <p>Apellido</p>
        <input type="text" name="apellido_user" id='apellido_user' value="<?php echo $_GET['apellido_user'] ?>">
        <br>
        <p>Email</p>
        <input type="email" name="email_user" id='email_user' value="<?php echo $_GET['email_user'] ?>">
        <br>
        <p>Contraseña</p>
        <input type="password" name="password_user" id='password_user' value="<?php echo $_GET['password_user'] ?>">
        <br></br>
        <input type="hidden" name="id_ubi" value="<?php echo $_GET['id_user'] ?>">
        <input type="hidden" name="rol_ubi" value="<?php echo $_GET['rol_user'] ?>">
        <input type="submit" value="Modificar" class="btn btn-dark">
</div>
</form>
</body>
</html>