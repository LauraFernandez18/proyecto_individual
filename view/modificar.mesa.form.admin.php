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
    <title>Modificar mesa</title>
</head>
<body class="cuerpo">
<form action="../process/modificar.mesa.proc.admin.php" class="caja" method="post" enctype="multipart/form-data" onsubmit="return validar_mesa();">
        <h2>Modificar mesa</h2>
        <div class=alert id='mensaje'></div>
        <p>Nombre mesa</p>
        <input type="text" name="nombre_mesa" id='nombre_mesa' value="<?php echo $_GET['nombre_mesa'] ?>">
        <p>Número de sillas</p>
        <input type="number" name="num_silla_dispo" id='num_silla_dispo' value="<?php echo $_GET['num_silla_dispo'] ?>">
        <br>
        <p>Ubicación<p>
        <?php
        // select que mostrará todas las ubicaciones existentes de la BD
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
        <br></br>
        <input type="hidden" name="id_mesa" value="<?php echo $_GET['id_mesa'] ?>">
        <input type="submit" value="Modificar" class="btn btn-dark">
</div>
</form>
</body>
</html>