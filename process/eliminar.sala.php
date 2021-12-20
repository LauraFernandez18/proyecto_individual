<!--PROCESO PARA ELIMINAR SALA-->

<?php
include '../services/ver.php';

$id_ubi = $_POST['id_ubi'];

        //seleccionamos la sala
        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_ubicacion where id_ubi= :u");
        $sentencia->execute(array(":u" => $id_ubi));
        if($sentencia->fetchColumn() < 0){
            //si no se han borrado los datos nos enviará de nuevo a la pagina principal
            echo "<script> alert('Error no se ha podido borrar')</script>";
            echo"<script>window.location.replace('../view/salas.php')</script>";
        }else{
            //si todo funciona bien primero eliminará el id_ubi de tbl_mesa para evitar problemas con la FK del a BD
            $del_mesa = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_ubi = ?");
            $del_mesa->bindParam(1, $id_ubi);
            $del_mesa->execute();

            //eliminar la mesa
            $del = $pdo->prepare("DELETE FROM tbl_ubicacion WHERE id_ubi = ?");
            $del->bindParam(1, $id_ubi);
            $del->execute();

            echo "<script> alert('Sala eliminada con éxito')</script>";
            echo"<script>window.location.replace('../view/salas.php')</script>";
        }
        
    ?>