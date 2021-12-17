<?php
include '../services/ver.php';
$query=$pdo->prepare("SELECT * FROM tbl_ubicacion");
$query->execute();
$lista=$query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sala.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Salas</title>
</head>
<body>
<a type='button' class='btn btn-dark btn_filtro' href='crear.sala.form.php' class='filtro'>Crear sala</a>
<table class="table">
                <tr>
                    <th>Sala</th>
                    <th>Foto</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
<?php
foreach ($lista as $sala){
        ?>
                <tr>
                    <td><?php echo"{$sala['tipo_ubi']}";?></td>
                    <td><img src="../img/<?php echo "{$sala['foto_ubi']}";?>"></td>
                    <?php echo "<td><a type='button' class='btn btn-dark'  href='modificar.sala.form.php?id_ubi={$sala['id_ubi']}&tipo_ubi={$sala['tipo_ubi']}'>Modificar</a></td>";?>
                    <td><form METHOD='POST' action='../process/eliminar.sala.php'>
                    <input type='hidden' name='id_ubi' value=<?php echo"{$sala['id_ubi']}";?>>
                    <input type='submit' value='Borrar' class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este evento?')">
                    </form></td>
                </tr>
    <?php
}
    ?>
    </table>
</body>
</html>