<?php
    $id = $_GET['id'];
    $idS = $_GET['idS'];
    include 'conexion.php';
    //variables para la conexion        
    $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
                
    //verificamos la conexion        
    if(!$conexion){
        die("connection failed: ".mysqli_connect_error());
    }
    
    $nom = $_POST['nom'];
    $desc = $_POST['desc'];
    $ub = $_POST['ub'];
    $cap = $_POST['cap'];

    $query = "INSERT INTO salon (nombreSalon, direccion, capacidad, idSalon, descripcionSalon,idUsuario)
                    VALUES ('$nom','$ub','$cap', '$idS','$desc', '$id')";
    
    if(mysqli_query($conexion,$query)){
        echo "Su informacion ha sido guardada<a href='informacionDeMiSalon.php?id=$id'class='boton boton-amarillo'>Regresar al inicio</a>";
    }else{
        echo "Ha ocurrido un error interno" . $query . "<br>" . mysqli_error($conexion);             
    }
    mysqli_close($conexion);                        

?>