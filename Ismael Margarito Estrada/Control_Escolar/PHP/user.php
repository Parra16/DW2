<?php


$nocuenta=$_POST['nocuenta'];
$contrasena=$_POST['contrasena'];

include("Conexion_BD.php");
$conexion=conectar();

$consulta="SELECT * from docente where usuario='$nocuenta' and contrasena ='$contrasena'";

$resultado=mysqli_query($conexion,$consulta);


$filas=mysqli_num_rows($resultado);

if ($filas>0) {
    header(location: bien.html);


}else{
    echo "error";
}

mysqli_free_resultado($resultado);
mysqli_close($conexion);

?>