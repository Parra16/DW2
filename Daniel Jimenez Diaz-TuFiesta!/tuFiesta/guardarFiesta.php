<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Fiesta guardada</title>
</head>
<body>
    <?php
        //procedemos a guardar los datos en la base de datos
        include 'conexion.php';
        $conexion= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname); //array con la informacion de la conexion de la base de datos
        //checamos la conexion en la base de datos                
        if(!$conexion){
            die("La conexion a la base de datos ha fallado: ". mysqli_connect_error());                
        }
                
        $fecha = $_POST['fechaFiesta'];
        $cantidad = $_POST['cantidadFiesta'];
        $tipoF = $_POST['tipo'];
        $horaE = $_POST['horaEntrada'];
        $horaS = $_POST['horaSalida'];
        //id's de las consultas
        $ids = $_GET['ids'];
        $id = $_GET['id'];
        
        $result = mysqli_query($conexion, "SELECT fechaFiesta, horaInicio, horaSalida FROM fiesta where idSalon = '$ids'");
        $row = mysqli_fetch_assoc($result);

        //$fechaFiesta = $row['fechaFiesta']; 
        //$horaInicio = $row['horaInicio'];
        //$horaSalida =$row['horaSalida']; 

        //date_diff
        $query = "INSERT INTO fiesta (fechaFiesta, numeroInvitados,tipoFiesta,horaInicio,horaSalida, idSalon, idUsuario) VALUES ('$fecha', '$cantidad', '$tipoF', '$horaE', '$horaS','$ids','$id')"; 
        
        if(mysqli_query($conexion, $query)){
            echo "Los datos han sido insertados $fecha $cantidad $tipoF  $horaE  $horaS <a href='anfitrionFiestas.php?id=$id'class='boton boton-amarillo'>Regresar al inicio</a>";
        }else{            
            echo "Ha ocurrido un error " . $query . "<br>" . mysqli_error($conexion);            
        }
        mysqli_close($conexion);
    ?>    
</body>
</html>