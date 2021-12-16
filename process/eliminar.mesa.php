<?php
include '../services/ver.php';

$id_mesa = $_POST['id_mesa'];

        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_mesa where id_mesa= :u");
        $sentencia->execute(array(":u" => $id_mesa));
        if($sentencia->fetchColumn() < 0){
            //si no se an borrado los datos de incripción nos enviaria de nuevo a la pagina principal de admin
            echo "<script> alert('Error no se ha podido borrar')</script>";
            echo"<script>window.location.replace('../view/vista.php')</script>";
        }else{
            $del_reserva = $pdo->prepare("DELETE FROM tbl_reserva WHERE id_mesa = ?");
            $del_reserva->bindParam(1, $id_mesa);
            $del_reserva->execute();

            $del = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_mesa = ?");
            $del->bindParam(1, $id_mesa);
            $del->execute();

            echo "<script> alert('borrado con exito')</script>";
            echo"<script>window.location.replace('../view/mesas.php')</script>";
        }
        
    ?>
