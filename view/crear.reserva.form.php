<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Crear reserva</title>
</head>
<body>
<form action="../process/crear.reserva.proc.php" method="post" class="caja" onsubmit="return validar_generar_modificar();">
        <h2>Crear reserva</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre</p>
        <input type="text" name="nombre_cliente" id='nombre_cliente'>
        <br>
        <p>Telf</p>
        <input type="text" name="telf_cliente" id='telf_cliente'>
        <br>
        <p>Fecha</p>
        <input type="date" name="fecha" id='fecha'>
        <br>
        <p>Hora</p>
        <input type="time" min="08:00" max="23:00" step="3600" name="hora" id='hora'>
        <p>Num de personas</p>
        <input type="number" name="num_personas" id='num_personas' min="1" max="15">
        <br>
        <input type="hidden" name="id_reserva" id='id_reserva' value="<?php echo $_GET['id_reserva']?>">
        <input type="submit" value="Crear" class="btn btn-dark">
</form>
</body>
</html>