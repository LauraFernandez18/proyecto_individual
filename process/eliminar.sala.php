<?php
include '../services/ver.php';

$id_ubi = $_POST['id_ubi'];

        $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_ubicacion where id_ubi= :u");
        $sentencia->execute(array(":u" => $id_ubi));
        if($sentencia->fetchColumn() < 0){
            //si no se an borrado los datos de incripción nos enviaria de nuevo a la pagina principal de admin
            echo "<script> alert('Error no se ha podido borrar')</script>";
            echo"<script>window.location.replace('../view/salas.php')</script>";
        }else{
            $del = $pdo->prepare("DELETE FROM tbl_ubicacion WHERE id_ubi = ?");
            $del->bindParam(1, $id_ubi);
            $del->execute();

            echo "<script> alert('borrado con exito')</script>";
            echo"<script>window.location.replace('../view/salas.php')</script>";
        }
        
    ?>