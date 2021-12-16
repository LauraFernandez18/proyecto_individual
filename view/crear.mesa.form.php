<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/modificar_generar.js"></script>
    <link rel="stylesheet" href="../css/code.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Modificar</title>
</head>
<body>
<form action="../process/crear.mesa.pdo.php" method="post" class="caja" onsubmit="return validar_generar_modificar();">
        <h2>Crear mesa</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre mesa</p>
        <input type="text" name="nombre_mesa" id='nombre_mesa'>
        <p>Numeros de silla</p>
        <input type="number" name="num_silla_dispo" id='num_silla_dispo' min="1" max="15">
        <br>
        <p>Introduce la ubicación</p>
        <?php
        include '../services/ver.php';
        $query = $pdo->prepare("SELECT * FROM tbl_ubicacion");
        $query->execute();
        $data = $query->fetchAll();
        echo '<select name="id_ubi" id="id_ubi">';
        foreach ($data as $valores){
        ?>
        <option value="<?php echo $valores['id_ubi']?>"
        ><?php echo $valores['tipo_ubi'] ?></option>
        <?php
        }
        echo '</select>';
        ?>
        <!-- <select name="id_ubi" id="id_ubi">
        <option value="1">Terraza</option>
        <option value="2">Comedor</option>
        <option value="5">Privada</option>
        </select> -->

        <br>
        <input type="hidden" name="id_mesa" value="<?php echo $_GET['id_mesa'] ?>">
        <br>
        <input type="submit" value="Crear" class="btn btn-dark">
</form>
</body>
</html>