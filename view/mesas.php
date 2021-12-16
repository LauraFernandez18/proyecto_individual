<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Mesas</title>
</head>
<body>
<a type='button' class='btn btn-dark btn_filtro' href='crear.mesa.form.php' class='filtro'>Crear mesa</a>
<table class="table">
                <tr>
                    <th>Mesa</th>
                    <th>Sillas disponibles</th>
                    <th>Ubicación</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>

<?php
include '../services/ver.php';

foreach ($listaMesas as $mesa) {
        ?>
        <tr>
        <td><?php echo"{$mesa['nombre_mesa']}";?></td>
        <td><?php echo"{$mesa['num_silla_dispo']}";?></td>
        <td><?php echo"{$mesa['id_ubi']}";?></td>
        <?php
        echo "<td><a type='button' class='btn btn-dark'  href='modificar.mesa.form.php?id_mesa={$mesa['id_mesa']}&nombre_mesa={$mesa['nombre_mesa']}&num_silla_dispo={$mesa['num_silla_dispo']}&reservada={$mesa['reservada']}&id_ubi={$mesa['id_ubi']}'>Modificar</a></td>";

        ?>
        <td><form METHOD='POST' action='../process/eliminar.mesa.php'>
        <input type='hidden' name='id_mesa' value=<?php echo"{$mesa['id_mesa']}";?>>
        <input type='submit' value='Borrar' class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">
        </form></td>
        </tr>
    <?php
    }
    ?>
    </table>
</body>
</html>