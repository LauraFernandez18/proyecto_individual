<!--PROCESO PARA ELIMINAR RESERVA-->

<?php
include '../services/config.php';
include '../services/conexion.php';
include '../services/reserva.php';

$id = $_POST['id'];

$fecha_actual=date("Y-m-d H:i:s", time());


try {
    $fin_reserva = $pdo->prepare("UPDATE tbl_reserva
    SET tbl_reserva.fecha = ?
    where id_reserva = ?");
    
    $fin_reserva->bindParam(1, $fecha_actual);
    $fin_reserva->bindParam(2, $id);    
    
    $fin_reserva->execute();



    $mesa0 = $pdo->prepare("UPDATE tbl_mesa
	inner join tbl_reserva on tbl_mesa.id_mesa=tbl_reserva.id_mesa
    SET tbl_mesa.reservada = 0
    where tbl_reserva.id_reserva=?");
   
    $mesa0->bindParam(1, $id);
   
    $mesa0->execute();
    //Fetch your records and display.

    $sentencia=$pdo->prepare("SELECT COUNT(*) from tbl_reserva where id_reserva= :u");
        $sentencia->execute(array(":u" => $id));
        if($sentencia->fetchColumn() < 0){
            //si no se an borrado los datos de incripción nos enviaria de nuevo a la pagina principal de admin
            echo "<script> alert('Error no se ha podido borrar')</script>";
            echo"<script>window.location.replace('../view/usuarios.php')</script>";
        }else{
            //Buscamos el evento en cuestión y lo deleteamos
            $del = $pdo->prepare("DELETE FROM tbl_reserva WHERE id_reserva = ?");
            $del->bindParam(1, $id);
            $del->execute();

            echo "<script> alert('Reserva eliminada con éxito')</script>";
            echo"<script>window.location.replace('../view/reservas.php')</script>";
        }
    }
    catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }
        
    ?>
