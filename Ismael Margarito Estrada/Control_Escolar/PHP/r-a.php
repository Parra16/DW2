<?php

include("Conexion_BD.php");
$conexion=conectar();

if(isset($_POST['registro'])){
    if(strlen($_POST['nombre'])>= 1 &&
    strlen($_POST['apaterno'])>= 1 &&
    strlen($_POST['amaterno'])>= 1 &&
    strlen($_POST['nocuenta'])>= 1 &&
    strlen($_POST['contrasena'])>= 1 &&
    strlen($_POST['correo'])>= 1 &&
    strlen($_POST['curp'])>= 1 &&
    strlen($_POST['direccion'])>= 1 &&
    strlen($_POST['telefono'])>= 1){


        $nombre=$_POST['nombre'];
        $apaterno=$_POST['apaterno'];
        $amaterno=$_POST['amaterno'];
        $nocuenta=$_POST['nocuenta'];
        $contrasena=$_POST['contrasena'];
        $correo=$_POST['correo'];
        $curp=$_POST['curp'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];

        $consulta ="INSERT INTO `alumno`(`nocuenta`, `nombre`, `apaterno`, `amaterno`, `contrasena`, `correo`, `curp`, `direccion`, `telefono`) VALUES ('$nocuenta','$nombre','$apaterno','$amaterno','$contrasena','$correo','$curp','$direccion','$telefono')";

        $resultado= mysqli_query($conexion,$consulta);


        if($consulta){
       header('Location: http://localhost/Control_Escolar/registro-alumno.html');
        }

    }
}



?>
