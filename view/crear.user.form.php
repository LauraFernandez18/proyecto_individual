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
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crear usuario</title>
</head>
<body>
<form action="../process/crear.user.pdo.php" method="post" class="caja" onsubmit="return validar_user();">
        <h2>Crear usuario</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre</p>
        <input type="text" name="nom_user" id='nom_user'>
        <p>Apellido</p>
        <input type="text" name="apellido_user" id='apellido_user'>
        <br>
        <p>Email</p>
        <input type="email" name="email_user" id='email_user'>
        <p>Password</p>
        <input type="password" name="password_user" id='password_user'>
        <p>Rol</p>
        <select name="rol_user" id="rol_user">
            <option value="Camarero">Camarero</option>
            <option value="Admin">Admin</option>
        </select>
        <input type="hidden" name="id_user" value="<?php echo $_GET['id_user'] ?>">
        <br>
        <input type="submit" value="Crear" class="btn btn-dark">
</form>
</body>
</html>