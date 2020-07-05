<?php


$nocuenta=$_POST['nocuenta'];
$contrasena=$_POST['contrasena'];

include("Conexion_BD.php");
$conexion=conectar();

$consulta="SELECT * FROM alumno where nocuenta='$nocuenta' and contrasena='$contrasena'";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas>0) {

    
    header("location: http://localhost/Control_Escolar/Alumno/PHP/datos-alumno.php");
}else{
    header("location: http://localhost/Control_Escolar/Alumno/inicio-alumno.html");
}





?>