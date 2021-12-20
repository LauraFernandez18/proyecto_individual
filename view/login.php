<?php
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
<div class="row">
    <div class="login">
    <img src="../img/icon.png" class= "avatar"></img>
        <h1>Login</h1><br>
        <div class=alert id='mensaje'><?php
        //validacion user y contraseña incorrectos
        if (isset($_SESSION['error'])){
            echo "<p>Usuario y/o contraseña incorrectos<p>";
        }
        session_destroy();
        ?></div>
        <form class="caja" action='../process/login.proc.php' method='POST' onsubmit="return validar_login()">
        <input type='email_user' name='email_user' id='email_user' placeholder="Email"/><br><br>
        <input type='password' name='password_user' id='password_user' placeholder="Contraseña"/><br><br>
        <INPUT TYPE='SUBMIT' NAME='crear' VALUE='Iniciar sesión' class="btn btn-dark btn_login">
</input>
        </form>

</div>
</div>

</body>
</html>



