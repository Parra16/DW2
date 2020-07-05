<?php
    include("Conexion_BD.php");
    $conexion=conectar();


    if(isset($_POST['registro'])){
        if(strlen($_POST['nocuenta'])>= 1 &&
        strlen($_POST['indicador'])>= 1 &&
        strlen($_POST['periodo'])>= 1 &&
        strlen($_POST['creditos'])>= 1 &&
        strlen($_POST['materia'])>= 1 &&
        strlen($_POST['pparcial'])>= 1 &&
        strlen($_POST['sparcial'])>= 1 &&
        strlen($_POST['ordinario'])>= 1 &&
        strlen($_POST['extraordinario'])>= 1 ){


            $nocuenta=$_POST['nocuenta'];
            $indicador=$_POST['indicador'];
            $periodo=$_POST['periodo'];
            $creditos=$_POST['creditos'];
            $materia=$_POST['materia'];
            $pparcial=$_POST['pparcial'];
            $sparcial=$_POST['sparcial'];
            $ordinario=$_POST['ordinario'];
            $extraordinario=$_POST['extraordinario'];


            $consulta ="INSERT INTO `calificacion`(`nocuenta`, `indicador`, `periodo`, `creditos`, `materia`, `pparcial`, `sparcial`, `ordinario`, `extraordinario`) VALUES ('$nocuenta','$indicador','$periodo','$creditos','$materia','$pparcial','$sparcial','$ordinario','$extraordinario')";


            $resultado= mysqli_query($conexion,$consulta);


            if($consulta){
           header('Location: http://localhost/Control_Escolar/registrar.html');
            }



        }
    }




?>