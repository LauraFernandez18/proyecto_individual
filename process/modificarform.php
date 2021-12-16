
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/modificar_generar.css">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<body>
<form action="modificarpdo.php" method="post" class="caja" onsubmit="return validar()">
        <h2>Modificar</h2>
        <div class=alert id='mensaje'></div>
        <p>Numero de personas en la reserva</p>
        <input type="number" name="num_personas_reserva" id='num_personas_reserva' value="<?php echo $_GET['npersonas']?>" min="1" max="<?php echo $_GET['nsillas']?>">
        <br>
        <p>Nombre del titular de la reserva</p>
        <input type="text" name="nombre_cliente" id='nombre_cliente' value="<?php echo $_GET['nombrecli'] ?>">
        <br>
        <input type="hidden" name="id_reserva" value="<?php echo $_GET['id']?>">
        <br>
        <input type="submit" value="Modificar reserva" class="btn btn-dark">
</form>
</body>
</html>