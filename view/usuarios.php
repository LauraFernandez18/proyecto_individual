<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Usuarios</title>
</head>
<body>
<table class="table">
                <tr>
                    <th>Usuario</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Personas</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>

<?php
include '../services/ver.php';

foreach ($listaMesas as $mesa) {
        ?>
        <tr>
        <td><?php echo"{$mesa['nombre_cliente']}";?></td>
        <td><?php echo"{$mesa['telf_cliente']}";?></td>
        <td><?php echo"{$mesa['fecha']}";?></td>
        <td><?php echo"{$mesa['hora']}";?></td>
        <td><?php echo"{$mesa['num_personas']}";?></td>
        <?php
        echo "<td><a type='button' class='btn btn-success'  href='modificar.user.form.php?id_reserva={$mesa['id_reserva']}&fecha={$mesa['fecha']}&hora={$mesa['hora']}&nombre_cliente={$mesa['nombre_cliente']}&telf_cliente={$mesa['telf_cliente']}&num_personas={$mesa['num_personas']}&id_mesa={$mesa['id_mesa']}'>Modificar</a></td>";
        ?>
        <td><form METHOD='POST' action='../process/eliminar.user.php'>
            <input type='hidden' name='id' value=<?php echo"{$mesa['id_reserva']}";?>>
            <input type='submit' value='Borrar' class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">
        </form></td>
        </tr>
    <?php
    } 
    ?>
    </table>
</body>
</html>