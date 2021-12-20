<!--PROCESO PARA ELIMINAR MESAS-->

<?php
include '../services/ver.php';

$id_mesa = $_POST['id_mesa'];

        //seleccionamos la mesa
        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_mesa where id_mesa= :u");
        $sentencia->execute(array(":u" => $id_mesa));
        if($sentencia->fetchColumn() < 0){
            //si no se han borrado los datos nos enviará de nuevo a la pagina principal
            echo "<script> alert('Error no se ha podido borrar')</script>";
            echo"<script>window.location.replace('../view/vista.admin.php')</script>";
        }else{
            //si todo funciona bien primero eliminará el id_mesa de tbl_reserva para evitar problemas con la FK del a BD
            $del_reserva = $pdo->prepare("DELETE FROM tbl_reserva WHERE id_mesa = ?");
            $del_reserva->bindParam(1, $id_mesa);
            $del_reserva->execute();

            //eliminar la mesa
            $del = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_mesa = ?");
            $del->bindParam(1, $id_mesa);
            $del->execute();

            echo "<script> alert('Mesa eliminada con éxito')</script>";
            echo"<script>window.location.replace('../view/mesas.php')</script>";
        }
        
    ?>
