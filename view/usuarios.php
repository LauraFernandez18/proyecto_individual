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
    <title>Usuarios</title>
</head>
<body>
<h1>Usuarios</h1>
<br>
<!-- botón crear usuario -->
<a type='button' class='btn btn-dark btn_crear' href='crear.user.form.php' class='filtro'>Crear user</a>
<br></br>
<!-- tabla que muestra todos los usuarios -->
<div class="tabla">
<table class="table">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>

<?php
include '../services/ver.php';
//sentencia SQL para seleccionar los usuarios
$query = $pdo->prepare("SELECT * FROM tbl_users order by rol_user ASC");
$query->execute();
$data = $query->fetchAll();
//bucle para mostrar todos los usuarios existentes de la BD
foreach ($data as $usuario) {
        ?>
        <tr>
        <td><?php echo"{$usuario['nom_user']}";?></td>
        <td><?php echo"{$usuario['apellido_user']}";?></td>
        <td><?php echo"{$usuario['email_user']}";?></td>
        <td><?php echo"{$usuario['rol_user']}";?></td>

        <?php
        // botón modificar usuario
        echo "<td><a type='button' class='btn btn-dark'  href='modificar.user.form.php?id_user={$usuario['id_user']}&nom_user={$usuario['nom_user']}&apellido_user={$usuario['apellido_user']}&email_user={$usuario['email_user']}&password_user={$usuario['password_user']}&rol_user={$usuario['rol_user']}'>Modificar</a></td>";
        ?>
        <!-- botón eliminar usuario -->
        <td><form METHOD='POST' action='../process/eliminar.user.php'>
        <input type='hidden' name='id_user' value=<?php echo"{$usuario['id_user']}";?>>
        <input type='hidden' name='rol_user' value=<?php echo"{$usuario['rol_user']}";?>>
        <input type='submit' value='Borrar' class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">
        </form></td>
        </tr>
    <?php
    }
    ?>
    </table>
</div>
</body>
</html>