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
    <link rel="stylesheet" href="../css/tablas_contenido.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Reservas</title>
</head>
<body>
<h1>Reservas</h1>
<!-- tabla que muestra todas las reservas -->
<div class="tabla">
<table class="table">
                <tr>
                    <th>Usuario</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Personas</th>
                    <th>Mesa</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>

<?php
include '../services/ver.php';
//sentencia SQL para coger todas las reservas
$query = $pdo->prepare("SELECT * FROM tbl_reserva INNER JOIN tbl_mesa ON tbl_reserva.id_mesa = tbl_mesa.id_mesa ORDER BY fecha DESC, hora ASC");
$query->execute();
$data = $query->fetchAll();
//bucle para mostrar todas las reservas existentes de la BD
foreach ($data as $mesa) {
        ?>
        <tr>
        <td><?php echo"{$mesa['nombre_cliente']}";?></td>
        <td><?php echo"{$mesa['telf_cliente']}";?></td>
        <td><?php echo"{$mesa['fecha']}";?></td>
        <td><?php echo"{$mesa['hora']}";?></td>
        <td><?php echo"{$mesa['num_personas']}";?></td>
        <td><?php echo"{$mesa['nombre_mesa']}";?></td>
        <?php
        //boton modificar
        echo "<td><a type='button' class='btn btn-success'  href='modificar.reserva.form.php?id_reserva={$mesa['id_reserva']}&fecha={$mesa['fecha']}&hora={$mesa['hora']}&nombre_cliente={$mesa['nombre_cliente']}&telf_cliente={$mesa['telf_cliente']}&num_personas={$mesa['num_personas']}&id_mesa={$mesa['id_mesa']}&nombre_mesa={$mesa['nombre_mesa']}'>Modificar</a></td>";
        ?>
        <!-- boton eliminar -->
        <td><form METHOD='POST' action='../process/eliminar.reserva.php'>
            <input type='hidden' name='id' value=<?php echo"{$mesa['id_reserva']}";?>>
            <input type='submit' value='Borrar' class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta reserva?')">
        </form></td>
        </tr>
    <?php
    } 
    ?>
    </table>
</div>
</body>
</html>