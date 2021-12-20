<!--PROCESO PARA ELIMINAR USUARIOS-->

<?php
include '../services/ver.php';

$rol_user = $_POST['rol_user'];
$id_user = $_POST['id_user'];

        //seleccionamos el usuario
        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_users where id_user= :u and rol_user= :a");
        $sentencia->execute(array(":u" => $id_user, ":a" => $rol_user));
        if($sentencia->fetchColumn() < 0){
            //si no se han borrado los datos nos enviará de nuevo a la pagina principal
            echo "<script> alert('Error no se ha podido borrar')</script>";
            echo"<script>window.location.replace('../view/salas.php')</script>";
        }else{
            //si es un camarero se podrá eliminar
            if($rol_user=="Camarero") {
            $del = $pdo->prepare("DELETE FROM tbl_users WHERE id_user = ?");
            $del->bindParam(1, $id_user);
            $del->execute();

            echo "<script> alert('Usuario eliminado con éxito')</script>";
            echo"<script>window.location.replace('../view/usuarios.php')</script>";

            } else {

            //si es un admin no podrá eliminarse

            echo "<script> alert('No se ha podido eliminar')</script>";
            echo"<script>window.location.replace('../view/usuarios.php')</script>";
        } }
        
    ?>