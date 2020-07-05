<?php


$nocuenta=$_POST['nocuenta'];
$contrasena=$_POST['contrasena'];

include("Conexion_BD.php");
$conexion=conectar();

$consulta="SELECT * FROM docente where nocuenta='$nocuenta' and contrasena='$contrasena'";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas>0) {

    
    header("location: http://localhost/Control_Escolar/PHP/datos.php");
}else{
    header("location: http://localhost/Control_Escolar/inicio.html");
}





?>