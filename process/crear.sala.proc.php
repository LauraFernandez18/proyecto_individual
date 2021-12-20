<!--PROCESO PARA CREAR SALA-->

<?php
include '../services/ver.php';

$tipo_ubi=$_POST['tipo_ubi'];
// utilizamos el $_FILES para la imagen
$foto_ubi=$_FILES['foto_ubi'];
$id_ubi=$_POST['id_ubi'];
$foto=$foto_ubi['name'];

// establecemos el directorio de la imagen 
$target_dir = "../img/";
//con move_uploaded_file movemos el archivo a la ubicación deseada
$target_file = $target_dir . basename($_FILES["foto_ubi"]["name"]);
if (move_uploaded_file($_FILES["foto_ubi"]["tmp_name"], $target_file)) {
    echo "El archivo ". basename( $_FILES["foto_ubi"]["name"]). " La imagen se subió correctamente";
} else {
    echo "Error al cargar el archivo";
}

    //INSERTAR SALA
    $crear_sala = $pdo->prepare("INSERT INTO tbl_ubicacion (tipo_ubi,foto_ubi)
    VALUES ( ?, ? )");
    
    $crear_sala->bindParam(1, $tipo_ubi);
    $crear_sala->bindParam(2, $foto);
    
    $crear_sala->execute();

    echo "<script> alert('Sala creada con éxito!')</script>";
    echo"<script>window.location.replace('../view/salas.php')</script>";

?>