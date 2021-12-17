<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/vista.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
</body>
</html>

<?php
include '../services/ver.php';

echo "<a href='../process/logout.php' class='logout'>Logout</a>";
echo "<h1>Reservas del restaurante</h1>";
echo "<a type='button' class='btn btn-dark btn_filtro' href='../process/filtro.php' class='filtro'>Filtro</a>";
echo "<a type='button' class='btn btn-dark btn_filtro' href='reservas.php' class='filtro'>Reservas</a>";
echo "<a type='button' class='btn btn-dark btn_filtro' href='mesas.php' class='filtro'>Mesas</a>";
echo "<a type='button' class='btn btn-dark btn_filtro' href='salas.php' class='filtro'>Salas</a>";
?>
<form action='vista.php' method='post'>
<input type='submit' name='filtre' class='btn btn-dark btn_filtre' value="Todo">
</form>
<?php
$query = $pdo->prepare("SELECT * FROM tbl_ubicacion");
        $query->execute();
        $data = $query->fetchAll();
        foreach ($data as $valores){
?>
<form action='vista.php' method='post'>
        <input type='submit' name='filtre' class='btn btn-dark btn_filtre' value="<?php echo $valores['tipo_ubi']?>">
</form>
<?php
        }
echo "<div></div>";

foreach ($listaMesas as $mesa) {
        echo "<table class='column'>";
        echo "<tr>";
        echo "<td><h3>{$mesa['nombre_mesa']}</h3></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><img src='../img/{$mesa['foto_ubi']}'></td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td><p>{$mesa['tipo_ubi']}</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><p>Nº Sillas {$mesa['num_silla_dispo']}</p></td>";
        echo "</tr>";

        echo "<td><a type='button' class='btn btn-dark' href='../process/generarform.php?id={$mesa['id_mesa']}&nsillas={$mesa['num_silla_dispo']}'>Generar reserva</a></td>";
        echo "</tr>";
        ?>
        <?php
        echo "<td><a type='button' class='btn btn-dark'  href='modificar.mesa.form.php?id_mesa={$mesa['id_mesa']}&nombre_mesa={$mesa['nombre_mesa']}&num_silla_dispo={$mesa['num_silla_dispo']}&reservada={$mesa['reservada']}&id_ubi={$mesa['id_ubi']}'>Modificar</a></td>";
        echo "</tr>";
        echo "</table>";
}


?>

</body>
</html>