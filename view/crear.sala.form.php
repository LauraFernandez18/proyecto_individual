<?php
include '../services/ver.php';
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
    <title>Crear sala</title>
</head>
<body>
<form action="../process/crear.sala.proc.php" method="post" class="caja" enctype="multipart/form-data"  onsubmit="return validar_generar_modificar();">
        <h2>Crear sala</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre sala</p>
        <input type="text" name="tipo_ubi" id='tipo_ubi'>
        <br>
        <p>Añadir imagen</p>
        <input type="text" name="title" id='title'>
        <input type="file" name="foto_ubi" id='foto_ubi'>
        <input type="hidden" name="id_ubi" id='id_ubi' value="<?php echo $_GET['id_ubi']?>">
        <br>
        <input type="submit" value="Crear" class="btn btn-dark">
</form>
</body>
</html>