<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Eliminacion</title>
</head>
<body>    
    <?php
        include 'conexion.php';
        $id = $_GET['id']; 
        $idComentario = $_GET['idComentario'];

        $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //array con la informacion de la conexion de la base de datos
        //checamos la conexion en la base de datos                
        if(!$conexion){
            die("La conexion a la base de datos ha fallado: ". mysqli_connect_error());                
        } 
        
        $query = "DELETE FROM comentariocliente where idComentario = '$idComentario'" ;

        if(mysqli_query($conexion,$query)){
            echo "Su comentario ha sido eliminado<a href='anfitrionFiestas.php?id=$id'class='boton boton-amarillo'>Regresar al inicio</a>";
        }else{
            echo "Ha ocurrido un error interno" . $query . "<br>" . mysqli_error($conexion);             
        }        
    ?>
  
</body>
</html>

