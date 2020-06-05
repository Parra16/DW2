<?php
    include 'conexion.php';
    //variables para la conexion        
    $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        
    //verificamos la conexion        
    if(!$conexion){
        die("connection failed: ".mysqli_connect_error());
    }
    $id = $_GET['id'];    
    $ids = $_GET['ids'];
    $calificacion = $_POST['cal'];
    $comentario = $_POST['coment'];
    
    
    $query = "INSERT INTO comentarioCliente (calificacionSalon, comentarioCliente, idUsuario, idSalon) VALUES ('$calificacion','$comentario','$id','$ids')";

    if(mysqli_query($conexion,$query)){
        echo "Su comentario ha sido guardado<a href='anfitrionFiestas.php?id=$id'class='boton boton-amarillo'>Regresar al inicio</a>";
    }else{
        echo "Ha ocurrido un error interno" . $query . "<br>" . mysqli_error($conexion);             
    }
    mysqli_close($conexion);
?>