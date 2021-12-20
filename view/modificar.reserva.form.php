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
    <title>Modificar evento</title>
</head>
<body class="cuerpo">
<form action="../process/modificar.reserva.proc.php" class="caja" method="post" enctype="multipart/form-data" onsubmit="return validar_generar_modificar();">
        <h2>Modificar evento</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre cliente</p>
        <input type="text" name="nombre_cliente" id='nombre_cliente' value="<?php echo $_GET['nombre_cliente'] ?>">
        <br>
        <p>Telefono cliente</p>
        <input type="text" name="telf_cliente" id='telf_cliente' value="<?php echo $_GET['telf_cliente'] ?>">
        <br>
        <p>Fecha</p>
        <input type="date" name="fecha" id='fecha'  min="<?php echo date("Y-m-d");?>" value="<?php echo $_GET['fecha'] ?>">
        <br>
        <p>Hora</p>
        <input type="time" name="hora" id='hora' min="08:00" max="23:00" step="3600" value="<?php echo $_GET['hora'] ?>">
        <br>
        <p>Numero personas</p>
        <input type="number" name="num_personas" id='num_personas' value="<?php echo $_GET['num_personas'] ?>" min="1" max="<?php echo $_GET['nsillas']?>">
        <br>
        <input type="hidden" name="id_reserva" value="<?php echo $_GET['id_reserva'] ?>">
        <input type="submit" value="Modificar" class="btn btn-dark">
</div>
</form>
</body>
</html>