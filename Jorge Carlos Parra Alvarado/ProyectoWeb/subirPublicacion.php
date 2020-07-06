<?php
session_start();
include 'includes/conexion.php';


$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$categoria=$_POST['categoria'];
$id_usuario = $_SESSION['id_usuario'];
$precio = $_POST['precio'];
var_dump($id_usuario);
echo '<br>';
$fecha = getdate();
$actual = $fecha['year'].'/'.$fecha['mon'].'/'.($fecha['mday']-1);
$imagen=$_FILES['myfile']['name'];



$sql = "INSERT INTO publicacion values (null,'$nombre','$descripcion','$precio','$actual','$imagen','$categoria','$id_usuario');";
$insert = mysqli_query($db, $sql);
if ($insert) {
   if (isset($_FILES) && isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && !empty($_FILES['myfile']['tmp_name'])) {
    if (!is_uploaded_file($_FILES['myfile']['tmp_name'])){
        echo 'Error: el fichero encontrado no fue proesado por la subida correctamente'; //comprobamos que sea subido por un formulario
        exit;
    }
$source = $_FILES['myfile']['tmp_name'];
$destination = __DIR__.'/upload/'.$_FILES['myfile']['name'];    
if (is_file($destination)){
    echo 'Error: ya existe almacenado un fichero con ese nombre';
    @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']); //borra en carpeta temporal
    exit;
}
if (!move_uploaded_file($source, $destination)) { //arroba: elomina el mensaje que envia el metodo
    echo 'error: No se ha podido mover el fichero enviado a la carpeta de destino';
    @unlink(ini_get('upload_tmp_dir').$_FILES['myfile']['tmp_name']);
    exit;
}
header("location: index.php");
echo "Fichero subido correctamente a:".$destination.'<br>';
}
}else{
    echo "error en insercion".mysqli_error($db);
}













?>