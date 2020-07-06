<?php
session_start();
include 'includes/conexion.php';
$id = $_GET['id'];


$sql = "delete from publicacion where id_publicacion= $id";

$result = mysqli_query($db, $sql);
$ruta = '?usuario='.$_SESSION['usuario'].'&id='.$_SESSION['id_usuario']; 
if ($result) {
    header("location: perfil.php$ruta");
}else{
    echo "error en la eliminacion";
}
?>