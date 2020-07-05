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
        strlen($_POST['matricula'])>= 1 &&
        strlen($_POST['curp'])>= 1 ){
    
            $nombre=$_POST['nombre'];
            $apaterno=$_POST['apaterno'];
            $amaterno=$_POST['amaterno'];
            $nocuenta=$_POST['nocuenta'];
            $contrasena=$_POST['contrasena'];
            $correo=$_POST['correo'];
            $matricula=$_POST['matricula'];
            $curp=$_POST['curp'];
    


            $consulta ="INSERT INTO `docente`(`nocuenta`, `nombre`, `Apaterno`, `Amaterno`, `contrasena`, `correo`, `matricula`, `curp`) VALUES ('$nocuenta','$nombre','$apaterno','$amaterno','$contrasena','$correo','$matricula','$curp')";


            $resultado= mysqli_query($conexion,$consulta);


            if($consulta){
           header('Location: http://localhost/Control_Escolar/inicio.html');
            }

        }
    }

?>